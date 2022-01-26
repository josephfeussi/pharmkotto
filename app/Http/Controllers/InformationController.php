<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.informations.index');
    }

    public function all()
    {
        return response()->json(['data' => Information::all()->toArray()], 200);
    }

    public function apiStore(Request $request)
    {
        $rules = array(
            'information'    => 'required',
        );

        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }
        $information = new Information();
        $information->information = request()->get('information');
        if ($file = $request->file('image')) {


            $path = $file->store('public/files');

            $name = $file->getClientOriginalName();
            $information->image = Storage::url($path);
        }



        $information->save();

        return response()->json(['data' => $information], 201);
    }


    public function apiUpdate(Request $request, $id)
    {



        $rules = array(
            'information'    => 'required',
        );

        $validator = Validator::make(request()->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }

        $information = Information::findOrFail($id);

        $information->information = request()->get('information');
        $information->save();

        return response()->json(['data' => $information], 200);
    }


    public function apiDelete(Request $request, $id)
    {

        $information = Information::findOrFail($id);

        Storage::delete([$information->image]);
        $information->delete();

        return response()->json([], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.informations.create');
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
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        //
    }
}
