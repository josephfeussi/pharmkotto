<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Information::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'information' => 'required',
                'image' => 'mimes:png,svg,jpg,jpeg'
            ]
        );

        if ($file = $request->file('image')) {
            return "Saving file";
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
        }

        return "Saving information";
        $information = Information::create($request->all());
        return $information;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return $information;
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
        $information->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
