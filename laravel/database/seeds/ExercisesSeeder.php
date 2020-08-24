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

    private function getData() {
        $data = [['name' => 'Жим штанги на горизонтальной скамье'],
            ['name' => 'Жим штанги на наклонной скамье'],
            ['name' => 'Разводка на наклонной скамье'],
            ['name' => 'Присяд со штангой'],
            ['name' => 'Жим ногами в тренажере'],
            ['name' => 'Разгибание ног'],
            ['name' => 'Подтягивания'],
            ['name' => 'Тяга штанги в наклоне'],
            ['name' => 'Становая тяга'],
        ];

        return $data;
    }
}
