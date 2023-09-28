
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class AsigMedicamentoTempo {

	validarCampos() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
		//  let _diagnostico = document.getElementsByName('diagnostico')[0].value
		 let _dosis = document.getElementsByName('dosis')[0].value
		 let _pososlogia_t = document.getElementsByName('pososlogia_t')[0].value
		 let _pososlogia_h_d = document.getElementsByName('pososlogia_h_d')[0].value
		 let _fecha_inicio = document.getElementsByName('fecha_inicio')[0].value
         let _fecha_fin = document.getElementsByName('fecha_fin')[0].value
		 let _hora = document.getElementsByName('hora')[0].value
		 let _indicaciones = document.getElementsByName('indicaciones')[0].value
         let _duracion_dias = document.getElementsByName('duracion_dias')[0].value
         let _personalexterno_id = document.getElementsByName('personalexterno_id')[0].value
         let _dx = document.getElementsByName('dx')[0].value
         
        
		 let _unimedida_id = $("#unimedida_id").val()
		 let _tipoadmin_med_id = $("#tipoadmin_med_id").val();
		 let _articulos_id = $("#articulos_id").val();

		let camposForm = "";
		let campoText = "";
		if (camposForm) {
			}else if(_articulos_id === ""){  
					campoText ="Debe seleccionar el MEDICAMENTO"
					document.getElementById('articulos_id').focus()
			}else if(_dx === ""){  
					campoText ="Digite el diagnóstico DX"
					document.getElementById('dx').focus() 
            }else if(_personalexterno_id === ""){  
					campoText ="Seleccione el médico que autoriza el medicamento"
					document.getElementById('personalexterno_id').focus()                     
                    _personalexterno_id
            }else if(_fecha_inicio === ""){  
                    campoText ="Seleccione la fecha de inicio del tratamiento"
                    document.getElementById('fecha_inicio').focus() 
            }else if(_fecha_fin === ""){  
                    campoText ="Seleccione la fecha de final del tratamiento"
                    document.getElementById('fecha_fin').focus()                                                             
			}else if(_hora === ""){  
				campoText ="Seleccione la hora"
				document.getElementById('hora').focus()
			}else if( _dosis === ""){ 
					campoText ="Digite la DOSIS a suminitrar del medicamento"
					document.getElementById('dosis').focus()
			}else if(  _unimedida_id === ""){ 
					campoText ="Seleccione la UNIDAD DE MEDIDA de la dosis"
					document.getElementById('unimedida_id').focus()
			}else if(_tipoadmin_med_id === ""){  
					campoText = "Seleccion  la vía de administración del medicamento"
					document.getElementById('tipoadmin_med_id').focus()
			}
		return campoText;
	} 
	/******************************************************************************************************
	los valores traen de la busqueda se asigna los valor a cada elemento de del formulario, para editarlos
	******************************************************************************************************/
	asignaValorEdit(dataAsigMed) {
		document.getElementsByName('dosis')[0].value = dataAsigMed.dosis
		document.getElementsByName('pososlogia_t')[0].value = dataAsigMed.pososlogia_t
		document.getElementsByName('pososlogia_h_d')[0].value = dataAsigMed.pososlogia_h_d
		document.getElementsByName('fecha_inicio')[0].value = dataAsigMed.fecha_inicio
		document.getElementsByName('indicaciones')[0].value = dataAsigMed.indicaciones
		document.getElementsByName('idAsignaMedica')[0].value = dataAsigMed.id	
		document.getElementsByName('hora')[0].value = dataAsigMed.hora
        document.getElementsByName('duracion_dias')[0].value = dataAsigMed.duracion_dias 
        document.getElementsByName('dx')[0].value = dataAsigMed.dx
        document.getElementsByName('fecha_fin')[0].value = dataAsigMed.fecha_fin     
		
        $("#personalexterno_id").val(dataAsigMed.personalexterno_id).trigger('change.select2');
		$("#tipoadmin_med_id").val(dataAsigMed.tipoadmin_med_id).trigger('change.tipoadmin_med_id');
		$("#articulos_id").val(dataAsigMed.articulos_id).trigger('change.select2');
		$("#unimedida_id").val(dataAsigMed.unimedida_id).trigger('change.select2');
		$("#hora").val(dataAsigMed.hora)
		// $("$fecha_fin").val(dataAsigMed.fecha_fin)
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
		// document.getElementsByName("hora")[0].value = '';
        $("#personalexterno_id").val(" ").trigger('change.select2');
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
		document.getElementById('indicaciones').disabled = true;
		document.getElementById('hora').disabled = true;
        document.getElementById('duracion_dias').disabled = true;
        document.getElementById('personalexterno_id').disabled = true;
        document.getElementById('dx').disabled = true;
        document.getElementById('fecha_fin').disabled = true;
    }
	activaInput(){
		document.getElementById('articulos_id').disabled = false;
		document.getElementById('dosis').disabled = false;
		document.getElementById('unimedida_id').disabled = false;
		document.getElementById('pososlogia_t').disabled = false;
		document.getElementById('pososlogia_h_d').disabled = false;
		document.getElementById('tipoadmin_med_id').disabled = false;
		document.getElementById('fecha_inicio').disabled = false;
		document.getElementById('indicaciones').disabled = false;
		document.getElementById('hora').disabled = false;
        document.getElementById('duracion_dias').disabled = false;
        document.getElementById('personalexterno_id').disabled = false;
        document.getElementById('dx').disabled = false;
        document.getElementById('fecha_fin').disabled = false;
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

