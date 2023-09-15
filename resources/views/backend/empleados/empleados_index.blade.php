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
          <b><h4 class="text-white bg-success">Administración General de Empleados</h2></b>
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
              <div class="card-body" style="background-color: rgb(0, 255, 162)">
                <table id="example2" class="table table-bordered table-striped table-hover bg-primary">
                <thead class="bg-warning">
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

  
  </form>
</div>
<script>

    // window.addEventListener('load', () => {
    //     tabla2 = $('#example2').DataTable({
    //       destroy : "true",

    //     })
    // })
 
</script>
  @endsection 
 