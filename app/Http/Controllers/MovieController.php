<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function get()
    {
        $movies = Movie::all();

        return response()->json([
            'message' => 'Movies Success',
            'movies' => $movies]);
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->genre = $request->genre;
        $movie->summary = $request->summary;
        $movie->director = $request->director;
        $movie->save();

        return response()->json([
            'message' => 'Movie created',
            'movie' => $movie
        ]);
    }

    public function update(Request $request, $movieId)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'nullable|string',
            'summary' => 'nullable|string',
            'director' => 'nullable|string',
        ]);

        $movie = Movie::find($movieId);

        $movie->title = $validatedData['title'];
        $movie->genre = $validatedData['genre'];
        $movie->summary = $validatedData['summary'];
        $movie->director = $validatedData['director'];
        $movie->save();

        return response()->json([
            'message' => 'Movie updated',
            'movie' => $movie
        ]);
    }

    public function destroy($movieId)
    {
        $movie = Movie::find($movieId);
        $movie->delete();

        return response()->json([
            'message' => 'Movie deleted successfully'
        ]);
    }
}
