<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\OnboardingRequest;
use App\Services\OidcTokenVerifier;
use App\Services\TotpService;

class AuthController extends Controller
{
    /**
     * Validate the Entra ID / OIDC ID Token and create a secure HttpOnly session.
     */
    public function login(Request $request)
    {
        $request->validate([
            'id_token' => 'required|string',
        ]);

        // Verify the token's RS256 signature against Microsoft's published JWKS, plus
        // standard issuer/audience/expiry checks. This has no bypass path: if
        // AZURE_TENANT_ID / AZURE_CLIENT_ID aren't configured, or the token doesn't
        // verify, login is refused.
        $claims = OidcTokenVerifier::verify($request->input('id_token'));

        if (!$claims) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid ID token or OIDC verification failed.'
            ], 401);
        }

        // Identity is taken SOLELY from the verified token — never from a
        // client-supplied field — so a valid token can't be replayed against
        // another email.
        $tokenEmail = $claims['email'] ?? $claims['preferred_username'] ?? $claims['upn'] ?? null;
        if (!$tokenEmail || !filter_var($tokenEmail, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'success' => false,
                'message' => 'The Microsoft token did not contain a usable email claim.'
            ], 401);
        }
        $tokenEmail = strtolower(trim($tokenEmail));
        $displayName = $claims['name'] ?? $tokenEmail;

        Log::info("Validating OIDC ID token for portal user: {$tokenEmail}");

        $user = User::whereRaw('LOWER(email) = ?', [$tokenEmail])->first();

        if ($user) {
            // The portal is for client/partner accounts only. Admins authenticate
            // through the admin login (password + 2FA); an Entra token must never
            // bypass that stronger flow, even if the email matches an admin.
            if (!in_array($user->account_type, ['client', 'partner'], true)) {
                Log::warning("Entra portal login refused for non-portal account: {$tokenEmail} ({$user->account_type})");
                return response()->json([
                    'success' => false,
                    'message' => 'This account cannot sign in here.'
                ], 403);
            }
        } else {
            // Just-in-time provisioning: the Entra invitation (with "assignment
            // required" on the Enterprise App) is the single gate for access, so a
            // successfully verified token for a new user creates their local record
            // on first sign-in. The password is random and unused — authentication
            // is always via Entra.
            $user = User::create([
                'name' => $displayName,
                'email' => $tokenEmail,
                'organisation' => null,
                'account_type' => 'client',
                'password' => Hash::make(Str::random(64)),
            ]);
            Log::info("JIT-provisioned portal user on first Entra sign-in: {$tokenEmail}");
        }

        // Establish a secure Laravel session; regenerate the ID to prevent fixation.
        // Laravel handles session state using encrypted, HttpOnly cookies automatically.
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'message' => 'OIDC token validated, session established.',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'organisation' => $user->organisation,
                'account_type' => $user->account_type,
            ]
        ]);
    }

    /**
     * Get the authenticated user profile from the HttpOnly session.
     */
    public function user(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'authenticated' => true,
                'user' => [
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'organisation' => Auth::user()->organisation,
                    'account_type' => Auth::user()->account_type,
                ]
            ]);
        }

        return response()->json([
            'authenticated' => false,
            'message' => 'Unauthorized session.'
        ], 401);
    }

    /**
     * Clear user session and remove HttpOnly session cookies.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.'
        ]);
    }

    /**
     * Trigger onboarding email request.
     */
    public function onboard(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'organisation' => 'required|string|max:255',
            'account_type' => 'required|string|in:client,partner'
        ]);

        $email = $request->input('email');
        $organisation = $request->input('organisation');
        $accountType = $request->input('account_type');

        // Check if onboarding request already exists
        $existing = OnboardingRequest::where('email', $email)->first();
        if ($existing) {
            return response()->json([
                'success' => true,
                'message' => 'An onboarding request for this email has already been submitted.'
            ]);
        }

        // Store request in the database
        OnboardingRequest::create([
            'email' => $email,
            'organisation' => $organisation,
            'account_type' => $accountType,
            'status' => 'pending'
        ]);

        // Log the event as an automated backend workflow trigger
        Log::info("Onboarding Prompt Triggered: Onboarding request email for {$email} ({$accountType}) saved to database & support notification generated.");

        // Here we simulate sending an email to support team.
        // In production, Mail::raw(...) would send a real provisioning alert.
        $emailContent = "
        To: support@enterpriseit.com.au
        Subject: Account Provisioning Request - {$accountType}
        Body: 
        A new account request has been submitted through the onboarding prompt.
        User Email: {$email}
        Organisation: {$organisation}
        Account Type: {$accountType}
        Action: Please provision a guest account in Microsoft Entra ID (External Identities) and send invitation.
        ";

        // Save to system storage or logs to simulate email sending
        $logPath = storage_path('logs/onboarding_emails.log');
        file_put_contents($logPath, $emailContent . "\n=========================================\n", FILE_APPEND);

        return response()->json([
            'success' => true,
            'message' => 'Onboarding request submitted. Our support team will contact you shortly.'
        ]);
    }

    /**
     * Retrieve all onboarding requests.
     */
    public function getOnboardRequests()
    {
        $requests = OnboardingRequest::orderBy('created_at', 'desc')->get();
        return response()->json($requests);
    }

    /**
     * Approve an onboarding request and create a database user record.
     */
    public function approveOnboardRequest($id)
    {
        $onboard = OnboardingRequest::findOrFail($id);

        if ($onboard->status === 'approved') {
            return response()->json([
                'success' => false,
                'message' => 'This request has already been approved.'
            ], 400);
        }

        // Generate a basic name based on email prefix
        $name = explode('@', $onboard->email)[0];
        $name = ucfirst(str_replace('.', ' ', $name));

        // Create the user in the 'users' database table
        User::create([
            'name' => $name,
            'email' => $onboard->email,
            'password' => bcrypt(Str::random(16)),
            'organisation' => $onboard->organisation,
            'account_type' => $onboard->account_type,
        ]);

        // Mark request as approved
        $onboard->status = 'approved';
        $onboard->save();

        Log::info("Onboarding Request Approved: User account registered for {$onboard->email} and request status set to approved.");

        return response()->json([
            'success' => true,
            'message' => "Request approved. User account registered for {$onboard->email}."
        ]);
    }

    /**
     * Authenticate admin users via password.
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!$user || $user->account_type !== 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid admin credentials or account not found.'
            ], 401);
        }

        if (!Hash::check($password, $user->password)) {
            Log::warning("Admin login failed (bad password) for {$email}");
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.'
            ], 401);
        }

        // If two-factor is enabled, do NOT establish the session yet. Stash a
        // short-lived challenge in the session and require the code next.
        if ($user->hasTwoFactorEnabled()) {
            $request->session()->put('2fa.pending_user_id', $user->id);
            $request->session()->put('2fa.pending_at', now()->timestamp);
            Log::info("Admin login step 1 ok, 2FA required for {$email}");
            return response()->json([
                'success' => true,
                'two_factor_required' => true,
                'message' => 'Enter your authenticator code to continue.',
            ]);
        }

        // No 2FA — establish secure session directly.
        $request->session()->regenerate();
        Auth::login($user);
        Log::info("Admin login success (no 2FA) for {$email}");

        return response()->json([
            'success' => true,
            'message' => 'Admin session established.',
            'user' => $this->userPayload($user),
        ]);
    }

    /**
     * Second step of admin login: verify the TOTP code (or a recovery code)
     * against the challenge stashed in the session, then establish the session.
     */
    public function adminLoginTwoFactor(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $pendingId = $request->session()->get('2fa.pending_user_id');
        $pendingAt = (int) $request->session()->get('2fa.pending_at', 0);

        // Challenge expires after 5 minutes.
        if (!$pendingId || (now()->timestamp - $pendingAt) > 300) {
            $request->session()->forget(['2fa.pending_user_id', '2fa.pending_at']);
            return response()->json([
                'success' => false,
                'message' => 'Your login session expired. Please sign in again.',
            ], 401);
        }

        $user = User::find($pendingId);
        if (!$user || !$user->hasTwoFactorEnabled()) {
            $request->session()->forget(['2fa.pending_user_id', '2fa.pending_at']);
            return response()->json(['success' => false, 'message' => 'Unable to verify.'], 401);
        }

        $code = trim($request->input('code'));
        $ok = TotpService::verify($user->two_factor_secret, $code)
            || $this->consumeRecoveryCode($user, $code);

        if (!$ok) {
            Log::warning("Admin 2FA failed for {$user->email}");
            return response()->json([
                'success' => false,
                'message' => 'Invalid authenticator code.',
            ], 401);
        }

        $request->session()->forget(['2fa.pending_user_id', '2fa.pending_at']);
        $request->session()->regenerate();
        Auth::login($user);
        Log::info("Admin login success (2FA) for {$user->email}");

        return response()->json([
            'success' => true,
            'message' => 'Admin session established.',
            'user' => $this->userPayload($user),
        ]);
    }

    /**
     * Change the authenticated user's password (requires the current password
     * and enforces a strong-password policy).
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
        ]);

        $user = Auth::user();
        if (!$user || !Hash::check($request->input('current_password'), $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Your current password is incorrect.',
            ], 422);
        }

        $user->password = $request->input('password');
        $user->password_changed_at = now();
        $user->save();

        // Keep the current session valid after the password change.
        Auth::login($user);
        Log::info("Password changed for {$user->email}");

        return response()->json(['success' => true, 'message' => 'Password updated.']);
    }

    /**
     * Report whether the authenticated user has 2FA enabled.
     */
    public function twoFactorStatus(Request $request)
    {
        $user = Auth::user();
        return response()->json(['enabled' => $user ? $user->hasTwoFactorEnabled() : false]);
    }

    /**
     * Begin 2FA setup: generate (but do not yet enforce) a secret and recovery
     * codes. Enforcement only starts once confirmTwoFactor succeeds.
     */
    public function setupTwoFactor(Request $request)
    {
        $user = Auth::user();

        $secret = TotpService::generateSecret();
        $recovery = TotpService::generateRecoveryCodes();

        $user->two_factor_secret = $secret;
        $user->two_factor_recovery_codes = json_encode(array_map(fn ($c) => Hash::make($c), $recovery));
        $user->two_factor_confirmed_at = null; // not enforced until confirmed
        $user->save();

        return response()->json([
            'success' => true,
            'secret' => $secret,
            'otpauth_uri' => TotpService::otpauthUri($secret, $user->email, 'enterprise IT'),
            'recovery_codes' => $recovery,
        ]);
    }

    /**
     * Confirm and enable 2FA by verifying a code against the pending secret.
     */
    public function confirmTwoFactor(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $user = Auth::user();
        if (empty($user->two_factor_secret)) {
            return response()->json(['success' => false, 'message' => 'Start setup first.'], 422);
        }

        if (!TotpService::verify($user->two_factor_secret, trim($request->input('code')))) {
            return response()->json(['success' => false, 'message' => 'Invalid code. Try again.'], 422);
        }

        $user->two_factor_confirmed_at = now();
        $user->save();
        Log::info("2FA enabled for {$user->email}");

        return response()->json(['success' => true, 'message' => 'Two-factor authentication enabled.']);
    }

    /**
     * Disable 2FA (requires the current password).
     */
    public function disableTwoFactor(Request $request)
    {
        $request->validate(['password' => 'required|string']);

        $user = Auth::user();
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['success' => false, 'message' => 'Password is incorrect.'], 422);
        }

        $user->two_factor_secret = null;
        $user->two_factor_recovery_codes = null;
        $user->two_factor_confirmed_at = null;
        $user->save();
        Log::warning("2FA disabled for {$user->email}");

        return response()->json(['success' => true, 'message' => 'Two-factor authentication disabled.']);
    }

    /**
     * Verify a recovery code and, on success, consume (remove) it.
     */
    private function consumeRecoveryCode(User $user, string $code): bool
    {
        $codes = json_decode($user->two_factor_recovery_codes ?? '[]', true) ?: [];
        foreach ($codes as $i => $hash) {
            if (Hash::check($code, $hash)) {
                unset($codes[$i]);
                $user->two_factor_recovery_codes = json_encode(array_values($codes));
                $user->save();
                Log::info("Recovery code used for {$user->email}");
                return true;
            }
        }
        return false;
    }

    /**
     * Consistent user object returned to the SPA.
     */
    private function userPayload(User $user): array
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'organisation' => $user->organisation,
            'account_type' => $user->account_type,
        ];
    }
}
