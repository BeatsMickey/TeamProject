<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendar')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['created_at' => '2020-09-01 00:00:00.0', 'user_id' => 1],
            ['created_at' => '2020-09-03 00:00:00.0', 'user_id' => 1],
        ];

        return $data;
    }


}
