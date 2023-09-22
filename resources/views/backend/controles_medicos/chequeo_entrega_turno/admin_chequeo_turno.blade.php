@extends('backend.layouts.app')
@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <script src="{{ asset('../resources/js/back_off.js') }}"></script> --}}
</head>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form role="form" name="formClienteAdmin" id="formClienteAdmin" action="">
                    @csrf
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body" style="background-color: rgb(132, 255, 0)">
                <table id="example1" class="table table-bordered table-striped bg-primary font-weight-bold text-white" style="width: 100%">
                <b><h4 class="bg-warning text-dark font-weight-bold" style="font-size: 1.5em">LISTA DE CHEQUEO PARA LA ENTREGA DE TURNO</h2></b>
                    <thead class="bg-warning text-dark font-weight-bold">
                    <tr>
                      <th class="text-center">#</th> 
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre y Apellidos -Usuario</th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Ult Cambio</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody title="">
                    @foreach ($indexChequeoTurno as $key=>$row)
                    <tr style="height: 2px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_chequeo_turno}}</td>
                        <td>
                            <a href="{{URL::to('/create-chequeo-turno/'.$row->id)}}" class ="btn btn-primary btn-md m-0 text-center" id="" title="Llenar formato de Eventos adeversos, sintomatología o muerte"><i class="fa fa-user-plus"></i>Evento</a>
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

      
  </form>
</div>
  @endsection 
  <script>
    window.addEventListener('load', () =>{
      $('#example1').DataTable({
        destroy: "true",
         scrollY: "500px",
        language: {"url":"../resources/js/espanol.json"},
      })
      return true
    })
  </script>
 