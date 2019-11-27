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
            'genre_id' => '2',
            'description' => 'Brah',
            'rating' => '10',
            'movie_image' => 'joker.jpg',
            'member_id' => '1'
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'genre_id' => '1',
            'description' => 'Brah',
            'rating' => '10',
            'movie_image' => 'batman.jpg',
            'member_id' => '1'
        ]);
    }
}
