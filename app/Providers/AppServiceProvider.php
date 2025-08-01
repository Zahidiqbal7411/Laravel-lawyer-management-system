<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // SUPER_ADMIN bypasses all gates
        Gate::before(function ($user, $ability) {
            return $user->hasRole('SUPER_ADMIN') ? true : null;
        });

        // Share prefix for SUPER_ADMIN, ADMIN, or USER
        View::composer('*', function ($view) {
            $prefix = (Auth::check() && (Auth::user()->hasRole('SUPER_ADMIN') || Auth::user()->hasRole('ADMIN')))
                ? 'admin.' : 'user.';
            $view->with('prefix', $prefix);
        });

        // Route model binding for career applications
        Route::model('career_application', \App\Models\JobApplication::class);
    }
}
