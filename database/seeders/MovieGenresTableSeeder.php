<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $movies = Movie::all();
        $genres = Genre::all();
        foreach ($movies as $movie) {
            $movie->genres()->attach($genres->pluck('id')->random(2));
        }
    }
}
