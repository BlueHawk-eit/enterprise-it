<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Require an authenticated session belonging to an admin account.
     * Used for admin-only API routes (onboarding management, CMS writes).
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access.',
            ], 401);
        }

        if (Auth::user()->account_type !== 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden: administrator access required.',
            ], 403);
        }

        return $next($request);
    }
}
