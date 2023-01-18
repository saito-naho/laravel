<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 0：なし、1：軽い、2：中、3：重い
        DB::table('reservations')->insert([
            'doctor_id' => 1,
            'user_id' => 5,
            'haedache' => 2,
            'stomachache' => 3,
            'time' => '16:00-16:30',
            'date_at' => Carbon::now(),
            'symptoms' => 'わくわくする',
            'request' => 'なし',
            'comment' => 'なし',
        ]);
    }
}
