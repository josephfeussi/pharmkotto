<?php

namespace App\Http\Controllers;

use App\Models\Garde;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PharmacieController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pharmacies.index');
    }

    public function all()
    {
        return response()->json(['data' => Garde::all()->toArray()], 200);
    }

    public function apiStore(Request $request)
    {
        $rules = array(
            'from'    => 'required',
            'to'    => 'required',
            'name'    => 'required',
            'location'    => 'required',
        );

        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }

        $pharmacie = Garde::create(request()->all());



        return response()->json(['data' => $pharmacie], 201);
    }


    public function apiUpdate(Request $request, $id)
    {



        $rules = array(
            'from'    => 'required',
            'to'    => 'required',
            'name'    => 'required',
            'location'    => 'required',
        );

        $validator = Validator::make(request()->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }

        $pharmacie = Garde::findOrFail($id);

        $pharmacie->update(request()->all());

        return response()->json(['data' => $pharmacie], 200);
    }


    public function apiDelete(Request $request, $id)
    {

        $pharmacie = Garde::findOrFail($id);


        $pharmacie->delete();

        return response()->json([], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pharmacies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function show(Garde $pharmacie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function edit(Garde $pharmacie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garde $pharmacie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pharmacie  $pharmacie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garde $pharmacie)
    {
        //
    }
}
