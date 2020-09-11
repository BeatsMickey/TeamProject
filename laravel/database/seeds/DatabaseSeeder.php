<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ExercisesSeeder::class);
        $this->call(ExerciseCategoriesRelationsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(SetsSeeder::class);
        $this->call(ExerciseSetsRelationsSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(SetProgramsRelationsSeeder::class);
        $this->call(UserDetailsSeeder::class);
        $this->call(CalendarSeeder::class);
        $this->call(CalendarExercisesSeeder::class);
    }
}
