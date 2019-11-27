<?php

use App\Member;
use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $member = Member::create(
        [
                'name' => 'admin',
                'gender' => 'Male',
                'email' => 'admin@admin',
                'password' => Hash::make('adminadmin'),
                'birthday' => '2019-11-27',
                'profile_picture' => 'none.jpg',
                'role' => 'Administrator',
            'address' => 'none'
            ]);
        $member = Member::create(
        [
                'name' => 'brah',
                'gender' => 'Female',
                'email' => 'brah@brah',
                'password' => Hash::make('adminadmin'),
                'birthday' => '2019-11-27',
                'profile_picture' => 'none.jpg',
                'role' => 'Administrator',
                'address' => 'BRAH'
        ]);
    }
}
