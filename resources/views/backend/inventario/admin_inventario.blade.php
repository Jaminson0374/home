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
        <div class="col-5">
          <b><h4 class="text-white bg-success">Administración de Evolución Diaria</h2></b>
        </div> 
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::to('/add-cliente-datobasic')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus"></i>Nuevo Usuario-Reserva</a>
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
                <table id="adminClientes" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th class="text-center">ID</th> 
                      <th class="text-center">Documento</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Ult Fecha Evo</th>
                      <th class="text-center">Ult Hora Evo</th>
                      <th class="text-center">Ult Estado Evo</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($listaEvolucion as $key=>$row )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td class="text-left">{{$row->num_documento}}</td>
                        <td>{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="text-center">{{$row->edad}}</td>
                        <td>{{$row->ult_fecha_evo }}</td>
                        <td>{{$row->ult_hora_evo }}</td>
                        <td>{{$row->ult_evolucion }}</td>
                        <td>
                            <a href="{{URL::to('add-evolucion-diaria/'.$row->id)}}" class ="btn btn-primary btn-xs" id="" title="Ingresar, modificar y/o consultar Evolución médica"><i class="fa fa-user-plus" style="color:#f3600b;"></i><i class="fa fa-pencil-alt"></i><i class="fa fa-trash" style="color:#f30b0b;"></i>Evol Med</a>
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
 