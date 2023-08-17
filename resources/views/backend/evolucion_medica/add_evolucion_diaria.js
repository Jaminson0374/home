class EvolucionDiariaMed {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		let _fecha = document.getElementsByName("fecha")[0].value; 
		let _hora = document.getElementsByName("hora")[0].value;
		let _empleado_id = document.getElementsByName("empleado_id")[0].value;
		let _subjetivo  = document.getElementsByName("subjetivo")[0].value;
		let _apreciacion = document.getElementsByName("apreciacion")[0].value;	
		let _plan = document.getElementsByName("plan")[0].value;	
		let _recomendaciones = document.getElementsByName("recomendaciones")[0].value;	
		let _evolucion_id = document.getElementsByName("evolucion_id")[0].value;

		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

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
			case _apreciacion:
				campoText = 'El campo APRECIACION es equerido'
				document.getElementById("apreciacion").focus()
				break;				
			case _evolucion_id:
				campoText = 'Seleccione un tipo de Evolución'
				document.getElementById("evolucion_id").focus()
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
		document.getElementsByName("diagnostico")[0].value = dataEvol.diagnostico;
		// let empleadoid = document.getElementsByName("empleado_id")[0].value = dataEvol.empleado_id;
		document.getElementsByName("subjetivo")[0].value = dataEvol.subjetivo;
		document.getElementsByName("apreciacion")[0].value = dataEvol.apreciacion;
		document.getElementsByName("plan")[0].value = dataEvol.plan;
		document.getElementsByName("recomendaciones")[0].value =dataEvol.recomendaciones;
		document.getElementsByName("evolucion_id")[0].value = dataEvol.evolucion_id;
		document.getElementsByName("idEvolMedica")[0].value = dataEvol.id;
		
		$('#empleado_id').val(dataEvol.empleado_id).trigger('change.select2');

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
		document.getElementById("subjetivo").disabled = true;
		document.getElementById("apreciacion").disabled = true;
		document.getElementById("evolucion_id").disabled = true;
		document.getElementById("plan").disabled = true;
		document.getElementById("recomendaciones").disabled = true;
	}
	activaInput(){
		document.getElementById("fecha").disabled = false;
		document.getElementById("hora").disabled = false;
		document.getElementById("empleado_id").disabled = false;
		document.getElementById("subjetivo").disabled = false;
		document.getElementById("evolucion_id").disabled = false;
		document.getElementById("apreciacion").disabled = false;
		document.getElementById("plan").disabled = false;
		document.getElementById("recomendaciones").disabled = false;
	}
}

