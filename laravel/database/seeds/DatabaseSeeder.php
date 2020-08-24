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
        // $this->call(UserSeeder::class);
        $this->call(ExerciseCategoriesSeeder::class);
        $this->call(ExercisesSeeder::class);
        $this->call(ExerciseCategoriesRelationsSeeder::class);
    }
}
