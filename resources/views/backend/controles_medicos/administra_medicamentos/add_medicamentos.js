
// const { formToJSON } = require("axios")

/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class CargosFunciones {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";
		 			let _car_id = document.getElementsByName("car_id")[0].value;
					let _descripcion = document.getElementsByName("descripcion")[0].value;
					let _categoria_id = document.getElementsByName("categoria_id")[0].value;
					let _funciones = document.getElementsByName("funciones")[0].value;
					
		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _descripcion:
				document.getElementById('descripcion').focus() 
				campoText = 'La DESCRIPCION del cargo es requerida'
				break;
			case _categoria_id: 
				document.getElementById('categoria_id').focus() 
				campoText = 'La CATEGPORIA del cargo es requerida'
				break;
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataCar) {
		let i = 0;

		document.getElementsByName("car_id")[0].value  = dataCar.id ;
		document.getElementsByName("descripcion")[0].value = dataCar.cargo;
		document.getElementsByName("categoria_id")[0].value = dataCar.categoria_id ;
		document.getElementsByName("funciones")[0].value = dataCar.funciones ;

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
	
	/*cuando s epresiona el botón ok de la tabla del modal, se le da valor "Actualizar" al attributo accion del id accionbotonesCar */
	accionUpdate(){
		let updateAccion = "Actualizar"
		let newNom85 = document.getElementById('accionBotonesCar')
		newNom85.setAttribute('accion', `${updateAccion}`);
		// console.log(newNom80)		
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotonesCar */
	accionSaveNew(){
		let saveAccion = "Guardar"
		let newNom100 = document.getElementById('accionBotonesCar')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotonesCar')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	clearElements(){
				
		// $("#rango_eps_id").val(" ").trigger('change.select2');

		// let idNacionalidad = data.nacionalidad_id
		// let dpto_id = data.departamento_id
		// departamentos(idNacionalidad, dpto_id)

		// let ciudad_seleEdit = data.ciudad_id
		// ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)

	}
	desactivaInput(){
		// window.addEventListener('load', () => {		
		document.getElementById("descripcion").disabled = true;
		document.getElementById("categoria_id").disabled = true;
		document.getElementById("funciones").disabled = true;
	}

	activaInput(){
		document.getElementById("descripcion").disabled = false;
		document.getElementById("categoria_id").disabled = false;
		document.getElementById("funciones").disabled = false;
	}
}



