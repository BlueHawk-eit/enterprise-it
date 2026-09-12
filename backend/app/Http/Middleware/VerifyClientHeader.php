<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CSRF defence for the cross-origin JSON API.
 *
 * The session cookie is SameSite=None (required for the SPA on a different
 * origin), so SameSite alone cannot stop cross-site request forgery. Instead we
 * require a custom header on every state-changing request. A cross-site attacker
 * cannot set a custom header without triggering a CORS preflight, and our CORS
 * policy only allows our own origins — so a forged request is blocked by the
 * browser before it reaches a handler. This is the OWASP "custom request header"
 * CSRF defence, appropriate for a token-authenticated/stateful JSON API.
 *
 * Our SPA sends this header on every mutating call; legitimate traffic is
 * unaffected. Safe (read-only) methods are never challenged.
 */
class VerifyClientHeader
{
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
            if ($request->header('X-EIT-CSRF') !== '1') {
                return response()->json([
                    'success' => false,
                    'message' => 'Request verification failed. Please refresh and try again.',
                ], 419);
            }
        }

        return $next($request);
    }
}
