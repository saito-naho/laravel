<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_info')->insert([
            [
                'user_id' => 4,
                'tel' => '05012345678',
                'birth' => '2000-12-12',
                'address' => '神奈川県川崎市中原区町6-6-6',
            ],
            [
                'user_id' => 5,
                'tel' => '09099999999',
                'birth' => '1965-2-22',
                'address' => '東京都渋谷区神南1-1-1-555',
            ],
        ]);
    }
}
