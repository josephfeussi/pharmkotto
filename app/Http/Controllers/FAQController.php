<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FAQController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.faq.index');
    }

    public function all()
    {
        return response()->json(['data' => FAQ::all()->toArray()], 200);
    }

    public function apiStore(Request $request)
    {
        $rules = array(
            'question'    => 'required',
            'answer'    => 'required',

        );

        $validator = Validator::make($request->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }

        $faq = FAQ::create(request()->all());



        return response()->json(['data' => $faq], 201);
    }


    public function apiUpdate(Request $request, $id)
    {



        $rules = array(
            'question'    => 'required',
            'answer'    => 'required'

        );

        $validator = Validator::make(request()->all(), $rules);


        // if the validator fails, redirect back to the form
        if ($validator->fails()) {


            return response()->json($validator, 401);
        }

        $faq = FAQ::findOrFail($id);

        $faq->update(request()->all());

        return response()->json(['data' => $faq], 200);
    }


    public function apiDelete(Request $request, $id)
    {

        $faq = FAQ::findOrFail($id);


        $faq->delete();

        return response()->json([], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faq.create');
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
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $faq)
    {
        //
    }
}
