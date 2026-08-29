<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\OnboardingRequest;
use App\Services\OidcTokenVerifier;

class AuthController extends Controller
{
    /**
     * Validate the Entra ID / OIDC ID Token and create a secure HttpOnly session.
     */
    public function login(Request $request)
    {
        $request->validate([
            'id_token' => 'required|string',
            'email' => 'required|email'
        ]);

        $idToken = $request->input('id_token');
        $email = $request->input('email');

        Log::info("Validating OIDC Authorization Code Flow ID Token for user: {$email}");

        // Verify the token's RS256 signature against Microsoft's published JWKS, plus
        // standard issuer/audience/expiry checks. This has no bypass path: if
        // AZURE_TENANT_ID / AZURE_CLIENT_ID aren't configured, or the token doesn't
        // verify, login is refused.
        $claims = OidcTokenVerifier::verify($idToken);

        if (!$claims) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid ID token or OIDC verification failed.'
            ], 401);
        }

        // The verified token's own email/UPN claim must match what was submitted,
        // so a valid token for one account can't be replayed against another email.
        $tokenEmail = $claims['email'] ?? $claims['preferred_username'] ?? $claims['upn'] ?? null;
        if (!$tokenEmail || strcasecmp($tokenEmail, $email) !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Token identity does not match the submitted email.'
            ], 401);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Account not found. Please contact support to provision your client portal account.'
            ], 401);
        }

        // Log the user in to create a secure Laravel session.
        // Laravel handles session state using encrypted, HttpOnly cookies automatically.
        Auth::login($user);

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

        if (!\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.'
            ], 401);
        }

        // Establish secure session
        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Admin session established.',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'organisation' => $user->organisation,
                'account_type' => $user->account_type,
            ]
        ]);
    }
}
