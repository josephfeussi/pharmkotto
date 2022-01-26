<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }


     /**
     * Display the current user with profile
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
         Auth::user()->profile;
         return Auth::user();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has('password')) {
            return response()->json(['message' => 'password is required'], 400);
        }
        $user = User::create($request->all());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return $user;
    }

    /**
     * Updates a user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        if (!$request->has('old_password')) {
            return response()->json(['message' => 'old_password is required'], 400);
        }
        if (!$request->has('new_password')) {
            return response()->json(['message' => 'new_password is required'], 400);
        }
        $user = User::findOrFail($request->get('user_id', 'No user provided'));

        if (!Hash::check($request->get('old_password'), $user->password)) {
            return response()->json(['message' => 'the actual password could not be verified'], 400);
        }

        $user->password = Hash::make($request->get('new_password'));
        $user->save();

         return response()->json(['success' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'true'], 200);
    }
}
