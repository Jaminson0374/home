import './bootstrap';
/*************************************************************************************
   
 *************************************************************************************/
window.addEventListener('load', () => {
    // $('#tabla_busquedaMov').DataTable().clear().destroy();
         /*  let inputTipoGasto = document.getElementById("inputTipoGasto");
           let inputConsecutivo = document.getElementById("inputConsecutivo");
           let inputDocument  	 = document.getElementById("inputDocument");
           let inputFecha 		 = document.getElementById("inputFecha");
           let inputNitCedula   = document.getElementById("inputNitCedula");
           let inputConcepto 	 = document.getElementById("inputConcepto");
           let inputVlrTotal 	 = document.getElementById("inputVlrTotal");*/
           let btnClientes     = document.getElementById("btnClientes")
        // let seleBtn = document.getElementById("btnSelect")
  
  

        let bodyTablaClientes = document.querySelector("#res");
  
 
     
           btnClientes.addEventListener('click', () => {

             const tablaClientesServicios = async () => {
              $("#example1").dataTable().fnDestroy();
              try {
                const resPhp = await axios("http://localhost/funda_roca/app/Http/Controllers/backend/ClientesController.php");
  
                  json = await resPhp
                     // console.log(json.data)
  
                  bodyTablaClientes.innerHTML="";
                  $("#example1").dataTable().fnDestroy();
                 for (let datoJson of json.data){
                    let nitDv = datoJson.documento+"-"+datoJson.dv
                    bodyTablaClientes.innerHTML+=`
                        <tr>
                            <td>{datoJson.num_documento}</td>
                            <td>{datoJson.nombre." ".datoJson.apellidos}</td>
                            <td class="text-center">{datoJson.edad}</td>
                            <td>{datoJson.telefonos_user}</td>
                            <td class="text-center">{datoJson.num_documento}</td> 
                            // <td class="text-center">{$row->tipoServicios->descripcion}</td> 
                            <td>
                            <a href="{{URL::to('/edit-cliente/'.$row->id) }}" class="btn btn-info btn-md">Editar</a>
                            <a href="{{URL::to('/delete-cliente/'.$row->id) }}" class ="btn btn-danger btn-md" id="delete_cli">Eliminar</a>
                            </td>                        
                   
                        </tr>`                      
                 }
   

               } catch (err) {
                      
              }
              
          }
        
           tablaClientesServicios();  
  
        })        
  

  
    
   })  //load ;
  
 