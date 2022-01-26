<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicament;
use App\Models\Posologie;
use Illuminate\Http\Request;

class ApiPosologieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Posologie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $medicament = Medicament::findOrFail($request->get('medicament_id','medicament_id expected but not found'));
        $posology = Posologie::create($request->all());
         return $posology;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posologie  $posology
     * @return \Illuminate\Http\Response
     */
    public function show(Posologie $posology)
    {
        return $posology;
    }

/*
    * Display the specified resource.
    *
    * @param  \App\Models\Medicament  $medicament
    * @return \Illuminate\Http\Response
    */
   public function medicament(Medicament $medicament)
   {
    return $medicament->posologies;
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posologie  $posology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posologie $posology)
    {
        $posology->update($request->all());
        return $posology;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posologie  $posology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posologie $posology)
    {
        $posology->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
