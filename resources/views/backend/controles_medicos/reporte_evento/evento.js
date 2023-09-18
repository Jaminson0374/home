
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class EventoAdverso {

	validarEventoCampos() { //Valida los campos de la entrada de la sesiones en la planilla
		let _fecha = document.getElementsByName('fecha')[0].value
		let _hora = document.getElementsByName('hora')[0].value
		// let _horaTime = document.getElementsByName('horaTime')[0].value
		// let _ampmTime = document.getElementsByName('ampmTime')[0].value
		let _personalexterno_id  = document.getElementsByName('personalexterno_id')[0].value
		let _descripcion  = document.getElementsByName('descripcion')[0].value
		let _empleado_id  = document.getElementsByName('empleado_id')[0].value
		let _entidadremitente_id  = document.getElementsByName('entidadremitente_id')[0].value
		let _acompanante_id   = document.getElementsByName('acompanante_id')[0].value

		
	   let campoText = " ";
	   if (_fecha === ""){   
		   campoText ="Seleccione la fecha evento"
		   document.getElementById('fecha').focus()
		   }else if(_hora === ""){
			   campoText ="Debe ingresar la hora del evento"
			   document.getElementById('hora').focus()      				          
			// }else if(_horaTime === ""){
			// 	campoText ="Debe ingresar la hora de aplicación de la sesión"
			// 	document.getElementById('horaTime').focus()      				          
			// }else if(_ampmTime === ""){
			// 	campoText ="Seleccione Am o Pm dependiendo de la hora ingresada"
			// 	document.getElementById('ampmTime').focus()
         				      				          	          				      				          
			}else if(_entidadremitente_id === ""){
				campoText ="Seleccione el Cuidador de turno del usuario"
				document.getElementById('entidadremitente_id').focus()      				          				      				          
			}else if(_personalexterno_id === ""){
				campoText ="Seleccione el profesional"
				document.getElementById('personalexterno_id').focus()      	
			}else if(_empleado_id === ""){
				campoText ="Seleccione el Cuidador de turno del usuario"
				document.getElementById('empleado_id').focus()   
			}else if(_acompanante_id === ""){
				campoText ="Seleccione el familiar o encargado del usuaeio"
				document.getElementById('acompanante_id').focus()      					   						
		}			
		
		   return campoText;
   } 
   
   cleae_element(){
	// document.getElementsByName('sesion')[0].value
    document.getElementsByName('fecha')[0].value = " "
    // document.getElementsByName('sesion')[0].value = " "
    document.getElementsByName('hora')[0].value = " "
    // document.getElementsByName('minutoTime')[0].value = " "
    // document.getElementsByName('ampmTime')[0].value = " "
    document.getElementsByName('personalexterno_id')[0].value = " "
    document.getElementsByName('descripcion')[0].value = " "
    document.getElementsByName('empleado_id')[0].value = " " 
    document.querySelector('#btnSaveAdm').style.display = 'none'
    document.querySelector('#btnCancelAdm').style.display = 'inline'

   }
	/*Función para concatenar la hora, para guardarla en la dbf*/

	horaText(horas,minutos,ampm){
		let horaT = horas+":"
		if(horas < 10){
			horaT = "0"+horas+":"
		}
		let minutoT = minutos+" "
		if(minutos < 10){
			minutoT = "0"+minutos+" " 
		}
		if(minutos ==""){
			minutoT = "00"+minutos+" " 
		}
		console.log('hora:'+horaT+' '+'minutos: '+minutoT)
		let _horaConcat = horaT+minutoT+ampm
		return _horaConcat;		
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

