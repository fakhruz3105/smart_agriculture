<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        $setting = new \App\Models\Setting();
        $setting->name = "pipe";
        $setting->value = "off";
        $setting->save();

        Schema::create('water_usages', function (Blueprint $table){
            $table->id();
            $table->bigInteger('user_id');
            $table->dateTime('start')->default(now());
            $table->dateTime('end')->nullable();
            $table->time('total')->default('00:00:00');
            $table->float('litre', '5','2')->default('0.00');
            $table->timestamps();
        });

        Schema::create('live_data', function (Blueprint $table){
            $table->id();
            $table->float('humidity', '4', '2')->default('0.00');
            $table->float('ph', '4', '2')->default(0.00);
            $table->float('temperature', '4', '2')->default(0.00);
            $table->timestamps();
        });

        $live = new \App\Models\LiveData();
        $live->save();
    }
    public function down()
    {
        Schema::drop('settings');
        Schema::drop('water_usages');
        Schema::drop('live_data');
    }
}
