<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('getPrefix')) {
    function getPrefix()
    {
        

        $user = Auth::user();

        // Check if the user has the DEVELOPER role first
        if ($user->hasRole('admin', 'web')) {
            return 'admin.';
        }

        // // Then check for admin-related roles
        if ($user->hasRole('client', 'web')) {
            return 'client.';
        }

        // Default prefix
       
    }
}

