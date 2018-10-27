<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('state');
            $table->dateTime('date');

            #Indica a que proyecto pertenece la cita.
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->timestamps();
        });

        #Tabla pivote
        #Relacion *citas - *usuarios (muchos a muchos)
        #Dates & Users === date & user  == date_user
        Schema::create('date_user', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned();
            $table->integer('date_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('date_id')->references('id')->on('dates')->nullable();

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
        Schema::dropIfExists('dates');
    }
}
