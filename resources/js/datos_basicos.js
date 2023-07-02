/*************************************************************************************
 
 *************************************************************************************/
 window.addEventListener('load', () => {

    let bodyTablaClientes = document.getElementById("bodyTabla");
    //NO ESTA ENCONTRANDO LA RUTA
    axios.get("{{URL::to('/admin-clientes')}}").then((res)=>{
      //let response =JSON.parse(res.data.costo_servicio);
      let data = res.data;
     console.log(data);

     
      bodyTablaClientes.innerHTML="";
    
     for (let datoJson of data){
     bodyTablaClientes.innerHTML+=`
                <tr>
                  <td>${datoJson.num_documento}</td>
                  <td>${datoJson.nombre+" "+datoJson.apellidos}</td>
                  <td class="text-center">${datoJson.edad}</td>                              
                  <td>${datoJson.telefonos_user}</td>
                  <td class="text-center">${datoJson.descripcion}</td>
           
                  <td>
                      <a href="{{URL::to('/edit-cliente/.${datoJson.id}') }}" class="btn btn-info btn-md">Editar</a>
                      <a href="{{URL::to('/delete-cliente/.${datoJson.id}') }}" class ="btn btn-danger btn-md" id="delete_cli">Eliminar</a>
                  </td>
              </tr>` 

     }
    }).catch((error)=>{
         console.log(error);
    })
  })  //load ;
  
 