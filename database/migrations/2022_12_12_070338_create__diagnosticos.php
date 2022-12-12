<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Diagnosticos', function (Blueprint $table) {
            //ID Y FECHAS
           $table->increments('id');
           $table->timestamps();
           $table->String('estado_diagno')->nullable();
           

           //CAMPOS DEL DIAGNOSTICO
           //CAMPOS DE SOFTWARE
           $table->String('DG_PS_01_ENCENDIDO')->nullable();
           $table->String('DG_PS_02_START_TIME')->nullable();
           $table->String('DG_PS_03_MSJE_ERROR')->nullable();
           $table->String('DG_PS_04_EMICION_SONIDOS')->nullable();
           $table->Datetime('DG_PS_05_DATETIME_SYS')->nullable();
           $table->String('DG_PS_06_DRIVERS')->nullable();
           $table->String('DG_PS_07_REND_CPU')->nullable();
           $table->String('DG_PS_08_REND_RAM')->nullable();
           $table->String('DG_PS_09_REND_HDD')->nullable();
           $table->String('DG_PS_10_REND_RED')->nullable();
           $table->String('DG_PS_11_ANTIVIRUS')->nullable();
           $table->String('DG_PS_12_OFFICE')->nullable();
           $table->String('DG_PS_13_OTROS_PROG')->nullable();
           $table->String('DG_PS_14_COPIA_SISTEMA')->nullable();
           $table->String('DG_PS_15_COPIA_ARCHIVOS')->nullable();
           $table->String('DG_PS_16_VERSION_SO')->nullable();
           $table->Datetime('DG_PS_17_FECHA_ULTIMA_ACTUALIZACION')->nullable();

           //CACMPOS DE HARDWARE
           $table->String('DG_PH_01_SCREEN')->nullable();
           $table->String('DG_PH_02_RAM')->nullable();
           $table->String('DG_PH_03_HDD')->nullable();
           $table->String('DG_PH_04_CORE')->nullable();
           $table->String('DG_PH_05_GPU')->nullable();
           $table->String('DG_PH_06_KEYBOARD')->nullable();
           $table->String('DG_PH_07_MOUSETRACK')->nullable();
           $table->String('DG_PH_08_WIFI')->nullable();
           $table->String('DG_PH_09_BATERY')->nullable();
           $table->String('DG_PH_10_START_BUTTON')->nullable();
           $table->String('DG_PH_11_CHASIS')->nullable();
           $table->String('DG_PH_12_CAMERA')->nullable();
           $table->String('DG_PH_13_MBOARD')->nullable();
           $table->String('DG_PH_14_FAN')->nullable();
           $table->String('DG_PH_15_FLEX')->nullable();
           $table->String('DG_PH_16_BIOS_BATERY')->nullable();
           $table->String('DG_PH_17_MIC')->nullable();
           $table->String('DG_PH_18_BISAGRAS')->nullable();
           $table->String('DG_PH_19_PERNOS')->nullable();
           $table->String('DG_PH_20_ETHERNET')->nullable();
           $table->String('DG_PH_21_DISCIPADOR')->nullable();
           $table->String('DG_PH_22_PARLANTES')->nullable();
           $table->String('DG_PH_23_PUERTOS')->nullable();
           



           //CLAVES FORANEAS
           $table->Integer('id_Equipo')->nullable();
           $table->Integer('id_Ticket')->nullable();
           $table->String('Req_repuesto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Diagnosticos');
    }
}
