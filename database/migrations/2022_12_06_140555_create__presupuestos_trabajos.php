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
            $table->String('N_Presupuesto')->nullable();
            //FK
            $table->String('id_Cliente')->nullable();
            
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
