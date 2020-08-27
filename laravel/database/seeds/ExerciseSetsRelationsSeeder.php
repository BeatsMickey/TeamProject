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
        DB::table('exercises_sets')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['exercises_id' => '1', 'sets_id' => 1, 'weight' => 20, 'repetitions' => 5],
            ['exercises_id' => '2', 'sets_id' => 2, 'weight' => 10, 'repetitions' => 3],
            ['exercises_id' => '3', 'sets_id' => 3, 'weight' => 5, 'repetitions' => 7],
            ['exercises_id' => '4', 'sets_id' => 1, 'weight' => 15, 'repetitions' => 2],
            ['exercises_id' => '5', 'sets_id' => 2, 'weight' => 50, 'repetitions' => 1],
            ['exercises_id' => '6', 'sets_id' => 3, 'weight' => 10, 'repetitions' => 9],
            ['exercises_id' => '7', 'sets_id' => 1, 'weight' => 20, 'repetitions' => 8],
            ['exercises_id' => '7', 'sets_id' => 2, 'weight' => 30, 'repetitions' => 7],
            ['exercises_id' => '8', 'sets_id' => 3, 'weight' => 40, 'repetitions' => 6],
            ['exercises_id' => '9', 'sets_id' => 3, 'weight' => 50, 'repetitions' => 5],
            ['exercises_id' => '9', 'sets_id' => 2, 'weight' => 60, 'repetitions' => 4],
        ];

        return $data;
    }
}
