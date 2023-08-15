/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class DatosBasicosClientes {

	validarCampos() {
		let campoText = "";
		let id_tipodoc = document.getElementsByName("id_tipodoc")[0].value;
		let num_documento = document.getElementsByName("num_documento")[0].value;
		let nombre = document.getElementsByName("nombre")[0].value;
		let apellidos = document.getElementsByName("apellidos")[0].value;
		let nacionalidad_id = document.getElementsByName("nacionalidad_id")[0].value;
		let departamento_id = document.getElementsByName("departamento_id")[0].value;
		let ciudad_id = document.getElementsByName("ciudad_id")[0].value;
		let fecha_nacimiento = document.getElementsByName("fecha_nacimiento")[0].value;
		let sexo_id = document.getElementsByName("sexo_id")[0].value;
		let grupoSanguineo_id = document.getElementsByName("grupoSanguineo_id")[0].value;
		let telefonos_user = document.getElementsByName("telefonos_user")[0].value;
		let direccion_res = document.getElementsByName("direccion_res")[0].value;
		let _tiposervicio_id = document.getElementsByName("tiposervicio_id")[0].value;
		// let fecha_creacion = document.getElementsByName("fecha_creacion")[0].value;

		let camposForm = "";
		switch (camposForm) {
			case id_tipodoc:
				document.getElementById('id_tipodoc').focus();
				campoText = 'El TIPO DOCUMENTO es requerido'
				break;
			case num_documento:
				document.getElementById('num_documento').focus();
				campoText = 'El DOC IDENTIDAD es requerido'
				break;
			case nombre:
				campoText = 'El NOMBRE es requerido'
				document.getElementById('nombre').focus();
				break;
			case apellidos:
				document.getElementById('apellidos').focus();
				campoText = 'El APELLIDO es requerido'
				break;
			case nacionalidad_id:
				document.getElementById('nacionalidad_id').focus();
				campoText = 'La NACIONALIDAD es requerida'
				break;
			case departamento_id:
				document.getElementById('departamento_id').focus();
				campoText = 'El DPTO NACIMIENTO es requerido'
				break;
			case ciudad_id:
				document.getElementById('ciudad_id').focus();
				campoText = 'La CIUDAD NACIMIENTO es requerida'
				break;
			case fecha_nacimiento:
				document.getElementById('fecha_nacimiento').focus(); 
				campoText = 'La F. NACIMIENTO es requerida'
				break;
			case sexo_id:
				document.getElementById('edad').focus();
				campoText = 'El GENERO es requerido'
				break;
			case grupoSanguineo_id:
				document.getElementById('grupoSanguineo_id').focus();
				campoText = 'El GRUPO RH es requerido'
				break;
			case telefonos_user:
				document.getElementById('telefonos_user').focus()
				campoText = 'El TELEFONO es requerido'
				break;
			case direccion_res:
				document.getElementById('direccion_res').focus();
				campoText = 'La DIRECCION RESIDENCIAL es requerida'
				break;
				case _tiposervicio_id:
					document.getElementById('tiposervicio_id').focus();
					campoText = 'SELECCIONE EL TIOPO DE SERVICIO'
					break;				
		}
		
		return campoText;

	}
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(data) {
		document.getElementsByName('id_tipodoc')[0].value = data.id_tipodoc
		document.getElementsByName('num_documento')[0].value = data.num_documento
		document.getElementsByName('nombre')[0].value = data.nombre
		document.getElementsByName('apellidos')[0].value = data.apellidos
		document.getElementsByName('nacionalidad_id')[0].value = data.nacionalidad_id
		document.getElementsByName('departamento_id')[0].value = data.departamento_id
		document.getElementsByName('ciudad_id')[0].value = data.ciudad_id
		document.getElementsByName('fecha_nacimiento')[0].value = data.fecha_nacimiento
		document.getElementsByName('edad')[0].value = data.edad
		document.getElementsByName('peso')[0].value = data.peso

		document.getElementsByName('grupoSanguineo_id')[0].value = data.grupoSanguineo_id
		document.getElementsByName('sexo_id')[0].value = data.sexo_id
		document.getElementsByName('telefonos_user')[0].value = data.telefonos_user
		document.getElementsByName('direccion_res')[0].value = data.direccion_res
		document.getElementsByName('email_user')[0].value = data.email_user
		document.getElementsByName('fecha_creacion')[0].value = data.fecha_creacion
		document.getElementsByName('fecha_retiro')[0].value = data.fecha_retiro
		document.getElementsByName('estado_user')[0].value = data.estado_user
		document.getElementsByName('diagnostico')[0].value = data.diagnostico
		document.getElementsByName('observacion')[0].value = data.observacion
		document.getElementsByName('idCliente')[0].value = data.id
		document.getElementsByName("recomendacion_med")[0].value = data.recomendacion_med;
		document.getElementsByName("dieta_nutricio")[0].value = data.dieta_nutricio;
		document.getElementsByName("suministro_medic")[0].value = data.suministro_medic;		
		document.getElementsByName("barrio_res")[0].value = data.barrio_res;		
		document.getElementsByName("tiposervicio_id")[0].value = data.tiposervicio_id;	

		
		$("#stado_user").val(data.estado_user).trigger('change.estado_user');
		$("#tiposervicio_id").val(data.tiposervicio_id).trigger('change.tiposervicio_id');
		$("#acompanantes_id2").val(data.acompanantes_id2).trigger('change.select2');
		$("#acompanantes_id3").val(data.acompanantes_id3).trigger('change.select2');
		$("#acompanantes_id").val(data.acompanantes_id).trigger('change.select2');


		// $("#id_tipodoc").val("_id_tipodoc").trigger('change.select2');

		let idNacionalidad = data.nacionalidad_id
		let dpto_id = data.departamento_id
		departamentos(idNacionalidad, dpto_id)

		let ciudad_seleEdit = data.ciudad_id 
		ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)
	}

	ValueCampos() {
		let id_tipodoc = document.getElementsByName("id_tipodoc")
		let num_documento = document.getElementsByName("num_documento")
		let nombre = document.getElementsByName("nombre")
		let apellidos = document.getElementsByName("apellidos")
		let nacionalidad_id = document.getElementsByName("nacionalidad_id")
		let departamento_id = document.getElementsByName("departamento_id")
		let ciudad_id = document.getElementsByName("ciudad_id")
		let fecha_nacimiento = document.getElementsByName("fecha_nacimiento")
		let edad = document.getElementsByName("edad")
		let sexo_id = document.getElementsByName("sexo_id")
		let grupoSanguineo_id = document.getElementsByName("grupoSanguineo_id")
		let telefonos_user = document.getElementsByName("telefonos_user")
		let direccion_res = document.getElementsByName("direccion_res")
		let email_user = document.getElementsByName("email_user")
		let fecha_creacion = document.getElementsByName("fecha_creacion")
		let estado_user = document.getElementsByName("estado_user")
		let diagnostico = document.getElementsByName("diagnostico")

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
			// alert('Guardar')
		}

	} 
	
	/*cuando s epresiona el botón ok de la tabla del modal, se le da valor "Actualizar" al attributo accion del id accionbotones */
	accionUpdate(){
		let newNom80 = document.getElementById('accionBotones')
		newNom80.setAttribute('accion', "Actualizar");
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotones */
	accionSaveNew(){
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', 'Guardar');
	}

	desactivaElements(){
		document.getElementById('id_tipodoc').disabled = true;
		document.getElementById('num_documento').disabled = true;
		document.getElementById('nombre').disabled = true;
		document.getElementById('apellidos').disabled = true;
		document.getElementById('nacionalidad_id').disabled = true;
		document.getElementById('departamento_id').disabled = true;
		document.getElementById('ciudad_id').disabled = true;
		document.getElementById('fecha_nacimiento').disabled = true;
		document.getElementById('edad').disabled = true;
		document.getElementById('sexo_id').disabled = true;
		document.getElementById('grupoSanguineo_id').disabled = true;
		document.getElementById('telefonos_user').disabled = true;
		document.getElementById('direccion_res').disabled = true;
		document.getElementById('email_user').disabled = true;
		document.getElementById('fecha_creacion').disabled = true;
		document.getElementById('fecha_retiro').disabled = true;
		document.getElementById('diagnostico').disabled = true;
		document.getElementById("recomendacion_med").disabled = true;
		document.getElementById("dieta_nutricio").disabled = true;
		document.getElementById("suministro_medic").disabled = true;
		document.getElementById("observacion").disabled = true;		
		document.getElementById("peso").disabled = true;
		document.getElementById("barrio_res").disabled = true;	
		document.getElementById("acompanantes_id").disabled = true;	
		document.getElementById("acompanantes_id2").disabled = true;	
		document.getElementById("acompanantes_id3").disabled = true;	
		document.getElementById('estado_user').disabled = true;
		document.getElementById('tiposervicio_id').disabled = true;

				
	}
	activaElements(){
		document.getElementById('id_tipodoc').disabled = false;
		document.getElementById('num_documento').disabled = false;
		document.getElementById('nombre').disabled = false;
		document.getElementById('apellidos').disabled = false;
		document.getElementById('nacionalidad_id').disabled = false;
		document.getElementById('departamento_id').disabled = false;
		document.getElementById('ciudad_id').disabled = false;
		document.getElementById('fecha_nacimiento').disabled = false;
		document.getElementById('edad').disabled = false;
		document.getElementById('sexo_id').disabled = false;
		document.getElementById('grupoSanguineo_id').disabled = false;
		document.getElementById('telefonos_user').disabled = false;
		document.getElementById('direccion_res').disabled = false;
		document.getElementById('email_user').disabled = false;
		document.getElementById('estado_user').disabled = false;
		document.getElementById('fecha_creacion').disabled = false;
		document.getElementById('fecha_retiro').disabled = false;

		document.getElementById('diagnostico').disabled = false;
		document.getElementById('observacion').disabled = false;
		document.getElementById("recomendacion_med").disabled = false;
		document.getElementById("dieta_nutricio").disabled = false;
		document.getElementById("suministro_medic").disabled = false;
		document.getElementById("peso").disabled = false;
		document.getElementById("barrio_res").disabled = false;
		document.getElementById("acompanantes_id").disabled = false;	
		document.getElementById("acompanantes_id2").disabled = false;	
		document.getElementById("acompanantes_id3").disabled = false;
		document.getElementById('tiposervicio_id').disabled = false;			
	}	
	clearElements(){
		
	}
} 

