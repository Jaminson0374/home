
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class VisitasMedicas {

	validarCampos() { //SE GUARDA EN VARIABLE EL CONTENIDO DE CADA ID (NAM DEL INPUT), PARA LUEGO GUARDARLO EN LA DBF
		 let _fecha = document.getElementsByName('fecha')[0].value
		//  let _observaciones = document.getElementsByName('observaciones')[0].value
		 let _horaTime = document.getElementsByName('horaTime')[0].value
		 let _minutoTime = document.getElementsByName('minutoTime')[0].value
		 let _ampmTime = document.getElementsByName('ampmTime')[0].value
		 let _empleado_id = document.getElementsByName('empleado_id')[0].value
		 let _personalexterno_id = document.getElementsByName('personalexterno_id')[0].value

		let camposForm = "";
		let campoText = " ";
		if (camposForm) {
            }else if(_fecha === ""){
                campoText ="Debe seleccionar el fecha de la visita"
                document.getElementById('fecha').focus()                
			}else if(_horaTime === ""){  
				campoText ="Digite la hora"
				document.getElementById('horaTime').focus()
			}else if(_ampmTime === ""){  
				campoText ="Debe seleccionar AM o PM"
				document.getElementById('ampmTime').focus()
            }else if(_personalexterno_id === ""){  
					campoText ="Debe seleccionar Profesional que lo visita"
					document.getElementById('personalexterno_id').focus()                    
			}else if(_empleado_id === ""){ 
					campoText ="Selecion el cuidador"
					document.getElementById('empleado_id').focus()
			}
		return campoText;
	} 

	accionConsulta(){
		let saveAccion = "Actualizar"
		let newNom100 = document.getElementById('accionBotones')
		newNom100.setAttribute('accion', `${saveAccion}`);
	}
	
	clearElements(){

	}
	desactivaInput(){


	}
	activaInput(){

	}
	

	/*Función para concatenar la hora, para guardarla en la dbf*/

	horaText(){
		let hhT = document.getElementsByName('horaTime')[0].value
		let ampm2 ="";
		let horaT = hhT+":"
		if(hhT < 10){
			horaT = "0"+hhT+":"
			// ampm2="AM";
		}
		// if(hhT > 12){
		// 	ampm2="PM";
		// }		
		let mmT = document.getElementsByName('minutoTime')[0].value
		let minutoT = mmT+" "
		if(mmT < 10){
			minutoT = "0"+mmT+" " 
		}
		if(mmT ==""){
			minutoT = "00"+mmT+" " 
		}
		// console.log('hora:'+horaT+' '+'minutos: '+minutoT)
		let ampmT = document.getElementsByName('ampmTime')[0].value
		document.getElementsByName('hora')[0].value = horaT+minutoT+ampmT		
		// document.getElementsByName('hora')[0].value = horaT+minutoT+ampm2	
	}

	/*Función para validar la entrada de los valore la hora y de los minutos*/
	horaminutos(){
		$("#horaTime").blur(function(){
            let hTT = document.getElementsByName('horaTime')[0].value
            // console.log('hora:'+hTT)
            if (hTT < 0 || hTT > 12 ) {
				document.getElementById('horaTime').focus()
                document.getElementById('enviar').disabled = true;

                document.getElementById('message').innerHTML = "Error en la hora establecida, la hora de estar entre 01 y 12"
		        document.querySelector('.message').style.display = 'inline'
            }else if(hTT ===""){
				document.getElementById('horaTime').focus()
                document.getElementById('enviar').disabled = true;

                document.getElementById('message').innerHTML = "Error digite las hora"
		        document.querySelector('.message').style.display = 'inline'			
			}else{
                document.getElementById('enviar').disabled = false;
                document.querySelector('.message').style.display = 'none'
            }            
        })

        $("#minutoTime").blur(function(){
            let mTT = document.getElementsByName('minutoTime')[0].value
            // console.log('minutos:'+mTT)
            if ( mTT < 0 || mTT > 59 ) {
				document.getElementById('minutoTime').focus()
                document.getElementById('enviar').disabled = true;
               
                document.getElementById('message').innerHTML = "Error en los Minutos establecidos, Los minutos deben estar entre 00 y 59"
		        document.querySelector('.message').style.display = 'inline'
            }else{

                document.getElementById('enviar').disabled = false;
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
		document.getElementsByName('fecha')[0].value=ano+"-"+mes+"-"+dia;		
	}
	
	/*Función que Convierte la fecha elegida en texto Ej. Domingo 30 de junio de 2023*/
	fechaletras(){
        let fechai = $("#fecha").val()
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

