<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExercisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercises')->insert($this->getData());
    }

    private function getData()
    {
        $data = [
            ['name' => 'Жим штанги на горизонтальной скамье', 'description' => 'Исходное положение - ...'],
            ['name' => 'Жим штанги на наклонной скамье', 'description' => 'Исходное положение - ...'],
            ['name' => 'Разводка на наклонной скамье', 'description' => 'Исходное положение - ...'],
            ['name' => 'Присяд со штангой', 'description' => 'Исходное положение - ...'],
            ['name' => 'Жим ногами в тренажере', 'description' => 'Исходное положение - ...'],
            ['name' => 'Разгибание ног', 'description' => 'Исходное положение - ...'],
            ['name' => 'Подтягивания', 'description' => 'Исходное положение - ...'],
            ['name' => 'Тяга штанги в наклоне', 'description' => 'Исходное положение - ...'],
            ['name' => 'Становая тяга', 'description' => 'Исходное положение - ...'],
        ];

        return $data;
    }
}
