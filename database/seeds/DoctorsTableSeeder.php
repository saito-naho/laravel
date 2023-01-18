<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            [
            'user_id' => 1,
            'specialty' => '内科',
            ],
            [
            'user_id' => 2,
            'specialty' => '外科',
            ],
            [
            'user_id' => 3,
            'specialty' => '脳外科',
            ]
        ]);
    }
}
