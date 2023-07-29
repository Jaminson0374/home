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
          <b><h4 class="text-white bg-info pt-2 pb-2" style="font-size: 2em">Requisición de medicamentos a usuario</h2></b>
        </div> 
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::to('/requisiciones_create')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus"></i>Nuevo Usuario-Reserva</a>
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
                <table id="adminClientes" class="table table-bordered table-striped bg-info" style="width: 100%">
                    <thead>
                    <tr>
                      <th class="text-center">#</th> 
                      <th class="text-center">Documento</th>
                      <th class="text-center"> Nombre y Apellidos  </th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Ult Fe Requisicion</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($requi_datosbasicos as $key=>$row )
                    <tr style="height: 5px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->ult_fecha_requisicion}}</td>
                        <td>
                            <a href="{{URL::to('requisicion_create/'.$row->id)}}" class ="btn btn-primary btn-xs p-0 m-0" id="" title="Ingresar, modificar y/o consultar Administración de medicamentos"><i class="fa fa-user-plus" style="color:#f3600b;"></i><i class="fa fa-pencil-alt"></i><i class="fa fa-trash" style="color:#f30b0b;"></i>Admin</a>
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

  @endsection 
 