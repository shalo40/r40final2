<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminDiagnosticos21Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = true;
			$this->button_export = true;
			$this->table = "diagnosticos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"N° Ticket","name"=>"id_Ticket"];
			$this->col[] = ["label"=>"Equipo","name"=>"id_Equipo"];
			$this->col[] = ["label"=>"¿Requiere repuestos?","name"=>"Req_repuesto"];
			$this->col[] = ["label"=>"Estado","name"=>"estado_diagno"];
			$this->col[] = ["label"=>"Fecha de Creacion","name"=>"created_at"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Encendido automático','name'=>'DG_PS_01_ENCENDIDO','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si logra encender por si solo;No enciende'];
			$this->form[] = ['label'=>'Tiempo demora encendido (min)','name'=>'DG_PS_02_START_TIME','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Mensajes de error','name'=>'DG_PS_03_MSJE_ERROR','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ningun mensaje visible;Mensaje de error a la vista'];
			$this->form[] = ['label'=>'Emision de sonidos','name'=>'DG_PS_04_EMICION_SONIDOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si;No'];
			$this->form[] = ['label'=>'Controladores','name'=>'DG_PS_06_DRIVERS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Faltan;En conflicto'];
			$this->form[] = ['label'=>'Fecha y hora del sistema','name'=>'DG_PS_05_DATETIME_SYS','type'=>'datetime','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Rendimiento de la CPU (%)','name'=>'DG_PS_07_REND_CPU','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Rendimiento de la RAM (%)','name'=>'DG_PS_08_REND_RAM','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Rendimiento Hdd o Sdd (%)','name'=>'DG_PS_09_REND_HDD','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Rendimiento de Red(%)','name'=>'DG_PS_10_REND_RED','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estado antivirus','name'=>'DG_PS_11_ANTIVIRUS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Obsoleto;No instalado'];
			$this->form[] = ['label'=>'Estado Office','name'=>'DG_PS_12_OFFICE','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Obsoleto;No instalado'];
			$this->form[] = ['label'=>'Otros programas','name'=>'DG_PS_13_OTROS_PROG','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Autocad;Photoshop;Power bi;Adobe Illustrator'];
			$this->form[] = ['label'=>'Repaldo del sistema','name'=>'DG_PS_14_COPIA_SISTEMA','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Realizado;No necesario;No se puede realizar'];
			$this->form[] = ['label'=>'Respaldo de archivos','name'=>'DG_PS_15_COPIA_ARCHIVOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Realizado;No necesario;No se puede realizar'];
			$this->form[] = ['label'=>'Version del sistema operativo','name'=>'DG_PS_16_VERSION_SO','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Win 11; Win 10; Win 8;Win 7;Win Xp; Io´s;Linux'];
			$this->form[] = ['label'=>'Fecha de la ultima actualizacion','name'=>'DG_PS_17_FECHA_ULTIMA_ACTUALIZACION','type'=>'date','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Pantalla','name'=>'DG_PH_01_SCREEN','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Ram','name'=>'DG_PH_02_RAM','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'HDD o SSD','name'=>'DG_PH_03_HDD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Procesador','name'=>'DG_PH_04_CORE','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'GPU','name'=>'DG_PH_05_GPU','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Teclado','name'=>'DG_PH_06_KEYBOARD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Mousetrack','name'=>'DG_PH_07_MOUSETRACK','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Wifi','name'=>'DG_PH_08_WIFI','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Bateria','name'=>'DG_PH_09_BATERY','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Boton de encendido','name'=>'DG_PH_10_START_BUTTON','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Estado chasis','name'=>'DG_PH_11_CHASIS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Placa madre','name'=>'DG_PH_13_MBOARD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Camara integrada','name'=>'DG_PH_12_CAMERA','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Ventalador','name'=>'DG_PH_14_FAN','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Flexible de video','name'=>'DG_PH_15_FLEX','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Bateria de la BIOS','name'=>'DG_PH_16_BIOS_BATERY','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Micrófono','name'=>'DG_PH_17_MIC','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Bisagras','name'=>'DG_PH_18_BISAGRAS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Pernos','name'=>'DG_PH_19_PERNOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Puerto ethernet','name'=>'DG_PH_20_ETHERNET','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Cooler','name'=>'DG_PH_21_DISCIPADOR','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Parlantes','name'=>'DG_PH_22_PARLANTES','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Puertos USB','name'=>'DG_PH_23_PUERTOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			$this->form[] = ['label'=>'Ticket','name'=>'id_Ticket','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'N° Serie del equipo','name'=>'id_Equipo','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'Equipos,N_Serie_Eq'];
			$this->form[] = ['label'=>'Estado','name'=>'estado_diagno','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Diagnostico Realizado; Diagnostico incompleto; Diagnostico a la espera'];
			$this->form[] = ['label'=>'¿Requiere repuesto?','name'=>'Req_repuesto','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si;No'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Encendido automático','name'=>'DG_PS_01_ENCENDIDO','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si logra encender por si solo;No enciende'];
			//$this->form[] = ['label'=>'Tiempo demora encendido (min)','name'=>'DG_PS_02_START_TIME','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Mensajes de error','name'=>'DG_PS_03_MSJE_ERROR','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ningun mensaje visible;Mensaje de error a la vista'];
			//$this->form[] = ['label'=>'Emision de sonidos','name'=>'DG_PS_04_EMICION_SONIDOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si;No'];
			//$this->form[] = ['label'=>'Controladores','name'=>'DG_PS_06_DRIVERS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Faltan;En conflicto'];
			//$this->form[] = ['label'=>'Fecha y hora del sistema','name'=>'DG_PS_05_DATETIME_SYS','type'=>'datetime','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Rendimiento de la CPU (%)','name'=>'DG_PS_07_REND_CPU','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Rendimiento de la RAM (%)','name'=>'DG_PS_08_REND_RAM','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Rendimiento Hdd o Sdd (%)','name'=>'DG_PS_09_REND_HDD','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Rendimiento de Red(%)','name'=>'DG_PS_10_REND_RED','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estado antivirus','name'=>'DG_PS_11_ANTIVIRUS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Obsoleto;No instalado'];
			//$this->form[] = ['label'=>'Estado Office','name'=>'DG_PS_12_OFFICE','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Ok;Obsoleto;No instalado'];
			//$this->form[] = ['label'=>'Otros programas','name'=>'DG_PS_13_OTROS_PROG','type'=>'checkbox','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Autocad;Photoshop;Power bi;Adobe Illustrator'];
			//$this->form[] = ['label'=>'Repaldo del sistema','name'=>'DG_PS_14_COPIA_SISTEMA','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Realizado;No necesario;No se puede realizar'];
			//$this->form[] = ['label'=>'Respaldo de archivos','name'=>'DG_PS_15_COPIA_ARCHIVOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Realizado;No necesario;No se puede realizar'];
			//$this->form[] = ['label'=>'Version del sistema operativo','name'=>'DG_PS_16_VERSION_SO','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Win 11; Win 10; Win 8;Win 7;Win Xp; Io´s;Linux'];
			//$this->form[] = ['label'=>'Fecha de la ultima actualizacion','name'=>'DG_PS_17_FECHA_ULTIMA_ACTUALIZACION','type'=>'date','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Pantalla','name'=>'DG_PH_01_SCREEN','type'=>'select','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ram','name'=>'DG_PH_02_RAM','type'=>'select','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'HDD o SSD','name'=>'DG_PH_03_HDD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Procesador','name'=>'DG_PH_04_CORE','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'GPU','name'=>'DG_PH_05_GPU','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Teclado','name'=>'DG_PH_06_KEYBOARD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Mousetrack','name'=>'DG_PH_07_MOUSETRACK','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Wifi','name'=>'DG_PH_08_WIFI','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Bateria','name'=>'DG_PH_09_BATERY','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Boton de encendido','name'=>'DG_PH_10_START_BUTTON','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Estado chasis','name'=>'DG_PH_11_CHASIS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Placa madre','name'=>'DG_PH_13_MBOARD','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Camara integrada','name'=>'DG_PH_12_CAMERA','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Ventalador','name'=>'DG_PH_14_FAN','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Flexible de video','name'=>'DG_PH_15_FLEX','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Bateria de la BIOS','name'=>'DG_PH_16_BIOS_BATERY','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Micrófono','name'=>'DG_PH_17_MIC','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Bisagras','name'=>'DG_PH_18_BISAGRAS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Pernos','name'=>'DG_PH_19_PERNOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Puerto ethernet','name'=>'DG_PH_20_ETHERNET','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Cooler','name'=>'DG_PH_21_DISCIPADOR','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Parlantes','name'=>'DG_PH_22_PARLANTES','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Puertos USB','name'=>'DG_PH_23_PUERTOS','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Pasa la prueba sin problemas;Pasa la prueba pero presenta señales de alerta, se requiere mas información;No pasa la prueba, se recomienda reparación del componente; No pasa la prueba, el componente puede provocar una falla generalizada del sistema, se recomienda reparar con urgencia'];
			//$this->form[] = ['label'=>'Ticket','name'=>'id_Ticket','type'=>'text','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'N° Serie del equipo','name'=>'id_Equipo','type'=>'select2','validation'=>'required','width'=>'col-sm-10','datatable'=>'Equipos,N_Serie_Eq'];
			//$this->form[] = ['label'=>'Estado','name'=>'estado_diagno','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Diagnostico Realizado; Diagnostico incompleto; Diagnostico a la espera'];
			//$this->form[] = ['label'=>'¿Requiere repuesto?','name'=>'Req_repuesto','type'=>'select','validation'=>'required','width'=>'col-sm-10','dataenum'=>'Si;No'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}