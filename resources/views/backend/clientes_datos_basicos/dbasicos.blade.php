@extends('backend.layouts.app')
@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('../resources/js/back_off.js') }}"></script>
    </head>
    <style>

            input:disabled {
            background: #2015f3;
            }
  
        .tarjeta_body {
            margin: 1px;
            background-color: #f1f2f8;
            border: 4em;
            border-color: #ee2015;
        }

        .card {
            background-color: #a1e4fa;
        }

        .my-class-drop {
            height: 20px;
        }

        .c-body {
            background-color: #07c5f98a;
        }

        input.text,
        select.text,
        textarea.text {
            /*border:inset;*/
            border-style: inset;
            border: inset;
            background-color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em
        }

    </style>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">

                <form name="formularioDbasic" id="formularioDbasic">
                    {{-- @method('post') --}}
                    @csrf

                    {{-- <div class="row justify-content-between"> --}}
                    {{-- <div class="card-body text-dark tarjeta_body"> --}}    
                    <div class="col-lg-12 col-md-12" style="background-color: aqua">
                        <div class="card card-primary card-outline">
                            <div class="border border-dark border-4 rounded bg-primary">
                                <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">
                                    Administracion de Usuarios
                                </h3>
                            </div>
                        </div>
                        <body>
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <!-- <div id="interactive" style="height: 300px;"></div> -->
                                    <input type="hidden" name="reserva_si_no" id="reserva_si_no" value="SI">
                                    <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                    <input type="hidden" name="idCliente" id="idCliente">
                                    <input type="hidden" name="presBtnNew" id="presBtnNew" value="N">

                                    <div class="row border mt-2 mb-3 border border-primary">
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                            <label class=" ">*Tipo Documento</label>
                                            <select class="select2 select2-danger focusNext text"
                                                data-dropdown-css-class="select2-danger select-sm" class="my-class-drop"
                                                style="width: 100%" tabindex="1" name="id_tipodoc" id="id_tipodoc">
                                                @foreach ($tipoDoc as $tipoDoc)
                                                    <option value={{ $tipoDoc->id }}>
                                                        {{ $tipoDoc->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="nDdocumento" id="nDdocumento">

                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="" class="">*Doc Identidad</label>
                                            <input type="text" class="form-control text focusNext pb-2" maxlength="25"
                                                tabindex="2" name="num_documento" id="num_documento"
                                                pattern="[A-Za-z0-9]{1,25}" placeholder="Digite No. del documento"
                                                style="height:40px;">
                                        </div>
                                        <div class="ccol-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                            <label for="nombre" class="">*Nombre:</label>
                                            <input type="text" class="form-control text focusNext" maxlength="40"
                                                tabindex="3" name="nombre" id="nombre" placeholder="Digite Nombre">
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                            <label for="apellidos" class="">*Apellidos:</label>
                                            <input type="text" class="form-control text focusNext" maxlength="40"
                                                tabindex="4" name="apellidos" id="apellidos"
                                                placeholder="digite apellidos">
                                        </div>
                                    </div> <!--cierra row-->

                                    <div class="row border mt-2 mb-3 border border-primary ">
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary  pb-2">
                                            <label class="">*Nacionalidad</label>
                                            <select class="form-control focusNext text" id="nacionalidad_id"
                                                name="nacionalidad_id" tabindex="5">
                                                <option disable value="">País</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label class="">*Dpto Nacimiento</label>
                                            <select class="form-control text focusNext" style="width: 100%;" tabindex="6"
                                                id="departamento_id" name="departamento_id">
                                                <option disable value="">Dpto</option>

                                            </select>
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label class="">*Ciudad Ncmnto</label>
                                            <select class="form-control sNext text" style="width: 100%;" tabindex="7"
                                                id="ciudad_id" name="ciudad_id">
                                                <option disable value="">Ciudad</option>

                                            </select>
                                        </div>

                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="" class="">*F. nacimiento:</label>
                                            <input type="date" class="form-control text focusNext fecha_nacimiento "
                                                id="fecha_nacimiento" name="fecha_nacimiento" onchange="tuEdadReal()"
                                                tabindex="8">
                                        </div>
                                    </div> <!--cierra row-->

                                    <div class="row border mt-2 mb-3 border border-primary">
                                        <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="edad" class="">Edad:</label>
                                            <input type="text" class="form-control text focusNext" name="edad"
                                                tabindex="9" id="edad" placeholder="Edad">
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="SelectSexo" class="">*Genero</label>
                                            <select class="form-control focusNext text" id="sexo_id" tabindex="10"
                                                name="sexo_id">
                                                <option selected disable value="">Genero</option>
                                                @foreach ($genero as $datoInput)
                                                    <option value={{ $datoInput->id }}>
                                                        {{ $datoInput->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="SelectSexo" class="">Grupo RH</label>
                                            <select class="form-control focusNext text" tabindex="11"
                                                id="grupoSanguineo_id" name="grupoSanguineo_id">
                                                <option selected disable value="">Tipo</option>
                                                @foreach ($grupo_rh as $datoInput)
                                                    <option value={{ $datoInput->id }}>
                                                        {{ $datoInput->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-12 col-lg-5 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="" class="">*Teléfonos :</label>
                                            <input type="text" class="form-control text focusNext" maxlength="60"
                                                tabindex="12" id="telefonos_user" name="telefonos_user"
                                                placeholder="Digite Telefonos del usuario">
                                        </div>

                                    </div> <!--cierra row-->

                                    <div class="row border mt-2 border border-primary ">
                                        <div class="col-12 col-lg-5 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="dirRes" class="">Dirección
                                                Residencial:</label>
                                            <input type="text" class="form-control text focusNext" maxlength="100"
                                                name="direccion_res" tabindex="14" id="direccion_res"
                                                placeholder="Digite Dirección residencial">
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="dirRes" class="">Barrio Residencial:</label>
                                            <input type="text" class="form-control text focusNext" maxlength="50"
                                                name="barrio_res" tabindex="14" id="barrio_res"
                                                placeholder="Barrio residencial">
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label for="" class="">*Email Usuario:</label>
                                            <input type="email" class="form-control text focusNext" maxlength="50"
                                                tabindex="14" id="email_user" name="email_user"
                                                placeholder="Digite Email existente">
                                        </div>
                                    </div> <!-- row-->
                                    <div class="row border mt-2 border border-primary ">
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary pb-2">                                                
                                            {{-- <div class="col-8 col-sm-4"> --}}
                                                <label>Institución Remitente</label>
                                                <select class="form-control select2 select2-danger"
                                                    data-dropdown-css-class="select2-danger"
                                                    style="width: 100%;" id="empresa_remite_id"
                                                    name="empresa_remite_id">
                                                    <option selected disable value=" ">Empresa remitente</option>
                                                    @foreach ($empresaRemite as $remiteEmpresa)
                                                        <option value={{ $remiteEmpresa->id }}>
                                                            {{ $remiteEmpresa->nombre_eps }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>    
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label>Tipo Servicio</label>
                                            <select class="form-control focusNext text tiposervicio_id" style="width: 100%;"
                                                name="tiposervicio_id" id="tiposervicio_id" tabindex="13">
                                                <option selected="selected" disable value=" ">Tipo de 
                                                    servicio
                                                </option>
                                                @foreach ($tipoServicio as $tipoServi)
                                                    <option value={{ $tipoServi->id }}>{{ $tipoServi->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary pb-2">
                                            <label>Servicio</label>
                                            <select class="form-control focusNext text servicio_id" style="width: 100%;"
                                                name="servicio_id" id="servicio_id" tabindex="13">
                                                <option selected="selected" disable value=" ">Seleciona un 
                                                    servicio
                                                </option>
                                                @foreach ($serviciosUser as $servicioA)
                                                    <option value={{ $servicioA->id }}>{{ $servicioA->descripcion }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>                                         
                                    </div> <!--row-->                                       
                                </div> <!--card-body-->
                            </div> <!--card card-primary-->

                            <div class="row">
                                <div class="col-lg-2">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <div
                                                class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                <label for="" class="">Peso Kg</label>
                                                <input type="text" 
                                                    class="form-control text focusNext peso" maxlength="10"
                                                    id="peso" tabindex="15" name="peso">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                        
                                <div class="col-lg-3">
                                    <!-- Line chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <div
                                                class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                <label for="" class="">Fecha inicio dd-mm-aaaa</label>
                                                <input type="date" readonly
                                                    class="form-control text focusNext"
                                                    id="fecha_creacion" tabindex="15" name="fecha_creacion">
                                            </div>
                                                <div
                                                    class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Fecha retiro</label>
                                                    <input type="date" readonly
                                                        class="form-control text focusNext "
                                                        id="fecha_retiro" tabindex="16" name="fecha_retiro">
                                                </div>                                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <div
                                                class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                <label for="SelectSexo" class="">Estado usuario</label>
                                                <select class="form-control estado_user focusNext text" tabindex="11"
                                                    id="estado_user" name="estado_user">
                                                    <option selected disable value="">Tipo</option>
                                                        <option value="1">Activo</option>
                                                        <option value="2">Inactivo</option>
                                                        <option value="3">Fallecido</option>
                                                </select>
                                            </div>
                                                <!-- </div> -->
                                        </div>
                                    </div>
                                        <!-- /.card-body-->
                                </div>
                                    <!-- /.card -->
                                <div class="col-lg-4">
                                    <!-- Area chart -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body">
                                            <div
                                                class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                <!-- <div id="area-chart" style="height: 338px;" class="full-width-chart"></div> -->
                                                <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                    <div class="image">
                                                        <img id="imagenPrevisualizacion" class="img-responsive"
                                                            style="width:140px;height:130px">
                                                    </div>
                                                </div>
                                                <input type="file" id="seleccionArchivos" tabindex="20"
                                                    class="btn btn-success" accept="image/*">

                                            </div>
                                            <!-- /.card-body-->
                                        </div>
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col -->
                            </div> <!-- cierre row-->
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <div class="row border">
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-2">
                                                <label for="" class="col-form-label">Familiar1</label>
                                                <select class="form-control select2 select2-danger"
                                                    data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                    name="acompanantes_id" id="acompanantes_id">
                                                    <option selected disable value=" ">Familiar 1</option>
                                                    @foreach ($acompanantes as $familiar)
                                                        <option value={{ $familiar->id }}>{{ $familiar->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-2">
                                                <label for="" class="col-form-label">Familiar1</label>
                                                <select class="form-control select2 select2-danger"
                                                    data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                    name="acompanantes_id2" id="acompanantes_id2">
                                                    <option selected disable value=" ">Familiar 2</option>
                                                    @foreach ($acompanantes as $familiar2)
                                                        <option value={{ $familiar2->id }}>{{ $familiar2->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg-4 col-md-4 col-sm-2">
                                                <label for="" class="col-form-label">Familiar1</label>
                                                <select class="form-control select2 select2-danger"
                                                    data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                    name="acompanantes_id3" id="acompanantes_id3">
                                                    <option selected disable value=" ">Familiar 3</option>
                                                    @foreach ($acompanantes as $familiar3)
                                                        <option value={{ $familiar3->id }}>{{ $familiar3->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>                                                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                            <div class="col-lg-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <div class="row border  mt-2">
                                            <div class="col-12 col-lg-6 col-md-4 col-sm-2 pb-2">
                                                <label for="" class=""><b>Patología:</b></label>
                                                <textarea type="text" class="form-control text diagnostico" id="diagnostico" name="diagnostico" tabindex="21"
                                                    placeholder="Describa el diagnóstico o problema con el el usuario ingresa a la fundación"
                                                    title="Diagnóstico o problema con el el usuario ingresa a la fundación" rows="1"></textarea>
                                            </div>

                                            <div class="col-12 col-lg-6 col-md-4 col-sm-2 pb-2">
                                                <label for="" class=""><b>Recomendaciones
                                                        médicas:</b></label>
                                                <textarea type="text" class="form-control text " id="recomendacion_med" name="recomendacion_med" tabindex="22"
                                                    placeholder="Digite las recomendaciones medicas" rows="1"></textarea>
                                            </div>
                                        </div> <!--cierra row-->

                                        <div class="row border mt-2">
                                            <div class="col-12 col-lg-6 col-md-4 col-sm-2 pb-2">
                                                <label for="" class=""><b>Dieta
                                                        nutricional:</b></label>
                                                <textarea type="text" class="form-control text observacion" id="dieta_nutricio" name="dieta_nutricio"
                                                    tabindex="23" placeholder="Digite el tipo de dieta o recomendación nutricional" rows="1"></textarea>
                                            </div>

                                            <div class="col-12 col-lg-6 col-md-4 col-sm-2 pb-2">
                                                <label for="" class=""><b>Medicamentos que se le
                                                        suministra:</b></label>
                                                <textarea type="text" class="form-control text" id="suministro_medic" name="suministro_medic" tabindex="24"
                                                    placeholder="Digite los medicamentos que se está suministrándo" rows="1"></textarea>
                                            </div>
                                        </div> <!--cierra row-->

                                        <div class="row border mt-2 ">
                                            <div class="col-12 col-lg-12 col-md-4 col-sm-2 pb-2">
                                                <label for="" class="">Observaciones:</label>
                                                <textarea type="text" class="form-control text" id="observacion" name="observacion" tabindex="25"
                                                    placeholder="Digite observaciones pertinentes" rows="1"></textarea>
                                            </div>
                                        </div> <!--cierra row-->
                                    </div>
                                    <!-- /.card-body-->
                                </div> <!--card car-primary-->
                            </div> <!--col 12-->

                            <script src="{{ asset('../resources/js/save_dato_basico.js') }}"></script>
                            <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                            <script src="{{ asset('../resources/js/imagen.js') }}"></script>
                            <script src="{{ asset('../resources/js/enter_form.js') }}"></script>
                            <footer>
                        </body>
                            <footer>
                                <div class="row border">
                                    <div class="col-lg-12">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body">
                                                <div class=" form-group">
                                                    <button type="button"
                                                        class="btn btn-primary btn-lg m-2 ml-4 form-group btnNew"
                                                        focusNext tabindex="26" id="btnNew" accionBtn="Nuevo"
                                                        name="btnNew">
                                                        <i class="fa fa-file-archive fa-lg"
                                                            style="color:#fffefed8;"></i><b>Nuevo</b>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-primary btn-lg form-group m-2"
                                                        title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                                        focusNext tabindex="27" id="btnEdit" accionBtn="Modificar"
                                                        name="btnEdit">
                                                        <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i><b>
                                                            Modificar</b></button>

                                                    <button type="submit"
                                                        class="btn btn-primary form-group btnUpdate btn-lg m-2"
                                                        tabindex="28" id="btnSave" accionBtn="Guardar"
                                                        name="btnSave">
                                                        <i class="fa fa-save" style="color:#f5dc02e0;"></i><b>
                                                            Guardar</b>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-primary form-group btn-lg m-2" id="btnCancel"
                                                        tabindex="29"> <i class="fa fa-ban"></i><b>
                                                            Cancelar</b></button>

                                                    <!-- Button trigger modal -->
                                                    <button type="button"
                                                        class="btn btn-primary form-group btnSearch btn-lg m-2 "
                                                        id="btnSearch" name="btnSearch" tabindex="30"><i
                                                            class="fa fa-search-location"></i>
                                                        <b>Buscar</b>
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-primary form-group btn-lg m-2" id="btnDelete"
                                                        tabindex="31" disabled="true"><i class="fa fa-trash"
                                                            style="color:#f30b0b;"></i><b> Anular</b></button>

                                                    <a href="{{ URL::to('admin-clientes') }}"
                                                        class="btn btn-primary btn-lg m-2 float-right " tabindex="32"
                                                        id="btnExit"><i class="fa fa-arrow-right fa-md"
                                                            style="color:#f30b0b;"></i><b>Salir</b></a>
                                                </div> <!--form group-->
                                            </div> <!-- /.card-body-->
                                        </div> <!--card car-primary-->
                                    </div>  <!--col-->
                                </div> <!--cierra row-->
                            </footer>

                    </div> <!--col-lg-12-->

                    {{-- </div> <!--row justify-content-between--> --}}
                </form>
                {{-- </div> <!-- card-body text-dark tarjeta_body--> --}}
            </div> <!-- card border-2 -->
        </section>
    </div> <!--brapper -->
@endsection

<!-- ******************************************************
      MODAL PARA LA BUSQUEDA DE CLIENTES DATOS BASICOS
      *****************************************************-->
<!-- Modal -->


<!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscar" class="modalBuscar" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista de usarios datos básicos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable">

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaUserClientes" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>DocIdent</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Fecha ingreso</th>
                                        <th class="text-center">Fecha nacimienti</th>
                                        <th>Telefonos</th>
                                        <th class="text-center">Acción2</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTabla">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                </body>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('../resources/js/datatable.js') }}"></script>

<script>
 
            /**************************************************************
             *Valida la existencia del documento de identidad del usuario   
            ***************************************************************/
            let nDocumento = document.getElementById("num_documento");
           window.addEventListener('load', () => { 
            // saltarEnter()
            
            $("#num_documento").blur(function(){
                let numdcuto = document.getElementsByName('nDdocumento')[0].value 
                let nDocInput = document.getElementsByName('num_documento')[0].value 
                var attrAccion8 = $("#accionBotones").attr("accion");
                if (attrAccion8 == 'Actualizar' & numdcuto ==nDocInput ) {
                    //
                }else{     

					let idEvolMed2 = document.getElementsByName('num_documento')[0].value
					let data = new FormData()
					data.append("num_documento",idEvolMed2);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const validaReg = async () => {
                            await axios.post("{{URL::to('/validaDocumentoBsco')}}",data,{

                            }).then((response) => {

                                //  console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                    // if (response.data){
                                                // console.log(response.data)
                                        document.getElementsByName('num_documento')[0].value= "";
                                        document.getElementById('num_documento').focus()
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Error Duplicado de documento',
                                        text: 'EL DOCUMENTO DE IDENTIDAD QUE ESTÁ INGRESANDO YA EXISTE',
                                        footer: 'No puede ingresar el mismo documento varias veces'
                                    })  
                                    document.getElementById('btnSave').disabled = true;
                                    
                                    

                                }else{
                                    document.getElementById('btnSave').disabled = false;
                                }

							}).catch(function(error) {
								// Swal.fire({
								// 	icon: 'error',
								// 	title: 'Error interno',
								// 	text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
								// 		'  ' + error,
								// 	footer: ''
								// })
							// console.log(error);
						})
					}
					validaReg();
                }
            })
            return true
        })    



    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
    window.addEventListener('load', () => {
        funcBasic = new DatosBasicosClientes(); // 
        funcBasic.desactivaElements()
        document.getElementById('btnDelete').disabled = true;
        document.getElementById('btnEdit').disabled = true;
        document.getElementById('btnNew').disabled = false;
        document.getElementById('btnSearch').disabled = false;
        document.getElementById('btnCancel').disabled = true;
        document.getElementById('btnSave').disabled = true;

        let formularioDbasic = document.getElementById('formularioDbasic')
        let btnSearch = document.getElementById('btnSearch');
        btnSearch.addEventListener('click', () => {
                $("#modalBuscar").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                table_user = $('#tablaUserClientes').DataTable({
                    responsive: true,
                    serverSide: true,
                    destroy: false,
                    scrollY: '400px',
                    paging: true,
                    "ajax": {
                            "url": "{{ URL::to('/buscar-cliente-basicos') }}",
                            "dataSrc": ""
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "num_documento"},
                            {"data": "nombre"},
                            {"data": "apellidos"},
                            {"data": "fecha_creacion"},
                            {"data": "fecha_nacimiento"},
                            {"data": "telefonos_user"},
                        ],
                        columnDefs: [{
                                targets: 6,
                                visible: true
                            },
                            {
                                targets: 7,
                                orderable: false,
                                data: null,
                                render: function(data, type, row, meta) {
                                    let fila = meta.row;
                                    let botones =
                                        `
                                    <button type='button' id='btnCaptura' class='btnCaptura btn btn-primary btn-md' data-dismiss="modal"><i class="fa fa-check-circle"></i></i></button>`
                                    return botones;
                                }
                            }

                        ],
                        "destroy": true,
                        "language":{"url": "../resources/js/espanol.json"}
                }).draw()
                    return true
            })
 
            $('#tablaUserClientes').on("click", "button.btnCaptura", function () {
                formularioDbasic.reset()
                // var datos = table_user.row($(this).parents("tr")).data();
                let data = table_user.row($(this).parents("tr")).data();
                console.log(data)
                funcBasic.asignaValorEdit(data)
                
                document.getElementsByName('nDdocumento')[0].value = data.num_documento

                var texto = document.getElementById("textB")
                texto.innerHTML = 'CONSULTANDO EL REGISTRO DE USUARIO'
                
                /*Cuando se busca un registro se cambial atributo del input hidden*/
                let newNom80 = document.getElementById('accionBotones')
                newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Actualizar'

                document.getElementById('btnDelete').disabled = false;
                document.getElementById('btnEdit').disabled = false;
                document.getElementById('btnNew').disabled = true;
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnSearch').disabled = true;
            })
           return true                                    
    })

    window.addEventListener('load', () => {

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNew");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");

			    funcBasic.activaElements()

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnSave').disabled = false;                       
             
                funcBasic.clearElements()	//Limpia los elementos
				funcBasic.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE USUARIO'

                document.getElementsByName('presBtnNew')[0].value="S"                
                
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnNew').disabled = true;
                document.getElementById('btnSearch').disabled = true;
                
                eliminaSelectDpto = document.getElementById('departamento_id')
                eliminaSelectDpto.innerHTML = "";

                eliminaSelectCiudad = document.getElementById('ciudad_id')
                eliminaSelectCiudad.innerHTML = "";
                
                formularioDbasic.reset()
                document.getElementById('id_tipodoc').focus()
                
				return true
			})
	
        // /*****************************************************
        //     Limpia los campos al presionar el boton cancelar
        // ********************************************************/
        let botonCancel = document.getElementById("btnCancel");
        botonCancel.addEventListener('click', () => {
            // formularioDbasic.reset()
            funcBasic.desactivaElements()
            let newNom80 = document.getElementById('accionBotones')
            newNom80.setAttribute('accion', "Gaurdar");

            var btnGuardar = document.getElementById('btnSave');
            btnGuardar.innerHTML = 'Guardar'
            // cambioTextBotton('btnSave', 'Actualizar', 'Guardar')

            eliminaSelectDpto = document.getElementById('departamento_id')
            eliminaSelectDpto.innerHTML = "";

            eliminaSelectCiudad = document.getElementById('ciudad_id')
            eliminaSelectCiudad.innerHTML = "";

            // changeAttribute = new DatosBasicosClientes()
            // changeAttribute.accionSaveNew()

                document.getElementById('btnCancel').disabled = true;
                document.getElementById('btnSave').disabled = true;                       
             
                funcBasic.clearElements()	//Limpia los elementos
				funcBasic.accionSaveNew() //Cambia el nombre a los bonotes
                
                 let texto2 = document.getElementById('textB')
                 texto2.innerHTML = 'ESPERANDO POR UN NUEVO REGISTRO DE USUARIO'

                document.getElementsByName('presBtnNew')[0].value="S"                
                
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnNew').disabled = false;
                document.getElementById('btnSearch').disabled = false;
                // botonNew.disabled = true;

            formularioDbasic.reset()
            return true
        })

			/*****************************************************
				AL PRESIONAR EL BOTON MODIFICAR
			********************************************************/
            // window.addEventListener('load', () => {
            // let formEvolB2 = document.getElementById('formEmpleados')

            let botonEdit = document.getElementById("btnEdit");
			botonEdit.addEventListener('click', () => {
                funcBasic.activaElements()
                   // cambioTextBotton('btnSaveEmp', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Actualizar'    
                funcBasic.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DEL USUARIO'
                document.getElementsByName('presBtnNew')[0].value="N"                
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnNew').disabled = true;                
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnSearch').disabled = true;
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnSave').disabled = false;
               
                document.getElementById('num_documento').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('num_documento').focus()
                // alert(attrAccion4)    
				return true
			})        
        /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.getElementById('btnSave')
        formularioDbasic.addEventListener('submit', (e) => {
            e.preventDefault();
            // var focoElement = "";
            let validaOk = "OK";
            validaOk = funcBasic.validarCampos()

            var attrAccion2 = $("#accionBotones").attr("accion");

            if (validaOk === "") { // si no hay campos vacíos
                let data = new FormData(formularioDbasic);
                // let valuesDat = [...data.entries()];
                // console.log(valuesDat)
                if (attrAccion2 == 'Guardar') {
                    /*verifica Si se va a Actualizar o a guardar*/
                    const clienteNew = async () => {
                        await axios.post(
                            "{{ URL::to('/insert-cliente-basicos') }}",
                            data, {}).then((resp) => {
                            if(response.data['message']=="Success"){
                            // if(resp.data){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                let texto2 = document.getElementById('textB')
                                texto2.innerHTML = 'ESPERANDO POR UN NUEVO REGISTRO DE USUARIO'
                                document.getElementById('btnDelete').disabled = true;
                                document.getElementById('btnEdit').disabled = true;
                                document.getElementById('btnNew').disabled = false;
                                document.getElementById('btnSearch').disabled = false;
                                document.getElementById('btnCancel').disabled = true;
                                document.getElementById('btnSave').disabled = true;
                            // formularioDbasic.reset()
                            return true;
                            }
                        }).catch(function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error interno',
                                text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                    '  ' + error,
                                footer: ''
                            })
                            // console.log(error);
                        })
                    }
                    clienteNew()
                } else if (attrAccion2 ==
                    'Actualizar') { //Si se va a actualizar el registro
                    let idCliente2 = document.getElementById('idCliente').value
                    const clienteActualiza = async () => {
                        await axios.post(
                            "{{ URL::to('/clienteCliUpdate/{idCliente2}') }}",
                            data, {

                            }).then((response) => {
                                // console.log(response.data)
                            if(response.data['message']=="Success"){
                                // if(response.data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro ha sido ACTUALIZADO con exito',
                                    footer: ''
                                })
                                let texto2 = document.getElementById('textB')
                                texto2.innerHTML = 'ESPERANDO POR UN NUEVO REGISTRO DE USUARIO'
                                document.getElementById('btnDelete').disabled = true;
                                document.getElementById('btnEdit').disabled = true;
                                document.getElementById('btnNew').disabled = false;
                                document.getElementById('btnSearch').disabled = false;
                                document.getElementById('btnCancel').disabled = true;
                                document.getElementById('btnSave').disabled = true;
                                document.getElementsByName('nDdocumento')[0].value ="";
                                funcBasic.desactivaElements()
                                return true
                            }   
                        }).catch(function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error interno',
                                text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                    '  ' + error,
                                footer: ''
                            })
                            // console.log(error);
                        })
                    }
                    clienteActualiza()
                    let newNom80 = document.getElementById('accionBotones')
                    newNom80.setAttribute('accion', "Guardar");

                    document.getElementById('btnSave').innerHTML = 'Guardar';

                    document.getElementById('btnDelete').disabled = true

                    document.getElementById('departamento_id').innerHTML = "";
                    document.getElementById('ciudad_id').innerHTML = ""; 
                        
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error interno',
                        text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                            ' ' + error,
                        footer: ''
                    })
                } // FIN DEL IF attrAccion2 (Validación de registro Nuevo, Actualización o Eliminar)
            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'El Formulario Tiene Datos Incompletos *',
                    text: validaOk,
                    footer: ''
                })
            } //Fin de la validación de los datos vacios
            return true
        })
    })  

        /***********************************************************************************
         * ELIMINACION DEL REGISTRO QUE ESTA EN PANTALLA                                     
         ************************************************************************************/
   
         /*****************************************************
	                Anular Registro
	********************************************************/
    window.addEventListener('load', () => { 
    let botonAnula = document.getElementById("btnDelete");
    botonAnula.addEventListener('click', () => {
			/******************************
			 ELIMINAR REGISTRO 
			 ******************************/
             Swal.fire({
			 title: 'Se ANULARÁ el registro que está en la ventana, Está seguro de Anularlo?',
			 text: "!No podrás revertir el proceso!",
			 icon: 'warning',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Anular',
			 cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					const formEpsE = document.querySelector('#formularioDbasic');
					let idEvolMed = document.getElementsByName('idCliente')[0].value
					let data = new FormData()
					data.append("id",idEvolMed);
					let valuesDatE = [...data.entries()];
					// console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/anulaRegistroBsc')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                    // if (response.data){
                                    document.getElementById('btnDelete').disabled = true;
                                    document.getElementById('btnNew').disabled = false;
                                    document.getElementById('btnCancel').disabled = true;
                                    document.getElementById('btnSearch').disabled = false;
                                    document.getElementById('btnSave').disabled = true;
                                    document.getElementById('btnEdit').disabled = true;  
                             
                                    document.getElementById('textB').innerHTML = 'ANULACION DE REGISTRO DE USUARIOS'                                
                                    funcBasic.clearElements()	                                
                                    formularioDbasic.reset()                                    
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'Se ANULO el registro con exito',
                                        footer: ''
                                    })
                                    formularioDbasic.reset()   
                                }    
							}).catch(function(error) {
								Swal.fire({
									icon: 'error',
									title: 'Error interno',
									text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
										'  ' + error,
									footer: ''
								})
							// console.log(error);
						})
					}
					anulaReg();
				}
			}) 									

            })  

    // *********************************************************
    // LLENAR SELECT DPTO AL PAIS SELECCIONADO                *
    // *********************************************************
    let selectorPais = document.getElementById("nacionalidad_id");
    let selectorDpto = document.getElementById("departamento_id");
    let result = document.getElementById("result");

    // Cuando se hace clic en el objeto
    selectorPais.addEventListener("click", () => {

        // si el valor por defecto se cambia
        selectorPais.addEventListener("change", () => {

            //result.innerHTML = selectorPais.value
            if (selectorPais.value != "") {

                let pais_id = selectorPais.value
                let data = new FormData();
                let dptoPais = async () => {
                    await axios.post("{{ URL::to('/browsDpto') }}", {
                        data: {
                            paisId: pais_id
                        }
                    }).then((resp) => {
                        let dataSelect = resp.data;
                        // console.log(dataSelect);
                        selectorDpto.innerHTML =
                            '<option selected disable value="">Departamentos</option>';

                        dataSelect.forEach(miSeelct => {
                            // console.log(miSeelct)
                            selectorDpto.innerHTML += `
                                        <option value = ${miSeelct.id}>${miSeelct.descripcion}</option>`
                        });

                        /*De igual forma tambien se puede hacer con el For, pero al parecer foreach tiene mejor rendimeinto*/
                        // for (let datoJson3 of dataSelect){
                        //        console.log(datoJson3)
                        //         selectorDpto.innerHTML+=`
                        //          <option value = ${datoJson3.id}>${datoJson3.descripcion}</option>` 
                        //     }

                    }).catch(function(error) {
                        alert(
                            'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas'
                        )
                        //console.log(error);
                    })
                }
                dptoPais()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "No hay Departamentos del país seleccionado",
                    footer: ''
                })
            }
        })
        return true
    })

    /*********************************************************
     LLENAR SELECT CIUDAD DE ACUERDO AL DEPARTAMENTO         *
     *********************************************************/
    let selectorDpto2 = document.getElementById("departamento_id");

    selectorDpto2.addEventListener("click", () => {
        let selectorPais2 = document.getElementById("nacionalidad_id");
        let selectorCiudad = document.getElementById("ciudad_id");
        // si el valor por defecto se cambia
        selectorDpto2.addEventListener("change", () => {

            if (selectorDpto2.value != "") {
                let pais_id = selectorPais2.value
                let departamento_id = selectorDpto2.value
                let data = new FormData();

                let ciudadDpto = async () => {
                    await axios.post("{{ URL::to('/browsCiudad') }}", {
                        data: {
                            paisId: pais_id,
                            dptoId: departamento_id
                        }
                    }).then((respu) => {
                        let dataSelect2 = respu.data;
                        //console.log(dataSelect2);
                        selectorCiudad.innerHTML =
                            '<option selected disable value="">Ciudades</option>';

                        dataSelect2.forEach(miSeelct2 => {
                            // console.log(miSeelct)
                            selectorCiudad.innerHTML += `
                                                <option value = ${miSeelct2.id}>${miSeelct2.descripcion}</option>`
                        });
                    }).catch(function(error) {
                        alert(
                            'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas' +
                            ' ' + error,
                        )
                        //console.log(error);
                    })
                }
                ciudadDpto()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "No hay Departamentos del país seleccionado",
                    footer: ''
                })
            }
            return true
        })
        return true
    })

    selectorPaises()
    /*********************************************************
         LLENAR SELECT PAIS 
    *********************************************************/
    function selectorPaises() {
        let selectorPais = document.getElementById("nacionalidad_id");
        let paisSelect = async () => {
            await axios.get("{{ URL::to('/browsPais') }}", {

            }).then((resp) => {
                let dataSelect3 = resp.data;
                // console.log(dataSelect3);
                selectorPais.innerHTML =
                    '<option selected disable value="">Pais</option>';
                dataSelect3.forEach(miSeelct3 => {
                    selectorPais.innerHTML += `
                                <option value = ${miSeelct3.id}>${miSeelct3.descripcion}</option>`
                });
            }).catch(function(error) {
                alert(
                        'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas'
                        ) +
                    '  ' + error
                console.log(error)
            })
        }
        paisSelect()
    }

 

    // salirFormulario()
    }) //windows load


    // **********************************************************************
    // LLENAR SELECT DEPTO AL PAIS SELECCIONADO  CUANDO SE EDITA UN REGISTRO*
    // **********************************************************************
    function departamentos(idPaisEdit, dpto_id) {
        // let selectorPais4 = document.getElementById("nacionalidad_id");
        let selectorDpto4 = document.getElementById("departamento_id");
        let result4 = document.getElementById("result");

        let data = new FormData();
        let dptoPais4 = async () => {
            await axios.post("{{ URL::to('/browsDpto') }}", {
                data: {
                    paisId: idPaisEdit
                }
            }).then((resp4) => {
                let dataSelect4 = resp4.data;
                // console.log(dataSelect4);
                selectorDpto4.innerHTML = '<option disable value="">Departamentos</option>';

                dataSelect4.forEach(miSeelct4 => {
                    // console.log(miSeelct)
                    let abcdf = `${miSeelct4.id}`

                    if (dpto_id == abcdf) {
                        // console.log('VAR:'+dpto_id+' '+'axios:'+abcdf)
                        selectorDpto4.innerHTML += `
                                        <option selected value = ${miSeelct4.id}>${miSeelct4.descripcion}</option>`
                    } else {
                        selectorDpto4.innerHTML += `
                        <option value = ${miSeelct4.id}>${miSeelct4.descripcion}</option>`
                    }
                });
            }).catch(function(error) {
                alert(
                    'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas' +
                    ' ' + error
                )
                // console.log(error);
            })
        }
        dptoPais4()
    }

    // *******************************************************************************
    // LLENAR SELECT CIUDAD DEL DPTO Y PAIS SELECCIONADO  CUANDO SE EDITA UN REGISTRI*
    // *******************************************************************************
    function ciudadesEdit(idPaisEdit, dptoIdEdit, ciudad__select_edit) {
        let selectorDpto5 = document.getElementById("departamento_id");

        let selectorPais5 = document.getElementById("nacionalidad_id");
        let selectorCiudadEdit = document.getElementById("ciudad_id");

        let data = new FormData();

        let ciudadEdit = async () => {
            await axios.post("{{ URL::to('/browsCiudad') }}", {
                data: {
                    paisId: idPaisEdit,
                    dptoId: dptoIdEdit
                }
            }).then((respu5) => {
                let dataSelect5 = respu5.data;
                // console.log(dataSelect5);
                selectorCiudadEdit.innerHTML = '<option disable value="">Ciudades</option>';

                dataSelect5.forEach(miSeelct5 => {
                    let abcdf5 = `${miSeelct5.id}`
                    if (ciudad__select_edit == abcdf5) {
                        // console.log('VAR:'+ciudad__select_edit+' '+'axios:'+abcdf5)
                        selectorCiudadEdit.innerHTML += `
                                        <option selected value = ${miSeelct5.id}>${miSeelct5.descripcion}</option>`
                    } else {
                        selectorCiudadEdit.innerHTML += `
                                        <option value = ${miSeelct5.id}>${miSeelct5.descripcion}</option>`
                    }
                });
            }).catch(function(error) {
                alert(
                    'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas' +
                    ' ' + error,
                )
                // console.log(error);
            })
        }
        ciudadEdit()
    }


    document.addEventListener("DOMContentLoaded", function() {
        // access Dropzone here
        // Dropzone.autoDiscover = false
        // var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        //     url: "/target-url", // Set the url
        //     thumbnailWidth: 80,
        //     thumbnailHeight: 30,
        //     parallelUploads: 20,
        //     previewTemplate: previewTemplate,
        //     autoQueue: false, // Make sure the files aren't queued until manually added
        //     previewsContainer: "#previews", // Define the container to display the previews
        //     clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        // })
        // myDropzone.on("addedfile", function(file) {
        //     // Hookup the start button
        //     file.previewElement.querySelector(".start").onclick = function() {
        //         myDropzone.enqueueFile(file)
        //     }
        // })

        // // Update the total progress bar
        // myDropzone.on("totaluploadprogress", function(progress) {
        //     document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        // })
      
        return true
    });

    // /*NUMERO DE AÑOS ENTRE FECHAS*/
    function tuEdadReal() {

    let fechaIni  = moment(document.getElementsByName('fecha_nacimiento')[0].value).format('MM/DD/YYYY');
    let fechaFin = moment().format('MM/DD/YYYY');
    let numDias = moment(fechaFin).diff(moment(fechaIni), 'years');
    document.getElementsByName("edad")[0].value = numDias;
    }

    
</script>
