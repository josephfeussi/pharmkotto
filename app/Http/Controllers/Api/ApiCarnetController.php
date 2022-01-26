<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carnet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Carnet::all();
    }

     /**
     * Display the current user's questions
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
         return Auth::user()->carnets;

    }


      /**
     * Display a listing of the resource for user in parameter.
     *
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $user
     */
    public function user(User $user)
    {
        return $user->carnets;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail($request->get('user_id',"user_id expected but not found"));
        $carnet = Carnet::create($request->all());
        //$user->carnets->save($carnet);

        return $carnet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function show(Carnet $carnet)
    {
        return $carnet;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carnet $carnet)
    {
        $carnet->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carnet $carnet)
    {
        $carnet->delete();
    }
}
