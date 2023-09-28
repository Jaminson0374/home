/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class invArticulos {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		let _referencia = document.getElementsByName('referencia')[0].value
		let _descripcion = document.getElementsByName('descripcion')[0].value
		let abreviatura = document.getElementsByName('abreviatura')[0].value 
		let _categoria_id = document.getElementsByName('categoria_id')[0].value
		let _linea_id = document.getElementsByName('linea_id')[0].value
		let _unimedidas_id = document.getElementsByName('unimedidas_id')[0].value
		let _proveedor_id = document.getElementsByName('proveedor_id')[0].value
		let _stock_min = document.getElementsByName('stock_min')[0].value
		let _stock_max = document.getElementsByName('stock_max')[0].value
		let _inv_inicial = document.getElementsByName('inv_inicial')[0].value
		// let cant_entrada = document.getElementsByName('cant_entrada')[0].value
		// let _cant_salidas = document.getElementsByName('cant_salidas')[0].value
		let _cant_ajustes = document.getElementsByName('cant_ajustes')[0].value
		let _existencia = document.getElementsByName('existencia')[0].value
		let _pcosto = document.getElementsByName('pcosto')[0].value
		let _iva = document.getElementsByName('iva')[0].value
		let _pventa = document.getElementsByName('pventa')[0].value
		let _ult_fecha_compra = document.getElementsByName('ult_fecha_compra')[0].value
		// let _anulado = document.getElementsByName('anulado')[0]
		 


		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";
		switch (camposForm) {
			// case _referencia:
			// 	campoText = 'La REFERENCIA del Articulo está vacía'
			// 	document.getElementById("referencia").focus()
			// 	break;
			case _descripcion:
				campoText = 'La DESCRIPCIÓN esta vacía'
				document.getElementById("descripcion").focus()
				break;		
			case _linea_id:
				campoText = 'La LINEA del articulo está vacía'
				document.getElementById("linea_id").focus()
				break;				
			case _categoria_id:
				campoText = 'La CATEGORÍA esta vacía'
				document.getElementById("categoria_id").focus()
				break;		
			case _proveedor_id:
				campoText = 'El campo  PROVEEDOR es requerido'
				document.getElementById("proveedor_id").focus()
				break;													

		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataArti) {
		let i = 0;
		document.getElementsByName('referencia')[0].value  = dataArti.referencia
		document.getElementsByName('descripcion')[0].value  = dataArti.articulo
		document.getElementsByName('abreviatura')[0].value  = dataArti.abreviatura
		let _categoria_id = document.getElementsByName('categoria_id')[0].value  = dataArti.categoria_id
		let _linea_id = document.getElementsByName('linea_id')[0].value  = dataArti.linea_id
		let _unimedidas_id = document.getElementsByName('unimedidas_id')[0].value  = dataArti.unimedidas_id
		let _proveedor_id = document.getElementsByName('proveedor_id')[0].value  = dataArti.proveedor_id
		document.getElementsByName('stock_min')[0].value  = dataArti.stock_min
		document.getElementsByName('stock_max')[0].value  = dataArti.stock_max
		document.getElementsByName('inv_inicial')[0].value  = dataArti.inv_inicial
		document.getElementsByName('cant_ajustes')[0].value  = dataArti.cant_ajustes
		document.getElementsByName('existencia')[0].value  = dataArti.existencia
		document.getElementsByName('pcosto')[0].value  = dataArti.pcosto
		document.getElementsByName('iva')[0].value  = dataArti.iva
		document.getElementsByName('pventa')[0].value  = dataArti.pventa
		document.getElementsByName('ult_fecha_compra')[0].value  = dataArti.ult_fecha_compra
		document.getElementsByName('idArtiAnular')[0].value  = dataArti.id
		
		$("#linea_id").val(_linea_id).trigger('change.select2');
		$("#categoria_id").val(_categoria_id).trigger('change.select2');
		$("#unimedidas_id").val(_unimedidas_id).trigger('change.select2');
		$("#proveedor_id").val(_proveedor_id).trigger('change.select2');

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
	}

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	clearElements(){
		// document.getElementsByName("fecha")[0].value = Date();
		// document.getElementsByName("hora")[0].value = '00:00:00';

		$("#linea_id").val(" ").trigger('change.select2');
		$("#categoria_id").val(" ").trigger('change.select2');
		$("#unimedidas_id").val(" ").trigger('change.select2');
		$("#proveedor_id").val(" ").trigger('change.select2');
	}
	desactivaInput(){
		document.getElementById('referencia').disabled = true
		document.getElementById('descripcion').disabled = true
		document.getElementById('abreviatura').disabled = true 
		document.getElementById('categoria_id').disabled = true
		document.getElementById('linea_id').disabled = true
		document.getElementById('unimedidas_id').disabled = true
		document.getElementById('proveedor_id').disabled = true
		document.getElementById('stock_min').disabled = true
		document.getElementById('stock_max').disabled = true 
		document.getElementById('inv_inicial').disabled = true
		document.getElementById('cant_ajustes').disabled = true
		document.getElementById('existencia').disabled = true
		document.getElementById('pcosto').disabled = true
		document.getElementById('iva').disabled = true
		document.getElementById('pventa').disabled = true
		document.getElementById('ult_fecha_compra').disabled = true

	}
	activaInput(){
		document.getElementById('referencia').disabled = false
		document.getElementById('descripcion').disabled = false
		document.getElementById('abreviatura').disabled = false 
		document.getElementById('categoria_id').disabled = false
		document.getElementById('linea_id').disabled = false
		document.getElementById('unimedidas_id').disabled = false
		document.getElementById('proveedor_id').disabled = false
		document.getElementById('stock_min').disabled = false
		document.getElementById('stock_max').disabled = false
		// document.getElementById('inv_inicial').disabled = false
		// document.getElementById('cant_ajustes').disabled = false
		// document.getElementById('existencia').disabled = false
		document.getElementById('pcosto').disabled = false
		document.getElementById('iva').disabled = false
		document.getElementById('pventa').disabled = false
		// document.getElementById('ult_fecha_compra').disabled = false
	}
	
	eliminarReg(){
			/******************************
			 ELIMINAR REGISTRO 
			 ******************************/
		Swal.fire({
			 title: 'Se ANULARÁ el registro que está en la ventana, Está seguro de Anularlo?',
			 text: "!No podrás revertir el proceso!",
			 icon: 'warning',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Anular',
			 cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					const formEvolQE = document.querySelector('#formEvolDiaria');
					let idEvolMed = document.getElementsByName('idEvolMedica')[0].value
					let data = new FormData()
					data.append("idEvolucion",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
					// "{{ URL::to('/anula-CtrlMed') }}",data, {	
						// anulaControlMedico	
						// URL::To('/anula-CtrlMed')
					const anulaReg = async () => {  
						// var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
						await axios.post(
							"{{ URL::To('/anula-CtrlMed') }}",data, {
							}).then((response) => {
					
								// console.log(response.data['message'])
								console.log(response.data)
						
								document.getElementById('btnDeleteEvol').disabled = true;
								document.getElementById('btnNewEvol').disabled = false;
								document.getElementById('btnCancelEvol').disabled = true;
								document.getElementById('btnSearchEvol').disabled = false;
								document.getElementById('btnSaveEvol').disabled = true;
						
								/*Cuando se busca un registro se cambial atributo del input hidden*/
								let newNom88 = document.getElementById('accionBotones')
								newNom88.setAttribute('accion', "Guardar");
						
								var btnGuardar2 = document.getElementById('btnSaveEvol');
								btnGuardar2.innerHTML = 'Guardar'
								funcLib.desactivaInput();
						
								document.getElementById('textB').innerHTML = 'ANULACION DE EVOLUCION MEDICA'                                
								funcLib.clearElements()	                                
								formEvolQ.reset()                                    
								Swal.fire({
									icon: 'success',
									title: 'PERFECTO',
									text: 'Se ANULO el registro con exito',
									footer: ''
								})
					
							}).catch(function(error) {
								Swal.fire({
									icon: 'error',
									title: 'Error interno',
									text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
										'  ' + error,
									footer: ''
								})
							// console.log(error);
						})
					}
					anulaReg();
				}
			}) 										
	}

}

