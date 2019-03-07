<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('ground_id')->unsigned();
            $table->foreign('ground_id')->references('ground_id')->on('ground');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->string('date');
            $table->string('time');
            $table->string('phone');
            $table->double('rate');
            $table->boolean('status');
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
        Schema::dropIfExists('bookings');
    }
}
