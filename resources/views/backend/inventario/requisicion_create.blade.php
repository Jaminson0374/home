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
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body">
                    {{-- formAdminRequisicion --}}
                    <form role="form" name="formAdminRequisicion" id="formAdminRequisicion" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                
                                @foreach($requi_consecutivos as $consecu)
                                @endforeach

                                @foreach($requi_dtobasico as $datosRow)
                                @endforeach
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">REQUISICIÓN DE MEDICAMENTOS</h3>
                                            
                                            <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                USUARIO/CLIENTE --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                            </h3>
                                            <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}>
                                            <input type="hidden" id="idAdminMedica" name="idAdminMedica">
                                            <input type="hidden" id="consecutiv_r" name="consecutiv_r">
                                            <input type="hidden" id="codigo_conse" name="codigo_conse" value={{$consecu->id}}>

                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                        </div>
                                        <div class="card-body" style="background-color: hsla(176, 46%, 85%, 0.987)">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNewReq" id="presBtnNewReq" value="N">
                                            <div class="row border border-primary">
                                                
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary pb-2">
                                                    <label for="">Fecha entrega:</label>
                                                    <input type="date" class="form-control text" name="fecha_requisicion"
                                                        id="fecha_requisicion"  focusNext tabindex="1" 
                                                        title="fecha de la entrega de la requisición">
                                                </div>            

                                                <div class="col-lg-4 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Quien entrega</label>
                                                    <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="empleados_id" id="empleados_id" focusNext tabindex="2" title = "Seleccione la persona encargada de la administracion del medicamento" >
                                                        <option selected="selected" disable value=" ">Seleciona persona</option>
                                                            @foreach ($requi_empleados as $requi_crea)
                                                                <option value={{$requi_crea->id}}>{{$requi_crea->nombre.' '.$requi_crea->apellidos}}
                                                                </option>
                                                            @endforeach
                                                    </select>                                                        
                                                </div>          
                                                <div class="col-lg-4 col-sm-5 col-sm-6 border border-primary">        
                                                    <label for="">Medicamento</label>
                                                    <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="articulos_id" id="articulos_id" focusNext tabindex="3">
                                                        <option selected="selected" disable value=" ">Selecione medicamento</option>
                                                        @foreach ($requi_articulos as $medica)
                                                            <option value={{$medica->id}}>{{$medica->descripcion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>    
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Remisión #</label>
                                                    <input type="text" class="form-control text p-0 text-center" name="remision" id="remision"
                                                    title="Digite el # de la Remisión de soporte para la requisición " tabindex="4">
                                                </div>                                                  
                                            </div>  <!--cierre de row -->   
                                            
                                            <div class="row border mt-2 mb-3 border border-primary">
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Cantidad:</label>
                                                    <input type="number" class="form-control text p-0 text-center" name="cantidad" id="cantidad"
                                                        title="Cantidad de medicamento a suministrar" tabindex="4">
                                                </div>                                                                                                                                                                       

                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="">Uni. Med</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="unimedidas_id" id="unimedidas_id" focusNext tabindex="5">
                                                        <option selected="selected" disable value=" ">Seleciona U. Med </option>
                                                        @foreach ($requi_unimedida as $unimedId)
                                                            <option value={{$unimedId->id}}>{{$unimedId->descripcion}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                                 
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Existencia hasta:</label>
                                                    <input type="date" class="form-control text" name="existencia_hasta"
                                                        id="existencia_hasta"  focusNext tabindex="6" 
                                                        title="Hasta que fecha debe durar esta requisición">
                                                </div>                                                            
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Fecha vcto:</label>
                                                    <input type="date" class="form-control text" name="fecha_vencimiento"
                                                        id="fecha_vencimiento"  focusNext tabindex="7" 
                                                        title="fecha de vencimiento del medicamento">
                                                </div>            
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Lote #:</label>
                                                    <input type="text" class="form-control text" name="lote"
                                                        id="lote"  focusNext tabindex="8" 
                                                        title="Digite el # de días que durarará el tratamiento">
                                                </div> 
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                        <label for="">C.Costo</label>
                                                        <select class="form-control" style="width: 100%;"
                                                            name="ccostosd_id" id="ccostosd_id" focusNext tabindex="9" title="Selecciona el centro de costo de donde sale la mercancía">
                                                            <option selected="selected" disable value=" ">Seleciona C.costo</option>
                                                            @foreach ($rqui_ccosto as $ccostoId)
                                                                <option value={{$ccostoId->id}}>{{$ccostoId->descripcion}}
                                                                </option>
                                                            @endforeach
                                                        </select>                                                        
                                                </div>                 
                                            </div>  <!--cierre de row -->                                                                    
                                            <div class="row ">
                                                <div class="col-lg-12 col-md-12 col-sm-2 borde bg-primary">
                                                    <table id="adminClientes" class="table table-bordered table-striped bg-success" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Consecutivo</th>
                                                                <th>Remisión</th>
                                                                <th>Fecha</th>
                                                                <th>Medicamento</th>
                                                                <th>Cantidad</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>

                                                            </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  <!-- Cierre carBody -->    
                                    </div> <!-- Cierre Card Car Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/controles_medic.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
 
                            </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewReq" title="Permite administrar un nuevo medicamento al usuario"
                                            focusNext tabindex="17" id="btnNewReq" accionBtn="Nuevo" name="btnNewReq">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Medicamento
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditReq" accionBtn="Modificar" name="btnEditReq">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveReq" accionBtn="Guardar"name="btnSaveReq">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchReq btn-lg" title="Permite localizar un tratamiento, para consultar, modificar o agregar una administracion de una dosis del medicamento"
                                            id="btnSearchReq" name="btnSearchReq" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>
                                           Buscar Tratamiento
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelReq" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteReq" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/admin-evolucion-diaria') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                    style="color:#f30b0b;"></i> Salir</a>    
                                    </div>
                                </div>
                            </div>  <!--cierra row-->
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

window.addEventListener('load', () => {
    $("#motivo_suspen").hide();
// $(document).ready(function(){
    $('#customRadio1').on('click', function(){
        if (document.getElementById('customRadio1').checked) {
            $("#motivo_suspen").show();
        }
    });
    $('#customRadio2').on('click', function(){
        if (document.getElementById('customRadio2').checked) {
            $("#motivo_suspen").hide();
            document.getElementsByName("motivo_suspen")[0].value = "";
        }
    });

    $('#customRadio1').on('click', function(){
        if (document.getElementById('customRadio1').checked) {
            Swal.fire({
			 title: 'Se SUSPENDERÁ la administración del medicamento, estás seguro de suspender el tratamiento?',
			 text: "!No podrás revertir el proceso!",
			 icon: 'warning',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Aceptar',
			 cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {  
                    alert('!SE HA SUSPENDIDO LA ADMINISTRACIÓN DEL MEDICAMENT!')
                }else{
                    document.getElementById('customCheckbox1').checked = false;
                }    
            })          
        }
    });  
        
    $('#customCheckbox1').on('click', function(){
        if (document.getElementById('customCheckbox1').checked) {
            Swal.fire({
			 title: 'Se FINALIZARÁ la administración del medicamento, estás seguro de que ya se terminó el tratamiento?',
			 text: "!No podrás revertir el proceso!",
			 icon: 'warning',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Aceptar',
			 cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {  
                    alert('!LA ADMINISTRACIÓN DEL MEDICAMENTO HA FINALIZADO!')
                }else{
                    document.getElementById('customCheckbox1').checked = false;
                }    
            })          
        }
    });  
    $('#customCheckbox2').on('click', function(){
        if (document.getElementById('customCheckbox2').checked) {
            Swal.fire({
			 title: 'Se establecerá como INDEFINIDA la administración del medicamento, está seguro?',
			 text: "!No podrás revertir el proceso!",
			 icon: 'warning',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Aceptar',
			 cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {  
                    alert('!LA ADMINISTRACIÓN DEL MEDICAMENTO SE HA ESTABLECIDO COMO INDEFINIDA!')
                    document.getElementsByName("duracion_dias")[0].value = " ";
                }else{
                    document.getElementById('customCheckbox2').checked = false;
                }    
              })          
        }
    });              
     
});

// window.addEventListener('load', () => {
// let btnSearchReq = document.getElementById('btnSearchReq');
// btnSearchReq.addEventListener('click', () => {  
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
        let formEvolB = document.getElementById('formAdminRequisicion')

        document.getElementById('btnCancelReq').disabled = true;
        document.getElementById('btnSaveReq').disabled = true;
        funcLib = new AdminRequisicion(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditReq').disabled = true;      

        let bodyTablaClientesEvol = document.getElementById("bodyTabla");
        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchReq = document.getElementById('btnSearchReq');
 
        btnSearchReq.addEventListener('click', () => {
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

                })
        
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

                var btnGuardar = document.getElementById('btnSaveReq');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveReq').disabled = true;
                document.getElementById('btnEditReq').disabled = false;
                document.getElementById('btnCancelReq').disabled = false;
                document.getElementById('btnNewReq').disabled = true;
                document.getElementById('btnSearchReq').disabled = true;
                let btnDeleteReqclick1 = document.getElementById('btnDeleteReq')
                btnDeleteReqclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formAdminRequisicion')
            let botonEdit = document.getElementById("btnEditReq");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveReq', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveReq');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CONTROL MEDICO'
                document.getElementsByName('presBtnNewReq')[0].value="N"                
                document.getElementById('btnEditReq').disabled = true;
                document.getElementById('btnNewReq').disabled = true;                
				document.getElementById('btnDeleteReq').disabled = true;
                document.getElementById('btnSearchReq').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelReq').disabled = false;
                document.getElementById('btnSaveReq').disabled = false;
               
                document.getElementById('fecha').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('fecha').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewReq");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcLib.activaInput();                
				
                //cambioTextBotton('btnSaveReq', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveReq');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelReq').disabled = false;
                document.getElementById('btnSaveReq').disabled = false;                       
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVA REQUISICION DE MEDICAMENTO A USUARIO'

                document.getElementsByName('presBtnNewReq')[0].value="S"                
                
				document.getElementById('btnDeleteReq').disabled = true;
                document.getElementById('btnEditReq').disabled = true;
                document.getElementById('btnNewReq').disabled = true;
                document.getElementById('btnSearchReq').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('fecha_requisicion').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveReq')
        const formRequi = document.querySelector('#formAdminRequisicion');
        formRequi.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";

                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formRequi)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const AdminMedicaUser = async () => {
                            await axios.post("{{URL::to('/requisicion_store')}}",data,{

                            }).then((resp) => {
                                // console.log(resp.data)
                                console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    document.getElementById('btnDeleteReq').disabled = true;
                                    document.getElementById('btnNewReq').disabled = false;
                                    document.getElementById('btnCancelReq').disabled = true;
                                    document.getElementById('btnEditReq').disabled = true;                                 
                                    document.getElementById('btnSearchReq').disabled = false;
                                    document.getElementById('btnSaveReq').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveReq');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'CONTROL DE REQUISICION DE MEDICAMENTOS A USUARIOS'                                
                                    funcLib.clearElements()	                                
                                    formRequi.reset()                      
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'El registro se GUARDÓ con exito',
                                        footer: ''
                                    })
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error interno',
                                        text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                            '  ',
                                        footer: ''
                                    })                                    
                                }
                            })
                        }
                        AdminMedicaUser()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('idAdminMedica')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/clienteUpdateEvol') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteReq').disabled = true;
                                document.getElementById('btnNewReq').disabled = false;
                                document.getElementById('btnCancelReq').disabled = true;
                                document.getElementById('btnSearchReq').disabled = false;
                                document.getElementById('btnSaveReq').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveReq');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'REQUISICION DE MEDICAMENTOS'                                
                                funcLib.clearElements()	                                
                                formRequi.reset()                                    
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
    let botonAnula = document.getElementById("btnDeleteReq");
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
					const formRequiE = document.querySelector('#formAdminRequisicion');
					let idEvolMed = document.getElementsByName('idAdminMedica')[0].value
					let data = new FormData()
					data.append("idEvolucion",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	

					const anulaReg = async () => {  

						await axios.post(
							"{{ URL::To('/anula-CtrlMed') }}",data, {
							}).then((response) => {
					
                                if(response.data['message'] == "Success"){  
                                    document.getElementById('btnDeleteReq').disabled = true;
                                    document.getElementById('btnNewReq').disabled = false;
                                    document.getElementById('btnCancelReq').disabled = true;
                                    document.getElementById('btnSearchReq').disabled = false;
                                    document.getElementById('btnSaveReq').disabled = true;
                                    document.getElementById('btnEditReq').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveReq');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE ADMINISTRACION MEDICA'                                
                                    funcLib.clearElements()	                                
                                    formRequi.reset()                                    
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

                formRequi.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formAdminRequisicion')
			let botonCancel = document.getElementById("btnCancelReq");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveReq', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteReq').disabled = true;
                document.getElementById('btnEditReq').disabled = true;
                document.getElementById('btnSearchReq').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewReq').disabled = false;
                document.getElementById('btnSaveReq').disabled = true; 
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DE ADMINISTRACION DE MEDICAMENTOS'                

				funcLib.accionSaveNew()
				formAnula.reset()
				return true
			})
    
			return true
    })		
    
    function nobackbutton()
    {
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNewReq')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewReq')[0].value;
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


