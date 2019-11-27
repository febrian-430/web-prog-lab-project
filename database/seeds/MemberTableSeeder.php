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
                'gender' => 'male',
                'email' => 'admin@admin',
                'password' => 'adminadmin',
                'birthday' => '2019-11-27',
                'profile_picture' => 'none.jpg',
                'role' => 'Administrator',
                'address' => 'none'
            ]);
    }
}
