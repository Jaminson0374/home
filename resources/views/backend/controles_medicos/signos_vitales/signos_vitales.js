/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class SvFucionDiariaMed {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		let _fecha = document.getElementsByName("fecha")[0].value; 
		let _hora = document.getElementsByName("hora")[0].value;
		let _empleado_id = document.getElementsByName("empleado_id")[0].value;
		let _signosv_pc = document.getElementsByName("signosv_pc")[0].value;
		let _signosv_fr = document.getElementsByName("signosv_fr")[0].value;
		let _signosv_ta = document.getElementsByName("signosv_ta")[0].value;
		let _signosv_t = document.getElementsByName("signosv_t")[0].value;
		let _sv_saturacion = document.getElementsByName("sv_saturacion")[0].value;	
		let _recomendaciones = document.getElementsByName("recomendaciones")[0].value;	


		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _fecha:
				campoText = 'La campos FECHA del control es requerida'
				document.getElementById("fecha").focus()
				break;
			case _hora:
				campoText = 'El campo HORA es requerido'
				document.getElementById("hora").focus()
				break;		
			case _empleado_id:
				campoText = 'Debe seleccionar el enfermero(a) que realiza o inspecciona el control'
				document.getElementById("empleado_id").focus()
				break;				
			case _signosv_pc:
				campoText = 'El campo PC (PRESIÓN CARDIACA) es requerido'
				document.getElementById("signosv_pc").focus()
				break;		
			case  _signosv_fr:
				campoText = 'El campo FRECUENCIA RESPITATORIA requerido'
				document.getElementById("signosv_fr").focus()
				break;				
			case  _signosv_ta:
				campoText = 'El campo PRESIÓN ARTERIAL es requerido'
				document.getElementById("signosv_ta").focus()
				break;								
			case  _signosv_t:
				campoText = 'El campo TEMPERATURA CORPORAL es requerido'
				document.getElementById("signosv_t").focus()
				break;			
			case  _sv_saturacion:
				campoText = 'El campo SATURACION es requerido'
				document.getElementById("sv_saturacion").focus()
				break;
											
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataEvol) {
		let i = 0;
		document.getElementsByName("fecha")[0].value = dataEvol.fecha; 
		document.getElementsByName("hora")[0].value = dataEvol.hora;
		let empleadoid = document.getElementsByName("empleado_id")[0].value = dataEvol.empleado_id;
		document.getElementsByName("signosv_fr")[0].value = dataEvol.signosv_fr;
		document.getElementsByName("signosv_ta")[0].value = dataEvol.signosv_ta;
		document.getElementsByName("signosv_t")[0].value = dataEvol.signosv_t;
		document.getElementsByName("signosv_pc")[0].value = dataEvol.signosv_pc;
		document.getElementsByName("sv_saturacion")[0].value = dataEvol.sv_saturacion;
		document.getElementsByName("recomendaciones")[0].value =dataEvol.recomendaciones;
		document.getElementsByName("evolucion_id")[0].value = dataEvol.evolucion_id;
		document.getElementsByName("idEvolMedica")[0].value = dataEvol.id;
		
		$('#empleado_id').val(empleadoid).trigger('change.select2');

	}

	ValueCampos() {
	}

	/*cuando s epresiona el botón ok de la tabla del modal, se le da valor "Actualizar" al attributo accion del id accionbotones */
	accionUpdate(){
		let updateAccion = "Actualizar"
		let newNom85 = document.getElementById('accionBotones')
		newNom85.setAttribute('accion', `${updateAccion}`);
		// console.log(newNom80)		
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotones */
	accionSaveNew(){
		let saveAccion = "Guardar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	clearElements(){
		document.getElementsByName("fecha")[0].value = Date();
		document.getElementsByName("hora")[0].value = '00:00:00';

		$("#empleado_id").val(" ").trigger('change.select2');
	}
	desactivaInput(){
		document.getElementById("fecha").disabled = true;
		document.getElementById("hora").disabled = true;
		document.getElementById("empleado_id").disabled = true;
		document.getElementById("signosv_pc").disabled = true;
		document.getElementById("signosv_fr").disabled = true;
		document.getElementById("signosv_ta").disabled = true;
		document.getElementById("signosv_t").disabled = true;
		document.getElementById("sv_saturacion").disabled = true;
		document.getElementById("recomendaciones").disabled = true;

	}
	activaInput(){
		document.getElementById("fecha").disabled = false;
		document.getElementById("hora").disabled = false;
		document.getElementById("empleado_id").disabled = false;
		document.getElementById("signosv_pc").disabled = false;
		document.getElementById("signosv_fr").disabled = false;
		document.getElementById("signosv_ta").disabled = false;
		document.getElementById("signosv_t").disabled = false;
		document.getElementById("sv_saturacion").disabled = false;
		document.getElementById("recomendaciones").disabled = false;
	}
	bucarUsuariosSv(){
		
	}
	
}

