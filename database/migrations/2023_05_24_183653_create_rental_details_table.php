<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_details', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->integer('driver_id');
            $table->integer('user_id');
            $table->text('dest_from');
            $table->text('destination');
            $table->date('date');
            $table->time('time');
            $table->integer('no_of_persons');
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
        Schema::dropIfExists('rental_details');
    }
}
