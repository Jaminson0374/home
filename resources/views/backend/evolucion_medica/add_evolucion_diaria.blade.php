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
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
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

    <head>

    </head>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body">
                    <form role="form" name="formEvolDiaria" id="formEvolDiaria" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                @foreach($seleUsuario as $datosRow)
                                @endforeach
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">CONTROL DE EVOLUCION MEDICA DIARIA
                                            </h3>
                                            
                                            <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                USUARIO/CLIENTE --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                            </h3>
                                            <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}>
                                            <input type="hidden" id="idEvolMedica" name="idEvolMedica">
                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                        </div>
                                        <div class="card-body" style="background-color: #08a2ef">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNewEvol" id="presBtnNewEvol" value="N">
                                            <div class="row border">
                                                <div class="col-12 col-sm-2"><h3><b>Hora y fecha del proceso</b></h3></div>  
                                                <div class="col-12 col-sm-3 col-md-2">
                                                        <label for="">Fecha:</label>
                                                        <input type="date" class="form-control text" name="fecha"
                                                            id="fecha" title="Digite en que se realiza este proceso" focusNext tabindex="1">
                                                </div>

                                                <div class="col-sm-5 col-md-4 col-lg-2">
                                                    <label for="" class="">Hora</label>
                                                    <input type="time" class="form-control text" name="hora" max="24:00:00" min="01:00:00" step="1" id="hora"
                                                    style="height: 4    0px" title="Hora de la atención médica" focusNext tabindex="2">
                                                </div>                                                    
                                                <div class="col-sm-4">
                                                    <label for="">Profesional</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="empleado_id" id="empleado_id" focusNext tabindex="3">
                                                        <option selected="selected" disable value=" ">Seleciona profesionalmedico</option>
                                                        @foreach ($empleados as $medicoExt)
                                                            <option value={{$medicoExt->id}}>{{$medicoExt->nombre}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                          
                                            </div> <!--cierre de row -->
                                            </br>
                                            <div class="row">
                                            <div class="col-12 col-sm-2"><h3><b>Problema</b></h3></div>  
                                                <div class="col-sm-12 col-md-10">
                                                    <textarea type="text" class="form-control text " rows="1" id="diagnostico" name="diagnostico" title="Problema o diagnóstico con el que entra el paciente a la fundación" focusNext tabindex = "4" disabled = "true" >{{$datosRow->diagnostico}}</textarea>
                                                </div>   
                                            </div>
                                            </br>        
                                            <div class="row">
                                                <div class="col-12 col-sm-2"><h3><b>Subjetivo</b></h3></div>  
                                                    <div class="col-sm-12 col-md-10">
                                                        <textarea type="text" class="form-control text " rows="1" id="subjetivo" name="subjetivo" title="Se registra como se siente el paciente según de lo que explique o de lo que el profesional observe."
                                                        placeholder="Describa sobre cómo se siente el paciente según de lo que explique o de lo que el profesional observe." focusNext tabindex="5"></textarea>
                                                    </div>   
                                            </div>
                                            <div class="row border bg-info text-dark pb-2 pt-2">
                                                <div class="col-12 col-sm-2"><h3><b>Objetivo</b></h3></div>  
                                                    <div class="col-sm-12 col-md-10">
                                                        <textarea type="text" class="form-control text " rows="1" id="objetivo" name="objetivo" title="Registra datos como los signos vitales (pulso, presión arterial y peso), los resultados de la exploración física."
                                                        placeholder="Describa datos tales cómo los signos vitales (pulso, presión arterial y peso), los resultados de la exploración física." focusNext tabindex="6"></textarea>
                                                    </div>   
                                                    <div class="col-12 col-sm-2"><h5><b>Signos vitales</b></h5></div>    

                                                    <div class="col-12 col-sm-2">
                                                        <label>FC (lpm)</label>
                                                        <input type="text" class="form-control text" name="signosv_pc"
                                                        id="signosv_pc" placeholder="Fc Cardiaca" title="Frecuenci cardiaca o pulso" focusNext tabindex="7">
                                                    </div>   
                                                    <div class="col-12 col-sm-2">
                                                        <label>FR (rpm)</label>
                                                        <input type="text" class="form-control text" name="signosv_fr"
                                                        id="signosv_fr" placeholder="Fr. respiratoria" title="Frecuania respiratoria" focusNext tabindex="8">
                                                    </div>   
                                                    <div class="col-12 col-sm-2">
                                                        <label>TA (MmHg)</label>
                                                        <input type="text" class="form-control text" name="signosv_ta"
                                                        id="signosv_ta" placeholder="Tensión arterial" title="Tensión arterial" focusNext tabindex="9">
                                                    </div>   

                                                        <div class="col-12 col-sm-2">
                                                            <label>TC (°C)</label>
                                                            <input type="text" class="form-control text" name="signosv_t"
                                                            id="signosv_t" placeholder="Temp°" title="Temperatura corporal" focusNext tabindex="10">
                                                        </div>  
                                                        <div class="col-12 col-sm-2">
                                                            <label>Peso (Kg)</label>
                                                            <input type="text" class="form-control text" name="signosv_p"
                                                            id="signosv_p" placeholder="Peso kg" title="Digite el peso en kg, del paciente" focusNext tabindex="11">
                                                        </div>   
                                                        <div class="col-12 col-sm-4 col-md-2 pt-2">
                                                            <label for="" class="col-form-label">Diag. signos vitales</label>
                                                        </div>
                                                        <div class="col-12 col-sm-4 col-md-2 pt-2">
                                                            <select name="estado_sigvitales_id" id="estado_sigvitales_id" class="form-control" focusNext tabindex="12" style="width: 100%; color:#1308ec;" title="De acuerdo a los datos de signos vitales, selecciones la opción adecuada">
                                                                <option selected="selected" disable value=" ">Seleciona una opción</option>
                                                                @foreach($estadosigv as $evolSt)
                                                                    <option style="font-weight: 900;" value={{$evolSt->id}}>{{$evolSt->descripcion}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>                                                                                                                                                                   
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-2 pt-2"><h4><b>Apreciación</b></h4></div>  
                                                    <div class="col-sm-12 col-md-10 pt-2">
                                                        <textarea type="text" class="form-control text " rows="2" id="apreciacion" name="apreciacion" title="Se escriben los diagnósticos y luego, se debe escribir un comentario sobre la evolución del paciente, exámenes auxiliares nuevos, incidentes, diagnósticos nuevos."
                                                        placeholder="Se escriben los diagnósticos y luego, se debe escribir un comentario sobre la evolución del paciente, exámenes auxiliares nuevos, incidentes, diagnósticos nuevos." focusNext tabindex="13"></textarea>
                                                    </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-2 pt-2"><h4><b>Plan</b></h4></div>  
                                                    <div class="col-sm-12 col-md-10 pt-2">
                                                        <textarea type="text" class="form-control text " rows="1" id="plan" name="plan" title="En este apartado se coloca en plan diagnostico o terapeutico a seguir"
                                                        placeholder="Describa el plan diagnostico o terapeutico a seguir" focusNext tabindex="14"></textarea>
                                                    </div>   
                                            </div>                                            <div class="row">
                                                <div class="col-12 col-sm-4 col-md-3">
                                                    <label for="" class="col-form-label">Evolución  del estado en general del usuario</label>
                                                </div>
                                                <div class="col-sm-12 col-md-3 pt-2">
                                                    <select name="evolucion_id" id="evolucion_id" class="form-control" style="width: 100%; color:#1308ec;" title="De acuerdo al analisi y diagnóstico realizado, elige la evolución actual del usuario" focusNext tabindex="15">
                                                        <option selected="selected" disable value=" ">Seleciona una opción</option>
                                                        @foreach($evolucion as $evolMco)
                                                            <option style="font-weight: 900;" value={{$evolMco->id}}>{{$evolMco->descripcion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>        
                                            </div> 
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                    <label for=""><h5><b>Observaciones y Recomendaciones adicionales?</b></h5></label>
                                                        <textarea type="text" class="form-control text " rows="2" id="recomendaciones" name="recomendaciones" title="En este apartado se coloca en plan diagnostico o terapeutico a seguir"
                                                        placeholder="Describa el plan diagnostico o terapeutico a seguir" focusNext tabindex="16"></textarea>
                                            </div>                                                                     
                                        </div>  <!-- Cierre carBody -->
                                </div>
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/evolucion_medica/add_evolucion_diaria.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
 
                            </body>
                        </div> 
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewEvol" title="Limpia todos las cledas para iniciar la creación de un nuevo registro"
                                            focusNext tabindex="17" id="btnNewEvol" accionBtn="Nuevo" name="btnNewEvol">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Ctrl
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditEvol" accionBtn="Modificar" name="btnEditEvol">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveEvol" accionBtn="Guardar"name="btnSaveEvol">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchEvol btn-lg" title="Bucar un registro de Evolución médica del usuario actual"
                                            id="btnSearchEvol" name="btnSearchEvol" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>
                                           Consultar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelEvol" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteEvol" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/admin-evolucion-diaria') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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
    <div class="modal fade" id="modalBuscarEvol" class="modalBuscarEvol" data-backdrop="static" focusNext tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <table id="tablaClientesEvol" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Estado</th>
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
// let btnSearchEvol = document.getElementById('btnSearchEvol');
// btnSearchEvol.addEventListener('click', () => {  
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
        let formEvolB = document.getElementById('formEvolDiaria')

        document.getElementById('btnCancelEvol').disabled = true;
        document.getElementById('btnCancelEvol').disabled = true;
        // document.getElementById('btnSaveEvol').disabled = true;
        funcLib = new EvolucionDiariaMed(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditEvol').disabled = true;      

        let bodyTablaClientesEvol = document.getElementById("bodyTabla");
        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchEvol = document.getElementById('btnSearchEvol');
 
        btnSearchEvol.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaClientesEvol')) { 
                let jaminson = $('#tablaClientesEvol').DataTable();
                // alert(jaminson)
                const buscarClientes = function() {
                    $("#modalBuscarEvol").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaClientesEvol').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarClientes()
            }

            let espanol = idioma()
            const buscarClientes = function() {
                $("#modalBuscarEvol").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaClientesEvol').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/buscar-CtrlMed') }}",
                        "dataSrc": ""
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
                        {
                            "data": "descripcion"
                        },
                    ],
                    columnDefs: [{
                            targets: 5,
                            visible: true
                        },
                        {
                            targets: 6,
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
                    "language": espanol,
                    "destroy": true

                });
                 $('#tablaClientesEvol tbody').on('click', 'tr', function () {
                      var data = table.row( this ).data();
                      alert( 'Hiciste click sobre '+data["nombre"]);
                });
                

                        
                //    $('#ModalUpdate').modal('hide');
                //  alert("datos actualizados");
                //  table.ajax.reload();//Podrias colocarlo dentro del success o done para recargar la tabla 
                
                obtener_data_buscar("#tablaClientesEvol tbody", table)
            }
            
            buscarClientes()
            return true;
        })
            // actualizacion de contenido en tiempo real

        let obtener_data_buscar = function(tbody, table) {
            // $("#idModal").on('hidden.bs.modal', function() {
            //         DataTableCargaDatos();
            //     });
 
            $(tbody).on("click", "button.btnCaptura", function() {
                let data = table.row($(this).parents("tr")).data();
                // console.log(data.fecha_pedido_cita)
                // formEvolB.reset()
                let dataEvol = data;
                console.log(dataEvol)
                funcLib.asignaValorEdit(dataEvol)

                /*Cuando se busca un registro se cambial atributo del input hidden*/
                // let newNom80 = document.getElementById('accionBotones')
                // newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSaveEvol');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveEvol').disabled = true;
                document.getElementById('btnEditEvol').disabled = false;
                document.getElementById('btnCancelEvol').disabled = false;
                document.getElementById('btnNewEvol').disabled = true;
                document.getElementById('btnSearchEvol').disabled = true;
                let btnDeleteEvolclick1 = document.getElementById('btnDeleteEvol')
                btnDeleteEvolclick1.disabled = false
                
            })
        }
 

        obtener_data_buscar()
        // buscarClientes() 
        return true                                    
     }) // window load el primero

			/*****************************************************
				AL PRESIONAR EL BOTON MODIFICAR
			********************************************************/
        window.addEventListener('load', () => {
            let formEvolB2 = document.getElementById('formEvolDiaria')
            let botonEdit = document.getElementById("btnEditEvol");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveEvol', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveEvol');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CONTROL MEDICO'
                document.getElementsByName('presBtnNewEvol')[0].value="N"                
                document.getElementById('btnEditEvol').disabled = true;
                document.getElementById('btnNewEvol').disabled = true;                
				document.getElementById('btnDeleteEvol').disabled = true;
                document.getElementById('btnSearchEvol').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelEvol').disabled = false;
                document.getElementById('btnSaveEvol').disabled = false;
               
                document.getElementById('fecha').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('fecha').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewEvol");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                // alert(attrAccion3)
                funcLib.activaInput();                
				
                        //  cambioTextBotton('btnSaveEvol', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveEvol');
                btnGuardar.innerHTML = 'Guardar'                           
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO CONTROL DIARIO DE EVOLUCION MEDICA'

                document.getElementsByName('presBtnNewEvol')[0].value="S"                
                
				document.getElementById('btnDeleteEvol').disabled = true;
                document.getElementById('btnEditEvol').disabled = true;
                document.getElementById('btnNewEvol').disabled = true;
                document.getElementById('btnSearchEvol').disabled = true;
                botonNew.disabled = true;
                document.getElementById('btnCancelEvol').disabled = false;
                document.getElementById('btnSaveEvol').disabled = false;
                
                formEvolB2.reset()
                document.getElementById('fecha').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveEvol')
        const formEvolQ = document.querySelector('#formEvolDiaria');
        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";

                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formEvolQ)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const clienteEvolMedica = async () => {
                            await axios.post("{{URL::to('/insert-cliente-Evol')}}",data,{

                            }).then((resp) => {
                                    console.log(resp.data)

                                // console.log(response.data['message'])
                                document.getElementById('btnDeleteEvol').disabled = true;
                                document.getElementById('btnNewEvol').disabled = false;
                                document.getElementById('btnCancelEvol').disabled = true;
                                document.getElementById('btnEditEvol').disabled = true;                                 
                                document.getElementById('btnSearchEvol').disabled = false;
                                document.getElementById('btnSaveEvol').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar10 = document.getElementById('btnSaveEvol');
                                btnGuardar10.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'CONTROL DIARIO DE EVOLUCIÓN MÉDICA'                                
                                funcLib.clearElements()	                                
                                formEvolQ.reset()                                       

                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                // console.log(resp.data)

                                funcLib.clearElements()	                                
                                formEvolQ.reset()
                                funcLib.desactivaInput();                                
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
                        clienteEvolMedica()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('idEvolMedica')[0].value
                        const clienteEvolActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/clienteUpdateEvol') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteEvol').disabled = true;
                                document.getElementById('btnNewEvol').disabled = false;
                                document.getElementById('btnCancelEvol').disabled = true;
                                document.getElementById('btnSearchEvol').disabled = false;
                                document.getElementById('btnSaveEvol').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveEvol');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'CONTROL DIARIO DE EVOLUCION MEDICA'                                
                                funcLib.clearElements()	                                
                                formEvolQ.reset()                                    
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
                        clienteEvolActualiza()
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

        // setInterval(function() { 
        //     let espanol = idioma()
        //     let table4 = $('#tablaClientesEvol').DataTable({
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
    let botonAnula = document.getElementById("btnDeleteEvol");
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
					const formEvolQE = document.querySelector('#formEvolDiaria');
					let idEvolMed = document.getElementsByName('idEvolMedica')[0].value
					let data = new FormData()
					data.append("idEvolucion",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	

					const anulaReg = async () => {  

						await axios.post(
							"{{ URL::To('/anula-CtrlMed') }}",data, {
							}).then((response) => {
					
                                if(response.data['message'] == "Success"){  
                                    document.getElementById('btnDeleteEvol').disabled = true;
                                    document.getElementById('btnNewEvol').disabled = false;
                                    document.getElementById('btnCancelEvol').disabled = true;
                                    document.getElementById('btnSearchEvol').disabled = false;
                                    document.getElementById('btnSaveEvol').disabled = true;
                                    document.getElementById('btnEditEvol').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveEvol');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE EVOLUCION MEDICA'                                
                                    funcLib.clearElements()	                                
                                    formEvolQ.reset()                                    
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

                formEvolQ.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formEvolDiaria')
			let botonCancel = document.getElementById("btnCancelEvol");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveEvol', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteEvol').disabled = true;
                document.getElementById('btnEditEvol').disabled = true;
                document.getElementById('btnSearchEvol').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewEvol').disabled = false;
                document.getElementById('btnSaveEvol').disabled = true; 
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DIARIO DE EVOLUCION MEDICA'                

				funcLib.accionSaveNew()
				formAnula.reset()
				return true
			})
    
			return true
    })		
    
    function nobackbutton()
    {
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNewEvol')[0].value
                // alert(vlrNewButton2)
                if(vlrNewButton2 == 'N'){
                    window.location.hash="no-back-button";
                    window.location.hash="Again-No-back-button"
                    window.onhashchange=function(){window.location.hash="no-back-button";} 
                }else{
                    alert('Esta creando una nueva Cita Médica, si desea abandonar esta ventana, debe presionar el boton salir')                    
                } 
            })
     }    
    function evitaCierreFormulario() {
        window.addEventListener('load', () => {
            let vlrNewButton = document.getElementsByName('presBtnNewEvol')[0].value;
            // alert(vlrNewButton)
            if(vlrNewButton == 'N'){
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


