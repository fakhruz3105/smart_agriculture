<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table){
            $table->id();
            $table->float('humidity');
            $table->timestamps();
        });

        Schema::create('data_summaries', function (Blueprint $table){
            $table->id();
            $table->string('collection');
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
        Schema::dropIfExists('datasets');
        Schema::dropIfExists('data_summaries');
    }
}
