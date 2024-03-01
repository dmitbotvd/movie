<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function rest_index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function rest_show($id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json($genre);
    }
}
