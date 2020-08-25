<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseSetsRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations_exercise-set')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['exercise_id' => '1', 'set_id' => 1],
            ['exercise_id' => '2', 'set_id' => 2],
            ['exercise_id' => '3', 'set_id' => 3],
            ['exercise_id' => '4', 'set_id' => 1],
            ['exercise_id' => '5', 'set_id' => 2],
            ['exercise_id' => '6', 'set_id' => 3],
            ['exercise_id' => '7', 'set_id' => 1],
            ['exercise_id' => '7', 'set_id' => 2],
            ['exercise_id' => '8', 'set_id' => 3],
            ['exercise_id' => '9', 'set_id' => 3],
            ['exercise_id' => '9', 'set_id' => 2],
        ];

        return $data;
    }
}
