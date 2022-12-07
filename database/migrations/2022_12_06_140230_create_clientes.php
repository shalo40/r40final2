<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('Nombre_Cliente')->nullable();
            $table->String('Apellido1_Cliente')->nullable();
            $table->String('Apellido2_Cliente')->nullable();
            $table->String('Direccion_Cliente')->nullable();
            $table->String('Correo_Cliente')->nullable();
            $table->String('Telefono_Cliente')->nullable();
            $table->String('Rut_Cliente')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
