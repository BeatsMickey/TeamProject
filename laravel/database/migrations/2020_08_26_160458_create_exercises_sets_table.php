<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises_sets', function (Blueprint $table) {
            $table->unsignedBigInteger('exercises_id');
            $table->unsignedBigInteger('sets_id');
//            $table->smallInteger('weight');
//            $table->smallInteger('repetitions');

            $table->primary(['exercises_id', 'sets_id']);
            $table->foreign('exercises_id')->references('id')->on('exercises');
            $table->foreign('sets_id')->references('id')->on('sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises_sets');
    }
}
