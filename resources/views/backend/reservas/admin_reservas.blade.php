@extends('backend.layouts.app')
@section('content')
<?php
//use clientes;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row pb-2 pt-1">
        <div class="col-7">
          <b><h4 class="text-white bg-warning">Administración de Reservas de Usuarios pendientes por asignar Servicio</h2></b>
        </div> 
        <div class="col-1"></div>
        
        <div class="col-2">   
              <a class="btn btn-primary" href="{{URL::to('/add-cliente-datobasic')}}">Nuevo Usuario-Reserva</a>
        </div> 
      
        <div class="col-2">   
          {{-- <span class="btn btn-success col fileinput-button">
            <a href="{{URL::to('/add-cliente-datobasic')}}"></a>
            <i class="fas fa-plus"></i>
            <span>Nuevo Usuario</span>
          </span>           --}}
          
             {{-- <a class="btn btn-warning" href="{{URL::to('/add-cliente-servicio')}}">Asignar Servicio</a> --}}
        </div> 

        
      </div>      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body p-3 mb-2 bg-success text-white">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th> 
                    <th>DocIdent</th> 
                    <th class="text-center">Nombre</th>
                    <th>Edad</th>
                    <th>Telefonos</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Servicio Pendte.</th>                    
                    <th class="text-center">Acción</th>
                  </tr> 
                  </thead>
                  <tbody
                    {{-- @foreach ($all as $key=>$row ) --}}
                    @foreach ($listaCli as $key=>$row )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->num_documento}}</td>
                        <td>{{$row->nombre." ".$row->apellidos}}</td>
                        <td>{{$row->edad}}</td>
                        <td>{{$row->telefonos_user}}</td>
                        <td>{{$row->email_user}}</td> 
                        <td class="text-center">{{$row->reserva_si_no}}</td> 
                        <td>
                          {{-- href="{{route('/open-reservas-servicios',['id'=>$cliente->id])}}" --}}
                            <a href="{{URL::to('/edit-cliente/'.$row->id) }}" class="btn btn-primary btn-md">Editar</a>
                            <a href="{{route('openReservasAddServicios',['idcli'=>$row->id])}}" class ="btn btn-primary btn-md" id="">Asignar Servicio</a>
                            <a href="{{URL::to('/delete-cliente/'.$row->id) }}" class ="btn btn-danger btn-md" id="delete_cli">Eliminar</a>
                            
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>DocIdent</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Telefonos</th>
                    <th>Tipo de servicio</th>  
                    <th>Acción</th>
                  </tr>
                  </tfoot> --}}
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
</div>
  @endsection 
