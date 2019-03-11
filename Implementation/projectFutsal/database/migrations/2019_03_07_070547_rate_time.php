<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RateTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rate_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time');
            $table->integer('ground_id')->unsigned();
            $table->foreign('ground_id')->references('id')->on('grounds');
            $table->double('rate');
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
        //
        Schema::dropIfExists('rate_time');
    }
}
