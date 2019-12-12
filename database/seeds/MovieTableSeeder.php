<?php

use App\Movie;
use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Movie::create([
            'title' => 'Joker',
            'genre_id' => 1,
            'description' => 'Brah',
            'rating' => '10',
            'movie_image' => 'joker.jpg',
            'poster_id' => '1'
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'genre_id' => 1,
            'description' => 'Brah',
            'rating' => '10',
            'movie_image' => 'batman.jpg',
            'poster_id' => '1'
        ]);
    }
}
