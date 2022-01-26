<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuthToken;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $phone = $request->get("phone");
        $password = $request->get("password");

        if ($phone == null || $password == null) {
            return response()->json(["message" => "Le numero de telephone et le mot de passe doivent être entré"], 400);
        }


        try {
            $profile = UserProfile::where('mobile_phone', $phone)->firstOrFail();


            if (!Hash::check($password, $profile->user->password)) {
                return response()->json(['message' => 'Incorrect password'], 400);
            }

            $token = new AuthToken();
            $token->token = User::create_token();
            $profile->user->tokens()->save($token);

            return response()->json(["user" => $profile, "token" => $token]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(["message" => "incorrect email, verify and try again"], 400);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function revoke(Request $request)
    {
        $token = $request->bearerToken();
        if ($token) {
            AuthToken::where('token', $token)->first()->delete();
            return response()->json(["success" => true], 200);
        }

        return response()->json(["message" => "Not authenticated", 401]);
    }
}
