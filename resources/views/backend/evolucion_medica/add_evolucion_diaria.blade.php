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
                    <form role="form" name="formClientCitas" id="formClientCitas" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                {{-- <input type="hidden" name="tieneServicio" id="tieneServicio" value={{$siServicio}}> --}}
                                @foreach($seleUsuario as $datosRow)
                                @endforeach
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">CONTROL DE EVOLUCION DIARIA
                                            </h3>
                                            
                                            <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                USUARIO/CLIENTE --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                            </h3>
                                            <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}>
                                            <input type="hidden" id="idCitaMedica" name="idCitaMedica">
                                            <input type="hidden" id="citas_pendte" name="citas_pendte" value = {{$datosRow->citas_pendte}}>
                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                            {{-- <input type="hidden" id="idClienteServicio" name="idClienteServicio" value ={{"$idCliServi"}}> --}}
                                        </div>
                                        <div class="card-body" style="background-color: #08a2ef">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNew" id="presBtnNew" value="N">
                                            <div class="row border">
                                                <div class="col-12 col-sm-2"><h3><b>Hora y fecha del proceso</b></h3></div>  
                                                <div class="col-12 col-sm-3 col-md-2">
                                                        <label for="">Fecha:</label>
                                                        <input type="date" class="form-control text" name="fecha_proceso"
                                                            id="fecha_proceso" title="Digite en que se realiza este proceso">
                                                </div>

                                                <div class="col-sm-5 col-md-4 col-lg-2">
                                                    <label for="" class="">Hora</label>
                                                    <input type="time" class="form-control text" name="hora_cita" max="24:00:00" min="01:00:00" step="1" id="hora_cita"
                                                    style="height: 4    0px" title="Hora de la atención médica">
                                                </div>                                                    
                                                <div class="col-sm-4">
                                                    <label for="">Profesional</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="medico_remite_id" id="medico_remite_id">
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
                                                    <textarea type="text" class="form-control text " rows="1" id="diagnostico"" name="diagnostico" title="Problema o diagnóstico con el que entra el paciente a la fundación" disabled="true"></textarea>
                                                </div>   
                                            </div>
                                            </br>        
                                            <div class="row">
                                                <div class="col-12 col-sm-2"><h3><b>Subjetivo</b></h3></div>  
                                                    <div class="col-sm-12 col-md-10">
                                                        <textarea type="text" class="form-control text " rows="1" id="subjetivo"" name="subjetivo" title="Se registra como se siente el paciente según de lo que explique o de lo que el profesional observe."
                                                        placeholder="Describa sobre cómo se siente el paciente según de lo que explique o de lo que el profesional observe."></textarea>
                                                    </div>   
                                            </div>
                                            <div class="row border bg-info text-dark pb-2 pt-2">
                                                <div class="col-12 col-sm-2"><h3><b>Objetivo</b></h3></div>  
                                                    <div class="col-sm-12 col-md-10">
                                                        <textarea type="text" class="form-control text " rows="1" id="subjetivo"" name="subjetivo" title="Registra datos como los signos vitales (pulso, presión arterial y peso), los resultados de la exploración física."
                                                        placeholder="Describa datos tales cómo los signos vitales (pulso, presión arterial y peso), los resultados de la exploración física."></textarea>
                                                    </div>   
                                                    <div class="col-12 col-sm-2"><h5><b>Signos vitales</b></h5></div>    

                                                    <div class="col-12 col-sm-2">
                                                        <label>FC (lpm)</label>
                                                        <input type="text" class="form-control text" name="signosv_pc"
                                                        id="signosv_pc" placeholder="Fc Cardiaca" title="Frecuenci cardiaca o pulso">
                                                    </div>   
                                                    <div class="col-12 col-sm-2">
                                                        <label>FR (rpm)</label>
                                                        <input type="text" class="form-control text" name="signosv_fr"
                                                        id="signosv_fr " placeholder="Fr. respiratoria" title="Frecuania respiratoria">
                                                    </div>   
                                                    <div class="col-12 col-sm-2">
                                                        <label>TA (MmHg)</label>
                                                        <input type="text" class="form-control text" name="signosv_ta"
                                                        id="signosv_ta" placeholder="Tensión arterial" title="Tensión arterial">
                                                    </div>   

                                                        <div class="col-12 col-sm-2">
                                                            <label>TC (°C)</label>
                                                            <input type="text" class="form-control text" name="signosv_t "
                                                            id="signosv_t " placeholder="Temp°" title="Temperatura corporal">
                                                        </div>  
                                                        <div class="col-12 col-sm-2">
                                                            <label>Peso (Kg)</label>
                                                            <input type="text" class="form-control text" name="signosv_p "
                                                            id="signosv_p " placeholder="Peso kg" title="Digite el peso en kg, del paciente">
                                                        </div>   
                                                        <div class="col-12 col-sm-4 col-md-2 pt-2">
                                                            <label for="" class="col-form-label">Diag. signos vitales</label>
                                                        </div>
                                                        <div class="col-12 col-sm-4 col-md-2 pt-2">
                                                            <select name="diagfinal_sv" id="diagfinal_sv" class="form-control" style="width: 100%; color:#1308ec;" title="De acuerdo a los datos de signos vitales, selecciones la opción adecuada">
                                                                <option style="font-weight: 900;" value="1">Normales</option>
                                                                <option style="font-weight: 900" value="2">Regulares</option>
                                                                <option style="font-weight: 900" value="3">Preocupantes</option>
                                                            </select>
                                                        </div>                                                                                                                                                                   
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-2 pt-2"><h4><b>Apreciación</b></h4></div>  
                                                    <div class="col-sm-12 col-md-10 pt-2">
                                                        <textarea type="text" class="form-control text " rows="2" id="apreciacion" name="apreciacion" title="Se escriben los diagnósticos y luego, se debe escribir un comentario sobre la evolución del paciente, exámenes auxiliares nuevos, incidentes, diagnósticos nuevos."
                                                        placeholder="Se escriben los diagnósticos y luego, se debe escribir un comentario sobre la evolución del paciente, exámenes auxiliares nuevos, incidentes, diagnósticos nuevos."></textarea>
                                                    </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-2 pt-2"><h4><b>Plan</b></h4></div>  
                                                    <div class="col-sm-12 col-md-10 pt-2">
                                                        <textarea type="text" class="form-control text " rows="1" id="plan"" name="plan" title="En este apartado se coloca en plan diagnostico o terapeutico a seguir"
                                                        placeholder="Describa el plan diagnostico o terapeutico a seguir"></textarea>
                                                    </div>   
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4 col-md-3">
                                                    <label for="" class="col-form-label">Evolución final del estado en general del usuario</label>
                                                </div>
                                                <div class="col-sm-12 col-md-3 pt-2">
                                                    <select name="estado_citas" id="estado_citas" class="form-control" style="width: 100%; color:#1308ec;" title="De acuerdo al analisi y diagnóstico realizado, elige la evolución actual del usuario">
                                                        <option style="font-weight: 900;" value="1">Positiviva</option>
                                                        <option style="font-weight: 900" value="2">Estacionaria</option>
                                                        <option style="font-weight: 900" value="3">Negativa</option>
                                                    </select>
                                                </div>        
                                            </div>                          
                                        </div>  <!-- Cierre carBody -->
                                </div>
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/js/add_citas_medicas.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
 
                            </body>
                        </div> 
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNew" title="Limpia todos las cledas para iniciar la creación de una nueva cita"
                                            tabindex="19" id="btnNew" accionBtn="Nuevo" name="btnNew">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nueva Cita
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            tabindex="19" id="btnEdit" accionBtn="Modificar" name="btnEdit">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            tabindex="19" id="btnSave" accionBtn="Guardar"name="btnSave">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchCita btn-lg" title="Bucar un cita del usuario actual"
                                            id="btnSearchCita" name="btnSearchCita" tabindex="22"><i
                                                class="fa fa-search-location fa-lg"></i>
                                           Consultar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancel" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            tabindex="20"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDelete" title="El registro que esta en la ventana"
                                            tabindex="23" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Eliminar</button>

                                                <a href="{{ URL::to('/admin-clientes-Citas') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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
<div class="container-lg">
    <div class="modal fade" id="modalBuscarCita" class="modalBuscarCita" data-backdrop="static" tabindex="-1"
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
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaClientesCitas" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha Solicitu Cita</th>
                                        <th>Fecha para la cita</th>
                                        <th>Hora de la cita</th>
                                        <th>Clinica</th>
                                        <th>Estado</th>
                                        <th>Acción2</th>
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
// let btnSearchCita = document.getElementById('btnSearchCita');
// btnSearchCita.addEventListener('click', () => {  
// //   let data = new FormData();
//    let prueba = async () => {
//        await axios.get("{{ URL::to('/buscar-cliente-citas') }}", {
 
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
        document.getElementById('btnCancel').disabled = true;
        document.getElementById('btnSave').disabled = true;
        // let bloqH3 = document.getElementById("bloqueHidden").style.display = "none";;                        
        document.getElementById('btnCancel').disabled = true;
        document.getElementById('btnSave').disabled = true;
        funcLib = new citasMedClientes(); // se instancia la clase citasMedicasClientes para todo sus metodos
        funcLib.desactivaInput();  
        document.getElementById('btnEdit').disabled = true;      
        let formServicio= document.getElementById('formClientCitas')

        let bodyTablaClientesCitas = document.getElementById("bodyTabla");
        let modalBuscarCita = document.getElementById('modalBuscarCita');
        let btnSearchCita = document.getElementById('btnSearchCita');
        btnSearchCita.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaClientesCitas')) { //Si la tabla se destruyó se vuelve a inicializar
                // Además le paso el idioma antes de definir para que me devuelva un 
                //error y no me vuelva acrear tabla nuevamante en este if. 
                // alert('si está destruioda')
                // $('#tablaClientesCitas').DataTable().destroy();
                let jaminson = $('#tablaClientesCitas').DataTable();
                // alert(jaminson)
                const buscarClientes = function() {
                    $("#modalBuscarCita").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaClientesCitas').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    })
                }
                buscarClientes()
            }

            let espanol = idioma()
            const buscarClientes = function() {
                $("#modalBuscarCita").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaClientesCitas').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/buscar-cliente-citas') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "id"
                        },
                        {
                            "data": "fecha_pedido_cita"
                        },
                        {
                            "data": "fecha_cita"
                        },
                        {
                            "data": "hora_cita"
                        },
                        {
                            "data": "nombre"
                        },
                        {
                            "data": "estado_citas"
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

                })
                obtener_data_buscar("#tablaClientesCitas tbody", table);
            }
            buscarClientes()
            return true;
        })

        let obtener_data_buscar = function(tbody, table) {
            $(tbody).on("click", "button.btnCaptura", function() {

                let data = table.row($(this).parents("tr")).data();
                // console.log(data.fecha_pedido_cita)
                // formServicio.reset()
                let dataCitas = data;
                funcLib.asignaValorEdit(dataCitas)

                /*Cuando se busca un registro se cambial atributo del input hidden*/
                // let newNom80 = document.getElementById('accionBotones')
                // newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnEdit').disabled = false;
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnNew').disabled = true;
                document.getElementById('btnSearchCita').disabled = true;
                let btnDeleteclick1 = document.getElementById('btnDelete')
                btnDeleteclick1.disabled = false
                
                let bloqH4 = document.getElementById("bloqueHidden");
                bloqH4.style.display = "block";  
            })
        }
        obtener_data_buscar()
        // buscarClientes() 
        return true                                    
     }) // window load el primero

        /*Inicio***************************************************************
         * AGREGAR O eliminar FILAS de la tabla de formulación médica
         */
            const agregarFila = () => {
                document.getElementById('tablaFormula').insertRow(-1).innerHTML = '<td><textarea type="text" name="comentarios" class="form-control text medicamento" rows="1" id="comentarios1"></textarea></td><td><input type="text" name="comentarios2" id="comentarios3" class="form-control text cantidad"></td><td><input type="text" name="comentarios5" id="comentarios4" class="form-control text posologia"></td>'
            }

            const eliminarFila = () => {
                const table = document.getElementById('tablaFormula')
                const rowCount = table.rows.length
            
            if (rowCount <= 1)
                alert('No hay más fila')
            else
                table.deleteRow(rowCount -1)
            }
        /*Final***************************************************************/

    
			/*****************************************************
				AL PRESIONAR EL BOTON MODIFICAR
			********************************************************/
    window.addEventListener('load', () => {
            let botonEdit = document.getElementById("btnEdit");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                    let bloqH = document.getElementById("bloqueHidden");
                    bloqH.style.display = "block";
                    // cambioTextBotton('btnSave', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO LA CITA MEDICA'
                document.getElementsByName('presBtnNew')[0].value="N"                
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnNew').disabled = true;                
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnSearchCita').disabled = true;
                botonNew.disabled = true;
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnSave').disabled = false;
               
                document.getElementById('fecha_pedido_cita').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('fecha_pedido_cita').focus()
                alert(attrAccion4)    
				return true
			})

     

             let formularioCitas4 = document.getElementById('formClientCitas')
			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNew");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                alert(attrAccion3)
                funcLib.activaInput();                
                let bloqH = document.getElementById("bloqueHidden");
                bloqH.style.display = "none";
				
                        //  cambioTextBotton('btnSave', 'Actualizar', 'Guardar')
                        var btnGuardar = document.getElementById('btnSave');
                btnGuardar.innerHTML = 'Guardar'                           
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'CREACIÓN DE UNA NUEVA CITA MEDICA'

                document.getElementsByName('presBtnNew')[0].value="S"                
                
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnNew').disabled = true;
                document.getElementById('btnSearchCita').disabled = true;
                botonNew.disabled = true;
                document.getElementById('btnCancel').disabled = false;
                document.getElementById('btnSave').disabled = false;
                
                formularioCitas4.reset()
                document.getElementById('fecha_pedido_cita').focus()
                
				return true
			})
			return true
    })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
        selectorGuardar = document.querySelector('#btnSave')
        const formServicio = document.querySelector('#formClientCitas');
        formServicio.addEventListener("submit", (e) => {
            e.preventDefault();
 
                    document.getElementById("bloqueHidden").style.display = "block";
                    let validaOk ="Ok";

                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formServicio)
                    let valuesDat = [...data.entries()];
                    // console.log(valuesDat);
                    // return false;
                if (validaOk === '') {

                    let data = new FormData(formServicio);
                    let values = [...data.entries()];                    
                    if (attrAccion2 === 'Guardar') {
                        const clienCitaMed2 = async () => {
                            await axios.post("{{URL::to('/insert-cliente-citas')}}",data,{

                            }).then((resp) => {
                                    console.log(resp.data)

                                // console.log(response.data['message'])
                                document.getElementById('btnDelete').disabled = true;
                                document.getElementById('btnAgreFila').disabled = true;
                                document.getElementById('btnEliFila').disabled = true;
                                document.getElementById('btnNew').disabled = false;
                                 document.getElementById('btnCancel').disabled = true;
                                 document.getElementById('btnEdit').disabled = true;                                 
                                document.getElementById('btnSearchCita').disabled = false;
                                document.getElementById('btnSave').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar10 = document.getElementById('btnSave');
                                btnGuardar10.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById("bloqueHidden").style.display = "none";  
                                document.getElementById('textB').innerHTML = 'CONTRON DE CITAS MEDICAS'                                
                                funcLib.clearElements()	                                
                                formServicio.reset()                                       

                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                // console.log(resp.data)

                                funcLib.clearElements()	                                
                                formServicio.reset()
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
                        clienCitaMed2()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro

                        let idCitaMed = document.getElementsByName('idCitaMedica')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/clienteCliUpdateCita/{idCitaMed}') }}",
                                data, {

                                }).then((response) => {
                                console.log(response.data['message'])
                                document.getElementById('btnDelete').disabled = true;
                                document.getElementById('btnAgreFila').disabled = true;
                                document.getElementById('btnEliFila').disabled = true;
                                document.getElementById('btnNew').disabled = false;
                                 document.getElementById('btnCancel').disabled = true;
                                document.getElementById('btnSearchCita').disabled = false;
                                document.getElementById('btnSave').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSave');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById("bloqueHidden").style.display = "none";  
                                document.getElementById('textB').innerHTML = 'CONTRON DE CITAS MEDICAS'                                
                                funcLib.clearElements()	                                
                                formServicio.reset()                                    
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
                        clienteCitaActualiza()
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
    
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
        let formularioCitas = document.getElementById('formClientCitas')

			let botonCancel = document.getElementById("btnCancel");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSave', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

                var bloqH2 = document.getElementById("bloqueHidden");
                bloqH2.style.display = "block";
				document.getElementById('btnDelete').disabled = true;
                document.getElementById('btnEdit').disabled = true;
                document.getElementById('btnSearchCita').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNew').disabled = false;
                document.getElementById('btnSave').disabled = true; 
                document.getElementById('btnAgreFila').disabled = true;
                document.getElementById('btnEliFila').disabled =  true;
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DE CITAS MEDICAS'                

				funcLib.accionSaveNew()
				formularioCitas.reset()
				return true
			})

    
			return true
    })		
    
 
    function nobackbutton()
    {
      
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNew')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNew')[0].value;
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


