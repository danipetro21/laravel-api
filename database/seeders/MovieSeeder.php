<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie :: factory() -> count(150) -> make() -> each(function($m) {

            $genre = Genre :: inRandomOrder() -> first();
            $m -> genre() -> associate($genre);
            $m -> save();

            $tags = Tag :: inRandomOrder() -> limit(rand(1, 5)) -> get();
            $m -> tags() -> sync($tags);
        });
    }
}
