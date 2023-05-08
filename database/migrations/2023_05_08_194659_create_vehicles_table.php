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
            $table->id();
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('manufacturer')->nullable();
            $table->unsignedBigInteger('cost_in_credits')->nullable();
            $table->float('length')->nullable();
            $table->unsignedInteger('max_atmosphering_speed')->nullable();
            $table->unsignedInteger('crew')->nullable();
            $table->unsignedInteger('passengers')->nullable();
            $table->unsignedBigInteger('cargo_capacity')->nullable();
            $table->string('consumables')->nullable();
            $table->string('vehicle_class')->nullable();
            $table->string('component')->nullable();
            $table->string('src')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
