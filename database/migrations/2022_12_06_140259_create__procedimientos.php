<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Procedimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('Cod_Proced')->nullable();
            $table->String('Desc_Proced')->nullable();
            $table->Double('Valor_Proced')->nullable();
            $table->Integer('Tiempo_Proced')->nullable();
            $table->String('Recursos_Proced')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Procedimientos');
    }
}
