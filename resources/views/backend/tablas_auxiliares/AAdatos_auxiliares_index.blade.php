@extends('backend.layouts.app')
@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 mt-2 mb-2 text-center">
      <h5 class="text-white bg-success" style="font-size:3em">Administración General de Datos Auxiliares</h5>> 
   </div>      
  </div>
  <form role="form" name="formClienteAdmin" id="formClienteAdmin" action="">
                    @csrf
    <section class="content">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                      <th>Id</th>  
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Tabla</th>
                      <th class="text-center">Ruta</th>
                      <th class="text-center">Formulario</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datosAuxi as $key=>$row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->descripcion}}</td>
                        <td>{{$row->nombre_tabla}}</td>
                        <td>{{$row->ruta}}</td>
                        <td>{{$row->nombre_formulario}}</td>
                        <td>
                            <a href="{{URL::to($row->ruta)}}" class ="btn btn-primary btn-xs" id="" title="Consultar, Editar o Agregar registro de datos auxiliares"><i class="fa fa-user-plus" style="color:#0bf31e;"></i><i class="fa fa-pencil-alt"><i><i class="fa fa-trash" style="color:#f30b0b;"></i>Empleado</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div> 
      <!-- /.container-fluid -->                    
              
    </section>
    <!-- /.content -->

  </form>
</div>
<script>
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
    //  let btnServicio = document.getElementById('btnServicio');

// window.addEventListener('load', () => {
    async function aplicarServicio(idCliente) {
      // window.location.assign("{{URL::to('/asignar-servicio')}}")
  alert('jdkhaskdhaskhd')
        let data = new FormData();
        // data.append("id", idCliente);

             await axios.get("{{ URL::to('/asignar-servicio1')}}",data,{}).then((resp) => {
                alert('entra')
                    let dataRepuesta = resp.data;

                    console.log(dataRepuesta)
                    alert(dataRepuesta)
                }).catch((error) => {
                  alert(error)  
                  console.log(error);
                })
                // aplicarServicio()
           }
          // })
 
</script>
      // {{-- <script type="text/javascript"> 
      //   window.onload =() => {
      //     let bodyTablaClientes = document.getElementById("bodyTabla");
      //     axios.get("{{URL::to('/admin-clientes')}}").then((res)=>{
      //       //let response =JSON.parse(res.data.costo_servicio);
      //       let data = res.data;
      //      console.log(data);

           
      //       bodyTablaClientes.innerHTML="";
          
      //      for (let datoJson of data){
      //      bodyTablaClientes.innerHTML+=`
      //                 <tr>
      //                   <td>${datoJson.num_documento}</td>
      //                   <td>${datoJson.nombre+" "+datoJson.apellidos}</td>
      //                   <td>${datoJson.edad}</td>                              
      //                   <td>${datoJson.telefonos_user}</td>
      //                   <td">${datoJson.descripcion}</td>
                 
      //                   <td>
      //                       <a href="{{URL::to('/edit-cliente/.${datoJson.id}') }}" class="btn btn-info btn-md">Editar</a>
      //                       <a href="{{URL::to('/delete-cliente/.${datoJson.id}') }}" class ="btn btn-danger btn-md" id="delete_cli">Eliminar</a>
      //                   </td>
      //               </tr>` 

      //      }
      //     }).catch((error)=>{
      //          console.log(error);
      //     })
      //   } 
      //   </script> --}}
       
       {{-- class="text-center" --}}


  @endsection 
 