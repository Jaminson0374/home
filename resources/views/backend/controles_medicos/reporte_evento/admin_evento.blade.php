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
              <div class="card-body" style="background-color: rgb(0, 247, 255)">
                <table id="example1" class="table table-bordered table-striped bg-info font-weight-bold text-white" style="width: 100%">
                <b><h4 class="text-white bg-info" style="font-size: 1.5em">REPORTE DE EVENTO ADVERSO, SINTOMATOLOGÍA O MUERTE</h2></b>
                    <thead class="bg-warning text-dark font-weight-bold">
                    <tr>
                      <th class="text-center">#</th> 
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Nombre y Apellidos  </th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Ult Reporte</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($indexEventoAdverso as $key=>$row)
                    <tr style="height: 2px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_reporte_evento}}</td>
                        <td>
                            <a href="{{URL::to('/create-evento/'.$row->id)}}" class ="btn btn-primary btn-md m-0 text-center" id="" title="Llenar formato de Eventos adeversos, sintomatología o muerte"><i class="fa fa-user-plus"></i>Evento</a>
                            {{-- <a href="{{URL::to('/create-terapia/'.$row->id)}}" class ="btn btn-primary btn-md m-0 text-center" id="" title="Programar las sesiones de Terapia y/o Actividades a realizar"><i class="fa fa-user-plus"></i>Programar</a> --}}
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
      })
    })
  </script>
 