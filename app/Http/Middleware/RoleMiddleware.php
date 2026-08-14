<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | USER MUST BE LOGGED IN
        |--------------------------------------------------------------------------
        */

        if (!$request->user()) {

            return redirect()
                ->route('login');
        }


        /*
        |--------------------------------------------------------------------------
        | BLOCKED / INACTIVE USER
        |--------------------------------------------------------------------------
        |
        | Admin যদি account block করে,
        | existing login session থাকলেও
        | user protected page ব্যবহার করতে পারবে না।
        |
        */

        if (!$request->user()->is_active) {

            Auth::logout();

            $request
                ->session()
                ->invalidate();

            $request
                ->session()
                ->regenerateToken();


            return redirect()
                ->route('login')
                ->withErrors([
                    'email' =>
                        'Your account has been blocked by the administrator.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | ROLE CHECK
        |--------------------------------------------------------------------------
        */

        if (
            !in_array(
                $request->user()->role,
                $roles,
                true
            )
        ) {

            abort(
                403,
                'You are not authorized to access this page.'
            );
        }


        return $next($request);
    }
}