<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Modelos_Equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->Integer('id_Marca_Equipo')->nullable();
            $table->String('Nombre_Modelo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Modelos_Equipos');
    }
}
