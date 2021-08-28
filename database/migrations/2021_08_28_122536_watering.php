<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Watering extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('water_schedules', function (Blueprint $table){
            $table->dropColumn('end');
            $table->dropColumn('active');
            $table->renameColumn('running' ,'executed');
            $table->renameColumn('start' ,'time');
            $table->date('date')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('water_schedules', function (Blueprint $table){
            $table->time('end');
            $table->smallInteger('active')->default(0);
            $table->renameColumn('time' ,'start');
            $table->renameColumn('executed' ,'running');
            $table->dropColumn('date');
        });
    }
}
