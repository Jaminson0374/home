/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class DatosBasicosClientes {

	validarCampos() {
		let focusHtml = "";
		let campoText = "";
		let id_tipodoc = document.getElementsByName("id_tipodoc")[0].value;
		let num_documento = document.getElementsByName("num_documento")[0].value;
		let nombre = document.getElementsByName("nombre")[0].value;
		let apellidos = document.getElementsByName("apellidos")[0].value;
		let nacionalidad_id = document.getElementsByName("nacionalidad_id")[0].value;
		let departamento_id = document.getElementsByName("departamento_id")[0].value;
		let ciudad_id = document.getElementsByName("ciudad_id")[0].value;
		let fecha_nacimiento = document.getElementsByName("fecha_nacimiento")[0].value;
		let edad = document.getElementsByName("edad")[0].value;
		let sexo_id = document.getElementsByName("sexo_id")[0].value;
		let grupoSanguineo_id = document.getElementsByName("grupoSanguineo_id")[0].value;
		let telefonos_user = document.getElementsByName("telefonos_user")[0].value;
		let direccion_res = document.getElementsByName("direccion_res")[0].value;
		let email_user = document.getElementsByName("email_user")[0].value;
		let fecha_creacion = document.getElementsByName("fecha_creacion")[0].value;
		let estado_user = document.getElementsByName("estado_user")[0].value;
		let diagnostico = document.getElementsByName("diagnostico")[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case id_tipodoc:
				focusHtml = "id_tipodoc"
				campoText = 'El TIPO DOCUMENTO es requerido'
				break;
			case num_documento:
				focusHtml = "num_documento"
				campoText = 'El DOC IDENTIDAD es requerido'
				break;
			case nombre:
				campoText = 'El NOMBRE es requerido'
				focusHtml = "nombre"
				break;
			case apellidos:
				focusHtml = "apellidos"
				campoText = 'El APELLIDO es requerido'
				break;
			case nacionalidad_id:
				focusHtml = "nacionalidad_id"
				campoText = 'La NACIONALIDAD es requerida'
				break;
			case departamento_id:
				focusHtml = "departamento_id"
				campoText = 'El DPTO NACIMIENTO es requerido'
				break;
			case ciudad_id:
				focusHtml = "ciudad_id" 
				campoText = 'La CIUDAD NACIMIENTO es requerida'
				break;
			case fecha_nacimiento:
				focusHtml = "fecha_nacimiento"
				campoText = 'La F. NACIMIENTO es requerida'
				break;
			case sexo_id:
				focusHtml = "sexo_id"
				campoText = 'El GENERO es requerido'
				break;
			case grupoSanguineo_id:
				focusHtml = "grupoSanguineo_id"
				campoText = 'El GRUPO RH es requerido'
				break;
			case telefonos_user:
				focusHtml =  "telefonos_user"
				campoText = 'El TELEFONO es requerido'
				break;
			case direccion_res:
				focusHtml = "direccion_res"
				campoText = 'La DIRECCION RESIDENCIAL es requerida'
				break;
			case email_user:
				focusHtml = "email_user"
				campoText = 'El EMAIL USUARIO es requerido'
				break;
			case fecha_creacion:
				focusHtml = "fecha_creacion"
				campoText = 'La FECHA CREACIÓN/RESERVA es requerida'
				break;
		}
		return campoText;

	}
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(data) {
		console.log(data)
		document.getElementsByName('id_tipodoc')[0].value = data.id_tipodoc
		document.getElementsByName('num_documento')[0].value = data.num_documento
		document.getElementsByName('nombre')[0].value = data.nombre
		document.getElementsByName('apellidos')[0].value = data.apellidos
		document.getElementsByName('nacionalidad_id')[0].value = data.nacionalidad_id
		document.getElementsByName('departamento_id')[0].value = data.departamento_id
		document.getElementsByName('ciudad_id')[0].value = data.ciudad_id
		document.getElementsByName('fecha_nacimiento')[0].value = data.fecha_nacimiento
		document.getElementsByName('edad')[0].value = data.edad
		document.getElementsByName('sexo_id')[0].value = data.sexo_id
		document.getElementsByName('grupoSanguineo_id')[0].value = data.grupoSanguineo_id
		document.getElementsByName('telefonos_user')[0].value = data.telefonos_user
		document.getElementsByName('direccion_res')[0].value = data.direccion_res
		document.getElementsByName('email_user')[0].value = data.email_user
		document.getElementsByName('fecha_creacion')[0].value = data.fecha_creacion
		document.getElementsByName('estado_user')[0].value = data.estado_user
		document.getElementsByName('diagnostico')[0].value = data.diagnostico
		document.getElementsByName('observacion')[0].value = data.observacion
		document.getElementsByName('idCliente')[0].value = data.id

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
} 

