<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        return response()->json(Prestasi::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'img' => 'required|string',
            'title' => 'required|string|max:255',
            'category' => 'required|in:nasional,internasional,sekolah', // Perbaikan typo "nasioal" menjadi "nasional"
        ]);

        $prestasi = Prestasi::create($data);

        return response()->json($prestasi, 201);
    }

    public function show(Prestasi $prestasi)
    {
        return response()->json($prestasi);
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate([
            'img' => 'sometimes|string',
            'title' => 'sometimes|string|max:255',
            'category' => 'sometimes|in:nasional,internasional,sekolah', // Perbaikan typo "nasioal" menjadi "nasional"
        ]);

        $prestasi->update($data);

        return response()->json($prestasi);
    }

    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return response()->json(null, 204);
    }
}
