/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class EvolucionDiariaMed {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		let _fecha = document.getElementsByName("fecha")[0].value; 
		let _hora = document.getElementsByName("hora")[0].value;
		let _empleado_id = document.getElementsByName("empleado_id")[0].value;
		let _subjetivo  = document.getElementsByName("subjetivo")[0].value;
		let _objetivo = document.getElementsByName("objetivo")[0].value;
		let _signosv_pc = document.getElementsByName("signosv_pc")[0].value;
		let _signosv_fr = document.getElementsByName("signosv_fr")[0].value;
		let _signosv_ta = document.getElementsByName("signosv_ta")[0].value;
		let _signosv_t = document.getElementsByName("signosv_t")[0].value;
		let _signosv_p = document.getElementsByName("signosv_p")[0].value;
		let _estado_sigvitales_id = document.getElementsByName("estado_sigvitales_id")[0].value;
		let _apreciacion = document.getElementsByName("apreciacion")[0].value;	
		let _plan = document.getElementsByName("plan")[0].value;	
		let _recomendaciones = document.getElementsByName("recomendaciones")[0].value;	

		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case _fecha:
				campoText = 'La campos FECHA del control es requerida'
				document.getElementById("fecha").focus()
				break;
			case _hora:
				campoText = 'El campo HORA es requerido'
				document.getElementById("hora").focus()
				break;		
			case _empleado_id:
				campoText = 'Debe seleccionar el profesional que realiza o inspecciona el control'
				document.getElementById("empleado_id").focus()
				break;				
			case _subjetivo:
				campoText = 'El campo SUBJETIVO es requerido'
				document.getElementById("subjetivo").focus()
				break;		
			case _objetivo:
				campoText = 'El campo OBJETIVO es requerido'
				document.getElementById("objetivo").focus()
				break;													
			case _signosv_pc:
				campoText = 'El campo PC (PRESIÓN CARDIACA) es requerido'
				document.getElementById("signosv_pc").focus()
				break;		
			case  _signosv_fr:
				campoText = 'El campo FRECUENCIA RESPITATORIA requerido'
				document.getElementById("signosv_fr").focus()
				break;				
			case  _signosv_ta:
				campoText = 'El campo TENSION ARTERIAL es requerido'
				document.getElementById("signosv_ta").focus()
				break;								
			case  _signosv_t:
				campoText = 'El campo TEMPERATURA CORPORAL es requerido'
				document.getElementById("signosv_t").focus()
				break;			
			case  _signosv_p:
				campoText = 'El campo PESO es requerido'
				document.getElementById("signosv_p").focus()
				break;
			case  _estado_sigvitales_id:
				campoText = 'El campo Diag. Signos Vitales es requerido'
				document.getElementById("estado_sigvitales_id").focus()
				break;
			case _apreciacion:
				campoText = 'El campo APRECIACION es equerido'
				document.getElementById("apreciacion").focus()
				break;				
			case _plan:
				campoText = 'El campo PLAN es requerido'
				document.getElementById("plan").focus()
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
		document.getElementsByName("fecha")[0].value = Date();
		document.getElementsByName("hora")[0].value = '00:00:00';

		$("#empleado_id").val(" ").trigger('change.select2');
	}
	desactivaInput(){
		document.getElementById("fecha").disabled = true;
		document.getElementById("hora").disabled = true;
		document.getElementById("empleado_id").disabled = true;
		document.getElementById("objetivo").disabled = true;
		document.getElementById("subjetivo").disabled = true;
		document.getElementById("signosv_pc").disabled = true;
		document.getElementById("signosv_fr").disabled = true;
		document.getElementById("signosv_ta").disabled = true;
		document.getElementById("signosv_t").disabled = true;
		document.getElementById("signosv_p").disabled = true;
		document.getElementById("estado_sigvitales_id").disabled = true;
		document.getElementById("apreciacion").disabled = true;
		document.getElementById("evolucion_id").disabled = true;
		document.getElementById("plan").disabled = true;
		document.getElementById("recomendaciones").disabled = true;

	}
	activaInput(){
		document.getElementById("fecha").disabled = false;
		document.getElementById("hora").disabled = false;
		document.getElementById("empleado_id").disabled = false;
		document.getElementById("objetivo").disabled = false;
		document.getElementById("subjetivo").disabled = false;
		document.getElementById("signosv_pc").disabled = false;
		document.getElementById("signosv_fr").disabled = false;
		document.getElementById("signosv_ta").disabled = false;
		document.getElementById("signosv_t").disabled = false;
		document.getElementById("signosv_p").disabled = false;
		document.getElementById("evolucion_id").disabled = false;
		document.getElementById("estado_sigvitales_id").disabled = false;
		document.getElementById("apreciacion").disabled = false;
		document.getElementById("plan").disabled = false;
		document.getElementById("recomendaciones").disabled = false;
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

