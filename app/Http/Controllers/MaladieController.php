<?php

namespace App\Http\Controllers;

use App\Models\Maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaladieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.maladies.index',['maladies'=>Maladie::all()]);
    }


    public function view(Maladie $maladie)
    {
       $maladie = Maladie::with('users.profile')->find($maladie)->first();
        return view('dashboard.maladies.view',['maladie'=>$maladie]);
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
            'name'    => 'required', // make sure the email is an actual email
            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $maladie = Maladie::create(request()->all());

        return response()->json(['data'=>$maladie]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function show(Maladie $maladie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function edit(Maladie $maladie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );
         // run the validation rules on the inputs from the form
         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
                return response()->json($validator, 401);
        }
        $maladie = Maladie::find($id);
        $maladie->update(request()->all()) ;

        return response()->json(['maladie'=>$maladie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maladie  $maladie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maladie::find($id)->delete();
        return response()->json();
    }
}
