<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/student/dashboard')) {
                return route('login');
            }
            elseif(Request::is(app()->getLocale() . '/teacher/dashboard')) {
                return route('login');
            }

            else {
                return route('login');
            }
        }

    }
}
