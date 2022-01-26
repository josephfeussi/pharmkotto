<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Models\Posologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PosologieController extends Controller
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
            'medicament_id'    => 'required', // make sure the email is an actual email
            'dose' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $posologie = Posologie::create(request()->all());

        return response()->json(['data'=>$posologie]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function show(Posologie $posologie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function edit(Posologie $posologie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'dose' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $posologie = Posologie::find($id);
        $posologie->update(request()->all()) ;

        return response()->json(['posologie'=>$posologie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posologie  $posologie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posologie::find($id)->delete();
        return response()->json();
    }
}
