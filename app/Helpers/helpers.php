<?php

use Illuminate\Support\Facades\Auth;

if(!function_exists('getAuthenticatedUser')) {
    function getAuthenticatedUser(){
        $guards = ['admin', 'dokter', 'pasien'];
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user();
            }
        }
        return null;
    }
}