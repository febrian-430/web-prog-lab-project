<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            'genre_name' => 'Action'
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Thriller'
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Sci-fi'
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Drama'
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Horror'
        ]);
    }
}
