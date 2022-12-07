<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('N_Serie_Eq')->nullable();
            $table->String('Color_Eq')->nullable();
            $table->String('Detalles_Eq')->nullable();
            $table->String('Accesorios_Eq')->nullable();
            $table->String('MotivoIngreso_Eq')->nullable();

            
            $table->Integer('id_Marca_Equipo')->nullable();
            $table->Integer('id_Modelo_Equipo')->nullable();
            $table->Integer('id_Categoria_Equipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Equipos');
    }
}
