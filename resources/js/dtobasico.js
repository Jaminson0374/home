window.addEventListener('load', () => {
	formularioDbasic.addEventListener('submit', (e) => {
			e.preventDefault(); // EVITA QUE SE RECARGUE LA PAGINA
            
            console.log(myToken.csrfToken);
            document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            //window.axios = require('axios');

            // window.axios.defaults.headers.common = {
            //     'X-Requested-With': 'XMLHttpRequest',
            //     'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            // };

    axios.post("{{URL::to('/insert-cliente-basicos')}}",{
        headers:{
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN' : myToken.csrfToken,            
        },
        nombre: nombre,
        apellidos: apellidos,
        num_documento: num_documento,								        
    }).then(function(response){
        console.log(response)
    }).catch(function (error){
        // if(error.response.data.errors.name){
                alert('Error')
            //$('#error').text(error.response.data.errors.name[0]);
        // }
    });
})
})

   /*FINAL DE L ATABLA*/

    //         const busquedaClientes = async () => {
    //             await axios.get("{{ URL::to('/buscar-cliente-basicos') }}").then((res) => {
    //                 let data = res.data;
    //                 console.log(data);
    //                 bodyTablaClientes.innerHTML="";
    //                     for (let i = 0; i < data.length; i++) {
    //                          bodyTablaClientes.innerHTML += `
    //                     <tr>
    //                         <td>${i+1}</td>
    //                         <td>${data[i].num_documento}</td>
    //                         <td>${data[i].nombre+" "+data[i].apellidos}</td>
    //                         <td class="text-center">${data[i].edad}</td>                              
    //                         <td>${data[i].telefonos_user}</td>
    //                         <td class="text-center">${data[i].descripcion}</td>
    //                         <td>
    //                             <button type="button" onclick="obtenerRegistro(${data[i].id})" class="btn btn-secondary btnSelect" id="btnSelect" data-dismiss="modal" name="btnSelect">Ok</button>
    //                         </td>
    //                     </tr>`
    //                 }

    //               }).catch((error) => {
    //                 //console.log(error);
    //             })
    //         }
    //         busquedaClientes()
    //     })

    // })

    /*********************************************************************************
     * LLENA LOS CAMPOS DEL FORMULARIO QUE VIENEN DE LA TABLAS DE BUSQUEDA CLIENETS (boton ok)*
     **********************************************************************************/
    // async function obtenerRegistro(idCliente) {
    //     let newVar = idCliente
    //     let data = new FormData();
    //     data.append("id", idCliente);
    //     await axios.post("{{ URL::to('/clienteCli') }}", data, {}).then((resp) => {
    //         let data2 = resp.data;
    //         //console.log(data2);
    //         // llenaCamposEdit = new DatosBasicosClientes()
    //         // llenaCamposEdit.asignaValorEdit(data2)
    //         let i = 0;
    //         document.getElementById('id_tipodoc').value = `${data2[i].id_tipodoc}`
    //         document.getElementById('num_documento').value = `${data2[i].num_documento}`
    //         document.getElementById('nombre').value = `${data2[i].nombre}`
    //         document.getElementById('apellidos').value = `${data2[i].apellidos}`
    //         document.getElementById('nacionalidad_id').value = `${data2[i].nacionalidad_id}`
    //         document.getElementById('departamento_id').value = `${data2[i].departamento_id}`
    //         document.getElementById('ciudad_id').value = `${data2[i].ciudad_id}`
    //         document.getElementById('fecha_nacimiento').value = `${data2[i].fecha_nacimiento}`
    //         document.getElementById('edad').value = `${data2[i].edad}`
    //         document.getElementById('sexo_id').value = `${data2[i].sexo_id}`
    //         document.getElementById('grupoSanguineo_id').value = `${data2[i].grupoSanguineo_id}`
    //         document.getElementById('telefonos_user').value = `${data2[i].telefonos_user}`
    //         document.getElementById('direccion_res').value = `${data2[i].direccion_res}`
    //         document.getElementById('email_user').value = `${data2[i].email_user}`
    //         document.getElementById('fecha_creacion').value = `${data2[i].fecha_creacion}`
    //         document.getElementById('estado_user').value = `${data2[i].estado_user}`
    //         document.getElementById('diagnostico').value = `${data2[i].diagnostico}`
    //         document.getElementById('observacion').value = `${data2[i].observacion}`
    //         document.getElementById('idCliente').value = `${data2[i].id}`

    //         let idNacionalidad = `${data2[i].nacionalidad_id}`
    //         let dpto_id = `${data2[i].departamento_id}`
    //         departamentos(idNacionalidad, dpto_id)

    //         let ciudad_seleEdit = `${data2[i].ciudad_id}`
    //         ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)

    //         changeAttribute = new DatosBasicosClientes()
    //         changeAttribute.accionUpdate()

    //         let accionesAll = "accion_editar"
    //         document.getElementById("accionBotones").value = `${accionesAll}`
    //         cambioTextBoton = new Funciones()
    //         cambioTextBoton.cambioTextBotton('btnSave', 'Guardar', 'Actualizar')
    //         var attrAccion = $("#accionBotones").attr("accion");

    //         let btnDeleteclick1 = document.getElementById('btnDelete')
    //         btnDeleteclick1.disabled = false
    //     }).catch((error) => {
    //         //console.log(error);
    //     })
    // }

    // window.addEventListener('load', () => {
    //     let btnDeleteclick = document.getElementById('btnDelete')
    //     btnDeleteclick.addEventListener('click', () => {
    //         let idCliente2 = document.getElementById('idCliente').value
    //         alert(idCliente2)
    //         btnDeleteclick.disabled = true
    //     })
    // })