<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->acceptsHtml() && !request()->ajax() && !request()->ajax()) {
            return view('dashboard.medicaments.index');
        }


        return response()->json(["data" => Medicament::all()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.medicaments.create");
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

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $medicament = Medicament::create($request->all());
            if (request()->acceptsHtml() && !request()->ajax()){
                return redirect()->route('dashboard.medicament.view',["id"=>$medicament->id]);
            }
            return response()->json(["data"=> $medicament]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.medicaments.id', ['medicament'=>Medicament::with("posologies")->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicament $medicament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicament $medicament)
    {
        $rules = array(
            'name'    => 'required', // make sure the email is an actual email
            'description' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'type' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){


            if (request()->acceptsHtml() && !request()->ajax()){
                return redirect()->back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
            }
            return response()->json(["data"=> $validator], 401);

        }

        $medicament->update(request()->all());
        if (request()->acceptsHtml() && !request()->ajax()){
            return redirect()->route('dashboard.medicament.view', ["id"=>$medicament->id]);
        }
        return response()->json(["data"=> $medicament]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicament  $medicament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicament $medicament)
    {
        $medicament->delete();
        if (request()->acceptsHtml() && !request()->ajax()){
            return redirect()->back();
        }
        return response()->json(["data"=> $medicament]);


    }
}
