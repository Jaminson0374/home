                                   onclick="obtenerRegistro(${celda}, ${data[i].id}, ${data[i].id_tipodoc}, ${data[i].num_documento}, 
                                   ${data[i].nombre}, ${data[i].apellidos}, ${data[i].nacionalidad_id}, ${data[i].departamento_id},
                                   ${data[i].ciudad_id}, ${data[i].fecha_nacimiento}, ${data[i].edad}, ${data[i].sexo_id},
                                   ${data[i].grupoSanguineo_id}, ${data[i].telefonos_user}, ${data[i].direccion_res}, ${data[i].email_user},
                                   ${data[i].fecha_creacion}, ${data[i].estado_user}, ${data[i].diagnostico}, ${data[i].observacion})

                                    idCliente=${data[i].id}     
                                    id_tipodoc	= ${data[i].id_tipodoc} num_documento = ${data[i].num_documento} nombre = ${data[i].nombre}
                                    apellidos = ${data[i].apellidos} nacionalidad_id = ${data[i].nacionalidad_id} departamento_id = ${data[i].departamento_id}
                                    ciudad_id = ${data[i].ciudad_id} fecha_nacimiento = ${data[i].fecha_nacimiento}
                                    edad = ${data[i].edad} sexo_id = ${data[i].sexo_id} grupoSanguineo_id = ${data[i].grupoSanguineo_id}
                                    telefonos_user = ${data[i].telefonos_user} direccion_res = ${data[i].direccion_res}
                                    email_user	= ${data[i].email_user} fecha_creacion	= ${data[i].fecha_creacion} 
                                    estado_user	= ${data[i].estado_user} diagnostico = ${data[i].diagnostico} observacion = ${data[i].observacion}


                                    id, id_tipodoc, num_documento, nombre, apellidos, nacionalidad_id, departamento_id,
ciudad_id, fecha_nacimiento, edad, sexo_id , grupoSanguineo_id, telefonos_user,
direccion_res, email_user, fecha_creacion, estado_user, diagnostico, observacion

                                                // document.getElementById('id_tipodoc').value =id_tipodoc
                                                // document.getElementById('num_documento').value = {$datoJson.num_documento}
                                                // document.getElementById('nombre').value = {$datoJson.nombre}
                                                // document.getElementById('apellidos').value = {$datoJson.apellidos}
                                                // document.getElementById('nacionalidad_id').value = {$datoJson.nacionalidad_id}
                                                // document.getElementById('departamento_id').value = {$datoJson.departamento_id}
                                                // document.getElementById('ciudad_id').value = {$datoJson.ciudad_id}
                                                // document.getElementById('fecha_nacimiento').value = {$datoJson.fecha_nacimiento}
                                                // document.getElementById('edad').value = {$datoJson.edad}
                                                // document.getElementById('sexo_id').value = {$datoJson.sexo_id}
                                                // document.getElementById('grupoSanguineo_id').value = {$datoJson.grupoSanguineo_id}
                                                // document.getElementById('telefonos_user').value = {$datoJson.telefonos_user}
                                                // document.getElementById('direccion_res').value = {$datoJson.direccion_res}
                                                // document.getElementById('email_user').value = {$datoJson.email_user}
                                                // document.getElementById('fecha_creacion').value = {$datoJson.fecha_creacion}
                                                // document.getElementById('estado_user').value = {$datoJson.estado_user}
                                                // document.getElementById('diagnostico').value = {$datoJson.diagnostico} 

                            bodyTablaDtBasic.innerHTML+=`
                                <tr>
                                    <td>${celda}</td>
                                    <td>${data[i].num_documento}</td>
                                    <td>${data[i].nombre+" "+data[i].apellidos}</td>
                                    <td class="text-center">${data[i].edad}</td>                              
                                    <td>${data[i].telefonos_user}</td>
                                    <td class="text-center">${data[i].descripcion}</td>
                                    <td>
                                        <button type="button" onclick="obtenerRegistro(${data[i].id})" class="btn btn-secondary btnSelect" id="btnSelect" nombre=${data[i].nombre} numeFila = ${celda} data-dismiss="modal" value= ${celda} name="btnSelect">Ok</button>
                                    </td>
                                </tr>` 
                                celda =celda+1

                                           // alert(idCliente)
            // var myString ="";
            // myString = idCliente.toString();
            // //typeof myString;    
            // let _url = ""
            // _url = _url + '/cliente-editar/'+myString 
            // console.log(_url)

            // var jam = "{{URL::to(`${_url}`)}}"
            // console.log(jam)


               // if (idCliente === undefined) {
    //     alert('indefinisa')
    // }else{
    //     alert('indefinkkkkkkkkkkkkkisa')


           // let btnSearch = document.getElementById('btnSave');
            //     alert(btnSearch.innerHTML)
            // document.getElementById("accionBotones").value = "accion_editar";
            // cambioTextBotton = new Funciones()
            // cambioTextBotton.cambioTextBotton('btnSave','Guardar', 'Actualizar') 

                   'Authorization'
     ] = `Bearer ${localStorage.getItem('LOCAL_STORAGE_API_KEY')}`; 
      return data;
      const myToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				console.log(myToken);

    axiosToken(myToken){
		const instance = axios.create({
			baseURL: 'https://example.com/api/',
			timeout: 1000,
			headers: {'Authorization': 'Bearer '+myToken}
		  });
	}

    	ValueCampos() {
		let id_tipodoc = document.getElementsByName("id_tipodoc")
		let num_documento = document.getElementsByName("num_documento")
		let nombre = document.getElementsByName("nombre")
		let apellidos = document.getElementsByName("apellidos")
		let nacionalidad_id = document.getElementsByName("nacionalidad_id")
		let departamento_id = document.getElementsByName("departamento_id")
		let ciudad_id = document.getElementsByName("ciudad_id")
		let fecha_nacimiento = document.getElementsByName("fecha_nacimiento")
		let edad = document.getElementsByName("edad")
		let sexo_id = document.getElementsByName("sexo_id")
		let grupoSanguineo_id = document.getElementsByName("grupoSanguineo_id")
		let telefonos_user = document.getElementsByName("telefonos_user")
		let direccion_res = document.getElementsByName("direccion_res")
		let email_user = document.getElementsByName("email_user")
		let fecha_creacion = document.getElementsByName("fecha_creacion")
		let estado_user = document.getElementsByName("estado_user")
		let diagnostico = document.getElementsByName("diagnostico")
        }

        
       //  $('#staticBackdrop').on('show.bs.modal', function (event) {
    //     alert('jaminson')
    //     var button = $(event.relatedTarget) // Button that triggered the modal
    //     var recipient = button.data('whatever') // Extract info from data-* attributes
    //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //     var modal = $(this)
    //     modal.find('.modal-title').text('New message to ' + recipient)
    //     modal.find('.modal-body input').val(recipient)
    //    // $('#exampleModal .modal-dialog').draggable({handle: ".modal-header"})
    // })

                           // textMens ="accion_actualizar"
                        // document.getElementById('accionBotones').value = `${textMens}`
                        
                        // document.getElementById('btnSave').id = 'btnUpdate';
                        // $(".previsualizar").attr("src",rutaImagen);
                        // var idProducto = $(this).attr("idProducto");
                        // document.getElementById('accionBotones').setAttribute('accion', 'Actualizar');
                        // document.getElementById("imagenid").src="../valorAcambiar/nombre.png";
           
           console.log(attrAccion2)
            // let newNomSave = document.getElementById('accionBotones')
            // newNomSave.getAttribute('accion').value
            // console.log('jaminson->'+newNomSave)

        /******************************************************************************************
            ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS - UPDATE
        ********************************************************************************************/
     let formularioDbasicUpdate = document.getElementById('formularioDbasic');
    formularioDbasicUpdate.addEventListener('submit', (e) => {
        e.preventDefault(); 
        selectorGuardar = document.getElementById('btnSave')
        selectorGuardar.addEventListener("click", () => {
 
                let newNomUpdate = $("#btnSave").attr("accion");
                console.log(newNomUpdate)

                if (newNomUpdate == 'Actualizar') {
                    let validarCampos2 = new formularioDbasicUpdate()
                    let validaOk2 = validarCampos.validarCampos()

                    if (validaOk2 === "") {
                        // si no hay campos vacíos
                        let data = new FormData(formularioDbasicUpdate);
                        console.log(data)

                        axios.post("{{ URL::to('/clienteCliUpdate') }}", data, {}).then((
                            resp) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'PERFECTO',
                                text: 'El registro se ACTUALIZÓ con exito',
                                footer: ''
                            })
                            formularioDbasic.reset()
                        }).catch(function(error) {
                            //alert('jaminson19')
                            console.log(error);
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'El Formulario Tiene Datos Incompletos *',
                            text: validaOk,
                            footer: ''
                        })
                    }
                }else {
                    console.log('mal')
                }                
            })
        })