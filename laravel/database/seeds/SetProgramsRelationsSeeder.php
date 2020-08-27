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
        DB::table('programs_sets')->insert($this->getData());
    }

    private function getData() {
        $data = [
            ['sets_id' => '1', 'programs_id' => 1, 'day_of_program' => 1],
            ['sets_id' => '2', 'programs_id' => 1, 'day_of_program' => 2],
            ['sets_id' => '1', 'programs_id' => 1, 'day_of_program' => 3],
            ['sets_id' => '2', 'programs_id' => 1, 'day_of_program' => 4],
            ['sets_id' => '1', 'programs_id' => 1, 'day_of_program' => 5],

            ['sets_id' => '3', 'programs_id' => 2, 'day_of_program' => 1],
            ['sets_id' => '1', 'programs_id' => 2, 'day_of_program' => 2],
            ['sets_id' => '3', 'programs_id' => 2, 'day_of_program' => 3],
            ['sets_id' => '1', 'programs_id' => 2, 'day_of_program' => 4],

            ['sets_id' => '2', 'programs_id' => 3, 'day_of_program' => 1],
            ['sets_id' => '1', 'programs_id' => 3, 'day_of_program' => 2],
            ['sets_id' => '2', 'programs_id' => 3, 'day_of_program' => 3],
        ];

        return $data;
    }
}
