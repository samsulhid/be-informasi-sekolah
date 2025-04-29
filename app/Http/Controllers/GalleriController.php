<?php

namespace App\Http\Controllers;

use App\Models\Galleri;
use Illuminate\Http\Request;

class GalleriController extends Controller
{
    public function index()
    {
        return response()->json(Galleri::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'img' => 'required|string',
        ]);

        $Galleri = Galleri::create($data);

        return response()->json($Galleri, 201);
    }

    public function show(Galleri $Galleri)
    {
        return response()->json($Galleri);
    }

    public function update(Request $request, Galleri $Galleri)
    {
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'img' => 'sometimes|string',
        ]);

        $Galleri->update($data);

        return response()->json($Galleri);
    }

    public function destroy(Galleri $Galleri)
    {
        $Galleri->delete();

        return response()->json(null, 204);
    }
}
