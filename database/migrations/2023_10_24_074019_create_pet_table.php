<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('petname' , 50);
            $table->string('gender' , 50);
            $table->integer('pettype_id')->unsigned();
            $table->float('price')->nullable();
            $table->string('image_url' , 200)->nullable();
            $table->timestamps();

            $table->foreign('pettype_id')->references('id')->on('pettype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet');
    }
}
