<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseCategoriesRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations_exercise-category')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['exercise_id' => '1', 'category_id' => 1],
            ['exercise_id' => '2', 'category_id' => 1],
            ['exercise_id' => '3', 'category_id' => 1],
            ['exercise_id' => '4', 'category_id' => 2],
            ['exercise_id' => '5', 'category_id' => 2],
            ['exercise_id' => '6', 'category_id' => 2],
            ['exercise_id' => '7', 'category_id' => 3],
            ['exercise_id' => '7', 'category_id' => 1],
            ['exercise_id' => '8', 'category_id' => 3],
            ['exercise_id' => '9', 'category_id' => 3],
            ['exercise_id' => '9', 'category_id' => 2],
        ];

        return $data;
    }
}
