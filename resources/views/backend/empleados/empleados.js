
// const { formToJSON } = require("axios")

/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class EmpleadoVista {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		let _tipodocumento_id = document.getElementsByName('tipodocumento_id')[0].value; 
		let _num_documento = document.getElementsByName('num_documento')[0].value; 
		let _nombre = document.getElementsByName('nombre')[0].value; 
		let _apellidos = document.getElementsByName('apellidos')[0].value; 
		let _sexo_id = document.getElementsByName('sexo_id')[0].value; 
		let _gruposanguineo_id = document.getElementsByName('gruposanguineo_id')[0].value;
		let _nacionalidad_id = document.getElementsByName('nacionalidad_id')[0].value; 
		let _departamento_id = document.getElementsByName('departamento_id')[0].value; 
		let _ciudad_id = document.getElementsByName('ciudad_id')[0].value; 
		let _fecha_nacimiento = document.getElementsByName('fecha_nacimiento')[0].value; 
		let _lugar_ncmto = document.getElementsByName('lugar_ncmto')[0].value; 
		let _edad = document.getElementsByName('edad')[0].value; 
		let _direccion_res= document.getElementsByName('direccion_res')[0].value; 
		let _telefonos = document.getElementsByName('telefonos')[0].value; 
		let _email = document.getElementsByName('email')[0].value; 
		let _cargo_id = document.getElementsByName('cargo_id')[0].value; 
		let _nombre_familiar = document.getElementsByName('nombre_familiar')[0].value;
		let _parentezco_familiar = document.getElementsByName('parentezco_familiar')[0].value;
		let _telefono_familiar = document.getElementsByName('telefono_familiar')[0].value;
		let _email_famliar = document.getElementsByName('email_famliar')[0].value; 
		let _salario = document.getElementsByName('salario')[0].value; 
		let tipocontrato_id  = document.getElementsByName('tipocontrato_id')[0].value; 
		let _profesion_id = document.getElementsByName('profesion_id')[0].value; 
		let _hoja_vida = document.getElementsByName('hoja_vida')[0].value; 
		let _fecha_inicio = document.getElementsByName('fecha_inicio')[0].value;
		let _estado = document.getElementsByName('estado')[0].value;
		let _funciones = document.getElementsByName('funciones')[0].value;
		let _foto = document.getElementsByName('foto')[0].value;
		let _observacion = document.getElementsByName('observacion')[0].value; 
		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _tipodocumento_id:
				document.getElementById('tipodocumento_id').focus()
				campoText = 'El TIPO DOCUMENTO es requerido'
				break;
			case _num_documento:
				document.getElementById('num_documento').focus() 
				campoText = 'El DOC IDENTIDAD es requerido'
				break;
			case _nombre: 
				document.getElementById('nombre').focus() 
				campoText = 'El NOMBRE es requerido'
				break;
			case _apellidos:
				document.getElementById('apellidos').focus() 
				campoText = 'El APELLIDO es requerido'
				break;
			case _sexo_id:
				campoText = 'La GENERO O SEXO es requerido'
				document.getElementById('sexo_id').focus() 
				break;
			case _gruposanguineo_id:
				campoText = 'El GRUPO RH es requerido'
				document.getElementById('gruposanguineo_id').focus()
				break;
			case _fecha_nacimiento:
				campoText = 'La FECHA NACIMIENTO es requerida'
				document.getElementById('fecha_nacimiento').focus() 
				break;
			case _lugar_ncmto:
				campoText = 'El LUGAR DE NACIMIENTO es requerido'
				document.getElementById('lugar_ncmto').focus() 
				break;
			case _direccion_res:
				document.getElementById('direccion_res').focus() 
				campoText = 'La DIRTECCION RESIDENCIAL es requerida'
				break;
			case _telefonos:
				document.getElementById('telefonos').focus() 
				campoText = 'el TELEFONO DE CONTACTO es requerido '
				break;
			case _email:
				document.getElementById('email').focus() 
				campoText = 'el E-MAIL es requerido '
				break;
			case _cargo_id:
				document.getElementById('cargo_id').focus() 
				campoText = 'el CARGO que desempeña es requerido '
				break;
			case _profesion_id:
				document.getElementById('profesion_id').focus() 
				campoText = 'La PROFESION es requerida '
				break;
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataEmpleado) {
		let i = 0;
		_tipodocumento_id = document.getElementsByName('tipodocumento_id')[0].value = dataEmpleado.tipodocumento_id; 
		_num_documento = document.getElementsByName('num_documento')[0].value = dataEmpleado.num_documento; 
		_nombre = document.getElementsByName('nombre')[0].value = dataEmpleado.nombre; 
		_apellidos = document.getElementsByName('apellidos')[0].value = dataEmpleado.apellidos; 
		_sexo_id = document.getElementsByName('sexo_id')[0].value = dataEmpleado.sexo_id; 
		_gruposanguineo_id = document.getElementsByName('gruposanguineo_id')[0].value = dataEmpleado.gruposanguineo_id;
		// _nacionalidad_id = document.getElementsByName('nacionalidad_id')[0].value = dataEmpleado.nacionalidad_id; 
		// _departamento_id = document.getElementsByName('departamento_id')[0].value = dataEmpleado.departamento_id; 
		// _ciudad_id = document.getElementsByName('ciudad_id')[0].value = dataEmpleado.ciudad_id; 
		_fecha_nacimiento = document.getElementsByName('fecha_nacimiento')[0].value = dataEmpleado._fecha_nacimiento; 
		_lugar_ncmto = document.getElementsByName('lugar_ncmto')[0].value = dataEmpleado.lugar_ncmto; 
		_edad = document.getElementsByName('edad')[0].value = dataEmpleado.edad; 
		_direccion_res= document.getElementsByName('direccion_res')[0].value = dataEmpleado.direccion_re; 
		_telefonos = document.getElementsByName('telefonos')[0].value = dataEmpleado._telefonos; 
		_email = document.getElementsByName('email')[0].value = dataEmpleado.email; 
		_cargo_id = document.getElementsByName('cargo_id')[0].value = dataEmpleado.cargo_id; 
		_nombre_familiar = document.getElementsByName('nombre_familiar')[0].value = dataEmpleado.nombre_familiar;
		_parentezco_familiar = document.getElementsByName('parentezco_familiar')[0].value = dataEmpleado.telefono_familiar;
		_telefono_familiar = document.getElementsByName('telefono_familiar')[0].value = dataEmpleado.telefonos;
		_email_famliar = document.getElementsByName('email_famliar')[0].value = dataEmpleado.email_famliar; 
		_salario = document.getElementsByName('salario')[0].value = dataEmpleado.salario; 
		_tipocontrato_id  = document.getElementsByName('tipocontrato_id')[0].value = dataEmpleado.tipocontrato_id ; 
		_profesion_id = document.getElementsByName('profesion_id')[0].value = dataEmpleado.profesion_id; 
		_hoja_vida = document.getElementsByName('hoja_vida')[0].value = dataEmpleado.hoja_vida; 
		_estado = document.getElementsByName('estado')[0].value = dataEmpleado.estado;
		_funciones = document.getElementsByName('funciones')[0].value = dataEmpleado.funciones;
		_observacion = document.getElementsByName('observacion')[0].value = dataEmpleado.observacion; 
		
		$("#empleados_id").val("_empleados_id").trigger('change.select2');
		$("#tipodocumento_id").val("_tipodocumento_id").trigger('change.select2');
		$("#gruposanguineo_id").val("_gruposanguineo_id").trigger('change.select2');
		$("#cargo_id").val("_cargo_id").trigger('change.select2');
		$("#tipocontrato_id").val("_tipocontrato_id").trigger('change.select2');
		$("#profesion_id").val("_profesion_id").trigger('change.select2');	
		$("#sexo_id").val("_sexo_id").trigger('change.select2');	
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
		document.getElementsByName("fecha_nacimiento")[0].value = Date();
		
		$("#empleados_id").val(" ").trigger('change.select2');
		$("#tipodocumento_id").val(" ").trigger('change.select2');
		$("#gruposanguineo_id").val(" ").trigger('change.select2');
		$("#sexo_id").val(" ").trigger('change.select2');
		$("#cargo_id").val(" ").trigger('change.select2');
		$("#tipocontrato_id").val(" ").trigger('change.select2');
		$("#profesion_id").val(" ").trigger('change.select2');

		// let idNacionalidad = data.nacionalidad_id
		// let dpto_id = data.departamento_id
		// departamentos(idNacionalidad, dpto_id)

		// let ciudad_seleEdit = data.ciudad_id
		// ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)

	}
	desactivaInput(){
		// window.addEventListener('load', () => {

		document.getElementById('tipodocumento_id').disabled = true; 
		document.getElementById('num_documento').disabled = true; 
		document.getElementById('nombre').disabled = true; 
		document.getElementById('apellidos').disabled = true; 
		document.getElementById('sexo_id').disabled = true; 
		document.getElementById('gruposanguineo_id').disabled = true;
		document.getElementById('nacionalidad_id').disabled = true; 
		document.getElementById('departamento_id').disabled = true; 
		document.getElementById('ciudad_id').disabled = true; 
		document.getElementById('fecha_nacimiento').disabled = true; 
		document.getElementById('lugar_ncmto').disabled = true; 
		document.getElementById('edad').disabled = true; 
		document.getElementById('direccion_res').disabled = true; 
		document.getElementById('telefonos').disabled = true; 
		document.getElementById('email').disabled = true; 
		document.getElementById('cargo_id').disabled = true;
		document.getElementById('fecha_inicio').disabled = true;  
		document.getElementById('nombre_familiar').disabled = true;
		document.getElementById('parentezco_familiar').disabled = true;
		document.getElementById('telefono_familiar').disabled = true;
		document.getElementById('email_famliar').disabled = true; 
		document.getElementById('salario').disabled = true; 
		document.getElementById('tipocontrato_id').disabled = true; 
		document.getElementById('profesion_id').disabled = true; 
		document.getElementById('estado').disabled = true;
		document.getElementById('funciones').disabled = true;
		// document.getElementById('foto').disabled = true;
		// document.getElementById('hoja_vida').disabled = true;
		document.getElementById('salario').disabled = true;
		document.getElementById('observacion').disabled = true; 
	}

	activaInput(){
		document.getElementById('tipodocumento_id').disabled = false; 
		document.getElementById('num_documento').disabled = false; 
		document.getElementById('nombre').disabled = false; 
		document.getElementById('apellidos').disabled = false; 
		document.getElementById('sexo_id').disabled = false; 
		document.getElementById('gruposanguineo_id').disabled = false;
		document.getElementById('nacionalidad_id').disabled = false; 
		document.getElementById('departamento_id').disabled = false; 
		document.getElementById('ciudad_id').disabled = false; 
		document.getElementById('fecha_nacimiento').disabled = false; 
		document.getElementById('lugar_ncmto').disabled = false; 
		document.getElementById('edad').disabled = false; 
		document.getElementById('direccion_res').disabled = false; 
		document.getElementById('telefonos').disabled = false; 
		document.getElementById('email').disabled = false; 
		document.getElementById('cargo_id').disabled = false; 
		document.getElementById('fecha_inicio').disabled = false; 
		document.getElementById('nombre_familiar').disabled = false;
		document.getElementById('parentezco_familiar').disabled = false;
		document.getElementById('telefono_familiar').disabled = false;
		document.getElementById('email_famliar').disabled = false; 
		document.getElementById('salario').disabled = false; 
		document.getElementById('tipocontrato_id').disabled = false; 
		document.getElementById('profesion_id').disabled = false; 
		document.getElementById('estado').disabled = false;
		document.getElementById('funciones').disabled = false;
		// document.getElementById('foto').disabled = false;
		// document.getElementById('hoja_vida').disabled = false;
		document.getElementById('salario').disabled = false;
		document.getElementById('observacion').disabled = false; 
	}
}


