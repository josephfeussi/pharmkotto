<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Garde;
use Illuminate\Http\Request;

class ApiGardeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Garde::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $garde = Garde::create($request->all());
        return $garde;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garde  $garde
     * @return \Illuminate\Http\Response
     */
    public function show(Garde $garde)
    {
        return $garde;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Garde  $garde
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garde $garde)
    {
        $garde->update($request->all());
        return $garde;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garde  $garde
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garde $garde)
    {
        $garde->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
