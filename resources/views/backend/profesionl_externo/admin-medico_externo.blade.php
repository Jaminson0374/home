@extends('backend.layouts.app')
@section('content')
<@php
    $cod54 = "1"
@endphp
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
            <b><h4 class="text-white bg-primary p-2">Administrador de Proefionales Externos</h2></b>
          </div> 
          <div class="col-2"></div>
          <div class="col-4">   
                <a class="btn btn-primary btn-lg" href="{{URL::to('/create-medicoExterno/'.$cod54)}}" title="Crear / Actualizar y/o Anular Profesionales o personal externo"><i class="fa fa-user-plus"></i><b>Nuevo Registro</b></a>
          </div>           
        </div>      
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-body bg bg-success" >
                <table id="index-familiares" class="table table-bordered table-striped table-hover" style="width: 100%">
                    <thead class="bg-primary">
                    <tr>
                      <th>Id</th>   
                      <th>DocIdenti</th> 
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Organización</th>
                      <th class="text-center">Especialidad</th> 
                      <th>Telefonos</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($indexFamiliar as $key=>$row )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->doc_identidad}}</td>
                        <td>{{$row->nombre." ".$row->apellidos}}</td>
                        <td>{{$row->organizacion}}</td>
                        <td>{{$row->telefonos}}</td>
                        <td>
                          <a href="{{URL::to('/create-medicoExterno/'.$row->id)}}" class ="btn btn-primary btn-xs" id="" title="Consultar, Modificar y/o Anular Profesionales o personal externo"><i class="fa fa-user-plus" style="color:#0bf31e;"></i><i class="fa fa-pencil-alt"></i> <i class="fa fa-trash" style="color:#f30b0b;"></i></a>
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
<script>
    window.addEventListener('load', () =>{
      $('#index-familiares').DataTable({
        destroy: "true"
      })
    })
</script>  
@endsection 

 