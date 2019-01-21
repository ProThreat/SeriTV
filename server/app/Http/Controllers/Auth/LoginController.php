<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// Laravel Auth
use Auth;
use Validator;

// Custom models
use App\User;
use App\Http\Requests\UserStoreRequest;

// Illuminate request models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle an register user event.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function register(UserStoreRequest $request)
    {
        // Get user name
        $username = $request->name;

        // Create user
        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);

        // Return response
        return response()->json(['success' => true, 'message' => 'User has been registered', 'user' => $user]);;
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        // Get user name
        $username = $request->name;

        // Check is username or email
        if( filter_var($username, FILTER_VALIDATE_EMAIL) )
            $user = User::where(['email' => $username])->first();
        else
            $user = User::where(['name' => $username])->first();

        // User has logged in?
        if( $user && Hash::check($request->password, $user->password) )
            return response()->json(['success' => true, 'message' => 'User credentials match', 'user' => $user]);

        // Return response
        return response()->json(['success' => false, 'message' => 'User credentials do not match']);;
    }
}
