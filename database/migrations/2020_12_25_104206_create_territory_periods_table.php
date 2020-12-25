<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerritoryPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('territory_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('territory_id');
            $table->tinyInteger('in_process');
            $table->string('time_start');
            $table->string('time_end')->nullable();
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
        Schema::dropIfExists('territory_periods');
    }
}
