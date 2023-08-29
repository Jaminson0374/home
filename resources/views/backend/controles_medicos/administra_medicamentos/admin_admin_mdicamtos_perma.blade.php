@extends('backend.layouts.app')
@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('../resources/js/back_off.js') }}"></script>
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form role="form" name="formClienteAdmin" id="formClienteAdmin" action="">
                    @csrf
                    {{-- @method('post') --}}
    <section class="content">
      <div class="row pb-2 pt-1">
        <div class="col-7">
          <b><h4 class="text-white bg-success " style="font-size: 1.5em">Administración y Asignación de Medicamentos Permanentes</h2></b>
        </div> 
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::to('/add-cliente-datobasic')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus btn-md"></i>Crear Usuario</a>
        </div> 
      
      </div>      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover" style="width: 100%">
                    <thead>
                    <tr>
                      <th class="text-center">#</th> 
                      <th class="text-center">Documento</th>
                      <th class="text-center"> Nombre y Apellidos  </th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Ult Fe admin</th>
                      <th class="text-center">Ult Hora admin</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($clientesAdminMed as $key=>$row )
                    <tr style="height: 2px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_fecha_admin_med }}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_hora_admin_med}}</td> 
                        <td>
                            <a href="{{URL::to('admin-medicamentos_perm/'.$row->id)}}" class ="btn btn-primary btn-md" id="" title="Ingresar, modificar y/o consultar la Administración permanentes de medicamentos asignado"><i class="fa fa-user-plus"></i>Admin</a>
                            <a href="{{URL::to('asignar-medicamentos/'.$row->id)}}" class ="btn btn-primary bg bg-success btn-md" id="" title="Asignación de los medicamentos permanentes del usuario"><b>Asignar</b></a>
                        </td>
                    </tr>
                    {{-- style="color:#f3600b;"></i><i class="fa fa-pencil-alt"></i><i class="fa fa-trash" style="color:#f30b0b;" --}}
                    
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


  @endsection 
 