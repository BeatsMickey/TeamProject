<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetProgramsRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relations_set-program')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['set_id' => '1', 'program_id' => 1, 'day_of_program' => 1],
            ['set_id' => '2', 'program_id' => 1, 'day_of_program' => 2],
            ['set_id' => '1', 'program_id' => 1, 'day_of_program' => 3],
            ['set_id' => '2', 'program_id' => 1, 'day_of_program' => 4],
            ['set_id' => '1', 'program_id' => 1, 'day_of_program' => 5],

            ['set_id' => '3', 'program_id' => 2, 'day_of_program' => 1],
            ['set_id' => '1', 'program_id' => 2, 'day_of_program' => 2],
            ['set_id' => '3', 'program_id' => 2, 'day_of_program' => 3],
            ['set_id' => '1', 'program_id' => 2, 'day_of_program' => 4],

            ['set_id' => '2', 'program_id' => 3, 'day_of_program' => 1],
            ['set_id' => '1', 'program_id' => 3, 'day_of_program' => 2],
            ['set_id' => '2', 'program_id' => 3, 'day_of_program' => 3],
        ];

        return $data;
    }
}
