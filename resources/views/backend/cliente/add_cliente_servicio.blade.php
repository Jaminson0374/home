@extends('backend.layouts.app')
@section('content')
<style>
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

    {{-- @if ($errors->any())
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
@endif     --}}
 
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body">
                    <form role="form" name="addClienteServicio" id="addClienteServicio" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                <input type="hidden" name="tieneServicio" id="tieneServicio" value={{$siServicio}}>
                                @foreach($seleUsuario as $datosRow)
                                @endforeach
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 border border-primary pb-2">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Servicio activo: {{$nomService}} 
                                            </h3>
                                            <h3 class="card-title float-right">
                                                USUARIO/CLIENTE:------>{{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                            </h3>
                                            <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$idCliente}}>
                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                            <input type="hidden" id="idClienteServicio" name="idClienteServicio" value ={{"$idCliServi"}}>
                                        </div>
                                        <div class="card-body " style="background-color: rgb(160, 244, 241)">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <div class="row border mt-2 mb-3 border border-primary">
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
                                                                {{ $remiteEmpresa->descripcion }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-10 border border-primary pb-2">                                                
                                                    <label>Grupo o Rango EPS?</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        id="rango_eps_id" name="rango_eps_id">
                                                        <option selected disable value=" ">Sele Rango EPS</option>
                                                        @foreach ($rangoEps as $epsRango)
                                                            <option value={{ $epsRango->id }}>{{ $epsRango->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-10 border border-primary pb-2">
                                                    <label for="tipo_afiliacion">Tipo de afiliación:</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger"
                                                        style="width: 100%;"id="tipo_afiliacion_id"
                                                        name="tipo_afiliacion_id">
                                                        <option selected disable value=" ">Selecione Afiliación
                                                        </option>
                                                        @foreach ($tipoAfiliacion as $afiliacionTipo)
                                                            <option value={{ $afiliacionTipo->id }}>
                                                                {{ $afiliacionTipo->descripcion }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label for="" class="col-form-label">Médico de EPS
                                                    Remitente</label>
                                                    <select class="select2 select2-danger"
                                                    data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                    name="medico_remite_id" id="medico_remite_id">
                                                    <option selected="selected" disable value=" ">Seleciona medico</option>
                                                    @foreach ($medicosExternos as $medicoExt)
                                                        <option value={{$medicoExt->id}}>{{$medicoExt->nombre}}
                                                        </option>
                                                    @endforeach
                                                </select>             
                                                </div>
                                            </div>
                                            <!--cierra row-->
                                            <div class="row border mt-2 mb-3 border border-primary ">
                                                <div class="col-12 col-lg-4 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Urgencia</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        id="cubiculos_id" name="cubiculos_id" title ="Clínica donde le atienden por urgencia">
                                                        <option selected disable value=" ">Seleciona una opción
                                                        </option>
                                                        @foreach ($cubiculos as $cubi)
                                                            <option value={{ $cubi->id }}>{{ $cubi->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Cubiculo</label>
                                                    <select class="form-control" style="width: 100%;"
                                                        id="cubiculos_id" name="cubiculos_id">
                                                        <option selected disable value=" ">Seleciona una opción
                                                        </option>
                                                        @foreach ($cubiculos as $cubi)
                                                            <option value={{ $cubi->id }}>{{ $cubi->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                        <label for="" class="col-form-label">Fecha de de ingreso:</label>
                                                        <input type="date" class="form-control text" name="fecha_ingreso"
                                                            id="fecha_ingreso" placeholder="Digite fecha de ingreso" onchange="cambioFecha()">
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                        <label for="fecha_retiro" class="col-form-label">Fecha de retiro</label>
                                                        <input type="date" class="form-control text" name="fecha_retiro"
                                                            id="fecha_retiro" placeholder="Digite fecha de retiro" onchange="cambioFecha()">
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                        <label for="num_dias" class="col-form-label">Duración
                                                            </label>
                                                        <input type="text" class="form-control text" name="num_dias" readonly
                                                            id="num_dias" title=" duración en días">
                                                </div>    

                                            </div>
                                            <!--cierra row-->

                                            <div class="row border mt-2 mb-3 border border-primary">
                                                <div class="col-12 col-lg-5 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Quien recibió al Usuario?</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        name="empleado_id" id="empleado_id">
                                                        <option selected disable value=" ">Seleciona persona</option>
                                                        @foreach ($empleados as $trabajador)
                                                            <option value={{ $trabajador->id }}>{{ $trabajador->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-5 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label for="" class="col-form-label">Representante</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        name="acompanantes_id" id="acompanantes_id">
                                                        <option selected disable value=" ">Seleciona persona</option>
                                                        @foreach ($acompanantes as $familiar)
                                                            <option value={{ $familiar->id }}>{{ $familiar->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label for="" class="col-form-label">Estado del
                                                        Servicio:</label>
                                                    <input class="form-control text" type="checkbox" name="estado" id="estado"
                                                        checked data-bootstrap-switch data-off-color="danger"
                                                        data-on-color="success">
                                                </div>
                                            </div>
                                            <!--cierra row-->

                                            <div class="row border mt-2 mb-3 border border-primary">
                                                <div class="col-12 col-lg-4 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Cuidador 1</label>
                                                    <select class="form-control select2 select2-danger"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        name="empleado_id" id="empleado_id">
                                                        <option selected disable value=" ">Seleciona persona</option>
                                                        @foreach ($empleados as $trabajador)
                                                            <option value={{ $trabajador->id }}>{{ $trabajador->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Turno</label>
                                                    <input type="text" class="form-control text" name="turno1" 
                                                    id="turno1" title="">
                                                </div>

                                                <div class="col-12 col-lg-4 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Cuidador 2</label>
                                                    <select class="form-control select2 select2-danger text"
                                                        data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                        name="empleado_id2" id="empleado_id2">
                                                        <option selected disable value=" ">Seleciona persona</option>
                                                        @foreach ($empleados as $trabajador2)
                                                            <option value={{ $trabajador2->id }}>{{ $trabajador2->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-6 col-sm-10 border border-primary pb-2">
                                                    <label class="col-form-label">Turno</label>
                                                    <input type="text" class="form-control text" name="turno2" 
                                                    id="turno2" title="">
                                                </div>
                                            </div>
                                            <!--cierra row-->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="" class="col-form-label">Diagnóstico/Observaciones:</label>
                                                    <textarea type="text" class="form-control text " name="observacion"
                                                        placeholder="Digite observaciones pertinentes"></textarea>
                                                </div>
                                            </div>
                                            <!--cierra row-->
                                        </div>
                                    </div>
                                </div>
                                <script src="{{ asset('../resources/js/add_cliente_servicio.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                                <script>
                                    /*Al entrara a la ventana de asignación de servicios, trae el usuarioa seleccionado*/
                                    window.addEventListener('load', ()=>{
                                        let resCli = document.getElementsByName('tieneServicio')[0].value 
                                        // alert(resCli)
                                        if(resCli=="SI"){
                                            let accionBotton = document.getElementById('accionBotones')
                                            accionBotton.setAttribute('accion', "Actualizar");
                                            let idTraeServi = document.getElementsByName('idClienteServicio')[0].value
                                            // alert(idTraeServi)
                                            data = new FormData();
                                            data.append('id',idTraeServi)
                                            const clienteNewServi3 = async () => {
                                                await axios.post("{{URL::to('/traeClienteConServicio/{idTraServi}')}}",data,{
                                                 }).then((respu) => {
                                                    dataServicio = respu.data
                                                    console.log(respu.data)
                                                    // console.log(dataServicio[0].tiposervicio_id)
                                                    datosServic = new serviciosNewClientes2()
                                                    datosServic.asignaValorEdit(dataServicio)

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
                                            clienteNewServi3()
                                        }  
                                        return true                                      
                                    })

                                </script>                             
                            </body>
                        </div>
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-10">
                                    <div class="form-group pt-2">
                                        <button  type="submit" class="btn btn-primary form-group btnUpdate"
                                            tabindex="19" id="btnSave" accionBtn="Guardar"name="btnSave">
                                            <i class="fa fa-save" style="color:#f30f0fe0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group" id="btnCancel"
                                            tabindex="20"> <i class="fa fa-ban"></i> Cancelar</button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary form-group btnSearch "
                                            id="btnSearchServicio" name="btnSearchServicio" tabindex="22"><i
                                                class="fa fa-search-location"></i>
                                            Buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group" id="btnDelete"
                                            tabindex="23" disabled="true"><i class="fa fa-trash"
                                                style="color:#f30b0b;"></i> Eliminar</button>
                                        <a href="{{ URL::to('admin-clientes') }}" class="btn btn-primary float-right "
                                            tabindex="24" id="btnExit"><i class="fa fa-arrow-right fa-lg"
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


<!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscarServicio" class="modalBuscarServicio" data-backdrop="static" tabindex="-1"
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
                            <table id="tablaClienServicio" class="table table-bordered table-striped">
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
                                <tbody id="bodyTablaServicios">

                                </tbody>
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

<script src="{{ asset('../resources/js/datatable.js') }}"></script>
<script>

 
    
    /*NUMERO DE DIAS ENTRE FECHAS*/
    function cambioFecha(){
        let fechaIni  = moment(document.getElementsByName('fecha_ingreso')[0].value).format('MM/DD/YYYY');
        let fechaFin = moment(document.getElementsByName('fecha_retiro')[0].value).format('MM/DD/YYYY');

        let numDias = moment(fechaFin).diff(moment(fechaIni), 'days');
        document.getElementsByName("num_dias")[0].value = numDias+1;
     }
    
     window.addEventListener('load', () => {
        let formularioServicio = document.getElementById('addClienteServicio')
			// let formAddClienteServicio = document.getElementById('addClienteServicio');
			/*****************************************************
				Limpia los campos al presionar el boton cancelar
			********************************************************/
			let botonCancel = document.getElementById("btnCancel");
			botonCancel.addEventListener('click', () => {
				document.getElementsByName("tiposervicio_id")["0"].value = "";
				cambioTextBotton('btnSave', 'Actualizar', 'Guardar')
				
				// Date().toLocaleString("en-US", { day: "2-digit" });
                clearE = new serviciosNewClientes2()
                clearE.clearElements()	
							
				changeAttribute = new serviciosNewClientes2()
				changeAttribute.accionSaveNew()
	
				let btnDeleteclick2 = document.getElementById('btnDelete')
				btnDeleteclick2.disabled = true
				formularioServicio.reset()
				return true
			})
			return true
		})		
    
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     window.addEventListener('load', () => {
        
        let bodyTablaClientes = document.getElementById("bodyTablaServicio");
        let modalBuscar = document.getElementById('modalBuscarServicio');
        let btnSearchServicio = document.getElementById('btnSearchServicio');
        btnSearchServicio.addEventListener('click', () => {
            alert('entrea1')
            if ($.fn.DataTable.isDataTable('#tablaClienServicio')) { 
                alert('entrea2')
                    //Si la tabla se destruyó se vuelve a inicializar
                // Además le paso el idioma antes de definir para que me devuelva un 
                //error y no me vuelva acrear tabla nuevamante en este if. 
                // alert('si está destruioda')
                // $('#tablaClientes').DataTable().destroy();

                let jaminson = $('#tablaClienServicio').DataTable();
                // alert(jaminson)
                const buscarClientesServi = function() {
                    $("#modalBuscarSevicio").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                    $('#modalBuscarServicio .modal-dialog').draggable({
                        handle: ".modal-header"
                    });

                    let table = $('#tablaClienServicio').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    })
                }
                buscarClientesServi()
            }

            let espanol = idioma()
            const buscarClientesServi = function() {
                alert('entrea3')
                $("#modalBuscarServicio").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                $('#modalBuscarServicio .modal-dialog').draggable({
                    handle: ".modal-header"
                });
                let table = $('#tablaClienServicio').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/buscar-cliente-basicos') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "num_documento"
                        },
                        {
                            "data": "nombre"
                        },
                        {
                            "data": "apellidos"
                        },
                        {
                            "data": "telefonos_user"
                        },
                        {
                            "data": "descripcion"
                        },

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
                                <button type='button' id='btnCapturaServicio' class='btnCapturaServicio btn btn-primary btn-md' data-dismiss="modal"><i class="fa fa-check-circle"></i></i></button>`
                                return botones;
                            }
                        }

                    ],
                    "language": espanol,
                    "destroy": true

                })
                obtener_data_buscar2("#tablaClienServicio tbody", table);
            }
            buscarClientesServi()
        })

        let obtener_data_buscar2 = function(tbody, table) {
            $(tbody).on("click", "button.btnCapturaServicio", function() {
                formularioServicio.reset()
                let data = table.row($(this).parents("tr")).data();
                llenaCamposEdit = new serviciosNewClientes2()
                llenaCamposEdit.asignaValorEdit(data)

                /*Cuando se busca un registro se cambial atributo del input hidden*/
                let newNom80 = document.getElementById('accionBotones')
                newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Actualizar'

                let btnDeleteclick3 = document.getElementById('btnDelete')
                btnDeleteclick3.disabled = false
            })
        }
        obtener_data_buscar2()
        return true                                    
    })


       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
        selectorGuardar = document.querySelector('#btnSave')
        const formServicio = document.querySelector('#addClienteServicio');
        formServicio.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";
                    let validarCampos = new serviciosNewClientes2()
                    validaOk = validarCampos.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                if (validaOk === '') {
                    let data = new FormData(formServicio);
                    let values = [...data.entries()];                    
                    if (attrAccion2 === 'Guardar') {
                        const clienteNew2 = async () => {
                            await axios.post("{{URL::to('/insert-cliente-servicio')}}",data,{

                            }).then((resp) => {
                                    console.log(resp.data)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                clearE = new serviciosNewClientes2()
                                clearE.clearElements()	                                
                                formServicio.reset()
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
                        clienteNew2()
                    } else if (attrAccion2 === 'Actualizar') { //Si se va a actualizar el registro
                        let idCliServi = document.getElementsByName('idClienteServicio')[0].value
                        const clienteActualiza = async () => {
                            await axios.post(
                                "{{ URL::to('/clienteCliUpdateServicios/{idCliServi}') }}",
                                data, {

                                }).then((response) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se ACTUALIZÓ con exito',
                                    footer: ''
                                })
                                // console.log(response.data)
                                clearE = new serviciosNewClientes2()
                                clearE.clearElements()	                                
                                formServicio.reset()
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
                    }
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'El Formulario Tiene Datos Incompletos *',
                        text: validaOk,
                        footer: ''
                    })
                }
                return true
        })
        return true
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
            return true
        })
    }
</script>
