/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class citasMedClientes {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		//  document.getelementsByName('tieneServicio', 'SI']

		//  document.getelementsByName('datosbasicos_id', '1']

		//  document.getelementsByName('user_id', '1']

		//  document.getelementsByName('idClienteServicio', '9']

		//  document.getelementsByName('accionBotones', '']

		//  document.getelementsByName('presBtnNew', 'S']
		// let tiposervicio_id = document.getElementsByName("tiposervicio_id")[0].value;
		let _fecha_pedido_cita = document.getElementsByName("fecha_pedido_cita")[0].value; 
		let _tiposcita_id = document.getElementsByName("tiposcita_id")[0].value;
		let _especialidades_id = document.getElementsByName("especialidades_id")[0].value;
		let _tipoatencion_id  = document.getElementsByName("tipoatencion_id")[0].value;
		let _clinica_id = document.getElementsByName("clinica_id")[0].value;
		let _medico_remite_id = document.getElementsByName("medico_remite_id")[0].value;
		let _fecha_cita = document.getElementsByName("fecha_cita")[0].value;
		let _riesgo_cita = document.getElementsByName("riesgo_cita")[0].value;
		let _hora_cita = document.getElementsByName("hora_cita")[0].value;
		let _duracion_cita = document.getElementsByName("duracion_cita")[0].value;
		let _Procedimiento_realizado = document.getElementsByName("Procedimiento_realizado")[0].value;
		let _archivo_cita = document.getElementsByName("archivo_cita")[0].value;
		let _recomendaciones = document.getElementsByName("recomendaciones")[0].value;
		let _estado_citas = document.getElementsByName("estado_citas")[0].value;		

		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _fecha_pedido_cita:
				campoText = 'La FECHA de la solicitud d ela cita es requerida'
				document.getElementById("fecha_pedido_cita").focus()
				break;
			case _tiposcita_id:
				campoText = 'El campo TIPO DE CITA es requerido'
				document.getElementById("tiposcita_id").focus()
				break;		
			case _especialidades_id:
				campoText = 'El campo ESPECIALIDAD de la cita es requerida'
				document.getElementById("especialidades_id").focus()
				break;				
			case _tipoatencion_id:
				campoText = 'El campo ATENCION es requerida'
				document.getElementById("tipoatencion_id").focus()
				break;		
			case _clinica_id:
				campoText = 'el Campo CLINICA es requerida'
				document.getElementById("clinica_id").focus()
				break;													
			case _medico_remite_id:
				campoText = 'El campo MÉDICO QUE REMITE AL USUARIO es requerido'
				document.getElementById("medico_remite_id").focus()
				break;				
			case _fecha_cita:
				campoText = 'El campo FECHA DE LA CITA es requerido'
				document.getElementById("fecha_cita").focus()
				break;
			case _hora_cita:
				campoText = 'El campo HORA DE LA CITA es requerido'
				document.getElementById("hora_cita").focus()
				break;				
			case _estado_citas:
				campoText = 'El campo ESTADO es requerido'
				document.getElementById("estado_citas").focus()
				break;											
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataCitas) {
		let i = 0;
		document.getElementsByName("fecha_pedido_cita")[0].value = dataCitas.fecha_pedido_cita; 
		document.getElementsByName("tiposcita_id")[0].value = dataCitas.tiposcita_id;
		document.getElementsByName("especialidades_id")[0].value = dataCitas.especialidades_id;
		document.getElementsByName("tipoatencion_id")[0].value = dataCitas.tipoatencion_id;
		let cliniCita = document.getElementsByName("clinica_id")[0].value = dataCitas.clinica_id;
		let medCita = document.getElementsByName("medico_remite_id")[0].value = dataCitas.medico_remite_id;
		document.getElementsByName("fecha_cita")[0].value = dataCitas.fecha_cita;
		document.getElementsByName("riesgo_cita")[0].value = dataCitas.riesgo_cita;
		document.getElementsByName("hora_cita")[0].value = dataCitas.hora_cita;
		document.getElementsByName("duracion_cita")[0].value = dataCitas.duracion_cita;
		document.getElementsByName("Procedimiento_realizado")[0].value = dataCitas.Procedimiento_realizado;
		document.getElementsByName("archivo_cita")[0].value = dataCitas.archivo_cita;
		document.getElementsByName("recomendaciones")[0].value = dataCitas.recomendaciones;
		document.getElementsByName("estado_citas")[0].value = dataCitas.estado_citas;
		document.getElementsByName("comentario_cita")[0].value = dataCitas.comentario_cita;
		document.getElementsByName("idCitaMedica")[0].value = dataCitas.id;
		document.getElementsByName("citas_pendte")[0].value = dataCitas.citas_pendte;

		$('#medico_remite_id').val(medCita).trigger('change.select2');
		$('#clinica_id').val(cliniCita).trigger('change.select2');

	}

	ValueCampos() {
		// let id_tipodoc = document.getElementsByName("id_tipodoc")
		// let empresa_remite_id = document.getElementsByName("empresa_remite_id")
		// let nombre = document.getElementsByName("nombre")
		// let apellidos = document.getElementsByName("apellidos")
		// let nacionalidad_id = document.getElementsByName("nacionalidad_id")
		// let departamento_id = document.getElementsByName("departamento_id")
		// let ciudad_id = document.getElementsByName("ciudad_id")
		// let fecha_nacimiento = document.getElementsByName("fecha_nacimiento")
		// let edad = document.getElementsByName("edad")
		// let sexo_id = document.getElementsByName("sexo_id")
		// let grupoSanguineo_id = document.getElementsByName("grupoSanguineo_id")
		// let telefonos_user = document.getElementsByName("telefonos_user")
		// let direccion_res = document.getElementsByName("direccion_res")
		// let email_user = document.getElementsByName("email_user")
		// let fecha_creacion = document.getElementsByName("fecha_creacion")
		// let estado_user = document.getElementsByName("estado_user")
		// let diagnostico = document.getElementsByName("diagnostico")

		// var campoText="";
		let camposForm = "";
		return campoText;
	}

	botontable() {
		botinclic = document.getElementById("btnSelectCliDb")
		alert(jotak)
		console.log(botinclic)
	}

	elementosControl() {
		let accionBotones = document.getElementById('accionBotones')
		let botonNew = document.getElementById("btnNew");
		// let botonEdit = document.getElementById("btnEdit");
		let botonDelete = document.getElementById("btnDelete");
		let botonSave = document.getElementById("btnSave");
		let botonCancel = document.getElementById("btnCancel");
		// let botonBuscar = document.getElementById("btnSearch");
		let botonSalir = document.getElementById("btnExit");
	}

	guardarFuncion(valor){
		if (valor == "Actualizar"){
			aler('actualizar')
		}else if (valor == "Guardar"){
			alert('Guardar')
		}
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
		// console.log(newNom100)		
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
		// console.log(newNom100)		
	}
	
	clearElements(){
		document.getElementsByName("fecha_pedido_cita")[0].value = Date();
		document.getElementsByName("fecha_cita")[0].value = Date();
		document.getElementsByName("hora_cita")[0].value = '00:00:00';
		document.getElementsByName("duracion_cita")[0].value = '0';

		$('#tiposcita_id').val(" ").trigger('change.select2');
		$("#especialidades_id").val(" ").trigger('change.select2');
		$("#medico_remite_id").val(" ").trigger('change.select2');
		$("#clinica_id").val(" ").trigger('change.select2');
	}
	desactivaInput(){
		document.getElementById("fecha_pedido_cita").disabled = true;
		document.getElementById("tiposcita_id").disabled = true;
		document.getElementById("especialidades_id").disabled = true;
		document.getElementById("tipoatencion_id").disabled = true;
		document.getElementById("clinica_id").disabled = true;
		document.getElementById("medico_remite_id").disabled = true;
		document.getElementById("fecha_cita").disabled = true;
		document.getElementById("riesgo_cita").disabled = true;
		document.getElementById("hora_cita").disabled = true;
		document.getElementById("duracion_cita").disabled = true;
		document.getElementById("Procedimiento_realizado").disabled = true;
		document.getElementById("archivo_cita").disabled = true;
		document.getElementById("recomendaciones").disabled = true;
		document.getElementById("estado_citas").disabled = true;
	}
	activaInput(){
		document.getElementById("fecha_pedido_cita").disabled = false;
		document.getElementById("tiposcita_id").disabled = false;
		document.getElementById("especialidades_id").disabled = false;
		document.getElementById("tipoatencion_id").disabled = false;
		document.getElementById("clinica_id").disabled = false;
		document.getElementById("medico_remite_id").disabled = false;
		document.getElementById("fecha_cita").disabled = false;
		document.getElementById("riesgo_cita").disabled = false;
		document.getElementById("hora_cita").disabled = false;
		document.getElementById("duracion_cita").disabled = false;
		document.getElementById("Procedimiento_realizado").disabled = false;
		document.getElementById("archivo_cita").disabled = false;
		document.getElementById("recomendaciones").disabled = false;
		document.getElementById("estado_citas").disabled = false;
	}

}

