@extends('backend.layouts.app')
@section('content')

<style>
.tarjeta_body {
    margin: 2px;
    background-color: #eef3eb;
    border: 4em;
    border-color: #ee2015;
}

</style>
 

<div class="content-wrapper jaminson">
    @if ($errors->any())
    <script>
        document.getElementById('selectDptoN').value = "old('dpto_nacimiento')";
    </script>          
    <div class="alert alert-danger"><h2 class ="boder boder-primary">ERRORES EN LOS DATOS INGRESADOS</h2>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    
     <section class="content">
        <div class="card border-2">
             <div class="card-body text-dark tarjeta_body" >
                <form role="form" action="{{URL::to('/insert-cliente-basicos')}}" method="post">
                    @csrf

                        <div class="row justify-content-between">
                            <div class="col-sm-10">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title ">INGRESO DE USUARIO NUEVO A FHR</h3>
                                        <h3 class="card-title float-right">Datos Básicos Personales</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                                                         
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="" class="col-form-label">Documento de identidad</label>
                                                <input type="text" class="form-control text" name="num_documento" id="name" placeholder="Digite No. del documento" value="{{old('num_documento')}}">
                                            </div>

                                            <div class="col-sm-4">
                                            <label for="" class="col-form-label">Tipo Documento</label>
                                            <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_tipodoc" id="selectTipoDoc">
                                                   <option selected="selected" disable value=" ">Seleciona una tipo</option>
                                               
                                                    @foreach($tipoDoc as $tipoDoc)
                                                    <option value = {{$tipoDoc->id}}>{{$tipoDoc->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                                <script>
                                                    // var id_names2 = document.getElementById("selectTipoDoc").value ="old('id_tipodoc')"";
                                                    // console.log("MEENSAJW"+id_names[0].tagName)
                                                    // console.log("MEENSAJW"+id_names2)
                                                    // document.getElementByName('id_tipodoc').value = "old('id_tipodoc')";
                                                </script> 
                                            </div>
                                            <div class="col-6 col-sm-4">
                                                <label class="col-form-label">Nacionalidad</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="nacionalidad" name="nacionalidad" data-old="{{old('nacionalidad')}}">
                                                <option selected disable value=" ">Seleciona una opción</option> 
                                                <option value="1">Colombia</option>
                                                <option value="2">Argentina</option>
                                                <option value="3">Brasil</option>
                                                <option value="4">Bolivia</option>
                                                <option value="5">Chile</option>
                                                <option value="6">Ecuador</option>
                                                <option value="7">Paraguay</option>
                                                <option value="9">Perú</option>
                                                <option value="10">Uruguay</option>
                                                <option value="11">Venezuela</option>
                                                </select>
                                            </div>
                                                <script>
                                                    document.getElementById('pais_nacimiento').value = "old('pais_nacimiento')";
                                                </script>      
                                                                                                               
                                        </div>  <!--cierra row--> 
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control text " name="nombre" id="nombre" placeholder="Digite Nombre" value="{{old('nombre')}}">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="apellidos" class="col-form-label">Apellidos:</label>
                                                <input type="text" class="form-control text" name="apellidos" id="apellidos" placeholder="digite apellidos" value="{{old('apellidos')}}">
                                            </div>
                                        </div>  <!--cierra row--> 
                                        <div class="row">    
                                            <div class="col-sm-2">
                                                <label for="SelectSexo" class="col-form-label">Sexo</label>
                                                <select class="form-control" id="selectSexo" name="sexo">
                                                    <option selected disable value=" ">Seleciona el sexo</option> 
                                                    <option value="1">Másculino</option>
                                                    <option value="2">Femenino</option>
                                                    <option value="3">Otro</option>
                                                </select>
                                                {{-- <script>
                                                    document.getElementById('SelectSexo').value = "old('sexo')";
                                                </script> --}}
                                            </div>   
                                            <div class="col-sm-1">
                                                <label for="SelectSexo" class="col-form-label">Grupo RH</label>
                                                <select class="form-control" id="seelctRh" name="grupo_sanguineo" value = "old('grupo_sanguineo')">
                                                <option selected disable value=" ">Tipo</option>
                                                <option value="O+">O+</option>
                                                <option value="A+">A+</option>
                                                <option value="B+">B+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="A-">A-</option>
                                                <option value="O-">O-</option>
                                                <option value="B-">B-</option>
                                                <option value="AB-">AB-</option>                            
                                                </select>
                                            </div>  
                                            <div class="col-sm-2">
                                                <label for="" class="col-form-label">F. nacimiento:</label>
                                                <input type="date" class="form-control text" name="fecha_nacimiento" placeholder="Digite fecha de nacimiento" value="{{old('fecha_nacimiento')}}">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="edad" class=" col-form-label">Edad:</label>
                                                <input type="text" class="form-control text" name="edad" id="edad" placeholder="Edad" value="{{old('edad')}}">
                                            </div>  
                                            <div class="col-sm-5">
                                                <label for="" class="col-form-label">Lugar de nacimiento:</label>
                                                <input type="text" class="form-control text" name="lugar_nacimiento" id="lugar_ncmto" placeholder="digite lugar de nacimiento" value="{{old('lugar_nacimiento')}}">
                                            </div>                                                                                                                                                    
                                        </div>               

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">Teléfonos :</label>
                                                <input type="text" class="form-control text" name="telefonos_user" placeholder="Digite Telefonos del usuario" value="{{old('telefonos_user')}}">
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <label for="dirRes" class="col-form-label">Dirección Residencial:</label>
                                                <input type="text" class="form-control text" name="direccion_res" id="dirRes" placeholder="Digite Dirección residencial" value="{{old('direccion_res')}}">
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">Email Usuario:</label>
                                                <input type="email" class="form-control text" name="email_user" placeholder="Digite Email existente" value="{{old('email_user')}}">
                                            </div>   
                                        </div>  <!--cierra row-->

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <label for="" class="col-form-label">Fecha creación usuario:</label>
                                                <input type="date" class="form-control text" name="fecha_creacion" placeholder="Digite fecha de nacimiento" value="{{old('fecha_creacion')}}">
                                            </div>                                            
                                            <div class="col-sm-4">
                                                <label for="" class="col-form-label">Estado del Usuario:</label>
                                                <input class="form-control text"  type="checkbox" name="estado_user" id="estado_user" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-2">
                                <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title float-right ">Fotografía</h3>
                                        </div>
                                    <div class="card-body bg-info">
                                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                            <div class="image">
                                              <img src="{{asset('backend/dist/img/foto.jpg')}}" class="img-circle elevation-4" alt="User Image">
                                            </div>
                                            <div class="info">
                                              <a href="#" class="d-block">{{auth()->user()->name}} </a>
                                            </div>
                                          </div>  
                                    </div>  
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Subir foto</span>
                                      </span>         
                                </div>
                            </div>

                        </div>

                            <div class="row">
                                <div class="col-sm-10">
                                    <label for="" class="col-form-label">Observaciones:</label>
                                    <textarea type="text" class="form-control text " name="observacion" placeholder="Digite observaciones pertinentes" value="{{old('observacion')}}"></textarea>
                                </div>
                            </div>  <!--cierra row--> 

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group pt-2">
                                        <button type="submit" class="btn btn-primary form-group">Guardar</button>
                                        <a href="{{URL::to('/all-cliente') }}" class="btn btn-primary float-right " id="btn_cli_salir_new">Salir</a>
                                    </div>
                                </div>
                            </div>  <!--cierra row-->
                    </form>
                </div>
            </div>
        </div>

    </section>

</div>

@endsection

<script>
  Dropzone.autoDiscover = false
var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })
  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })
  </script>