
/*******************************************************************************************
AQUI COMIENZAN LOS METODOS PARA GUARDAR, EDITAR Y ELIMINAR
*********************************************************************************************/
class Familiares {
	validarCampos() { //Valida los campos de la entrada de la sesiones en la planilla
		let _doc_identidad  = document.getElementsByName('doc_identidad ')[0].value
		let _num_documento = document.getElementsByName('num_documento')[0].value
		let _nombre  = document.getElementsByName('nombre')[0].value
		let _telefonos  = document.getElementsByName('telefonos')[0].value
		
	   let campoText = " ";
	   if (_doc_identidad  === ""){   
		   campoText ="Seleccione el Tipo de Documento"
		   document.getElementById('doc_identidad ').focus()
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
		document.getElementsByName('doc_identidad ')[0].value = dataBrows.doc_identidad 
		document.getElementsByName('num_documento')[0].value = dataBrows.num_documento
		document.getElementsByName('nombre')[0].value = dataBrows.nombre
		document.getElementsByName('apellidos')[0].value = dataBrows.apellidos
		document.getElementsByName('telefonos')[0].value = dataBrows. telefonos
		document.getElementsByName('email')[0].value = dataBrows.email
		document.getElementsByName('direccion_residencial')[0].value = dataBrows.direccion_residencial
		document.getElementsByName('direccion_laboral')[0].value = dataBrows.direccion_laboral
		document.getElementsByName('sexo_id')[0].value = dataBrows.sexo_id
		document.getElementsByName('especialidad_id')[0].value = dataBrows.especialidad_id
		document.getElementsByName('organizacion')[0].value = dataBrows.organizacion
		document.getElementsByName('tprofesional')[0].value = dataBrows.tprofesional
		document.getElementsByName('observacion')[0].value = dataBrows.observacion
		// $("#sexo_id").val(dataBrows.cuidador_entrega_id).trigger('change.select2');
	}

	showHideElement(hideShow){
		document.querySelector('#doc_identidad ').style.display = hideShow
		document.querySelector('#num_documento').style.display = hideShow
		document.querySelector('#nombre').style.display = hideShow
		document.querySelector('#apellidos').style.display = hideShow
		document.querySelector('#telefonos').style.display = hideShow
		document.querySelector('#email').style.display = hideShow
		document.querySelector('#direccion_residencial').style.display = hideShow
		document.querySelector('#sexo_id').style.display = hideShow	
		document.querySelector('#parentezco').style.display = hideShow
		document.querySelector('#tipo_acompanante').style.display = hideShow
		document.querySelector('#observacion').style.display = hideShow
	}
 	
}

