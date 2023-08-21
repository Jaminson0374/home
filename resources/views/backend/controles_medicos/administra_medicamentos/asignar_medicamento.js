/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class AsigMedicamento {

	validarCampos2() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
 		let campoText = "";

		 let _articulos_id = document.getElementsByName('articulos_id')[0].value
		 let _diagnostico = document.getElementsByName('diagnostico')[0].value
		 let _dosis = document.getElementsByName('dosis')[0].value
		 let _unimedida_id = document.getElementsByName('unimedida_id')[0].value
		 let _pososlogia_t = document.getElementsByName('pososlogia_t')[0].value
		 let _pososlogia_h_d = document.getElementsByName('pososlogia_h_d')[0].value
		 let _tipoadmin_med_id = document.getElementsByName('tipoadmin_med_id')[0].value
		 let _fecha_inicio = document.getElementsByName('fecha_inicio')[0].value
		 let _hora = document.getElementsByName('hora')[0].value
		 let _indicaciones = document.getElementsByName('indicaciones')[0].value

		 // let datosbasicos_id = document.getElementsByName('datosbasicos_id')[0].value;

		// var campoText="";
		let camposForm = "";

		switch (camposForm) {
			case  _articulos_id:
				campoText ="Debe seleccionar el MEDIAMENTO"
				 document.getElementById('articulos_id').focus()
				 break;
			case  _dosis:
				campoText ="Digite la DOSIS a suminitrar del medicamento"
				document.getElementById('dosis').focus()
				break;
			case  _unimedida_id:
				campoText ="Seleccione la UNIDAD DE MEDIDA del la dosis del medicamento"
				 document.getElementById('unimedida_id').focus()
				 break;
			// case  _pososlogia_t:
			// 	campoText ="Especifique CADA cuento tiempo suministrará el medicamento"
			// 	 document.getElementById('pososlogia_t').focus()
			// 	 break;
			// case  _pososlogia_h_d:
			// 	campoText="Seleccion HORA/DIA del intervalo de suministro de CADA administración"
			// 	 document.getElementById('pososlogia_h_d').focus()
			// 	 break;
			case  _tipoadmin_med_id:
				campoText = "Seleccion  la vía de administración del medicamento"
				 document.getElementById('tipoadmin_med_id').focus()
				 break;
			case  _hora:
				campoText ="Selecicone la HORA en la que se debe suministrar el medicamento "
				 document.getElementById('hora').focus()
				 break;
		}
		return campoText;

	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataAsigMed) {
		let i = 0;

		// document.getElementsByName('articulos_id')[0].value = dataAsigMed.articulos_id
		document.getElementsByName('dosis')[0].value = dataAsigMed.dosis
		// document.getElementsByName('unimedida_id')[0].value = dataAsigMed.unimedida_id
		document.getElementsByName('pososlogia_t')[0].value = dataAsigMed.pososlogia_t
		document.getElementsByName('pososlogia_h_d')[0].value = dataAsigMed.pososlogia_h_d
		// document.getElementsByName('tipoadmin_med_id')[0].value = dataAsigMed.tipoadmin_med_id
		document.getElementsByName('fecha_inicio')[0].value = dataAsigMed.fecha_inicio
		// document.getElementsByName('hora')[0].value = dataAsigMed.hora
		document.getElementsByName('indicaciones')[0].value = dataAsigMed.indicaciones
		document.getElementsByName('idAsignaMedica')[0].value = dataAsigMed.id
		
		$("#tipoadmin_med_id").val(dataAsigMed.tipoadmin_med_id).trigger('change.tipoadmin_med_id');
		$("#articulos_id").val(dataAsigMed.articulos_id).trigger('change.select2');
		$("#unimedida_id").val(dataAsigMed.unimedida_id).trigger('change.select2');
		$("#hora").val(dataAsigMed.hora)
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
		document.getElementsByName("hora")[0].value = '00:00:00';

		$("#tipoadmin_med_id").val(" ").trigger('change.tipoadmin_med_id');
		$("#articulos_id").val(" ").trigger('change.select2');
		$("#unimedida_id").val(" ").trigger('change.select2');

	}
	desactivaInput(){
		document.getElementById('articulos_id').disabled = true;
		document.getElementById('dosis').disabled = true;
		document.getElementById('unimedida_id').disabled = true;
		document.getElementById('pososlogia_t').disabled = true;
		document.getElementById('pososlogia_h_d').disabled = true;
		document.getElementById('tipoadmin_med_id').disabled = true;
		document.getElementById('fecha_inicio').disabled = true;
		document.getElementById('hora').disabled = true;
		document.getElementById('indicaciones').disabled = true;
	}
	activaInput(){
		document.getElementById('articulos_id').disabled = false;
		document.getElementById('dosis').disabled = false;
		document.getElementById('unimedida_id').disabled = false;
		document.getElementById('pososlogia_t').disabled = false;
		document.getElementById('pososlogia_h_d').disabled = false;
		document.getElementById('tipoadmin_med_id').disabled = false;
		document.getElementById('fecha_inicio').disabled = false;
		document.getElementById('hora').disabled = false;
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
