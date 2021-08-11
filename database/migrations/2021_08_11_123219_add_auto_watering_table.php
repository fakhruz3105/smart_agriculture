<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutoWateringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_schedules', function (Blueprint $table){

            $table->bigIncrements('id');
            $table->time('start');
            $table->time('end');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('running')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_schedules');
    }
}
