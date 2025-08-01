<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

     public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
            }

            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->hasRole('client') || $user->hasRole('client')) {
                return redirect()->intended(route(getPrefix() .'dashboard'));
            }

            // if ($user->hasRole('Developer')) {
            //     return redirect()->intended(route('developer.dashboard'));
            // }

            // if ($user->hasRole('User')) {
            //     return redirect()->intended(route('user.dashboard'));
            // }
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }
    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function getAssignedDevelopers(Project $project)
    {
        $assignedDeveloperIds = $project->users->pluck('id');
        return response()->json(['assignedDeveloperIds' => $assignedDeveloperIds]);
    }
}
