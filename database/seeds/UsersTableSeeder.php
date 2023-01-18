<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'doctor1',
                'email' => 'doctor1@gmail.com',
                'password' => Hash::make('doctor1234'),
                'role' => 1,
            ],
            [
                'name' => 'doctor2',
                'email' => 'doctor2@gmail.com',
                'password' => Hash::make('doctor1234'),
                'role' => 1,
            ],
            [
                'name' => 'doctor3',
                'email' => 'doctor3@gmail.com',
                'password' => Hash::make('doctor1234'),
                'role' => 1,
            ],
        ]);
    }
}
