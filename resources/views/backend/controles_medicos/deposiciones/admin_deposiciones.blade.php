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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body bg bg-success">
                <table id="example1" class="table table-bordered table-striped bg bg-primary" style="width: 100%">
                <b><h4 class="text-white bg-danger" style="font-size: 1.5em">Control de Deposiciones</h2></b>
                    <thead class="bg bg-danger text-white">
                    <tr>
                      <th class="text-center">#</th> 
                      <th class="text-center">Documento</th>
                      <th class="text-center"> Nombre y Apellidos  </th>
                      <th class="text-center">Edad</th>
                      <th class="text-center">Planilla Actual</th>
                      <th class="text-center">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                     @foreach ($clientesAdminDepo as $key=>$row )
                    <tr style="height: 2px">
                        <td class="p-0 m-0 text-center">{{$key+1}}</td>
                        <td class="p-0 m-0 text-left">{{$row->num_documento}}</td>
                        <td class="p-0 m-0">{{$row->nombre." ".$row->apellidos}}</td>
                        <td class="p-0 m-0 text-center">{{$row->edad}}</td>
                        <td class="p-0 m-0 text-center">{{$row->planilla_actual}}</td>
                        <td>
                            <a href="{{URL::to('create_add_deposiciones/'.$row->id)}}" class ="btn btn-primary btn-md m-0 text-center" id="" title="Ingresar, modificar y/o consultar las deposiciones"><i class="fa fa-user-plus"></i>Llenar planilla</a>
                            <a href="{{URL::to('create_planilla_deposiciones/'.$row->id)}}" class ="btn btn-primary bg bg-success btn-md m-0 text-center" id="" title="Crear, Modifica y/o Consultar Planillas mensuales"><i class="fa fa-file"><b>Crear Planillas</b></i></a>
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
 