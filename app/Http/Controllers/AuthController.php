<?php

namespace App\Http\Controllers;

use App\Models\AuthToken;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
/*     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('log')->only('index');
        $this->middleware('subscribed')->except('store');
    } */

    public function create_session_from_token(Request $request)
    {
        $token = $request->get('token');
        $authToken = AuthToken::where('token', $token)->first();
        if ($authToken) {
            Auth::login($authToken->user, true);
            return Redirect('dashboard');
        } else {
            return redirect()->back()->with('error', 'Unable to login: Token is missing');
        }
    }
}
