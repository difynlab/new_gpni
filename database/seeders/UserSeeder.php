<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'GPNI',
            'email' => 'admin@gpni.com',
            'password' => bcrypt('secret'),
            'country' => 'United States',
            'language' => 'English',
            'role' => 'admin',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'first_name' => 'Zajjith',
            'last_name' => 'Ahmath',
            'email' => 'zajjith@gmail.com',
            'password' => bcrypt('secret'),
            'country' => 'Sri Lanka',
            'language' => 'English',
            'role' => 'student',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
