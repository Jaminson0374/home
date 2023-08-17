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
    {{-- <section class="content"> --}}
      <div class="row p-1 m-1">
          <div class="col-5">
            <b><h4 class="text-white bg-success p-2">Administración General de Usuarios</h2></b>
          </div> 
          <div class="col-2"></div>
          <div class="col-4">   
                <a class="btn btn-primary btn-lg" href="{{URL::to('/add-cliente-datobasic')}}" title="Crear usuario nuevo en a la institución"><i class="fa fa-user-plus"></i><b>Nuevo Usuario</b></a>
          </div> 
       </div>      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body bg bg-primary" >
                <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                      <th>Id</th>   
                      <th>DocIdent</th> 
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Edad</th>
                      <th>Telefonos</th>
                      <th class="text-center">Tipo de servicio</th>                    
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
                        <td>{{$row->telefonos_user}}</td>
                        <td class="text-center">{{$row->descripcion}}</td> 
                        <td>
                          <a href="{{URL::to('asignar-servicio/'.$row->id)}}" class ="btn btn-primary btn-xs" id="" title="Asignar Servicio, Consultar, Modificar y/o Eliminar el servicio de este usuario"><i class="fa fa-user-plus" style="color:#0bf31e;"></i><i class="fa fa-pencil-alt"><i><i class="fa fa-trash" style="color:#f30b0b;"></i>Servicio</a>
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
 