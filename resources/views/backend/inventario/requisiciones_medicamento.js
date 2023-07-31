/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class AdminRequisicion {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		 let _fecha_requisicion = document.getElementsByName('fecha_requisicion')[0].value
		 let _empleados_id = document.getElementsByName('empleados_id')[0].value
		 let _articulos_id = document.getElementsByName('articulos_id')[0].value
		 let _remision = document.getElementsByName('remision')[0].value
		 let _cantidad = document.getElementsByName('cantidad')[0].value
		 let _unimedidas_id = document.getElementsByName('unimedidas_id')[0].value
		 let _existencia_hasta = document.getElementsByName('existencia_hasta')[0].value
		 let _fecha_vencimiento = document.getElementsByName('fecha_vencimiento')[0].value
		 let _ccosto_id = document.getElementsByName('ccosto_id')[0].value	
		 let _lote = document.getElementsByName('lote')[0].value	 
		//  let _consecutivo_r = document.getElementsByName('consecutivo_r')[0].value


		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case  _fecha_requisicion:
				campoText ="Debe seleccionar el FECHA de la requisicion"
				 document.getElementById('fecha_requisicion').focus()
				 break;			
			case  _articulos_id:
				campoText ="Debe seleccionar el MEDIAMENTO de la requisición"
				 document.getElementById('articulos_id').focus()
				 break;
			case  _empleados_id:
				campoText = "Selecione la PERSONA QUE ENTREGA la requisición"
				document.getElementById('empleados_id').focus()
				break;				 
			case  _remision:
				campoText ="digite la REMISION que soporta la requisición"
				document.getElementById('remision').focus()
				break;
			case  _cantidad:
				campoText ="gigite la CANTIDAD del medicamento"
				 document.getElementById('cantidad').focus()
				 break;
			case  _unimedidas_id:
				campoText ="Seleccione la UNIDAD DE MEDIDA  de la cantidad"
				 document.getElementById('unimedidas_id').focus()
				 break;
			case  _existencia_hasta:
				campoText ="digite la fecha HASTA que fecha debe durar la cantidad"
				document.getElementById('existencia_hasta').focus()
				break;
			case  _fecha_vencimiento:
				campoText ="Digite la fecha del vencimiento del medicamento"
				 document.getElementById('fecha_vencimiento').focus()
				 break;
			case  _lote:
				campoText ="Digite el número del LOTE"
				 document.getElementById('lote').focus()
				 break;
			case  _ccosto_id:
				campoText ="Seleccione el C.COSTO de donde proviene la mercancia"
				document.getElementById('ccosto_id').focus()
				break;				 
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataEvol) {
		let i = 0;
		document.getElementsByName("fecha")[0].value = dataEvol.fecha; 
		document.getElementsByName("hora")[0].value = dataEvol.hora;
		document.getElementsByName("diagnostico")[0].value = dataEvol.diagnostico;
		let empleadoid = document.getElementsByName("empleado_id")[0].value = dataEvol.empleado_id;
		document.getElementsByName("signosv_fr")[0].value = dataEvol.signosv_fr;
		document.getElementsByName("signosv_ta")[0].value = dataEvol.signosv_ta;
		document.getElementsByName("signosv_t")[0].value = dataEvol.signosv_t;
		document.getElementsByName("signosv_pc")[0].value = dataEvol.signosv_pc;
		document.getElementsByName("signosv_p")[0].value = dataEvol.signosv_p;
		document.getElementsByName("subjetivo")[0].value = dataEvol.subjetivo;
		document.getElementsByName("objetivo")[0].value = dataEvol.objetivo;		
		document.getElementsByName("estado_sigvitales_id")[0].value = dataEvol.estado_sigvitales_id;
		document.getElementsByName("apreciacion")[0].value = dataEvol.apreciacion;
		document.getElementsByName("plan")[0].value = dataEvol.plan;
		document.getElementsByName("recomendaciones")[0].value =dataEvol.recomendaciones;
		document.getElementsByName("evolucion_id")[0].value = dataEvol.evolucion_id;
		document.getElementsByName("idEvolMedica")[0].value = dataEvol.id;
		
		$('#empleado_id').val(empleadoid).trigger('change.select2');
		// $('#articulo_id').val(art).trigger('change.select2');

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
		document.getElementsByName("fecha_requisicion")[0].value = Date();
		document.getElementsByName("fecha_vencimiento")[0].value = Date();
		
		$("#empleados_id").val(" ").trigger('change.select2');
		$("#articulos_id").val(" ").trigger('change.select2');
		$("#unimedidas_id").val(" ").trigger('change.select2');

	}
	desactivaInput(){
		// window.addEventListener('load', () => {

		document.getElementById('fecha_requisicion').disabled = true;
		document.getElementById('empleados_id').disabled = true;
		document.getElementById('articulos_id').disabled = true;
		document.getElementById('remision').disabled = true;
		document.getElementById('cantidad').disabled = true;
		document.getElementById('unimedidas_id').disabled = true;
		document.getElementById('existencia_hasta').disabled = true;
		document.getElementById('ccosto_id').disabled = true;
		document.getElementById('fecha_vencimiento').disabled = true;
		document.getElementById('lote').disabled = true;		 

	}

	activaInput(){
		document.getElementById('fecha_requisicion').disabled = false;
		document.getElementById('empleados_id').disabled = false;
		document.getElementById('articulos_id').disabled = false;
		document.getElementById('remision').disabled = false;
		document.getElementById('cantidad').disabled = false;
		document.getElementById('unimedidas_id').disabled = false;
		document.getElementById('existencia_hasta').disabled = false;
		document.getElementById('ccosto_id').disabled = false;
		document.getElementById('fecha_vencimiento').disabled = false;
		document.getElementById('lote').disabled = false;		 		 
	}

	tablaRequisicion(){
	$(document).ready(function() {
		//obtenemos el valor de los input
		
		$('#btnSaveTable').click(function() {
		  var nombre = document.getElementById("nombre").value;
		  var apellido = document.getElementById("apellido").value;
		  var cedula = document.getElementById("cedula").value;
		  var i = 1; //contador para asignar id al boton que borrara la fila
		  var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + apellido + '</td><td>' + cedula + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
		
		  i++;
		
		  $('#mytable tr:first').after(fila);
			$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
			var nFilas = $("#mytable tr").length;
			$("#adicionados").append(nFilas - 1);
			//le resto 1 para no contar la fila del header
			document.getElementById("apellido").value ="";
			document.getElementById("cedula").value = "";
			document.getElementById("nombre").value = "";
			document.getElementById("nombre").focus();
		  });
		$(document).on('click', '.btn_remove', function() {
		  var button_id = $(this).attr("id");
			//cuando da click obtenemos el id del boton
			$('#row' + button_id + '').remove(); //borra la fila
			//limpia el para que vuelva a contar las filas de la tabla
			$("#adicionados").text("");
			var nFilas = $("#mytable tr").length;
			$("#adicionados").append(nFilas - 1);
		  });
		});
	}
}

