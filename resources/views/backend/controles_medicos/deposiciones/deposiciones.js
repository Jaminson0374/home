
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class DeposicionesCtrl {

	validarCampos() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
		let _empleados_id = document.getElementsByName('empleado_id')[0].value
		let _diaCtrl = document.getElementsByName('dia_ctrl')[0].value
		let camposForm = "";
		let campoText = "ok";
		switch (campoText) {
			case _empleados_id:  
				campoText ="Debe seleccionar el cuiador o responsable del control de las deposiciones"
					document.getElementById('empleado_id').focus()
					break;
			case _diaCtrl:
				campoText ="Digite el dia en el cual el usuario realizó las deposiciones"
				document.getElementById('dia_ctrl').focus()
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
		document.getElementsByName('indicaciones')[0].value = dataAsigMed.indicaciones
		document.getElementsByName('idAsignaMedica')[0].value = dataAsigMed.id
		
		let _horaTime = dataAsigMed.horadbf
		document.getElementsByName('horaTime')[0].value = _horaTime.substring(0,2)
		let _minutoTime = dataAsigMed.horadbf
		document.getElementsByName('minutoTime')[0].value = _minutoTime.substring(3,5)
		let _ampmTime = dataAsigMed.horadbf
		document.getElementsByName('ampmTime')[0].value = _ampmTime.substring(6,8)

		// document.querySelector('.horaMuestra').style.display = 'inline'
		// document.querySelector('.horaDbf').style.display = 'none'

		$("#tipoadmin_med_id").val(dataAsigMed.tipoadmin_med_id).trigger('change.tipoadmin_med_id');
		$("#articulos_id").val(dataAsigMed.articulos_id).trigger('change.select2');
		$("#unimedida_id").val(dataAsigMed.unimedida_id).trigger('change.select2');
		$("#horadbf").val(dataAsigMed.horadbf)
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
		// document.getElementsByName("fecha_inicio")[0].value = Date();
		document.getElementsByName("horadbf")[0].value = '';

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
		// document.getElementById('horadbf').disabled = true;
		document.getElementById('indicaciones').disabled = true;
		document.getElementById('horaTime').disabled = true;
		document.getElementById('minutoTime').disabled = true;
		document.getElementById('ampmTime').disabled = true;

	}
	activaInput(){
		document.getElementById('articulos_id').disabled = false;
		document.getElementById('dosis').disabled = false;
		document.getElementById('unimedida_id').disabled = false;
		document.getElementById('pososlogia_t').disabled = false;
		document.getElementById('pososlogia_h_d').disabled = false;
		document.getElementById('tipoadmin_med_id').disabled = false;
		document.getElementById('fecha_inicio').disabled = false;
		// document.getElementById('horadbf').disabled = false;
		document.getElementById('indicaciones').disabled = false;
		document.getElementById('horaTime').disabled = false;
		document.getElementById('minutoTime').disabled = false;
		document.getElementById('ampmTime').disabled = false;
	}
	

	/*Función para concatenar la hora, para guardarla en la dbf*/

	horaText(){
		let hhT = document.getElementsByName('horaTime')[0].value
		let horaT = hhT+":"
		if(hhT < 10){
			horaT = "0"+hhT+":"
		}
		let mmT = document.getElementsByName('minutoTime')[0].value
		let minutoT = mmT+" "
		if(mmT < 10){
			minutoT = "0"+mmT+" " 
		}
		if(mmT ==""){
			minutoT = "00"+mmT+" " 
		}
		console.log('hora:'+horaT+' '+'minutos: '+minutoT)
		let ampmT = document.getElementsByName('ampmTime')[0].value
		document.getElementsByName('horadbf')[0].value = horaT+minutoT+ampmT		
	}

	/*Función para validar la entrada de los valore la hora y de los minutos*/
	horaminutos(){
		$("#horaTime").blur(function(){
            let hTT = document.getElementsByName('horaTime')[0].value
            console.log('hora:'+hTT)
            if (hTT < 0 || hTT > 12 ) {
				document.getElementById('horaTime').focus()
                document.getElementById('btnSaveAdm').disabled = true;

                document.getElementById('message').innerHTML = "Error en la hora establecida, la hora de estar entre 01 y 12"
		        document.querySelector('.message').style.display = 'inline'
            }else{
                document.getElementById('btnSaveAdm').disabled = false;
                document.querySelector('.message').style.display = 'none'
            }            
        })

        $("#minutoTime").blur(function(){
            let mTT = document.getElementsByName('minutoTime')[0].value
            // console.log('minutos:'+mTT)
            if ( mTT < 0 || mTT > 59 ) {
				document.getElementById('minutoTime').focus()
                document.getElementById('btnSaveAdm').disabled = true;
               
                document.getElementById('message').innerHTML = "Error en los Minutos establecidos, Los minutos deben estar entre 00 y 59"
		        document.querySelector('.message').style.display = 'inline'
            }else{

                document.getElementById('btnSaveAdm').disabled = false;
                document.querySelector('.message').style.display = 'none'
            }            
        })		        		
	}

	/*llenar input date con la fecha actual*/
	fecha_actual(){
		var fecha = new Date(); //Fecha actual
		var mes = fecha.getMonth()+1; //obteniendo mes
		var dia = fecha.getDate(); //obteniendo dia
		var ano = fecha.getFullYear(); //obteniendo año
		if(dia<10)
		  dia='0'+dia; //agrega cero si el menor de 10
		if(mes<10)
		  mes='0'+mes //agrega cero si el menor de 10
		document.getElementById('fecha_inicio').value=ano+"-"+mes+"-"+dia;		
	}
	
	/*Función que Convierte la fecha elegida en texto Ej. Domingo 30 de junio de 2023*/
	fechaletras(){
        let fechai = $("#fecha_ingerir").val()
        var meses = [
        "Enero", "Febrero", "Marzo",
        "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre",
        "Noviembre", "Diciembre"]

		const dias_semana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        const date = new Date(fechai);
		let dayText = dias_semana[date.getDay()+1];
        let dia = date.getDate()+1;
        let mes = date.getMonth();
        let yyy = date.getFullYear();
        let fecha_formateada = dayText+' '+dia + ' de ' + meses[mes] + ' de ' + yyy;

        document.getElementById('fechaLetras').innerHTML = fecha_formateada;                		
	}
}

