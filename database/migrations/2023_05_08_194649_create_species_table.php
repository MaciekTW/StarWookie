<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->integer('index');
            $table->string('name');
            $table->string('classification')->nullable();
            $table->string('designation')->nullable();
            $table->unsignedInteger('average_height')->nullable();
            $table->string('skin_colors')->nullable();
            $table->string('hair_colors')->nullable();
            $table->string('eye_colors')->nullable();
            $table->unsignedInteger('average_lifespan')->nullable();
            $table->string('language')->nullable();
            $table->string('homeworld')->nullable();
            $table->string('component')->nullable();
            $table->string('src');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
