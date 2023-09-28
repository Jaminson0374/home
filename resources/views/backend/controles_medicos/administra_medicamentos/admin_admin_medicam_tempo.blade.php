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
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7 col-md-7">
            {{-- <a class="btn btn-primary btn-md float-right" href="{{URL::to('/add-cliente-datobasic')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus"></i>Nuevo Usuario-Reserva</a> --}}
          </div>
                 
          <div class="col-12 col-lg-12 col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body  bg bg-success">
                <table id="example1" class="table table-bordered table-striped table-hover " style="width: 100%">
                    <thead class="bg bg-warning">
                      <b><h4 class="text-dark bg-success" style="font-size: 2em">Administración de Medicamentos Temporales</h2>                      
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
                    <tbody class="bg bg-primary">
                     @foreach ($clientesAdminMed as $key=>$row )
                    <tr style="height: 5px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_fecha_admin_med }}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_hora_admin_med}}</td>
                        <td>
                            <a href="{{URL::to('add_medica_user/'.$row->id)}}" class ="btn btn-primary btn-lg p-0 m-0 bg bg-warning" id="" title="Ingresar, modificar y/o consultar la Administración permanentes de medicamentos asignado">Admin</a>
                            <a href="{{URL::to('asignar-medicamentos/'.$row->id)}}" class ="btn btn-primary btn-lg p-0 m-0 bg bg-success" id="" title="Asignación de los medicamentos permanentes del usuario"><b>Asignar</b></a>
                        </td>
                    </tr>
                    {{--  --}}
                    
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
 