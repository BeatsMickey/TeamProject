<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsSetProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations_set-program', function (Blueprint $table) {
            $table->unsignedBigInteger('set_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedTinyInteger('day_of_program');

            $table->primary(['program_id', 'day_of_program']);
            $table->foreign('set_id')->references('id')->on('sets');
            $table->foreign('program_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations_set-program');
    }
}
