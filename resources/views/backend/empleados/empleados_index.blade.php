@extends('backend.layouts.app')
@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form role="form" name="formClienteAdmin" id="formClienteAdmin" action="">
                    @csrf
    <section class="content">
      <div class="row pb-2 pt-1">
        <div class="col-5">
          <b><h4 class="text-white bg-success">Administración General de Usuarios</h2></b>
        </div> 
        @if ($sinRegistro)
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::To('/empleadosCreate')}}" title="Crear usuario nuevo Empleado"><i class="fa fa-user-plus"></i>Nuevo Empleado</a>
        </div>                                                 
        @endif        
       </div>      
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
                      <th>DocIdent</th> 
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Edad</th>
                      <th>Telefonos</th>
                      <th class="text-center">Cargo</th> 
                      <th class="text-center">Sexo</th> 
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($empleadoIndex as $key=>$row )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->tipo_doc.' '.$row->num_documento}}</td>
                        <td>{{$row->empleado}}</td>
                        <td>{{$row->edad}}</td>
                        <td>{{$row->telefonos}}</td>
                        <td>{{$row->cargo}}</td> 
                        <td>{{$row->sexo}}</td> 
                        <td>
                            <a href="{{URL::to('/empleadosCreate')}}" class ="btn btn-primary btn-xs" id="" title="Consultar, Agregar, o desactivar empleados"><i class="fa fa-user-plus" style="color:#0bf31e;"></i><i class="fa fa-pencil-alt"><i><i class="fa fa-trash" style="color:#f30b0b;"></i>Empleado</a>
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

       {{-- <script src={{ asset('../resources/js/datos_basicos.js')}}></script> --}}
  
  </form>
</div>
{{-- <script src="{{ asset('/backend/datatable_externa_1_10_20/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('/backend/datatable_externa_1_10_20/popper.min.js') }}"></script>
<script src="{{ asset('/backend/datatable_externa_1_10_20/bootstrap.min.js') }}"></script>
<script src="{{ asset('/backend/datatable_externa_1_10_20/datatables.min.js') }}"></script> --}}
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
 