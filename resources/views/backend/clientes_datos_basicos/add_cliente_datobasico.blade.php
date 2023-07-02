@extends('backend.layouts.app')
@section('content')

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('../resources/js/back_off.js') }}"></script>
    </head>

    <style>
        .tarjeta_body {
            margin: 1px;
            background-color: #eef3eb;
            border: 4em;
            border-color: #ee2015;
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
        }
    </style>

    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body">
                    <form name="formularioDbasic" id="formularioDbasic" method="POST">
                        @csrf
                        {{-- @method('put') --}}

                        <div class="row justify-content-between">

                            <body onload="nobackbutton();">
                                <div class="col-sm-10">
                                    <div class="card card-primary">
                                        <div class="card-header">|
                                            <h3 class="card-title ">Ingreso de nuevo usuario o Reserva</h3>
                                            <h3 class="card-title float-right">Datos Básicos Personales</h3>
                                        </div>

                                        <div class="card-body c-body">
                                            <input type="hidden" name="reserva_si_no" id="reserva_si_no" value="SI">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="idCliente" id="idCliente">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label class="col-form-label ">*Tipo Documento</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        tabindex="1" name="id_tipodoc" id="id_tipodoc">
                                                        @foreach ($tipoDoc as $tipoDoc)
                                                            <option value={{ $tipoDoc->id }}>{{ $tipoDoc->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label">*Doc Identidad</label>
                                                    <input type="text" class="form-control text focusNext" maxlength="25"
                                                        tabindex="2" name="num_documento" id="num_documento" value
                                                        placeholder="Digite No. del documento">                                                        >
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="nombre" class="col-form-label">*Nombre:</label>
                                                    <input type="text" class="form-control text focusNext" maxlength="40"
                                                        tabindex="3" name="nombre" id="nombre"
                                                        placeholder="Digite Nombre">
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="apellidos" class="col-form-label">*Apellidos:</label>
                                                    <input type="text" class="form-control text focusNext" maxlength="40"
                                                        tabindex="4" name="apellidos" id="apellidos"
                                                        placeholder="digite apellidos">
                                                </div>


                                            </div>
                                            <!--cierra row-->

                                            <div class="row">
                                                <div class="col-6 col-sm-2">
                                                    <label class="col-form-label">*Nacionalidad</label>
                                                    <select class="form-control focusNext text" id="nacionalidad_id"
                                                        name="nacionalidad_id" tabindex="5">
                                                        <option disable value="">País</option>
                                                        {{-- @foreach ($pais as $datoInput)
                                                            <option value={{ $datoInput->id }}>{{ $datoInput->descripcion }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                {{-- <div id="result">option selected : "The default value is first option"</div> --}}

                                                <div class="col-sm-2">
                                                    <label class="col-form-label">*Dpto Nacimiento</label>
                                                    <select class="form-control text focusNext" style="width: 100%;"
                                                        tabindex="6" id="departamento_id" name="departamento_id">
                                                        <option disable value="">Dpto</option>

                                                    </select>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label class="col-form-label">*Ciudad Nacimiento</label>
                                                    <select class="form-control |sNext text" style="width: 100%;"
                                                        tabindex="7" id="ciudad_id" name="ciudad_id">
                                                        <option disable value="">Ciudad</option>

                                                    </select>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="" class="col-form-label">*F. nacimiento:</label>
                                                    <input type="date"
                                                        class="form-control text focusNext fecha_nacimiento"
                                                        id="fecha_nacimiento" name="fecha_nacimiento" onchange="tuEdadReal()"
                                                        tabindex="8">
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for="edad" class=" col-form-label">Edad:</label>
                                                    <input type="text" class="form-control text focusNext"
                                                        name="edad" tabindex="9" id="edad" placeholder="Edad">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="SelectSexo" class="col-form-label">*Genero</label>
                                                    <select class="form-control focusNext text" id="sexo_id"
                                                        tabindex="10" name="sexo_id">
                                                        <option selected disable value="">Genero</option>
                                                        @foreach ($genero as $datoInput)
                                                            <option value={{ $datoInput->id }}>{{ $datoInput->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>
                                            <!--cierra row-->
                                            <div class="row">

                                            </div>

                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <label for="SelectSexo" class="col-form-label">*Grupo RH</label>
                                                    <select class="form-control focusNext text" tabindex="11"
                                                        id="grupoSanguineo_id" name="grupoSanguineo_id">
                                                        <option selected disable value="">Tipo</option>
                                                        @foreach ($grupo_rh as $datoInput)
                                                            <option value={{ $datoInput->id }}>{{ $datoInput->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label">*Teléfonos :</label>
                                                    <input type="text" class="form-control text focusNext"
                                                        maxlength="60" tabindex="12" id="telefonos_user"
                                                        name="telefonos_user" placeholder="Digite Telefonos del usuario">
                                                </div>

                                                <div class="col-sm-5">
                                                    <label for="dirRes" class="col-form-label">*Dirección
                                                        Residencial:</label>
                                                    <input type="text" class="form-control text focusNext"
                                                        maxlength="100" name="direccion_res" tabindex="13"
                                                        id="direccion_res" placeholder="Digite Dirección residencial">
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label">*Email Usuario:</label>
                                                    <input type="email" class="form-control text focusNext"
                                                        maxlength="50" tabindex="14" id="email_user" name="email_user"
                                                        placeholder="Digite Email existente">
                                                </div>
                                            </div>
                                            <!--cierra row-->

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label">*Fecha
                                                        creación/Reserva:</label>
                                                    <input type="date"
                                                        class="form-control text focusNext fecha_creacion"
                                                        id="fecha_creacion" tabindex="15" name="fecha_creacion">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label">*Estado del
                                                        Usuario:</label>
                                                    <input class="form-control text focusNext" type="checkbox"
                                                        tabindex="16" name="estado_user" id="estado_user" checked
                                                        data-bootstrap-switch data-off-color="danger"
                                                        data-on-color="success">
                                                </div>
                                            </div>
                                            <!--cierra row-->

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="" class="col-form-label">Diagnóstico (DX) de la
                                                        solicitud la reserva:</label>
                                                    <textarea type="text" class="form-control text diagnostico" id="diagnostico"
                                                        name="diagnostico" placeholder="Digite el diagnóstico"></textarea>
                                                </div>
                                            </div>
                                            <!--cierra row-->

                                            <input type="hidden" name="tiposervicio_id" value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title float-right ">Fotografía</h3>
                                        </div>
                                        <div class="card-body bg-info">
                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                <div class="image">
                                                    <img id="imagenPrevisualizacion" class="img-responsive"
                                                        style="width:150px;height:150px">
                                                    {{-- <img src="{{ asset('backend/dist/img/foto.jpg') }}" --}}
                                                    {{-- class="img-circle elevation-4" alt="User Image"> --}}
                                                </div>
                                                {{-- <div class="info">
                                                    <a href="#" class="d-block">{{ auth()->user()->name }} </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <input type="file" id="seleccionArchivos" class="btn btn-success"
                                            accept="image/*">
                                        {{-- <span class="btn btn-success col fileinput-button"> --}}
                                        {{-- <i class="fas fa-plus"></i> --}}
                                        {{-- <span>Subir foto</span> --}}
                                        </span>
                                    </div>
                                </div>
                                <script src="{{ asset('../resources/js/save_dato_basico.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                                <script src="{{ asset('../resources/js/imagen.js') }}"></script>
                            </body>
                        </div>

                        <div class="row">
                            <div class="col-sm-10">
                                <label for="" class="col-form-label">Observaciones:</label>
                                <textarea type="text" class="form-control text observacion" id="observacion" name="observacion"
                                    placeholder="Digite observaciones pertinentes"></textarea>
                            </div>
                        </div>
                        <!--cierra row-->
                        
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group pt-2">
                                    <button type="submit" class="btn btn-primary form-group btnUpdate" tabindex="19"
                                        id="btnSave" accionBtn="guardar"name="btnSave">
                                        <i class="fa fa-save" style="color:#f30f0fe0;"></i> Guardar
                                    </button>
                                    <button type="button" class="btn btn-primary form-group" id="btnCancel"
                                        tabindex="20">  <i class="fa fa-ban"></i> Cancelar</button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary form-group btnSearch " id="btnSearch"
                                        name="btnSearch" tabindex="22"><i class="fa fa-search-location"></i>
                                         Buscar
                                    </button>

                                    <button type="button" class="btn btn-primary form-group" id="btnDelete"
                                        tabindex="23" disabled="true"><i class="fa fa-trash" style="color:#f30b0b;"></i> Eliminar</button>
                                    <a href="{{ URL::to('admin-prueba') }}" class="btn btn-primary float-right "
                                        tabindex="24" id="btnExit"><i class="fa fa-arrow-right fa-lg" style="color:#f30b0b;"></i> Salir</a>
                                </div>
                            </div>
                            {{-- </div>  <!--cierra row--> --}}
                    </form>
                </div>
            </div>
    </div>
    </section>

    </div>
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

                <body>
                    <div class="modal-body">
                        <div class="card-body p-3 mb-2 bg-primary text-white">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>DocIdent</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Edad</th>
                                        <th>Telefonos</th>
                                        <th class="text-center">Tipo de servicio</th>
                                        <th class="text-center">Acción2</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTablaDtBasic">



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
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

                </body>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script></script>
saltarEnterFormulario()

<script>
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
    window.addEventListener('load', () => {
        let bodyTablaClientes = document.getElementById("bodyTabla");
        let modalBuscar = document.getElementById('modalBuscar');
        let btnSearch = document.getElementById('btnSearch');
        btnSearch.addEventListener('click', () => {
            $("#modalBuscar").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });

            const busquedaClientes = async () => {
                await axios.get("{{ URL::to('/buscar-cliente-basicos') }}").then((res) => {
                    let data = res.data;
                    bodyTablaDtBasic.innerHTML = "";
                    for (let i = 0; i < data.length; i++) {
                        bodyTablaDtBasic.innerHTML += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${data[i].num_documento}</td>
                            <td>${data[i].nombre+" "+data[i].apellidos}</td>
                            <td class="text-center">${data[i].edad}</td>                              
                            <td>${data[i].telefonos_user}</td>
                            <td class="text-center">${data[i].descripcion}</td>
                            <td>
                                <button type="button" onclick="obtenerRegistro(${data[i].id})" class="btn btn-secondary btnSelect" id="btnSelect" data-dismiss="modal" name="btnSelect">Ok</button>
                            </td>
                        </tr>`
                    }
                }).catch((error) => {
                    //console.log(error);
                })
            }
            busquedaClientes()
        })

    })

    /*********************************************************************************
     * LLENA LOS CAMPOS DEL FORMULARIO QUE VIENEN DE LA TABLAS DE BUSQUEDA CLIENETS (boton ok)*
     **********************************************************************************/
    async function obtenerRegistro(idCliente) {
        let newVar = idCliente
        let data = new FormData();
        data.append("id", idCliente);
        await axios.post("{{ URL::to('/clienteCli') }}", data, {}).then((resp) => {
            let data2 = resp.data;
            //console.log(data2);
            // llenaCamposEdit = new DatosBasicosClientes()
            // llenaCamposEdit.asignaValorEdit(data2)
            let i = 0;
            document.getElementById('id_tipodoc').value = `${data2[i].id_tipodoc}`
            document.getElementById('num_documento').value = `${data2[i].num_documento}`
            document.getElementById('nombre').value = `${data2[i].nombre}`
            document.getElementById('apellidos').value = `${data2[i].apellidos}`
            document.getElementById('nacionalidad_id').value = `${data2[i].nacionalidad_id}`
            document.getElementById('departamento_id').value = `${data2[i].departamento_id}`
            document.getElementById('ciudad_id').value = `${data2[i].ciudad_id}`
            document.getElementById('fecha_nacimiento').value = `${data2[i].fecha_nacimiento}`
            document.getElementById('edad').value = `${data2[i].edad}`
            document.getElementById('sexo_id').value = `${data2[i].sexo_id}`
            document.getElementById('grupoSanguineo_id').value = `${data2[i].grupoSanguineo_id}`
            document.getElementById('telefonos_user').value = `${data2[i].telefonos_user}`
            document.getElementById('direccion_res').value = `${data2[i].direccion_res}`
            document.getElementById('email_user').value = `${data2[i].email_user}`
            document.getElementById('fecha_creacion').value = `${data2[i].fecha_creacion}`
            document.getElementById('estado_user').value = `${data2[i].estado_user}`
            document.getElementById('diagnostico').value = `${data2[i].diagnostico}`
            document.getElementById('observacion').value = `${data2[i].observacion}`
            document.getElementById('idCliente').value = `${data2[i].id}`

            let idNacionalidad = `${data2[i].nacionalidad_id}`
            let dpto_id = `${data2[i].departamento_id}`
            departamentos(idNacionalidad, dpto_id)

            let ciudad_seleEdit = `${data2[i].ciudad_id}`
            ciudadesEdit(idNacionalidad, dpto_id, ciudad_seleEdit)

            changeAttribute = new DatosBasicosClientes()
            changeAttribute.accionUpdate()

            let accionesAll = "accion_editar"
            document.getElementById("accionBotones").value = `${accionesAll}`
            cambioTextBoton = new Funciones()
            cambioTextBoton.cambioTextBotton('btnSave', 'Guardar', 'Actualizar')
            var attrAccion = $("#accionBotones").attr("accion");

            let btnDeleteclick1 = document.getElementById('btnDelete')
            btnDeleteclick1.disabled = false
        }).catch((error) => {
            //console.log(error);
        })
    }

    window.addEventListener('load', () => {
        let btnDeleteclick = document.getElementById('btnDelete')
        btnDeleteclick.addEventListener('click', () => {
            let idCliente2 = document.getElementById('idCliente').value
            alert(idCliente2)
            btnDeleteclick.disabled = true
        })
    })

    window.addEventListener('load', () => {
        /*****************************************************
            Limpia los campos al presionar el boton cancelar
        ********************************************************/
        let botonCancel = document.getElementById("btnCancel");
        botonCancel.addEventListener('click', () => {
            formularioDbasic.reset()
            cambioTextBoton = new Funciones()
            cambioTextBoton.cambioTextBotton('btnSave', 'Actualizar', 'Guardar')

            eliminaSelectDpto = document.getElementById('departamento_id')
            eliminaSelectDpto.innerHTML = "";

            eliminaSelectCiudad = document.getElementById('ciudad_id')
            eliminaSelectCiudad.innerHTML = "";

            changeAttribute = new DatosBasicosClientes()
            changeAttribute.accionSaveNew()

            let btnDeleteclick2 = document.getElementById('btnDelete')
            btnDeleteclick1.disabled = true
        })

        /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/

        selectorGuardar = document.getElementById('btnSave')
        selectorGuardar.addEventListener("click", () => {
            let validarCampos = new DatosBasicosClientes()
            let validaOk = validarCampos.validarCampos()
            let formularioDbasic = document.getElementById('formularioDbasic');
            formularioDbasic.addEventListener('submit', (e) => {
                e.preventDefault();

                var attrAccion2 = $("#accionBotones").attr("accion");

                if (validaOk === "") { // si no hay campos vacíos
                    let data = new FormData(formularioDbasic);
                    if (attrAccion2 == 'Guardar') {
                        /*verifica Si se va a Actualizar o a guardar*/
                        //alert('registro nuevo')
                        //console.log(data)
                        const clienteNew = async () => {
                            await axios.post(
                                "{{ URL::to('/insert-cliente-basicos') }}",
                                data, {}).then((resp) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                formularioDbasic.reset()
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
                                "{{ URL::to('/clienteCliUpdate/{idcliente2}') }}",
                                data, {

                                }).then((response) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se ACTUALIZÓ con exito',
                                    footer: ''
                                })
                                formularioDbasic.reset()
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

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error interno',
                            text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                ' ' + error,
                            footer: ''
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'El Formulario Tiene Datos Incompletos *',
                        text: validaOk,
                        footer: ''
                    })
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
            })
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
                            'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas') +
                        '  ' + error
                    console.log(error)
                })
            }
            paisSelect()
        }

        saltarEnter()

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
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    function evitaCierreFormulario() {
        window.addEventListener('load', () => {

            window.addEventListener("beforeunload", (evento) => {
                if (true) {
                    evento.preventDefault();
                    evento.returnValue = "";
                    return "";
                }
            })
        })
    }
 

    function tuEdadReal(){
           
         const selectFecha = document.querySelector('#fecha_nacimiento');
         const fecha = document.getElementById('fecha_nacimiento').value
            selectFecha.addEventListener('change', updateEdad)

            function updateEdad(){
                var hoy = new Date();
                var cumpleanos = new Date(fecha);
                var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                var m = hoy.getMonth() - cumpleanos.getMonth();

                if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                    edad--;
                }
                if(edad>1){
                    tipoFecha = "Año"
                }else if(edad>1){
                    tipoFecha = "Años"
                }else{
                    tipoFecha = "Meses"
                }
                document.getElementById('edad').value = edad +" "+ "Años"
                foco = document.getElementById('sexo_id')
                foco.focus()
                return edad;
        }     
        updateEdad()          
    }   
        
   

    
    
</script>