<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsExerciseCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_exercise-category', function (Blueprint $table) {
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('category_id')->references('id')->on('exercise_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
