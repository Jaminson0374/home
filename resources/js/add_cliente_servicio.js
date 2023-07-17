/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class serviciosNewClientes2 {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";
		// let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;
		let tiposervicio_id = document.getElementsByName("tiposervicio_id")[0].value;
		let empresa_remite_id = document.getElementsByName("empresa_remite_id")[0].value;
		// let medico_remite_id = document.getElementsByName("medico_remite_id")[0].value;
		let tipo_afiliacion_id = document.getElementsByName("tipo_afiliacion_id")[0].value;
		let rango_eps_id = document.getElementsByName("rango_eps_id")[0].value;
		let cubiculos_id = document.getElementsByName("cubiculos_id")[0].value;
		let fecha_ingreso = document.getElementsByName("fecha_ingreso")[0].value;
		let fecha_retiro = document.getElementsByName("fecha_retiro")[0].value;
		let num_dias = document.getElementsByName("num_dias")[0].value;
		let empleado_id = document.getElementsByName("empleado_id")[0].value;
		let acompanantes_id = document.getElementsByName("acompanantes_id")[0].value;
		let estado = document.getElementsByName("estado")[0].value;
		let observacion = document.getElementsByName("observacion")[0].value;
		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case tiposervicio_id:
				campoText = 'El TIPO DE SERVICIO es requerido'
				break;
			case empresa_remite_id:
				campoText = 'El EPS QUE REMITE es requerido'
				// break;				
			case medico_remite_id:
				campoText = 'El MÉDICO QUE REMITE AL USUARIO es requerido'
				break;				
			case tipo_afiliacion_id:
				campoText = 'El TIPO DE AFILIACION es requerido'
				break;				
			case rango_eps_id:
				campoText = 'El RANGO DE LA EPS es requerido'
				break;				
			case cubiculos_id:
				campoText = 'El CUBICULO ASIGNADO es requerido'
				break;
			case fecha_ingreso:
				campoText = 'La FECHA DE INGRESO es requerida'
				break;
			case fecha_retiro:
				campoText = 'La FECHA DE RETIRO es requerida'
				break;				
			case empleado_id:
				campoText = 'El PROFESIONAL QUE RECIBE AL USUARIO es requerido'
				break;
			case acompanantes_id:
				campoText = 'El ACOMPAÑANTE es requerido'
				break;
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataServicio) {
		let i = 0;
		// for (let i = 0, celda = 1; i < data2.length; i++) {
			

			// document.getElementsByName("acompanantes_id")[0].value = `${dataServicio[i].acompanantes_id}`;

			document.getElementsByName("fecha_ingreso")[0].value = `${dataServicio[i].fecha_ingreso}`;
			document.getElementsByName("fecha_retiro")[0].value = `${dataServicio[i].fecha_retiro}`;
			document.getElementsByName("num_dias")[0].value = `${dataServicio[i].num_dias}`;
			document.getElementsByName("estado")[0].value = `${dataServicio[i].estado}`;
			document.getElementsByName("observacion")[0].value = `${dataServicio[i].observacion}`;	
			document.getElementsByName("datosbasicos_id")[0].value = `${dataServicio[i].datosbasicos_id}`;
			document.getElementsByName("idClienteServicio")[0].value = `${dataServicio[i].id}`;
			
			/*Seleccionar una opción en el Select2*/
			$('#tiposervicio_id').val(`${dataServicio[i].tiposervicio_id}`).trigger('change.select2');
			$("#empresa_remite_id").val(`${dataServicio[i].empresa_remite_id}`).trigger('change.select2');
			$("#medico_remite_id").val(`${dataServicio[i].medico_remite_id}`).trigger('change.select2');
			$("#tipo_afiliacion_id").val(`${dataServicio[i].tipo_afiliacion_id}`).trigger('change.select2');
			$("#rango_eps_id").val(`${dataServicio[i].rango_eps_id}`).trigger('change.select2');
			$("#cubiculos_id").val(`${dataServicio[i].cubiculos_id}`).trigger('change.select2');	
			$("#empleado_id").val(`${dataServicio[i].empleado_id}`).trigger('change.select2');
			$("#acompanantes_id").val(`${dataServicio[i].acompanantes_id}`).trigger('change.select2');			


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
		let newNom80 = document.getElementById('accionBotones')
		newNom80.setAttribute('accion', `${updateAccion}`);
		// console.log(newNom80)		
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotones */
	accionSaveNew(){
		let saveAccion = "Guardar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
		// console.log(newNom100)		
	}

	clearElements(){
		document.getElementsByName("fecha_ingreso")[0].value = Date();
		document.getElementsByName("fecha_retiro")[0].value = Date();
		document.getElementsByName("num_dias")[0].value = '0';
		
		$('#tiposervicio_id').val(" ").trigger('change.select2');
		$("#empresa_remite_id").val(" ").trigger('change.select2');
		$("#medico_remite_id").val(" ").trigger('change.select2');
		$("#tipo_afiliacion_id").val(" ").trigger('change.select2');
		$("#rango_eps_id").val(" ").trigger('change.select2');
		$("#cubiculos_id").val(" ").trigger('change.select2');	
		$("#empleado_id").val(" ").trigger('change.select2');
		$("#acompanantes_id").val(" ").trigger('change.select2');	
	}
}

