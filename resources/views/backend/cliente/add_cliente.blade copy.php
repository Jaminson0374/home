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
                <form role="form" action="{{URL::to('/insert-cliente')}}" method="post">
                    @csrf

                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title ">Ingreso de Usuario Nuevo</h3>
                                        <h3 class="card-title float-right">Datos Personales</h3>
                                    </div>
                                    <div class="card-body bg-info">
                                                                         
                                        <div class="row">
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
                                            <div class="col-sm-4">
                                                <label for="name" class="col-form-label">No. Documento</label>
                                                <input type="text" class="form-control text" name="num_documento" id="name" placeholder="Digite No. del documento" value="{{old('num_documento')}}">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="SelectSexo" class="col-form-label">Sexo</label>
                                                <select class="form-control" id="selectSexo" name="sexo">
                                                    <option selected disable value=" ">Seleciona una opción</option> 
                                                    <option value="1">Másculino</option>
                                                    <option value="2">Femenino</option>
                                                    <option value="3">Otro</option>
                                                </select>
                                                {{-- <script>
                                                    document.getElementById('SelectSexo').value = "old('sexo')";
                                                </script> --}}
                                            </div>                                                   
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
                                            <div class="col-6 col-sm-4">
                                                <label>Pais de nacimiento</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="pais_nacimiento" name="pais_nacimiento" data-old="{{old('pais_nacimiento')}}">
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
                                            <div class="col-6 col-sm-4">
                                                <label>Dpto de Nacimiento</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="selectDptoN" name="dpto_nacimiento" value = "old('$request->dpto_nacimiento')">
                                                <option selected disable value=" ">Seleciona una opción</option> 
                                                <option value="1">Atlántico</option>
                                                <option value="2">Antioquia</option>
                                                <option value="3">Bolivar</option>
                                                <option value="4">Sucre</option>
                                                <option value="5">Córdoba</option>
                                                <option value="6">Magdalena</option>
                                                <option value="7">Cesár</option>
                                                </select>
                                            </div>      
                                               {{-- <script>
                                                    document.getElementById('selectDptoN').value = "old('dpto_nacimiento')";
                                                </script>                                                        --}}
                                            <div class="col-6 col-sm-4">
                                                <label>Ciudad de Nacimiento</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="selectCiudadN" name="ciudad_nacimiento" value = "old('ciudad_nacimiento')">
                                                <option selected disable value=" ">Seleciona una opción</option> 
                                                <option value="1">Barranquilla</option>
                                                <option value="2">Bogotá</option>
                                                <option value="3">Cartagena</option>
                                                <option value="4">Sincelejo</option>
                                                <option value="5">Montería</option>
                                                <option value="6">Santa Marta</option>
                                                <option value="7">Valledupar</option>
                                                </select>
                                            </div>                                                    
                                               {{-- <script>
                                                    document.getElementById('selectCiudadN').value = "old('ciudad_nacimiento')";
                                                </script>                                   --}}
                                        </div>  <!--cierra row-->

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="" class="col-form-label">F. nacimiento:</label>
                                                <input type="date" class="form-control text" name="fecha_nacimiento" placeholder="Digite fecha de nacimiento" value="{{old('fecha_nacimiento')}}">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="edad" class=" col-form-label">Edad:</label>
                                                <input type="text" class="form-control text" name="edad" id="edad" placeholder="Edad" value="{{old('edad')}}">
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Grupo RH</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="seelctRh" name="grupo_sanguineo" value = "old('grupo_sanguineo')">
                                                <option selected disable value=" ">Elige tipo</option>
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
                                               {{-- <script>
                                                    document.getElementById('selectRh').value = "old('grupo_sanguineo')";
                                                </script>                 --}}

                                            <div class="col-sm-5">
                                                <label for="" class="col-form-label">Teléfonos :</label>
                                                <input type="text" class="form-control text" name="telefonos_user" placeholder="Digite Telefonos del usuario" value="{{old('telefonos_user')}}">
                                            </div>
                                            
                                        </div>  <!--cierra row-->     
                                        
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <label for="dirRes" class="col-form-label">Dirección Residencial:</label>
                                                <input type="text" class="form-control text" name="direccion_res" id="dirRes" placeholder="Digite Dirección residencial" value="{{old('direccion_res')}}">
                                            </div>

                                            <div class="col-sm-5">
                                                <label for="" class="col-form-label">Email Usuario:</label>
                                                <input type="email" class="form-control text" name="email_user" placeholder="Digite Email existente" value="{{old('email_user')}}">
                                            </div>   
                                        </div>  <!--cierra row-->

                                        <div class="row">
                                            <div class="mt-1 col-sm-12  border border-primary"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <label for="" class="col-form-label">Nombre Acompañante</label>
                                                <input type="text" class="form-control text" name="nombre_acompanante" placeholder="Digite nombre de acompañente" value="{{old('nombre_acompanante')}}">
                                            </div>
                                            
                                            <div class="col-sm-5">
                                                <label for="" class="col-form-label">Tel. acompañante:</label>
                                                <input type="text" class="form-control text" name="telefono_acompanante" placeholder="Digite Tel acompañante" value="{{old('telefono_acompanante')}}">
                                            </div>
                                        </div>  <!--cierra row-->

                                        <div class="row">
                                           <div class="col-sm-5">
                                                <label for="" class="col-form-label">Email Acompañante:</label>
                                                <input type="email" class="form-control text" name="email_acompanante" placeholder="Digite Email existente" value="{{old('email_acompanante')}}">
                                            </div>  
                                        </div> <!--cierra row-->                                         
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title float-right ">Datos del servicio</h3>
                                        </div>
                                    <div class="card-body bg-info">
                                        <div class="row">
                                            <div>
                                            <input type="text" name="tipo_usuario" value="1" hidden>
                                            </div>   
                                            <div class="col-sm-2">
                                                <label>Tipo Servicio</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="tipo_servicios" id="selectServicios">
                                                <option selected="selected" disable value=" ">Seleciona una opción</option>
                                                <option value="1">VIVIENDA ASISTIDA</option>
                                                <option value="2">PASADIA / GUARDERIA</option>
                                                <option value="3">HOGAR DE PASO INSTITUCIONAL</option>
                                                <option value="4">CUIDADODS PRIMARIOS DOMICILIARIOS</option>
                                                <option value="5">SERVICIOS DE ATENCIÓN DOMI BAJA COMPLEJIDAD</option>
                                                </select>
                                            </div>
                                            <script>
                                                // var id_names = document.getElementById("selectServicios").value="old('id_tipodoc')";
                                                // console.log("MEENSAJW"+id_names[0].tagName)
                                                // console.log("MEENSAJW*---"+id_names)
                                                // document.getElementByName('id_tipodoc').value = "old('id_tipodoc')";
                                            </script> 
                                        </div>  <!--cierra row--> 
                                        <div class="row">
                                            <div class="col-8 col-sm-12">
                                                <label>Institución Remitente</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"id="selectIntiRemite" name="instituto_remitente" value = "old('instituto_remitente')">
                                                <option selected disable value=" ">Seleciona una opción</option>
                                                <option value="1">Cajacopi</option>
                                                <option value="2">Sura EPS</option>
                                                <option value="3">Coomeva</option>
                                                <option value="4">Salud Total</option>
                                                <option value="5">Nueva EPS</option>
                                                <option value="6">Viva 1A</option>
                                                <option value="7">Mutual Ser EPS</option>
                                                </select>
                                            </div>
                                        </div>  <!--cierra row--> 

                                               {{-- <script>
                                                    document.getElementById('selectIntiRemite').value = "old('instituto_remitente')";
                                                </script>        --}}

                                        <div class="row">    
                                            <div class="col-sm-12">
                                                <label for="" class="col-form-label">Médico Remitente</label>
                                                <input type="text" class="form-control text" name="medico_remitente" placeholder="Digite nombre medico remitente" value="{{old('medico_remitente')}}">
                                             </div>
                                        </div>  <!--cierra row--> 
                                        <div class="row">
                                            <div class="mt-1 col-sm-12  border border-primary"></div>
                                        </div>  

                                        <div class="row">
                                                <div class="col-6 col-sm-4">
                                                    <label for="tipo_afiliacion">Tipo de afiliación:</label>
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"id="selectAfiliacion" name="tipo_afiliacion" value = "old('tipo_afiliacion')">
                                                    <option selected disable value=" ">Seleciona una opción</option>
                                                    <option value="1">Cotizante</option>
                                                    <option value="2">Beneficiario</option>
                                                    </select>
                                                </div>
                                                {{-- <script>
                                                    document.getElementById('selectAfiliacion').value = "old('tipo_afiliacion')";
                                                </script>       --}}

                                            <div class="col-12 col-sm-4">
                                                <label class="col-form-label">Grupo o Rango EPS?</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="selecRangoEps" name="grupo_rango_eps" value = "old('grupo_rango_eps')">
                                                <option selected disable value=" ">Seleciona una opción</option>                                                
                                                <option value="1">Grupo 1</option>
                                                <option value="2">Grupo 2</option>
                                                <option value="3">Grupo 3</option>
                                                <option value="4">Grupo 4</option>
                                                <option value="5">Grupo 5</option>
                                                <option value="6">Grupo 6</option>
                                                <option value="7">Grupo 7</option>
                                                </select>
                                            </div>

                                               {{-- <script>
                                                    document.getElementById('selecRangoEps').value = "old('grupo_rango_eps')";
                                                </script>     --}}
                                            <div class="col-12 col-sm-4">
                                                <label class="col-form-label">Cubiculo</label>
                                                    <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="selectCubiculo" name="cubiculo" value = "old('cubiculo')">
                                                        <option selected disable value=" ">Seleciona una opción</option>
                                                        <option value="1">1A</option>
                                                        <option value="2">2B</option>
                                                        <option value="3">3C</option>
                                                        <option value="4">4D</option>
                                                        <option value="5">5F</option>
                                                        <option value="6">6G</option>
                                                        <option value="7">7H</option>
                                                    </select>
                                                {{-- <script>
                                                    document.getElementById('selectCubiculo').value = "old('cubiculo')";
                                                </script>                                                    --}}
                                            </div>                                            
                                        </div> <!--cierra row--> 
                                           
                                        <div class="row">
                                            <div class="mt-1 col-sm-12  border border-primary"></div>
                                        </div>    

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="fecha_ingreso" class="col-form-label">Fecha de Ingreso:</label>
                                                <input type="date" class="form-control text" name="fecha_ingreso" placeholder="Digite fecha de ingreso" value="{{old('fecha_ingreso')}}">
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="fecha_retiro" class="col-form-label">Fecha de Retiro:</label>
                                                <input type="date" class="form-control text" name="fecha_retiro" placeholder="Digite fecha de retiro" value="{{old('fecha_retiro')}}">
                                            </div>    

                                            <div class="col-sm-4">
                                                <label for="num_dias" class="col-form-label">número de Días:</label>
                                                <input type="text" class="form-control text" name="num_dias" placeholder="Digite días" value="{{old('num_dias')}}">
                                            </div>                                            
                                        </div>  <!--cierra row-->    

                                        <div clas="row">
                                            <div class="col-12 col-sm-12">
                                                <label class="col-form-label">Quien recibe al Usuario?</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="cuidador_recibe" id="selectCuidador" value = "old('cuidador_recibe')">
                                                <option selected disable value=" ">Seleciona una opción</option>
                                                <option value="1">Ana Marpia F.</option>
                                                <option value="2">Juan Ortega</option>
                                                <option value="3">Martha</option>
                                                <option value="4">Margarita</option>
                                                <option value="5">Belsi Herrera</option>
                                                <option value="6">María Jose H.</option>
                                                <option value="7">Patricia Theran F.</option>
                                                </select>
                                                {{-- <script>
                                                    document.getElementById('selectCuidador').value = "old('cuidador_recibe')";
                                                </script>                                                                                  --}}
                                            </div>
                                        </div> <!--cierra row-->   

                                        <div class="row">    
                                            <div class="col-sm-4">
                                                <label for="" class="col-form-label"># de Factura</label>
                                                <input type="text" class="form-control text" name="num_factura" placeholder="Digite Num de factura" value="{{old('num_factura')}}">
                                             </div>

                                            <div class="col-sm-4">    
                                                <label for="fecha_retiro" class="col-form-label">Fecha de factura:</label>
                                                <input type="date" class="form-control text" name="fecha_factura" placeholder="Digite fecha factura" value="{{old('fecha_factura')}}">
                                            </div>   

                                                <div class="col-sm-4">
                                                    <label for="" class="col-form-label">Estado del Usuario:</label>
                                                    <input class="form-control text"  type="checkbox" name="estado_cliente" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                                </div>
                                        </div>  <!--cierra row--> 

                                    </div>  
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="" class="col-form-label">Observaciones:</label>
                                    <textarea type="text" class="form-control text " name="observacion" placeholder="Digite observaciones pertinentes" value="{{old('observacion')}}"></textarea>
                                </div>
                            </div>  <!--cierra row--> 

                            <div class="row">
                                <div class="col-sm-12">
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

