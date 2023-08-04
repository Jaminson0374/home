
// const { formToJSON } = require("axios")

/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class EpsFunciones {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";
					let _num_documento = document.getElementsByName("num_documento")[0].value;
					let _nombre_eps = document.getElementsByName("nombre_eps")[0].value;
					let _direccion_eps = document.getElementsByName("direccion_eps")[0].value;
					let _telefono_eps = document.getElementsByName("telefono_eps"	)[0].value;
					let _rango_eps_id = document.getElementsByName("rango_eps_id")[0].value;
					let _nombre_repre = document.getElementsByName("nombre_repre")[0].value;
					let _telefono_repre = document.getElementsByName("telefono_repre")[0].value;
					let _observacion = document.getElementsByName("observacion")[0].value;
					let _fecha_ini_contrato = document.getElementsByName("fecha_ini_contrato")[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _num_documento:
				document.getElementById('num_documento').focus() 
				campoText = 'El DOC de A IDENTIFICACIÓN es requerido'
				break;
			case _nombre_eps: 
				document.getElementById('nombre_eps').focus() 
				campoText = 'El NOMBRE DE LA EPS es requerido'
				break;
			case _direccion_eps:
				document.getElementById('direccion_eps').focus() 
				campoText = 'La DIRECCION  de la eps es requrida'
				break;
			case _telefono_eps:
				campoText = 'EL TELEFONO  de la eps es requerido'
				document.getElementById('telefono_eps').focus() 
				break;
			case _rango_eps_id:
				campoText = 'El RANGO  de la Eps requerido'
				document.getElementById('rango_eps_id').focus()
				break;
			case _nombre_repre:
				campoText = 'El NOMBRE del representante es requerido'
				document.getElementById('_nombre_repre').focus() 
				break;
			case _telefono_repre:
				campoText = 'El TELEFONO del representante es requerido'
				document.getElementById('telefono_repre').focus() 
				break;
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataEps) {
		let i = 0;
		let _num_documento = document.getElementsByName("num_documento")[0].value = dataEps.num_documento;
		let _nombre_eps = document.getElementsByName("nombre_eps")[0].value = dataEps.nombre_eps;
		let _direccion_eps = document.getElementsByName("direccion_eps")[0].value = dataEps.direccion_eps;
		let _telefono_eps = document.getElementsByName("telefono_eps"	)[0].value = dataEps.telefono_eps;
		let _rango_eps_id = document.getElementsByName("rango_eps_id")[0].value = dataEps.rango_eps_id;
		let _nombre_repre = document.getElementsByName("nombre_repre")[0].value = dataEps.nombre_repre;
		let _telefono_repre = document.getElementsByName("telefono_repre")[0].value = dataEps.telefono_repre;
		let _observacion = document.getElementsByName("observacion")[0].value = dataEps.observacion;
		let _fecha_ini_contrato = document.getElementsByName("fecha_ini_contrato")[0].value = dataEps.fecha_ini_contrato;
		document.getElementsByName("eps_id")[0].value = dataEps.id;

		// $("#rango_eps_id").val("_rango_eps_id").trigger('change.select2');
	}

	ValueCampos() {

		let camposForm = "";
		return campoText;
	}

	guardarFuncion(valor){
		if (valor == "Actualizar"){
			aler('actualizar')
		}else if (valor == "Guardar"){
			alert('Guardar')
		}
	}
	
	/*cuando s epresiona el botón ok de la tabla del modal, se le da valor "Actualizar" al attributo accion del id accionbotonesEps */
	accionUpdate(){
		let updateAccion = "Actualizar"
		let newNom85 = document.getElementById('accionBotonesEps')
		newNom85.setAttribute('accion', `${updateAccion}`);
		// console.log(newNom80)		
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotonesEps */
	accionSaveNew(){
		let saveAccion = "Guardar"
		let newNom100 = document.getElementById('accionBotonesEps')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotonesEps')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	clearElements(){
		document.getElementsByName("fecha_ini_contrato")[0].value = Date();
		
		// $("#rango_eps_id").val(" ").trigger('change.select2');

		// let idNacionalidad = data.nacionalidad_id
		// let dpto_id = data.departamento_id
		// departamentos(idNacionalidad, dpto_id)

		// let ciudad_seleEdit = data.ciudad_id
		// ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)

	}
	desactivaInput(){
		// window.addEventListener('load', () => {
			document.getElementById("num_documento").disabled = true;
			document.getElementById("nombre_eps").disabled = true;
			document.getElementById("direccion_eps").disabled = true;
			document.getElementById("telefono_eps").disabled = true;
			document.getElementById("rango_eps_id").disabled = true;
			document.getElementById("nombre_repre").disabled = true;
			document.getElementById("telefono_repre").disabled = true;
			document.getElementById("observacion").disabled = true;
			document.getElementById("fecha_ini_contrato").disabled = true;
	}

	activaInput(){
		document.getElementById("num_documento").disabled = false;
		document.getElementById("nombre_eps").disabled = false;
		document.getElementById("direccion_eps").disabled = false;
		document.getElementById("telefono_eps").disabled = false;
		document.getElementById("rango_eps_id").disabled = false;
		document.getElementById("nombre_repre").disabled = false;
		document.getElementById("telefono_repre").disabled = false;
		document.getElementById("observacion").disabled = false;
		document.getElementById("fecha_ini_contrato").disabled = false;
	}
}



