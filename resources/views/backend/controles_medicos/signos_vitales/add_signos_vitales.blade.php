@extends('backend.layouts.app')
@section('content')
    <style>
        .tarjeta_body {
            margin: 2px;
            background-color: #eef3eb;
            border: 4em;
            border-color: #ee2015;
        }

        input:disabled {
            background: #2015f3;
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

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body">
                    <form role="form" name="formSvDiaria" id="formSvDiaria" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                @foreach ($seleUsuarioSv as $datosRow)
                                @endforeach
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;"
                                                class="card-title">CONTROL DE SIGNOSVITALES
                                            </h3>

                                            <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                USUARIO/CLIENTE ---
                                                {{ $datosRow->num_documento . ' ' . $datosRow->nombre . ' ' . $datosRow->apellidos }}
                                            </h3>
                                            <input type="hidden" id="datosbasicos_id" name="datosbasicos_id"
                                                value={{ $datosRow->id }}>
                                            <input type="hidden" id="idSvMedica" name="idSvMedica">
                                            <input type="hidden" id="user_id" name="user_id"
                                                value={{ auth()->user()->id }}>
                                        </div>
                                        <div class="card-body" style="background-color: #08a2ef">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNewSv" id="presBtnNewSv" value="N">
                                            <div class="row border">
                                                <div class="col-12 col-sm-2">
                                                    <h3><b>Hora y fecha del proceso</b></h3>
                                                </div>
                                                <div class="col-12 col-sm-3 col-md-2">
                                                    <label for="">Fecha:</label>
                                                    <input type="date" class="form-control text mb-2" name="fecha"
                                                        id="fecha" title="Digite en que se realiza este proceso"
                                                        focusNext tabindex="1">
                                                </div>

                                                <div class="col-sm-5 col-md-4 col-lg-3 border">
                                                    <label for="" class="">Hora</label>
                                                    <input type="time" class="form-control text" name="hora"
                                                        max="24:00:00" min="01:00:00" step="1" id="hora"
                                                        style="height: 4    0px" title="Hora de la atención médica"
                                                        focusNext tabindex="2">
                                                </div>
                                                <div class="col-sm-12 col-lg-5 border">
                                                    <label for="">Quien realiza el proceso?</label>
                                                    <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="empleado_id" id="empleado_id" focusNext tabindex="3">
                                                        <option selected="selected" disable value=" ">Seleciona
                                                            profesionalmedico</option>
                                                        @foreach ($empleadosSv as $medicoExt)
                                                            <option value={{ $medicoExt->id }}>{{ $medicoExt->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> <!--cierre de row -->
                                            </br>

                                            <div class="row">
                                                <div class="col-12 col-md-4 col-sm-6 col-lg-2 border">
                                                    <h5><b>Signos vitales</b></h5>
                                                </div>

                                                <div class="col-12 col-md-4 col-lg-2 col-sm-6 border">
                                                    <label>FC (lpm)</label>
                                                    <input type="text" class="form-control text  mb-2" name="signosv_pc"
                                                        id="signosv_pc" placeholder="Fc Cardiaca"
                                                        title="Frecuenci cardiaca o pulso" focusNext tabindex="7">
                                                </div>
                                                <div class="col-12 col-sm-4 col-md-6 col-lg-2 border">
                                                    <label>FR (rpm)</label>
                                                    <input type="text" class="form-control text" name="signosv_fr"
                                                        id="signosv_fr" placeholder="Fr. respiratoria"
                                                        title="Frecuania respiratoria" focusNext tabindex="8">
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-2 col-sm-6 border">
                                                    <label>PA (mmHg)</label>
                                                    <input type="text" class="form-control text" name="signosv_ta"
                                                        id="signosv_ta" placeholder="Presión arterial"
                                                        title="Presión arterial" focusNext tabindex="9">
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-2 col-sm-6 border">
                                                    <label>Saturaión (Kg)</label>
                                                    <input type="text" class="form-control text" name="sv_saturacion"
                                                        id="sv_saturacion" placeholder=""
                                                        title="Digite el peso en kg, del paciente" focusNext
                                                        tabindex="11">
                                                </div>
                                                <div class="col-12 col-md-4 col-lg-2 col-sm-6 border">
                                                    <label>TEMPC (°C)</label>
                                                    <input type="text" class="form-control text" name="signosv_t"
                                                        id="signosv_t" placeholder="Temp° Corporal"
                                                        title="Temperatura corporal" focusNext tabindex="10">
                                                </div>
                                            </div>

                                            </br>
                                            <div class="row border">
                                                <div class="col-12 col-md-12 col-lg-12 col-sm-12 border">
                                                    <label for="">
                                                        <h5><b>Recomendaciones adicionales?</b></h5>
                                                    </label>
                                                    <textarea type="text" class="form-control text mb-2 " rows="2" id="recomendaciones" name="recomendaciones"
                                                        title="Describa las recomendaciones necesarias"
                                                        placeholder="Describa las recomendaciones necesarias" focusNext tabindex="16"></textarea>
                                                </div>
                                            </div> <!-- Cierre carBody -->
                                        </div>
                                        <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                        <script src="{{ asset('../resources/views/backend/controles_medicos/signos_vitales/signos_vitales.js') }}"></script>
                                        <script src="{{ asset('../resources/js/funciones.js') }}"></script>

                            </body>
                        </div>
                        <footer>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button type="button" class="btn btn-primary btn-lg form-group btnNewSv"
                                            title="Limpia todos las cledas para iniciar la creación de un nuevo registro"
                                            focusNext tabindex="17" id="btnNewSv" accionBtn="Nuevo" name="btnNewSv">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Ctrl
                                        </button>
                                        <button type="button" class="btn btn-primary btn-lg form-group"
                                            title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditSv" accionBtn="Modificar"
                                            name="btnEditSv">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-lg form-group"
                                            title="Guarda en la base de datos el nuevo registr o lactualización" focusNext
                                            tabindex="19" id="btnSaveSv" accionBtn="Guardar"name="btnSaveSv">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchSv btn-lg"
                                            title="Bucar un registro de Svución médica del usuario actual"
                                            id="btnSearchSv" name="btnSearchSv" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>
                                            Consultar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelSv"
                                            title="Cancela el proceso actual y limpia cada una de las celdas" focusNext
                                            tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteSv"
                                            title="Anula el registro que esta en la ventana" focusNext tabindex="22"
                                            disabled="true"><i class="fa fa-trash fa-lg" style="color:#f30b0b;"></i>
                                            Anular </button>

                                        <a href="{{ URL::to('/admin-signos-vitales') }}"
                                            class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                            focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                style="color:#f30b0b;"></i> Salir</a>
                                    </div>
                                </div>
                                {{-- </div>  <!--cierra row--> --}}
                        </footer>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
<!-- ******************************************************
      MODAL PARA LA BUSQUEDA DE CLIENTES DATOS BASICOS
      *****************************************************-->

<!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscarSv" class="modalBuscarSv" data-backdrop="static" focusNext
        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista General de usarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaClientesSv" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Acción</th>
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
<!-- Modal -->
<script src="{{ asset('../resources/js/datatable.js') }}"></script>


<script>
    // window.addEventListener('load', () => {
    // let btnSearchSv = document.getElementById('btnSearchSv');
    // btnSearchSv.addEventListener('click', () => {  
    // //   let data = new FormData();
    //    let prueba = async () => {
    //        await axios.get("{{ URL::to('/buscar-CtrlMed') }}", {

    //        }).then((resp) => {
    //            let dataSelect = resp.data;
    //            console.log(dataSelect);

    //        }).catch(function(error) {
    //            alert(
    //                'Error, intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas'
    //            )
    //            //console.log(error);
    //        })

    //     } 
    //     prueba() 
    //     })
    // })  

    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
    window.addEventListener('load', () => {
    let formSvB = document.getElementById('formSvDiaria')

    document.getElementById('btnCancelSv').disabled = true;
    document.getElementById('btnCancelSv').disabled = true;
    // document.getElementById('btnSaveSv').disabled = true;
    funcLib = new SvFucionDiariaMed(); // 

    funcLib.desactivaInput();
    document.getElementById('btnEditSv').disabled = true;
    let modalBuscarSv = document.getElementById('modalBuscarSv');
    let btnSearchSv = document.getElementById('btnSearchSv');
    var idSingosV = document.getElementsByName('datosbasicos_id')[0].value
    btnSearchSv.addEventListener('click', () => {
        $("#modalBuscarSv").modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
         table = $('#tablaClientesSv').DataTable({
            responsive: true,
            serverSide: true,
            destroy: false,
            scrollY: '400px',
            paging: true,
            
            "ajax": {
                "url": "{{ URL::to('/helpSignosVitales')}}",
                dataSrc: ""
                
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "fecha"
                },
                {
                    "data": "hora"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "apellidos"
                },
            ],
            columnDefs: [{
                    targets: 4,
                    visible: true
                },
                {
                    targets: 5,
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
            "language": {
                "url": "../../resources/js/espanol.json"
            }

        });

     $("#tablaClientesSv").on("click", "button.btnCaptura", function() {
        let data = table.row($(this).parents("tr")).data();
        let dataSv = data;
        console.log(dataSv)
        funcLib.asignaValorEdit(dataSv)

        var btnGuardar = document.getElementById('btnSaveSv');
        btnGuardar.innerHTML = 'Actualizar'

        document.getElementById('btnSaveSv').disabled = true;
        document.getElementById('btnEditSv').disabled = false;
        document.getElementById('btnCancelSv').disabled = false;
        document.getElementById('btnNewSv').disabled = true;
        document.getElementById('btnSearchSv').disabled = true;
        let btnDeleteSvclick1 = document.getElementById('btnDeleteSv')
        btnDeleteSvclick1.disabled = false
    })
        return true
    }) // window load el primero

  })
    /*****************************************************
    	AL PRESIONAR EL BOTON MODIFICAR
    ********************************************************/
    window.addEventListener('load', () => {
        let formSvB2 = document.getElementById('formSvDiaria')
        let botonEdit = document.getElementById("btnEditSv");
        botonEdit.addEventListener('click', () => {
            funcLib.activaInput();
            // cambioTextBotton('btnSaveSv', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

            var btnGuardar = document.getElementById('btnSaveSv');
            btnGuardar.innerHTML = 'Actualizar'
            funcLib.accionUpdate() //coloca en accion botones 'Actualizar'

            var texto = document.getElementById("textB")
            texto.innerHTML = 'EDITANDO REGISTRO DE CONTROL MEDICO'
            document.getElementsByName('presBtnNewSv')[0].value = "N"
            document.getElementById('btnEditSv').disabled = true;
            document.getElementById('btnNewSv').disabled = true;
            document.getElementById('btnDeleteSv').disabled = true;
            document.getElementById('btnSearchSv').disabled = true;
            botonEdit.disabled = true;
            document.getElementById('btnCancelSv').disabled = false;
            document.getElementById('btnSaveSv').disabled = false;

            document.getElementById('fecha').focus()
            var attrAccion4 = $("#accionBotones").attr("accion");
            document.getElementById('fecha').focus()
            // alert(attrAccion4)    
            return true
        })

        /*****************************************************
        	Limpia los campos al presionar el boton nuevo
        ********************************************************/
        let botonNew = document.getElementById("btnNewSv");
        botonNew.addEventListener('click', () => {
            var attrAccion3 = $("#accionBotones").attr("accion");
            // alert(attrAccion3)
            funcLib.activaInput();

            //  cambioTextBotton('btnSaveSv', 'Actualizar', 'Guardar')
            var btnGuardar = document.getElementById('btnSaveSv');
            btnGuardar.innerHTML = 'Guardar'

            funcLib.clearElements() //Limpia los elementos
            funcLib.accionSaveNew() //Cambia el nombre a los bonotes

            let texto2 = document.getElementById('textB')
            texto2.innerHTML = 'NUEVO CONTROL DIARIO DE EVOLUCION MEDICA'

            document.getElementsByName('presBtnNewSv')[0].value = "S"

            document.getElementById('btnDeleteSv').disabled = true;
            document.getElementById('btnEditSv').disabled = true;
            document.getElementById('btnNewSv').disabled = true;
            document.getElementById('btnSearchSv').disabled = true;
            botonNew.disabled = true;
            document.getElementById('btnCancelSv').disabled = false;
            document.getElementById('btnSaveSv').disabled = false;

            formSvB2.reset()
            document.getElementById('fecha').focus()

            return true
        })
        return true
    })
    /********************************************************************************************
         GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
     ***********************************************************************************************/
    window.addEventListener('load', () => {

        selectorGuardar = document.querySelector('#btnSaveSv')
        const formSvQ = document.querySelector('#formSvDiaria');
        formSvQ.addEventListener("submit", (e) => {
            e.preventDefault();
            let validaOk = "Ok";

            validaOk = funcLib.validarCampos2()
            var attrAccion2 = $("#accionBotones").attr("accion");
            let data = new FormData(formSvQ)
            let valuesDat = [...data.entries()];
            console.log(valuesDat);
            // return false;
            if (validaOk === '') {
                // console.log(values)                   
                if (attrAccion2 === 'Guardar') {
                    const clienteSvMedica = async () => {
                        await axios.post("{{ URL::to('/insert-cliente-sv') }}", data, {

                        }).then((resp) => {
                            if (resp.data['message'] = "Success"){
                            console.log(resp.data['message'])

                            // console.log(response.data['message'])
                            document.getElementById('btnDeleteSv').disabled = true;
                            document.getElementById('btnNewSv').disabled = false;
                            document.getElementById('btnCancelSv').disabled = true;
                            document.getElementById('btnEditSv').disabled = true;
                            document.getElementById('btnSearchSv').disabled = false;
                            document.getElementById('btnSaveSv').disabled = true;

                            /*Cuando se busca un registro se cambial atributo del input hidden*/
                            let newNom88 = document.getElementById('accionBotones')
                            newNom88.setAttribute('accion', "Guardar");

                            var btnGuardar10 = document.getElementById('btnSaveSv');
                            btnGuardar10.innerHTML = 'Guardar'
                            funcLib.desactivaInput();

                            document.getElementById('textB').innerHTML =
                                'CONTROL SIGNOS VITALES'
                            funcLib.clearElements()
                            formSvQ.reset()

                            Swal.fire({
                                icon: 'success',
                                title: 'PERFECTO',
                                text: 'El registro se GUARDÓ con exito',
                                footer: ''
                            })
                            // console.log(resp.data)

                            funcLib.clearElements()
                            formSvQ.reset()
                            funcLib.desactivaInput();
                        }
                        }).catch(function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error interno',
                                text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                    '  ' + error,
                                footer: ''
                            })
                            console.log(error);
                        })
                    }
                    clienteSvMedica()
                } else if (attrAccion2 === 'Actualizar') { //Si se va a actualizar el registro
                    let idSvMed = document.getElementsByName('idSvMedica')[0].value
                    const clienteSvActualiza = async () => {
                        await axios.post(
                            "{{ URL::to('/clienteUpdateSv') }}",
                            data, {

                            }).then((response) => {

                            console.log(response.data['message'])

                            document.getElementById('btnDeleteSv').disabled = true;
                            document.getElementById('btnNewSv').disabled = false;
                            document.getElementById('btnCancelSv').disabled = true;
                            document.getElementById('btnSearchSv').disabled = false;
                            document.getElementById('btnSaveSv').disabled = true;

                            /*Cuando se busca un registro se cambial atributo del input hidden*/
                            let newNom88 = document.getElementById('accionBotones')
                            newNom88.setAttribute('accion', "Guardar");

                            var btnGuardar2 = document.getElementById('btnSaveSv');
                            btnGuardar2.innerHTML = 'Guardar'
                            funcLib.desactivaInput();

                            document.getElementById('textB').innerHTML =
                                'CONTROL SIGNOS VITALES'
                            funcLib.clearElements()
                            formSvQ.reset()
                            Swal.fire({
                                icon: 'success',
                                title: 'PERFECTO',
                                text: 'El registro se ACTUALIZÓ con exito',
                                footer: ''
                            })

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
                    clienteSvActualiza()
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'El Formulario Tiene Datos Incompletos *',
                    text: validaOk,
                    footer: ''
                })
            }
            return true
        })

        // setInterval(function() { 
        //     let espanol = idioma()
        //     let table4 = $('#tablaClientesSv').DataTable({
        //             responsive: true,
        //             scroll: true,
        //             scrollCollapse: true,
        //             scrollY: '400px',
        //             scrollx: true,
        //             "ajax": {
        //                 "url": "{{ URL::to('/buscar-CtrlMed') }}",
        //                 "dataSrc": ""
        //             },
        //             "columns": [{
        //                     "data": "id"
        //                 },
        //                 {
        //                     "data": "fecha"
        //                 },
        //                 {
        //                     "data": "hora"
        //                 },
        //                 {
        //                     "data": "nombre"
        //                 },
        //                 {
        //                     "data": "apellidos"
        //                 },
        //                 {
        //                     "data": "descripcion"
        //                 },
        //             ],
        //             columnDefs: [{
        //                     targets: 5,
        //                     visible: true
        //                 },
        //                 {
        //                     targets: 6,
        //                     orderable: false,
        //                     data: null,
        //                     render: function(data, type, row, meta) {
        //                         let fila = meta.row;
        //                         let botones =
        //                             `
        //                         <button type='button' id='btnCaptura' class='btnCaptura btn btn-primary btn-md' data-dismiss="modal"><i class="fa fa-check-circle"></i></i></button>`
        //                         return botones;
        //                     }
        //                 }

        //             ],
        //             "language": espanol,
        //             "destroy": true

        //         })

        // table4.ajax.reload(function(){
        // $(".paginate_button > a").on("focus",function(){
        // $(this).blur();
        // });
        // }, false);
        // }, 10000);    

        /*****************************************************
	                Anular Registro
	********************************************************/
        let botonAnula = document.getElementById("btnDeleteSv");
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
                    const formSvQE = document.querySelector('#formSvDiaria');
                    let idSvMed = document.getElementsByName('idSvMedica')[0].value
                    let data = new FormData()
                    data.append("idSvucion", idSvMed);
                    let valuesDatE = [...data.entries()];
                    console.log(valuesDatE);

                    const anulaReg = async () => {

                        await axios.post(
                            "{{ URL::To('/anula-CtrlMed') }}", data, {}).then((
                            response) => {

                            if (response.data['message'] == "Success") {
                                document.getElementById('btnDeleteSv')
                                    .disabled = true;
                                document.getElementById('btnNewSv').disabled =
                                    false;
                                document.getElementById('btnCancelSv')
                                    .disabled = true;
                                document.getElementById('btnSearchSv')
                                    .disabled = false;
                                document.getElementById('btnSaveSv').disabled =
                                    true;
                                document.getElementById('btnEditSv').disabled =
                                    true;

                                let newNom88 = document.getElementById(
                                    'accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById(
                                    'btnSaveSv');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML =
                                    'ANULACION DE EVOLUCION MEDICA'
                                funcLib.clearElements()
                                formSvQ.reset()
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'Se ANULO el registro con exito',
                                    footer: ''
                                })
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

            formSvQ.reset()
        })
        return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
        let formAnula = document.getElementById('formSvDiaria')
        let botonCancel = document.getElementById("btnCancelSv");
        botonCancel.addEventListener('click', () => {

            cambioTextBotton('btnSaveSv', 'Actualizar', 'Guardar')
            funcLib.clearElements()
            funcLib.desactivaInput();

            document.getElementById('btnDeleteSv').disabled = true;
            document.getElementById('btnEditSv').disabled = true;
            document.getElementById('btnSearchSv').disabled = false;
            botonCancel.disabled = true;
            document.getElementById('btnNewSv').disabled = false;
            document.getElementById('btnSaveSv').disabled = true;
            let texto4 = document.getElementById('textB')
            texto4.innerHTML = 'CONTROL DIARIO DE EVOLUCION MEDICA'

            funcLib.accionSaveNew()
            formAnula.reset()
            return true
        })

        return true
    })

    function nobackbutton() {
        window.addEventListener('load', () => {
            let vlrNewButton2 = document.getElementsByName('presBtnNewSv')[0].value
            // alert(vlrNewButton2)
            if (vlrNewButton2 == 'N') {
                window.location.hash = "no-back-button";
                window.location.hash = "Again-No-back-button"
                window.onhashchange = function() {
                    window.location.hash = "no-back-button";
                }
            } else {
 
            }
        })
    }

    function evitaCierreFormulario() {
        window.addEventListener('load', () => {
            let vlrNewButton = document.getElementsByName('presBtnNewSv')[0].value;
            // alert(vlrNewButton)
            if (vlrNewButton == 'N') {
                window.addEventListener("beforeunload", (evento) => {
                    if (true) {
                        evento.preventDefault();
                        evento.returnValue = "";
                        return "";
                    }
                })
                return true
            }
        })
    }

    evitaCierreFormulario()
    nobackbutton()
</script>