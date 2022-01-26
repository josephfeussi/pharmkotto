<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conseil;
use App\Models\Maladie;
use Illuminate\Http\Request;

class ApiConseilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Conseil::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conseil = Conseil::create($request->except("maladies"));
        $maladie_ids = $request->json()->get("maladies");

        if($maladie_ids != null){
            $conseil->maladies()->syncWithoutDetaching($maladie_ids);
        }
        return $conseil;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function show(Conseil $conseil)
    {
        return $conseil;
    }

     /**
     * Display all the maladies for a conseil.
     *
     * @return \Illuminate\Http\Response
     */
    public function maladies(Conseil $conseil)
    {
        return $conseil->maladies;
    }


     /**
     * Display the conseils for a maladie.
     *
     * @param  \App\Models\Maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function maladie(Maladie $maladie)
    {
        return $maladie->conseils;
    }

      /**
     * add the conseils to a maladie.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function attach_conseil_to_maladie(Request $request)
    {
        {
            $maladie = Maladie::findOrFail($request->get("maladie_id", "maladie_id expected but not found"));
            $conseil = Conseil::findOrFail($request->get("conseil_id", "conseil_id expected but not found"));
            $maladie->conseils()->syncWithoutDetaching($conseil->id);
            return response()->json(["success" => true], 200);
        }
    }


       /**
     * detach the conseils from maladie.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function detach_conseil_to_maladie(Request $request)
    {
        {
            $maladie = Maladie::findOrFail($request->get("maladie_id", "maladie_id expected but not found"));
            $conseil = Conseil::findOrFail($request->get("conseil_id", "conseil_id expected but not found"));
            $maladie->conseils()->detach($conseil->id);
            return response()->json(["success" => true], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conseil $conseil)
    {
        $conseil->update($request->all());
        return $conseil;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conseil $conseil)
    {
        $conseil->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
