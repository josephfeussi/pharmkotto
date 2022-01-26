<?php

namespace App\Http\Controllers;

use App\Models\Conseil;
use App\Models\Maladie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConseilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.conseils.index', ['maladies' => Maladie::all(), 'conseils' => Conseil::with(['maladies' => function ($query) {
            $query->select('maladies.id');
        }])->get()]);
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
            'title'    => 'required', // make sure the email is an actual email
            'content' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'maladies' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );


        // return response()->json($request->all(), 200);
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator, 401);
        }
        $conseil = Conseil::create(request()->only(['title', 'content']));
        $conseil->maladies()->attach(request()->get('maladies'));

        return response()->json(['data' => $conseil]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function show(Conseil $conseil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function edit(Conseil $conseil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'title'    => 'required', // make sure the email is an actual email
            'content' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
            'maladies' => 'required', // password can only be alphanumeric and has to be greater than 3 characters
        );


        // return response()->json($request->all(), 200);
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator, 401);
        }
        $conseil = Conseil::with('maladies')->find($id);
        $conseil->update(request()->only(['title', 'content']));
        $conseil->maladies()->sync(request()->get('maladies'));

        return response()->json(['data' => $conseil]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conseil  $conseil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conseil::find($id)->delete();
        return response()->json();
    }
}
