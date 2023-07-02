@extends('backend.layouts.app')
@section('content')
<?php
//use clientes;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <form role="form" name="clienteAdmin" id="clienteAdmin"  method="get">
                    @csrf
    <section class="content">
      <div class="row pb-2 pt-1">
        <div class="col-5">
          <b><h4 class="text-white bg-success">Administración de Usuarios Con Servicios Activos</h2></b>
        </div> 
        <div class="col-2"></div>
        <div class="col-2">   
              <a class="btn btn-primary btn-md" href="{{URL::to('/add-cliente-datobasic')}}">Nuevo Usuario-Reserva</a>
        </div> 
        <div class="col-2">   
            <button class="btn btn-primary btn-md" id="btnClientes">Tabla Axios</button>    
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
              <div class="card-body p-3 mb-2 bg-primary text-white">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DocIdent</th> 
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Edad</th>
                    <th>Telefonos</th>
                    <th class="text-center">Tipo de servicio</th>                    
                    <th class="text-center">Acción</th>
                  </tr> 
                  </thead>
                  <tbody id="bodyTabla">

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>DocIdent</th> 
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Edad</th>
                      <th>Telefonos</th>
                      <th class="text-center">Tipo de servicio</th>                    
                      <th class="text-center">Acción</th>
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

       {{-- <script src={{ asset('../resources/js/datos_basicos.js')}}></script> --}}
  
  </form>
</div>
      <script type="text/javascript"> 
        window.onload =() => {
          let bodyTablaClientes = document.getElementById("bodyTabla");
          axios.get("{{URL::to('/admin-clientes')}}").then((res)=>{
            //let response =JSON.parse(res.data.costo_servicio);
            let data = res.data;
           console.log(data);

           
            bodyTablaClientes.innerHTML="";
          
           for (let datoJson of data){
           bodyTablaClientes.innerHTML+=`
                      <tr>
                        <td>${datoJson.num_documento}</td>
                        <td>${datoJson.nombre+" "+datoJson.apellidos}</td>
                        <td class="text-center">${datoJson.edad}</td>                              
                        <td>${datoJson.telefonos_user}</td>
                        <td class="text-center">${datoJson.descripcion}</td>
                 
                        <td>
                            <a href="{{URL::to('/edit-cliente/.${datoJson.id}') }}" class="btn btn-info btn-md">Editar</a>
                            <a href="{{URL::to('/delete-cliente/.${datoJson.id}') }}" class ="btn btn-danger btn-md" id="delete_cli">Eliminar</a>
                        </td>
                    </tr>` 

           }
          }).catch((error)=>{
               console.log(error);
          })
        } 
        </script>
       
  @endsection 
 