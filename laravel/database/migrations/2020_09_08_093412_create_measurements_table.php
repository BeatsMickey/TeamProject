<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->integer('weight')->comment('вес')->nullable();
            $table->integer('shoulders')->comment('плечи')->nullable();
            $table->integer('biceps')->comment('бицепс')->nullable();
            $table->integer('forearms')->comment('предплечья')->nullable();
            $table->integer('chest')->comment('грудь')->nullable();
            $table->integer('waist')->comment('талия')->nullable();
            $table->integer('thigh')->comment('бедро')->nullable();
            $table->integer('calf')->comment('икра')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}
