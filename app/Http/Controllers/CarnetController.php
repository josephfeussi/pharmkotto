<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'user_id'    => 'required', // make sure the email is an actual email
            'consultation_date' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'observation' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'prescription' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'doctor_name' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'hospital' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $carnet = Carnet::create(request()->all());

        return response()->json(['data'=>$carnet]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function show(Carnet $carnet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function edit(Carnet $carnet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'user_id'    => 'required', // make sure the email is an actual email
            'consultation_date' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'observation' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'prescription' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'doctor_name' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'hospital' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $carnet = Carnet::find($id);
        $carnet->update(request()->all());

        return response()->json(['data'=>$carnet]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carnet::find($id)->delete();
        return response()->json();
    }
}
