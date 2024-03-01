<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function rest_index()
    {
        $movies = Movie::paginate(10);
        return response()->json($movies);
    }

    public function rest_show($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }
    public function index()
    {
        $movies = Movie::all();
        dump($movies);
        return view('index', ['movies' => $movies]);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'poster_link' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_status' => 'required|in:published,unpublished',
            'genres' => 'required|array',
        ]);
        $posterPath = $request->hasFile('poster_link') ? $request->file('poster_link')->store('posters', 'public') : 'posters/default-poster.jpg';
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->poster_link = $posterPath;
        $movie->publication_status = $request->input('publication_status');
        $movie->save();
        $movie->genres()->attach($request->input('genres'));
        return redirect(route('index'))->with('success', 'Фильм успешно добавлен');
    }


    public function edit(Movie $id)
    {
        return view('edit', ['movie' => $id]);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'poster_link' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $movie->update([
            'title' => $request->input('title'),
            'publication_status' => $request->has('publication_status') ? 'published' : 'unpublished',
            'poster_link' => $request->hasFile('poster_link') ? $request->file('poster_link')->store('posters', 'public') : $movie->poster_link,
        ]);
        return redirect()->route('index')->with('success', 'Фильм успешно обновлен');
    }
    public function togglePublish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->publication_status = $movie->publication_status === 'published' ? 'unpublished' : 'published';
        $movie->save();
        return redirect()->route('index')->with('success', 'Статус публикации фильма успешно изменен');
    }
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect(route('index'))->with('success', 'Фильм успешно удален');
    }
    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->publication_status = 'published';
        $movie->save();
        return redirect(route('index'))->with('success', 'Статус фильма изменен на published');
    }
}
