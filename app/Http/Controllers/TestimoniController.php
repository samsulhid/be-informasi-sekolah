<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        return response()->json(Testimoni::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'img' => 'required|string',
        ]);

        $testimoni = Testimoni::create($data);

        return response()->json($testimoni, 201);
    }

    public function show(Testimoni $testimoni)
    {
        return response()->json($testimoni);
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'message' => 'sometimes|string',
            'img' => 'sometimes|string',
        ]);

        $testimoni->update($data);

        return response()->json($testimoni);
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return response()->json(null, 204);
    }
}
