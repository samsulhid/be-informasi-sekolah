<?php

namespace App\Http\Controllers;

use App\Models\ProfilAlumni;
use Illuminate\Http\Request;

class ProfilAlumniController extends Controller
{
    public function index()
    {
        return response()->json(ProfilAlumni::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'img' => 'required|string',
            'name' => 'required|string|max:255',
            'jurusan' => 'required|in:PPLG,DKV,TJKT,MPLB,PMN,HTL,KLN',
            'work_place' => 'required|string|max:255',
            'work_position' => 'required|string|max:255',
        ]);

        $profilAlumni = ProfilAlumni::create($data);

        return response()->json($profilAlumni, 201);
    }

    public function show(ProfilAlumni $profilAlumni)
    {
        return response()->json($profilAlumni);
    }

    public function update(Request $request, ProfilAlumni $profilAlumni)
    {
        $data = $request->validate([
            'img' => 'sometimes|string',
            'name' => 'sometimes|string|max:255',
            'jurusan' => 'sometimes|in:PPLG,DKV,TJKT,MPLB,PMN,HTL,KLN',
            'work_place' => 'sometimes|string|max:255',
            'work_position' => 'sometimes|string|max:255',
        ]);

        $profilAlumni->update($data);

        return response()->json($profilAlumni);
    }

    public function destroy(ProfilAlumni $profilAlumni)
    {
        $profilAlumni->delete();

        return response()->json(null, 204);
    }
}
