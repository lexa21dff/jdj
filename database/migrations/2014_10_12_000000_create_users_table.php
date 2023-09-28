<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('tipo_documento',30);
            $table->string('documento',30);
            $table->string('nombres', 80);
            $table->string('apellidos',80);
            $table->string('telefono', 30);
            $table->string('correo_electronico')->unique();
            $table->string('ciudad', 60);
            $table->string('direccion', 60);
            $table->string('ocupacion',60);
            $table->string('servicios_ocupar', 100);
            $table->string('password');
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
