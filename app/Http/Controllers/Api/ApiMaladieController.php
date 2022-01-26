<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Maladie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiMaladieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Maladie::all();
    }

     /**
     * Display the current user's maladies
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
         return Auth::user()->maladies;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $malady = Maladie::create($request->all());
        return $malady;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maladie  $malady
     * @return \Illuminate\Http\Response
     */
    public function show(Maladie $malady)
    {
        return $malady;
    }


    /**
     * Display the maladys of a user (antecedant).
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user(User $user)
    {
        return $user->maladies;
    }


    /**
     * Add a malady to the list of user maladys (antecedant).
     *
     * @return \Illuminate\Http\Response
     */
    public function attach_maladie_to_user(Request $request)
    {
        $user = User::findOrFail($request->get("user_id", "user_id expected but not found"));
        $maladie = Maladie::findOrFail($request->get("maladie_id", "maladie_id expected but not found"));
        $user->maladies()->syncWithoutDetaching($maladie->id);
        return response()->json(["success" => true], 200);
    }


    /**
     * remove a malady to the list of user maladys (antecedant).
     *
     * @return \Illuminate\Http\Response
     */
    public function detach_maladie_to_user(Request $request)
    {
        $user = User::findOrFail($request->get("user_id", "user_id expected but not found"));
        $maladie = Maladie::findOrFail($request->get("maladie_id", "maladie_id expected but not found"));
        $user->maladies()->detach($maladie->id);
        return response()->json(["success" => true], 200);
    }


    /**
     * Display users having a malady.
     *
     * @param  \App\Models\Maladie  $malady
     * @return \Illuminate\Http\Response
     */
    public function users(Maladie $malady)
    {
        return $malady->users;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maladie  $malady
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maladie $malady)
    {
        $malady->update($request->all());
        return $malady;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maladie  $malady
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maladie $malady)
    {
        $malady->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
