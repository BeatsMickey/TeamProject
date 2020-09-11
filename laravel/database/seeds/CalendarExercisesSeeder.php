<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendar_exercises')->insert($this->getData());
    }

    private function getData() {
        $data = [
            [
                'weight' => 50,
                'repetitions' => 3,
                'created_at' => '2020-09-01 00:00:00.0',
                'calendar_id' => 1,
                'exercises_id' => 1,
            ],
            [
                'weight' => 20,
                'repetitions' => 3,
                'created_at' => '2020-09-01 00:00:00.0',
                'calendar_id' => 2,
                'exercises_id' => 2,
            ],
            [
                'weight' => 50,
                'repetitions' => 5,
                'created_at' => '2020-09-03 00:00:00.0',
                'calendar_id' => 2,
                'exercises_id' => 1,
            ],
            [
                'weight' => 20,
                'repetitions' => 6,
                'created_at' => '2020-09-03 00:00:00.0',
                'calendar_id' => 1,
                'exercises_id' => 2,
            ],
        ];

        return $data;
    }


}
