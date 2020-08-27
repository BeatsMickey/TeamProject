<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_sets', function (Blueprint $table) {
            $table->unsignedBigInteger('sets_id');
            $table->unsignedBigInteger('programs_id');
            $table->unsignedTinyInteger('day_of_program');

            $table->primary(['programs_id', 'day_of_program']);
            $table->foreign('sets_id')->references('id')->on('sets');
            $table->foreign('programs_id')->references('id')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_sets');
    }
}
