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
            'name' => 'Action'
        ]);
        DB::table('genres')->insert([
            'name' => 'Thriller'
        ]);
        DB::table('genres')->insert([
            'name' => 'Sci-fi'
        ]);
        DB::table('genres')->insert([
            'name' => 'Drama'
        ]);
        DB::table('genres')->insert([
            'name' => 'Horror'
        ]);
    }
}
