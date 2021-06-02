<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDatasets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datasets', function (Blueprint $table){
            $table->float('ph', '4', '2')->default(0.00)->after('humidity');
            $table->float('temperature', '4', '2')->default(0.00)->after('ph');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datasets', function (Blueprint $table){
            $table->dropColumn('ph');
            $table->dropColumn('temperature');
        });
    }
}
