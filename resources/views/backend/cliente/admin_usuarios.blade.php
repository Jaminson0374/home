@extends('backend.layouts.app')
@section('content')
<?php
//use clientes;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
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
                        <td>{{$row->nombre}}." ".{{$row->apellidos}}</td>
                        <td>{{$row->fecha_nacimiento}}</td>
                        <td>{{$row->edad}}</td>
                        <td>{{$row->direccion_res}}</td>
                        <td>{{$row->telefonos_user}}</td>
                        <td>{{$row->email_user}}</td>
                        <td>{{$row->tipodoc->descripcion}}</td>
                        
                        <td>
                            <a href="{{URL::to('/edit-cliente/'.$row->id) }}" class="btb btn-info">Editar</a>
                            <a href="{{URL::to('/delete-cliente/'.$row->id) }}" class ="btb btn-danger" id="delete_cli">Eliminar</a>
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
