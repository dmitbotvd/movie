<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $movie1 = Movie::create([
            'title' => 'Film 1',
            'publication_status' => 'published',
            'poster_link' => 'posters/default-poster.jpg',
        ]);
        $movie2 = Movie::create([
            'title' => 'Film 2',
            'publication_status' => 'unpublished',
            'poster_link' => 'posters/default-poster.jpg',
        ]);
        $genresForMovie1 = Genre::whereIn('id', [1, 2])->get();
        $genresForMovie2 = Genre::whereIn('id', [2, 3])->get();
        foreach ($genresForMovie1 as $genre) {
            $movie1->genres()->attach($genre->id);
        }
        foreach ($genresForMovie2 as $genre) {
            $movie2->genres()->attach($genre->id);
        }
    }
}
