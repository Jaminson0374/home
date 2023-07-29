/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class AdminMedicamento {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		 let _articulos_id = document.getElementsByName('articulos_id')[0].value
		 let _nombre_tratamiento = document.getElementsByName('nombre_tratamiento')[0].value
		 let _duracion_dias = document.getElementsByName('duracion_dias')[0].value
		 let _indefinido = document.getElementsByName('indefinido')[0].value //indefinido
		 let _dosis = document.getElementsByName('dosis')[0].value
		 let _unimedidas_id = document.getElementsByName('unimedidas_id')[0].value
		 let _pososlogia_t = document.getElementsByName('pososlogia_t')[0].value
		 let _pososlogia_h_d = document.getElementsByName('pososlogia_h_d')[0].value
		 let _tipoadmin_med_id = document.getElementsByName('tipoadmin_med_id')[0].value
		 let _fecha_inicio = document.getElementsByName('fecha_inicio')[0].value
		 let _empleados_id = document.getElementsByName('empleados_id')[0].value
		 let _hora_administracion = document.getElementsByName('hora_administracion')[0].value
		 let _suspendido = document.getElementsByName('suspendido')[0].value
		 let _motivo_suspen = document.getElementsByName('motivo_suspen')[0].value
		 let _finalizar_admin = document.getElementsByName('finalizar_admin')[0].value
		 let _indicaciones = document.getElementsByName('indicaciones')[0].value

		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case  _articulos_id:
				campoText ="Debe seleccionar el MEDIAMENTO"
				 document.getElementById('articulos_id').focus()
				 break;
			case  _nombre_tratamiento:
				campoText ="Escriba el nombre del TRATAMIENTO"
				 document.getElementById('nombre_tratamiento').focus()
				 break;
			case  _duracion_dias:
				campoText ="Especifique la DURACION"
				 document.getElementById('duracion_dias').focus()
				 break;
			case  _dosis:
				campoText ="Digite la DOSIS a suminitrar del medicamento"
				document.getElementById('dosis').focus()
				break;
			case  _unimedidas_id:
				campoText ="Seleccione la UNIDAD DE MEDIDA del la dosis del medicamento"
				 document.getElementById('unimedidas_id').focus()
				 break;
			case  _pososlogia_t:
				campoText ="Especifique CADA cuento tiempo suministrará el medicamento"
				 document.getElementById('pososlogia_t').focus()
				 break;
			case  _pososlogia_h_d:
				campoText="Seleccion HORA/DIA del intervalo de suministro de CADA administración"
				 document.getElementById('pososlogia_h_d').focus()
				 break;
			case  _tipoadmin_med_id:
				campoText = "Seleccion  la vía de administración del medicamento"
				 document.getElementById('tipoadmin_med_id').focus()
				 break;
			case  _fecha_inicio:
				campoText ="Especifique la FECHA en la que inicia el tratamiento"
				 document.getElementById('fecha_inicio').focus()
				 break;
			case  _empleados_id:
				campoText = "Selecione el/la PROFESIONAL o auxiliar encargado(a) de la administración"
				 document.getElementById('empleados_id').focus()
				 break;
			case  _hora_administracion:
				campoText ="Selecicone la HORA en la que se debe suministrar el medicamento "
				 document.getElementById('hora_administracion').focus()
				 break;
			case  _suspendido:
				campoText = "Especifique  si, Si o No se SUSPENDIÓ el medicamento"
				  document.getElementById('customRadio2').focus()
				  break;
			case  _motivo_suspen:
				if(_suspendido == "off"){
					campoText ="Debe escribir el MOTIVO pr el cual fue suspendido el medicamento"
					document.getElementById('motivo_suspen').focus()
				}
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
		document.getElementsByName("fecha_inicio")[0].value = Date();
		document.getElementsByName("hora_administracion")[0].value = '00:00:00';

		$("#empleados_id").val(" ").trigger('change.select2');
		$("#articulos_id").val(" ").trigger('change.select2');
		$("#unimedidas_id").val(" ").trigger('change.select2');

	}
	desactivaInput(){
		// window.addEventListener('load', () => {
		// document.getElementById('datosbasicos_id').disabled = true;
		document.getElementById('articulos_id').disabled = true;
		document.getElementById('nombre_tratamiento').disabled = true;
		document.getElementById('duracion_dias').disabled = true;
		document.getElementById('customCheckbox2').disabled = true; //indefinido
		document.getElementById('dosis').disabled = true;
		document.getElementById('unimedidas_id').disabled = true;
		document.getElementById('pososlogia_t').disabled = true;
		document.getElementById('pososlogia_h_d').disabled = true;
		document.getElementById('tipoadmin_med_id').disabled = true;
		document.getElementById('fecha_inicio').disabled = true;
		document.getElementById('empleados_id').disabled = true;
		document.getElementById('hora_administracion').disabled = true;
		document.getElementById('customRadio1').disabled = true;
		document.getElementById('customRadio2').disabled = true;
		document.getElementById('motivo_suspen').disabled = true;
		document.getElementById('indicaciones').disabled = true;

		// document.getElementById('observacion').disabled = true;
		// document.getElementById('anulado').disabled = true;
		// })
	}
	activaInput(){
		document.getElementById('articulos_id').disabled = false;
		document.getElementById('nombre_tratamiento').disabled = false;
		document.getElementById('duracion_dias').disabled = false;
		document.getElementById('customCheckbox2').disabled = false; //indefinido
		document.getElementById('dosis').disabled = false;
		document.getElementById('unimedidas_id').disabled = false;
		document.getElementById('pososlogia_t').disabled = false;
		document.getElementById('pososlogia_h_d').disabled = false;
		document.getElementById('tipoadmin_med_id').disabled = false;
		document.getElementById('fecha_inicio').disabled = false;
		document.getElementById('empleados_id').disabled = false;
		document.getElementById('hora_administracion').disabled = false;
		document.getElementById('customRadio1').disabled = false;
		document.getElementById('customRadio2').disabled = false;
		document.getElementById('motivo_suspen').disabled = false;
		document.getElementById('indicaciones').disabled = false;
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

