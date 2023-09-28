<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManzanasServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manzanas_servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manzana_id');
            $table->foreign('manzana_id')->references('id')->on('manzanas')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios')
                        ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('manzanas_servicios');
    }
}
