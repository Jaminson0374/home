@extends('backend.layouts.app')
@section('content')
<?php
//use clientes;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row pt-2">
        <div class="col-5">
          <b><h3 class="text-white bg-success">Administración de Nuestros Usuarios</h2></b>
        </div> 
        <div class="col-5"></div> 
        <div class="col-2">   
          {{-- <span class="btn btn-success col fileinput-button">
            <a href="{{URL::to('/add-cliente-datobasic')}}"></a>
            <i class="fas fa-plus"></i>
            <span>Nuevo Usuario</span>
          </span>           --}}
          
             <a class="btn btn-success" href="{{URL::to('/add-cliente-datobasic')}}">Nuev Usuario</a>
        </div> 
      </div>      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body p-3 mb-2 bg-primary text-white">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha Ncmto</th>
                    <th>Edad</th>
                    <th>Dirección</th>
                    <th>Telefonos</th>
                    <th>Email</th>
                    <th>Tipo documento</th>
                    <th>Acción</th>
                  </tr>
                  </thead>
                  <tbody
                    {{-- @foreach ($all as $key=>$row ) --}}
                    @foreach ($listaCli as $row )
                    <tr>
                        <td>{{$row->id}}</td> 
                        <td>{{$row->num_documento}}</td>
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->apellidos}}</td>
                        <td>{{$row->fecha_nacimiento}}</td>
                        <td>{{$row->edad}}</td>
                        <td>{{$row->direccion_res}}</td>
                        <td>{{$row->telefonos_user}}</td>
                        <td>{{$row->email_user}}</td>
                        <td>{{$row->tipodoc->descripcion}}</td>
                        <td>
                            <a href="{{URL::to('/edit-cliente/'.$row->id) }}" class="btn btn-info btn-xs">Editar</a>
                            <a href="{{URL::to('/delete-cliente/'.$row->id) }}" class ="btn btn-danger btn-xs" id="delete_cli">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Fecha Ncmto</th>
                    <th>Edad</th>
                    <th>Dirección</th>
                    <th>Telefonos</th>
                    <th>Email</th>
                    <th>Tipo documento</th>
                    <th>Acción</th>
                  </tr>
                  </tfoot>
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
