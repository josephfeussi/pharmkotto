<?php

namespace App\Http\Controllers;

use App\Models\Garde;
use Illuminate\Http\Request;

class GardeController extends Controller
{
    public function index()
    {
        return Garde::all();
    }

    public function show(Garde $garde)
    {
        return $garde;
    }

    public function store(Request $request)
    {
        $garde = Garde::create($request->all());

        return response()->json($garde, 201);
    }

    public function update(Request $request, Garde $garde)
    {
        $garde->update($request->all());

        return response()->json($garde, 200);
    }

    public function delete(Garde $garde)
    {
        $garde->delete();

        return response()->json(null, 204);
    }
}
