<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title')->unique();
            $table->string('score')->default('SC');
            $table->enum('type', ['1', '2', '3'])->default('1');
            $table->timestamps();

        });

        #Tabla pivote
        #Relacion *proyecto - *usuario (muchos a muchos)
        #Projects & Users === project & user  == project_user
        Schema::create('project_user', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned();
            $table->integer('project_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->nullable();

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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_user');
    }
}
