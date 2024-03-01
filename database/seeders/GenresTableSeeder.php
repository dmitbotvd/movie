<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Comedy']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Horror']);
        Genre::create(['name' => 'Romance']);
        Genre::create(['name' => 'Animation']);
    }
}
