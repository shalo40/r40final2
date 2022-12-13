<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTrabajos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Presupuestos_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('Cod_Proced')->nullable();
            $table->String('Desc_Proced')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Presupuestos_trabajos');
    }
}
