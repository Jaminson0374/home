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
				campoText = 'El TIPO DOCUMENTO es requerido'
				break;
			case num_documento:
				campoText = 'El DOC IDENTIDAD es requerido'
				break;
			case nombre:
				campoText = 'El NOMBRE es requerido'
				break;
			case apellidos:
				campoText = 'El APELLIDO es requerido'
				break;
			case nacionalidad_id:
				campoText = 'La NACIONALIDAD es requerida'
				break;
			case departamento_id:
				campoText = 'El DPTO NACIMIENTO es requerido'
				break;
			case ciudad_id:
				campoText = 'La CIUDAD NACIMIENTO es requerida'
				break;
			case fecha_nacimiento:
				campoText = 'La F. NACIMIENTO es requerida'
				break;
			case sexo_id:
				campoText = 'El GENERO es requerido'
				break;
			case grupoSanguineo_id:
				campoText = 'El GRUPO RH es requerido'
				break;
			case telefonos_user:
				campoText = 'El TELEFONO es requerido'
				break;
			case direccion_res:
				campoText = 'La DIRECCION RESIDENCIAL es requerida'
				break;
			case email_user:
				campoText = 'El EMAIL USUARIO es requerido'
				break;
			case fecha_creacion:
				campoText = 'La FECHA CREACIÓN/RESERVA es requerida'
				break;
		}
		return campoText;

	}
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(data2) {
		// elementosControl()
		// bodyTablaDtBasic.innerHTML = "";
		// for (let datoJson of data){
			// let bcid="1"
			// document.getElementById('nacionalidad_id').value = `${bcid}`
		// for (let i = 0, celda = 1; i < data2.length; i++) {
			let i = 0;
			document.getElementById('id_tipodoc').value = `${data2[i].id_tipodoc}`
			document.getElementById('num_documento').value = `${data2[i].num_documento}`
			document.getElementById('nombre').value = `${data2[i].nombre}`
			document.getElementById('apellidos').value = `${data2[i].apellidos}`
			document.getElementById('nacionalidad_id').value = `${data2[i].nacionalidad_id}`
			document.getElementById('departamento_id').value = `${data2[i].departamento_id}`
			document.getElementById('ciudad_id').value = `${data2[i].ciudad_id}`
			document.getElementById('fecha_nacimiento').value = `${data2[i].fecha_nacimiento}`
			document.getElementById('edad').value = `${data2[i].edad}`
			document.getElementById('sexo_id').value = `${data2[i].sexo_id}`
			document.getElementById('grupoSanguineo_id').value = `${data2[i].grupoSanguineo_id}`
			document.getElementById('telefonos_user').value = `${data2[i].telefonos_user}`
			document.getElementById('direccion_res').value = `${data2[i].direccion_res}`
			document.getElementById('email_user').value = `${data2[i].email_user}`
			document.getElementById('fecha_creacion').value = `${data2[i].fecha_creacion}`
			document.getElementById('estado_user').value = `${data2[i].estado_user}`
			document.getElementById('diagnostico').value = `${data2[i].diagnostico}`
			document.getElementById('observacion').value = `${data2[i].observacion}`
			document.getElementById('idCliente').value = `${data2[i].id}`
		// }

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
		console.log(newNom100)		
	}
}

