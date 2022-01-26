<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\SendWelcomeJobMail;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ApiProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserProfile::with('user')->get()->makeHidden(['id']);
    }


     /**
     * Display the current user's profile
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
         return Auth::user()->profile;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::findOrFail($request->get('user_id','user_id expected but not found'));
        if($user->profile()->exists()){
            return response()->json([
                'error' => 'Action not allowed',
                'message' => 'Trying to create duplicate profile',
                'suggestion' => 'Are you trying to update ? Use [POST] or [PUT] methods'
            ], 403);
        }
        $profile = UserProfile::create($request->all());
        $user->profile;
          // Envoyer un email de bienvenue a l'utilisateur
        SendWelcomeJobMail::dispatch($user);
        return $profile;
    }

    /**
     * Display the profile for a specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user(User $user)
    {


        if($user->profile()->exists()){
            $relation = $user->profile;
            return $relation;
        }
         return response()->json(["message" => "L'utilisateur n'as pas de profile"], 400);
    }


     /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $profile)
    {
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $profile)
    {
        $profile->update($request->all());
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $profile)
    {
        $profile->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
