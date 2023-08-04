
// const { formToJSON } = require("axios")

/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class CategoriasFunciones  {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";
		 			let _cat_id = document.getElementsByName("cat_id")[0].value;
					let _codigo = document.getElementsByName("codigo")[0].value;
					let _descripcion = document.getElementsByName("descripcion")[0].value;
					let _abreviatura = document.getElementsByName("abreviatura")[0].value;
					
		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _descripcion:
				document.getElementById('descripcion').focus() 
				campoText = 'La DESCRIPCION de de la categoría es requerida'
				break;
			case _abreviatura:
				document.getElementById('abreviatura').focus() 
				campoText = 'La ABREVIRURA de de la categoría es requerida'
				break;				
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataCat) {
		let i = 0;

		let _cat_id = document.getElementsByName("cat_id")[0].value = dataCat.id;
		let _codigo = document.getElementsByName("codigo")[0].value = dataCat.codigo;
		let _descripcion = document.getElementsByName("descripcion")[0].value = dataCat.descripcion;
		let _abreviatura = document.getElementsByName("abreviatura")[0].value = dataCat.abreviatura;
		
		

		// $("#categoria_id").val("_categoria_id").trigger('change.select2');
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
	
	/*cuando s epresiona el botón ok de la tabla del modal, se le da valor "Actualizar" al attributo accion del id accionbotonesCat */
	accionUpdate(){
		let updateAccion = "Actualizar"
		let newNom85 = document.getElementById('accionBotonesCat')
		newNom85.setAttribute('accion', `${updateAccion}`);
		// console.log(newNom80)		
	}
	/*cuando s epresiona el botón cancelar, se le da valor "Guardar" al attributo accion del id accionbotonesCat */
	accionSaveNew(){
		let saveAccion = "Guardar"
		let newNom100 = document.getElementById('accionBotonesCat')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotonesCat')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	desactivaInput(){
		// window.addEventListener('load', () => {		
		document.getElementById("descripcion").disabled = true;
		document.getElementById("codigo").disabled = true;
		document.getElementById("abreviatura").disabled = true;
	}

	activaInput(){
		document.getElementById("descripcion").disabled = false;
		document.getElementById("codigo").disabled = false;
		document.getElementById("abreviatura").disabled = false;
	}
}



