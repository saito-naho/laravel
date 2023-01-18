<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            'doctor_id' => 1,
            'time1' => 1,
            'time2' => 1,
            'time3' => 1,
            'time4' => 1,
            'time5' => 1,
            'time6' => 1,
            'time7' => 1,
            'time8' => 1,
            'time9' => 1,
            'time10' => 0,
        ]);
    }
}
