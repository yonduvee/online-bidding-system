<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        return view('auth.register');
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER USER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | NORMALIZE INPUT
        |--------------------------------------------------------------------------
        */

        $request->merge([

            'name' =>
                trim(
                    (string) $request->name
                ),

            'email' =>
                Str::lower(
                    trim(
                        (string) $request->email
                    )
                ),

        ]);


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated =
            $request->validate([

                'name' => [
                    'required',
                    'string',
                    'min:2',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],

                /*
                 * IMPORTANT:
                 *
                 * Public registration can create
                 * ONLY bidder or seller.
                 *
                 * Even if someone edits HTML and sends:
                 *
                 * role=admin
                 *
                 * backend will reject it.
                 */
                'role' => [
                    'required',
                    Rule::in([
                        'bidder',
                        'seller',
                    ]),
                ],

                'password' => [
                    'required',
                    'confirmed',

                    Password::min(8)
                        ->letters()
                        ->numbers(),
                ],

            ]);


        /*
        |--------------------------------------------------------------------------
        | CREATE USER
        |--------------------------------------------------------------------------
        */

        $user =
            User::create([

                'name' =>
                    $validated['name'],

                'email' =>
                    $validated['email'],

                'role' =>
                    $validated['role'],

                'is_active' =>
                    true,

                'blocked_at' =>
                    null,

                'blocked_reason' =>
                    null,

                'password' =>
                    Hash::make(
                        $validated['password']
                    ),

            ]);


        /*
        |--------------------------------------------------------------------------
        | LOGIN AFTER REGISTRATION
        |--------------------------------------------------------------------------
        */

        Auth::login($user);


        /*
         * Security:
         * Generate a fresh session ID.
         */
        $request
            ->session()
            ->regenerate();


        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Your account has been created successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | NORMALIZE EMAIL
        |--------------------------------------------------------------------------
        */

        $request->merge([

            'email' =>
                Str::lower(
                    trim(
                        (string) $request->email
                    )
                ),

        ]);


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $credentials =
            $request->validate([

                'email' => [
                    'required',
                    'email',
                    'max:255',
                ],

                'password' => [
                    'required',
                    'string',
                ],

            ]);


        /*
        |--------------------------------------------------------------------------
        | CHECK ACCOUNT STATUS
        |--------------------------------------------------------------------------
        */

        $user =
            User::where(
                'email',
                $credentials['email']
            )->first();


        /*
         * If the email exists but
         * account was blocked by admin.
         */
        if (
            $user
            &&
            !$user->is_active
        ) {

            return back()
                ->withErrors([

                    'email' =>
                        'Your account has been blocked by the administrator.',

                ])
                ->onlyInput('email');
        }


        /*
        |--------------------------------------------------------------------------
        | AUTHENTICATION
        |--------------------------------------------------------------------------
        |
        | is_active=true is checked AGAIN here.
        |
        | Even if account status changes between
        | the previous query and Auth::attempt,
        | blocked account cannot log in.
        |
        */

        if (
            Auth::attempt(
                [
                    'email' =>
                        $credentials['email'],

                    'password' =>
                        $credentials['password'],

                    'is_active' =>
                        true,
                ],

                $request->boolean(
                    'remember'
                )
            )
        ) {

            /*
             * Prevent session fixation.
             */
            $request
                ->session()
                ->regenerate();


            return redirect()
                ->intended(
                    route('dashboard')
                )
                ->with(
                    'success',
                    'Welcome back!'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | INVALID LOGIN
        |--------------------------------------------------------------------------
        */

        return back()
            ->withErrors([

                'email' =>
                    'The email or password is incorrect.',

            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();


        /*
         * Remove old session data.
         */
        $request
            ->session()
            ->invalidate();


        /*
         * Generate new CSRF token.
         */
        $request
            ->session()
            ->regenerateToken();


        return redirect()
            ->route('login')
            ->with(
                'success',
                'You have been logged out successfully.'
            );
    }
}