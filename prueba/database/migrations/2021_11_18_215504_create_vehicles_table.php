<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('licensePlate');
            $table->string('color');
            $table->bigInteger('vehicleBrand')->unsigned();
            $table->bigInteger('vehicleType')->unsigned();
            $table->bigInteger('driver')->unsigned();
            $table->bigInteger('owner')->unsigned();
            $table->timestamps();
            $table->foreign('vehicleBrand')->references('id')->on('vehicle_brands');
            $table->foreign('vehicleType')->references('id')->on('vehicle_types');
            $table->foreign('driver')->references('id')->on('people');
            $table->foreign('owner')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
