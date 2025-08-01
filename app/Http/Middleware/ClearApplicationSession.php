<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClearApplicationSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Clear application-related session data when accessing career pages
        if ($request->is('careers/*')) {
            // Only clear if not submitting an application
            if (!$request->is('careers/job/*/apply') || $request->method() !== 'POST') {
                session()->forget([
                    'application_data',
                    'old_input',
                    'application_form_token'
                ]);
            }
        }

        return $next($request);
    }
}
