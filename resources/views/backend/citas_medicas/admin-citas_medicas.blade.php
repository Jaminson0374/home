@extends('backend.layouts.app')
@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('../resources/js/back_off.js') }}"></script>
  {{-- <link rel="stylesheet" href="{{ asset('/backend/datatable_externa_1_10_20/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/backend/datatable_externa_1_10_20/datatables.min.css') }}"> --}}
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form role="form" name="formClienteAdmin" id="formClienteAdmin" action="">
                    @csrf
                    {{-- @method('post') --}}
    <section class="content">
      <div class="row pb-2 pt-1">
        <div class="col-5">
          <b><h4 class="text-white bg-success">Administración General de Citas Médicas</h2></b>
        </div> 
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::to('/add-cliente-datobasic')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus"></i>Nuevo Usuario-Reserva</a>
        </div> 
        {{-- <div class="col-2">   
            <button class="btn btn-primary btn-md" id="btnClientes">Tabla Axios</button>    
        </div>          --}}
      
        <div class="col-2">   
          {{-- <span class="btn btn-success col fileinput-button">
            <a href="{{URL::to('/add-cliente-datobasic')}}"></a>
            <i class="fas fa-plus"></i>
            <span>Nuevo Usuario</span>
          </span>           --}}
          
          {{-- <a class="btn btn-warning" href="{{URL::to('/add-cliente-servicio')}}">Asignar Servicio</a> --}}
        </div> 

        
      </div>      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              {{-- <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="adminClientes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>  
                      <th>DocIdent</th> 
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">EPS</th>   
                      <th class="text-center">Cita más cercana</th>                                          
                      <th class="text-center">Citas Pdte</th>                    
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- @foreach ($all as $key=>$row ) --}}
                    @foreach ($listaCliAll as $key=>$row )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->num_documento}}</td>
                        <td>{{$row->nombre." ".$row->apellidos}}</td>
                        <td>{{$row->edad}}</td>
                        <td class="text-center">{{$row->nom_eps}}</td> 
                        <td>{{$row->cita_cercana}}</td>
                        <td>{{$row->citas_pendientes}}</td>
                        <td>
                          {{-- href="{{route('/open-reservas-servicios',['id'=>$cliente->id])}}" --}}
                            {{-- <a href="{{URL::to('/edit-cliente/'.$row->id) }}" class="btn btn-primary btn-md" title="Editar o consultar este usuario"><i class="fa fa-pen-fancy"></i></a> --}}
                            {{-- <button type="submit" onclick="aplicarServicio(idCli1={{$row->id}})" id="btnServicio" class="btn btn-primary btn-md">Asignar Servicio</button> --}}
                            <a href="{{URL::to('asignar-servicio/'.$row->id)}}" class ="btn btn-primary btn-xs" id="" title="Asignar Servicio, Consultar, Modificar y/o Eliminar Citas médicas"><i class="fa fa-user-plus" style="color:#0bf31e;"></i><i class="fa fa-pencil-alt"><i><i class="fa fa-trash" style="color:#f30b0b;"></i>Servicio</a>
                            {{-- <i class="fa fa-user-plus"></i><i class="fa fa-pen-fancy"><i><i class="fa fa-trash"></i>     --}}
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
 