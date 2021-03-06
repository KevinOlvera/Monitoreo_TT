<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //$table->integer('id')->unique(); #Id == Boleta/Alumno == RFC/Profesor.
            $table->increments('id')->unique();
            $table->string('user')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('type', ['student', 'synodal', 'director', 'admin'])->default('student');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
