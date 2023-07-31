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
                    <form role="form" name="formArticulos" id="formArticulos" action="">
                        @csrf
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($seleUsuario as $datosRow) --}}
                                {{-- @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">CATALOGO GENERAL DE ARTICULOS
                                            </h3>
                                                
                                            <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                {{-- USUARIO/CLIENTE --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}} --}}
                                            </h3>
                                            {{-- <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}> --}}
                                            <input type="hidden" id="idArtiAnular" name="idArtiAnular">
                                            //idArtiAnular
                                            {{-- <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}> --}}
                                        </div>
                                        <div class="card-body" style="background-color: #08a2ef">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNewArti" id="presBtnNewArti" value="N">
                                            <div class="row border pb-2">
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-3">
                                                    <label>Referencia</label>
                                                    <input type="text" class="form-control text" name="referencia"
                                                    id="referencia" placeholder="Ref. Articulo" maxlength="25" focusNext tabindex="1">
                                                </div>   

                                                <div class="col-12 col-lg-7 col-md-4 col-sm-6">
                                                    <label for="">Descripción</label>
                                                    <textarea type="text" class="form-control text " rows="1" id="descripcion" name="descripcion" title=""
                                                    placeholder="Escria la descripción del artículo" focusNext tabindex="2"></textarea>
                                                </div>   

                                                <div class="col-12 col-lg-2 col-md-4 col-sm-3">
                                                    <label>Abreviatura</label>
                                                    <input type="text" class="form-control text" name="abreviatura"
                                                    id="abreviatura" placeholder="" maxlength="15" focusNext tabindex="3">
                                                </div>   
                                            </div> <!--cierre row-->

                                            <div class="row border pb-2">
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2">
                                                    <label for="">Linea</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="linea_id" id="linea_id" focusNext tabindex="5">
                                                        <option selected="selected" disable value=" ">Seleciona linea</option>
                                                        @foreach ($_linasId as $lineaInv)
                                                            <option value={{$lineaInv->id}}>{{$lineaInv->descripcion}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                                                                  
                                                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                                                    <label for="">Categoría</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="categoria_id" id="categoria_id" focusNext tabindex="4">
                                                        <option selected="selected" disable value=" ">Seleciona categoría</option>
                                                        @foreach ($_categoriasInv as $cateInv)
                                                            <option value={{$cateInv->id}}>{{$cateInv->descripcion}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                  
                                    
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2">
                                                    <label for="">Uni. Med</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="unimedidas_id" id="unimedidas_id" focusNext tabindex="6">
                                                        <option selected="selected" disable value=" ">Seleciona U. Med </option>
                                                        @foreach ($_uniMedId as $unimedId)
                                                            <option value={{$unimedId->id}}>{{$unimedId->descripcion}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                  
                                                <div class="col-12 col-lg-3 col-md-6 col-sm-3">
                                                    <label for="">Proveedor</label>
                                                        <select class="select2 select2-danger"
                                                        data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                        name="proveedor_id" id="proveedor_id" focusNext tabindex="7">
                                                        <option selected="selected" disable value=" ">Seleciona proveedor</option>
                                                        @foreach ($_proveedorId as $provedId)
                                                            <option value={{$provedId->id}}>{{$provedId->nombre}}
                                                            </option>
                                                        @endforeach
                                                    </select>                                                        
                                                </div>                
                                            </div> <!--cierre row-->                                                                                                
                                            
                                        <div class="row border pb-2">   
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Stock Min</label>
                                                    <input type="number" class="form-control text" name="stock_min"
                                                    id="stock_min" placeholder="" title="Digite la cantidad mínima de que debe haber en inventario" focusNext tabindex="9">
                                                </div> 
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Stock Max</label>
                                                    <input type="number" class="form-control text" name="stock_max"
                                                    id="stock_max" placeholder="" title="Digite la cantidad máxima de que debe haber en inventario" focusNext tabindex="10">
                                                </div> 
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Inv Inicial</label>
                                                    <input type="text" class="form-control text" name="inv_inicial"
                                                    id="inv_inicial" placeholder="" title="" focusNext tabindex="11" disabled = "true">
                                                </div> 
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Tot Entradas</label>
                                                    <input type="text" class="form-control text" name="cant_entradas"
                                                    id="cant_entradas" placeholder="" title="" focusNext tabindex="12" disabled = "true">
                                                </div> 
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Tot Salidas</label>
                                                    <input type="text" class="form-control text" name="cant_salidas"
                                                    id="cant_salidas" placeholder="" title="" focusNext tabindex="13" disabled = "true">
                                                </div> 
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Ajsutes</label>
                                                    <input type="text" class="form-control text" name="cant_ajustes" disabled = "true"
                                                    id="cant_ajustes" placeholder="" title="Cantidad de unidades ajustadas por perdida, descontinuación o averiación" focusNext tabindex="14" disabled="true">
                                                </div>                                                   
                                        </div> <!--cierre row--> 
                                            
                                        <div class="row border pb-2">  
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>Existencia</label>
                                                    <input type="text" class="form-control text" name="existencia"
                                                    id="existencia" placeholder="" title="" focusNext tabindex="15" disabled = "true">
                                                </div>    
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>%IVA</label>
                                                    <input type="text" class="form-control text" name="iva" id="iva" title="" focusNext tabindex="16">
                                                </div>         

                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>P.Costo</label>
                                                    <input type="text" class="form-control text" name="pcosto" id="pcosto" title="" focusNext tabindex="17">
                                                </div>          
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>P.Venta</label>
                                                    <input type="text" class="form-control text" name="pventa" id="pventa" title="" focusNext tabindex="18">
                                                </div>                                                          
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2">
                                                    <label>U.F. Compra</label> 
                                                    <input type="text" class="form-control text" name="ult_fecha_compra" disabled = "true"
                                                    id="ult_fecha_compra" title="Ultima fecha en la que se compró este articulo" focusNext tabindex="19">
                                                </div>   
                                        </div>  <!--cierre row-->   
                                        <div class="row border pt-3">                                                       
                                                <div class="col-lg-2">
                                                    <div class="card card-primary">
                                                        {{-- <div class="card-header">
                                                            <h3 class="card-title float-right ">Fotografía</h3>
                                                        </div> --}}
                                                        {{-- <div class="card-body bg-info"> --}}
                                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                                <div class="image">
                                                                    <img id="imagenPrevisualizacion" class="img-responsive"
                                                                        style="width:140px;height:130px">
                                                                </div>
                                                            </div>
                                                        {{-- </div> --}}
                                                        <input type="file" id="seleccionArchivos" class="btn btn-success"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-10 col-md-4 col-sm-6">
                                                    <label for="">Observación</label>
                                                    <textarea type="text" class="form-control text " rows="3" id="observacion" name="observacion" title=""
                                                    placeholder="Escria la descripción del artículo" focusNext tabindex="2"></textarea>
                                                </div>                                                   
                                            </div> <!--cierre row--> 
                                        </div>  <!-- Cierre carBody -->
                                </div> <!-- card card-primary-->

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/inventario/inventario.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                                <script src="{{ asset('../resources/js/imagen.js') }}"></script>   
 
                            </body>
                        </div> 
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewArti" title="Limpia todos las cledas para iniciar la creación de una nueva cita"
                                            focusNext tabindex="17" id="btnNewArti" accionBtn="Nuevo" name="btnNewArti">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Ctrl
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditArti" accionBtn="Modificar" name="btnEditArti">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveArti" accionBtn="Guardar"name="btnSaveArti">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchArti btn-lg" title="Bucar un cita del usuario actual"
                                            id="btnSearchArti" name="btnSearchArti" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>
                                           Consultar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelArti" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteArti" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/admin-Artiucion-diaria') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                    style="color:#f30b0b;"></i> Salir</a>    
                                    </div>
                                </div>
                            </div> </div>  <!--cierra row--> 
                        </footer>
                    </form>
                </div> <!-- card-body -->
            </div> <!--card border-->
        </section>
    </div> <!--content-wrapper-->
@endsection

<!-- ******************************************************
      MODAL PARA LA BUSQUEDA DE CLIENTES DATOS BASICOS
      *****************************************************-->

      <!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscarArti" class="modalBuscarArti" data-backdrop="static" focusNext tabindex="-1"
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
                            <table id="tablaClientesArti" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>REF</th>
                                        <th>DESCRIPCION</th>
                                        <th>EXISTENCIA</th>
                                        <th>P.COSTO</th>
                                        <th>P.VENTA</th>
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
// let btnSearchArti = document.getElementById('btnSearchArti');
// btnSearchArti.addEventListener('click', () => {  
//     alert('dsfmas,fmasl')
// //   let data = new FormData();
//    let prueba = async () => {
//        await axios.get("{{ URL::to('/buscarArticulos_show') }}", {
 
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
        let formArtiB = document.getElementById('formArticulos')

        document.getElementById('btnCancelArti').disabled = true;
        document.getElementById('btnCancelArti').disabled = true;
        // document.getElementById('btnSaveArti').disabled = true;
        funcLib = new invArticulos(); // 

        funcLib.desactivaInput();  
        document.getElementById('btnEditArti').disabled = true;      

        let bodyTablaClientesArti = document.getElementById("bodyTabla");
        let modalBuscarArti = document.getElementById('modalBuscarArti');
        let btnSearchArti = document.getElementById('btnSearchArti');
 
        btnSearchArti.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaClientesArti')) { 
                let jaminson = $('#tablaClientesArti').DataTable();
                // alert(jaminson)
                const buscarClientes = function() {
                    $("#modalBuscarArti").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaClientesArti').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarClientes()
            }

            let espanol = idioma()
            const buscarClientes = function() {
                $("#modalBuscarArti").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaClientesArti').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/buscarArticulos_show') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "referencia"
                        },
                        {
                            "data": "articulo"
                        }, 
                        {
                            "data": "existencia"
                        },                        
                        {
                            "data": "pcosto"
                        },
                        {
                            "data": "pventa"
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
                    "language": espanol,
                    "destroy": true

                })
                
                        
                //    $('#ModalUpdate').modal('hide');
                //  alert("datos actualizados");
                //  table.ajax.reload();//Podrias colocarlo dentro del success o done para recargar la tabla 
                
                obtener_data_buscar("#tablaClientesArti tbody", table)
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
                // formArtiB.reset()
                let dataArti = data;
                console.log(dataArti)
                funcLib.asignaValorEdit(dataArti)

                /*Cuando se busca un registro se cambial atributo del input hidden*/
                // let newNom80 = document.getElementById('accionBotones')
                // newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSaveArti');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveArti').disabled = true;
                document.getElementById('btnEditArti').disabled = false;
                document.getElementById('btnCancelArti').disabled = false;
                document.getElementById('btnNewArti').disabled = true;
                document.getElementById('btnSearchArti').disabled = true;
                let btnDeleteArticlick1 = document.getElementById('btnDeleteArti')
                btnDeleteArticlick1.disabled = false
                
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
            let formArtiB2 = document.getElementById('formArticulos')
            let botonEdit = document.getElementById("btnEditArti");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveArti', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveArti');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CONTROL MEDICO'
                document.getElementsByName('presBtnNewArti')[0].value="N"                
                document.getElementById('btnEditArti').disabled = true;
                document.getElementById('btnNewArti').disabled = true;                
				document.getElementById('btnDeleteArti').disabled = true;
                document.getElementById('btnSearchArti').disabled = true;
                botonNew.disabled = true;
                document.getElementById('btnCancelArti').disabled = false;
                document.getElementById('btnSaveArti').disabled = false;
               
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('referencia').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewArti");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                // alert(attrAccion3)
                funcLib.activaInput();                
				
                        //  cambioTextBotton('btnSaveArti', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveArti');
                btnGuardar.innerHTML = 'Guardar'                           
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO CONTROL DIARIO DE ArtiUCION MEDICA'

                document.getElementsByName('presBtnNewArti')[0].value="S"                
                
				document.getElementById('btnDeleteArti').disabled = true;
                document.getElementById('btnEditArti').disabled = true;
                document.getElementById('btnNewArti').disabled = true;
                document.getElementById('btnSearchArti').disabled = true;
                botonNew.disabled = true;
                document.getElementById('btnCancelArti').disabled = false;
                document.getElementById('btnSaveArti').disabled = false;
                
                formArtiB2.reset()
                document.getElementById('referencia').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
         
        selectorGuardar = document.querySelector('#btnSaveArti')
        const formArtiQ = document.querySelector('#formArticulos');

        formArtiQ.addEventListener("submit", (e) => {
            e.preventDefault();

                    let validaOk ="Ok";

                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formArtiQ)
                    let valuesDat = [...data.entries()];
                    // console.log(valuesDat);
                    // return false
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const clienteArtiMedica = async () => {
                            await axios.post("{{URL::to('/invArticulosStore')}}",data,{

                            }).then((resp) => {
                                    console.log(resp.data)

                                // console.log(response.data['message'])
                                document.getElementById('btnDeleteArti').disabled = true;
                                document.getElementById('btnNewArti').disabled = false;
                                document.getElementById('btnCancelArti').disabled = true;
                                document.getElementById('btnEditArti').disabled = true;                                 
                                document.getElementById('btnSearchArti').disabled = false;
                                document.getElementById('btnSaveArti').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar10 = document.getElementById('btnSaveArti');
                                btnGuardar10.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'CONTROL DIARIO DE ArtiUCIÓN MÉDICA'                                
                                funcLib.clearElements()	                                
                                formArtiQ.reset()                                       

                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se GUARDÓ con exito',
                                    footer: ''
                                })
                                // console.log(resp.data)

                                funcLib.clearElements()	                                
                                formArtiQ.reset()
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
                        clienteArtiMedica()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idArtiMed = document.getElementsByName('idArtiAnular')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/clienteUpdateArti') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])
                                document.getElementById('btnDeleteArti').disabled = true;
                                document.getElementById('btnNewArti').disabled = false;
                                document.getElementById('btnCancelArti').disabled = true;
                                document.getElementById('btnSearchArti').disabled = false;
                                document.getElementById('btnSaveArti').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveArti');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'CONTROL DIARIO DE ArtiUCION MEDICA'                                
                                funcLib.clearElements()	                                
                                formArtiQ.reset()                                    
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
        //     let table4 = $('#tablaClientesArti').DataTable({
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
    let botonAnula = document.getElementById("btnDeleteArti");
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
					const formArtiQE = document.querySelector('#formArticulos');
					let idArtiAnu = document.getElementsByName('idArtiAnular')[0].value
					let data = new FormData()
					data.append("idArtiAnular",idArtiAnu);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	

					const anulaReg = async () => {  

						await axios.post(
							"{{ URL::To('/anulaArticulo') }}",data, {
							}).then((response) => {
					
                                if(response.data['message'] == "Success"){  
                                    document.getElementById('btnDeleteArti').disabled = true;
                                    document.getElementById('btnNewArti').disabled = false;
                                    document.getElementById('btnCancelArti').disabled = true;
                                    document.getElementById('btnSearchArti').disabled = false;
                                    document.getElementById('btnSaveArti').disabled = true;
                                    document.getElementById('btnEditArti').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveArti');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE ArtiUCION MEDICA'                                
                                    funcLib.clearElements()	                                
                                    formArtiQ.reset()                                    
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

                formArtiQ.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formArticulos')
			let botonCancel = document.getElementById("btnCancelArti");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveArti', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteArti').disabled = true;
                document.getElementById('btnEditArti').disabled = true;
                document.getElementById('btnSearchArti').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewArti').disabled = false;
                document.getElementById('btnSaveArti').disabled = true; 
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DE CITAS MEDICAS'                

				funcLib.accionSaveNew()
				formAnula.reset()
				return true
			})
    
			return true
    })		
    
    function nobackbutton()
    {
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNewArti')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewArti')[0].value;
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


