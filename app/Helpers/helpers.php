<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('isAdmin')) {
    function isAdmin() {
        $user = Auth::user();
        return $user && $user->Roles->name === 'Admin';
    }
}


if (!function_exists('isUserValid')) {
    function isUserValid($user) {
        return $user != Auth::id();
    }
}
