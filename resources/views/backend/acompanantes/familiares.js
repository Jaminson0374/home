
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class Familiares {
	validarCampos() { //Valida los campos de la entrada de la sesiones en la planilla
		let _tipodocumento_id = document.getElementsByName('tipodocumento_id')[0].value
		let _num_documento = document.getElementsByName('num_documento')[0].value
		let _nombre  = document.getElementsByName('nombre')[0].value
		let _telefonos  = document.getElementsByName('telefonos')[0].value
		
	   let campoText = " ";
	   if (_tipodocumento_id === ""){   
		   campoText ="Seleccione el Tipo de Documento"
		   document.getElementById('tipodocumento_id').focus()
		   }else if(_num_documento === ""){
			   campoText ="Debe ingresar el Documento de Identidad del acompañante"
			   document.getElementById('num_documento').focus()     
			}else if(_nombre === ""){
				campoText ="Ingrese el Nombre y el Apellido del Acompañante"
				document.getElementById('nombre').focus()   			    				          
			}else if(_telefonos === ""){
				campoText ="Ingrese el Teléfon del Acompañante"
				document.getElementById('telefonos').focus()      				          				      				          
		}			
		
		   return campoText;
	} 
   
   captura_datos(dataBrows){
		document.getElementsByName('tipodocumento_id')[0].value = dataBrows.tipodocumento_id
		document.getElementsByName('num_documento')[0].value = dataBrows.num_documento
		document.getElementsByName('nombre')[0].value = dataBrows.nombre
		document.getElementsByName('apellidos')[0].value = dataBrows.apellidos
		document.getElementsByName('telefonos')[0].value = dataBrows. telefonos
		document.getElementsByName('email')[0].value = dataBrows.email
		document.getElementsByName('direccion_res')[0].value = dataBrows.direccion_res
		document.getElementsByName('sexo_id')[0].value = dataBrows.sexo_id
		document.getElementsByName('parentezco')[0].value = dataBrows.parentezco
		document.getElementsByName('tipo_acompanante')[0].value = dataBrows.tipo_acompanante
		document.getElementsByName('observacion')[0].value = dataBrows.observacion
		// $("#sexo_id").val(dataBrows.cuidador_entrega_id).trigger('change.select2');
	}

	showHideElement(hideShow){
		document.querySelector('#tipodocumento_id').style.display = hideShow
		document.querySelector('#num_documento').style.display = hideShow
		document.querySelector('#nombre').style.display = hideShow
		document.querySelector('#apellidos').style.display = hideShow
		document.querySelector('#telefonos').style.display = hideShow
		document.querySelector('#email').style.display = hideShow
		document.querySelector('#direccion_res').style.display = hideShow
		document.querySelector('#sexo_id').style.display = hideShow	
		document.querySelector('#parentezco').style.display = hideShow
		document.querySelector('#tipo_acompanante').style.display = hideShow
		document.querySelector('#observacion').style.display = hideShow
	}
 	
}

