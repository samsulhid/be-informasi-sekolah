<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'required|string',
            'category' => 'required|in:akademik,prestasi,event,ekstrakurikuler,pengumuman',
            'created_by' => 'required|exists:users,id',
        ]);

        $news = News::create($data);

        return response()->json($news, 201);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'img' => 'sometimes|string',
            'category' => 'sometimes|in:akademik,prestasi,event,ekstrakurikuler,pengumuman',
            'created_by' => 'sometimes|exists:users,id',
        ]);

        $news->update($data);

        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(['message' => 'News deleted successfully'], 204);
    }
}
