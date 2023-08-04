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
                    <form role="form" name="formLin" id="formLin">
                        @csrfLineas
                        {{-- formLin --}}
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($listaEmpleados as $datosRow)

                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de las Lineas de productos
                                            </h3>
                    
                                            <input type="hidden" id="lin_id" name="lin_id">
                                            {{-- <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}> --}}
                                            {{-- <input type="hidden" id="rutaTable" name="rutaTable" value={{$tablaAuxiliar}}"> --}}
                                        </div>
                                        <div class="card-body" style="background-color: hsl(195, 25%, 94%)">
                                            <input type="hidden" name="accionBotonesLin" accion="Guardar" id="accionBotonesLin">
                                            <input type="hidden" name="presBtnNewLin" id="presBtnNewLin" value="N">
                                            <div class="row border border-primary">

                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Código</label>
                                                    <input type="text" class="form-control text" name="codigo" id="codigo"
                                                     tabindex="2">
                                                </div>                                                  
                                                <div class="col-12 col-lg-9 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Descripcion</label>
                                                    <input type="text" class="form-control text" name="descripcion" id="descripcion"
                                                     tabindex="2">
                                                </div>  
                                                <div class="col-sm-5 col-md-4 col-lg-4 border border-primary pt-2 pb-2">
                                                    <label class="">Categoría</label>
                                                    <select class="form-control text"
                                                        style="width: 100%" tabindex="8"
                                                        name="categoria_id" id="categoria_id">
                                                        <option selected disable value="">Sele Categoria</option>
                                                        @foreach ($invCategoria as $rCat)
                                                            <option value={{ $rCat->id }}>{{ $rCat->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>       
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Abreviatura</label>
                                                    <input type="text" class="form-control text" name="abreviatura" id="abreviatura"
                                                     tabindex="2">
                                                </div>                                                                                                           
                                            </div>  <!--cierre de row -->            

                                    </div> <!-- Cierre Lind Lin Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/tablas_auxiliares/inv_lineas.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                             </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewLin" 
                                            focusNext tabindex="17" id="btnNewLin" accionBtn="Nuevo" name="btnNewLin">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Reg
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditLin" accionBtn="Modificar" name="btnEditLin">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveLin" accionBtn="Guardar"name="btnSaveLin">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchLin btn-lg" title="Permite localizar un el registro"
                                            id="btnSearchLin" name="btnSearchLin" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelLin" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteLin" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/datosAuxiliarIndex') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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
      MODAL PARA LA BUSQUEDA 
      *****************************************************-->

      <!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscarLin" class="modalBuscarLin" data-backdrop="static" focusNext tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista General de Lineas </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaLin" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Linea</th>
                                        <th>Categoría</th>
                                        <th>Abreviatura</th>
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

    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
    window.addEventListener('load', () => {
        let formEvolB = document.getElementById('formLin')

        document.getElementById('btnCancelLin').disabled = true;
        document.getElementById('btnSaveLin').disabled = true;
        document.getElementById('btnSaveLin').disabled = true;
        funcLib = new LineasFunciones(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditLin').disabled = true;      

        let bodyTablaLin = document.getElementById("bodyTabla");
        let modalBuscarLin = document.getElementById('modalBuscarLin');
        let btnSearchLin = document.getElementById('btnSearchLin');
 
        btnSearchLin.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaLin')) { 
                let jaminson = $('#tablaLin').DataTable();
                // alert(jaminson)
                const buscarLineas = function() {
                    $("#modalBuscarLin").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
 
                    // $('#tablaLin .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaLin').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarLineas()
            }

            let espanol = idioma()
            const buscarLineas = function() {
                $("#modalBuscarLin").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaLin').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/invlinListaShow') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "codigo"
                        },
                        {
                            "data": "linea"
                        },
                        {
                            "data": "categoria"
                        },
                        {
                            "data": "abreviatura "
                        },                        
                    ],
                     columnDefs: [{
                            targets: 3,
                            visible: true
                        },
                        {
                            targets: 4,
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
                
                obtener_data_buscar("#tablaLin tbody", table)
            }
            
            buscarLineas()
            return true;
        })
            // actualizacion de contenido en tiempo real

        let obtener_data_buscar = function(tbody, table) {
            // $("#idModal").on('hidden.bs.modal', function() {
            //         DataTableLingaDatos();
            //     });
 
            $(tbody).on("click", "button.btnCaptura", function() {
                let data = table.row($(this).parents("tr")).data();
                // console.log(data.fecha_pedido_cita)
                // formEvolB.reset()
                let dataLin = data;
                console.log(dataLin)
                funcLib.asignaValorEdit(dataLin)

                var btnGuardar = document.getElementById('btnSaveLin');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveLin').disabled = true;
                document.getElementById('btnEditLin').disabled = false;
                document.getElementById('btnCancelLin').disabled = false;
                document.getElementById('btnNewLin').disabled = true;
                document.getElementById('btnSearchLin').disabled = true;
                let btnDeleteLinclick1 = document.getElementById('btnDeleteLin')
                btnDeleteLinclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formLin')
            let botonEdit = document.getElementById("btnEditLin");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveLin', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveLin');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE LINEAS'
                document.getElementsByName('presBtnNewLin')[0].value="N"                
                document.getElementById('btnEditLin').disabled = true;
                document.getElementById('btnNewLin').disabled = true;                
				document.getElementById('btnDeleteLin').disabled = true;
                document.getElementById('btnSearchLin').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelLin').disabled = false;
                document.getElementById('btnSaveLin').disabled = false;
               
                var attrAccion4 = $("#accionBotonesLin").attr("accion");
                document.getElementById('descripcion').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewLin");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotonesLin").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcLib.activaInput();                
				
                //cambioTextBotton('btnSaveLin', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveLin');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelLin').disabled = false;
                document.getElementById('btnSaveLin').disabled = false;                       
             
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE LINEAS'

                document.getElementsByName('presBtnNewLin')[0].value="S"                
                
				document.getElementById('btnDeleteLin').disabled = true;
                document.getElementById('btnEditLin').disabled = true;
                document.getElementById('btnNewLin').disabled = true;
                document.getElementById('btnSearchLin').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('descripcion').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        *********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveLin')
        const formLin = document.querySelector('#formLin');
        formLin.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";
                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotonesLin").attr("accion");
                    let data = new FormData(formLin)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const carSaveReg = async () => {
                            await axios.post("{{URL::to('/invLineasStore')}}",data,{
                            }).then((resp) => {
                                console.log(resp.data)
                                // console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    // if(resp.data){
                                    document.getElementById('btnDeleteLin').disabled = true;
                                    document.getElementById('btnNewLin').disabled = false;
                                    document.getElementById('btnCancelLin').disabled = true;
                                    document.getElementById('btnEditLin').disabled = true;                                 
                                    document.getElementById('btnSearchLin').disabled = false;
                                    document.getElementById('btnSaveLin').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotonesLin')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveLin');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'ADMINISTRACION DE DATOS DE LAS LINEAS'                                
                                    formLin.reset()                      
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
                        carSaveReg()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('lin_id')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/invLineasUpdate') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteLin').disabled = true;
                                document.getElementById('btnNewLin').disabled = false;
                                document.getElementById('btnCancelLin').disabled = true;
                                document.getElementById('btnSearchLin').disabled = false;
                                document.getElementById('btnSaveLin').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotonesLin')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveLin');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'DATOS DE LINEAS'                                
                                formLin.reset()                                    
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

    
    /*****************************************************
	                Anular Registro
	********************************************************/
    let botonAnula = document.getElementById("btnDeleteLin");
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
					const formLinE = document.querySelector('#formLin');
					let idEvolMed = document.getElementsByName('lin_id')[0].value
					let data = new FormData()
					data.append("lin_id",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/anulaRegistroLin')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                // if(response.data['message'] == "Success"){  
                                    if (response.data){
                                    document.getElementById('btnDeleteLin').disabled = true;
                                    document.getElementById('btnNewLin').disabled = false;
                                    document.getElementById('btnCancelLin').disabled = true;
                                    document.getElementById('btnSearchLin').disabled = false;
                                    document.getElementById('btnSaveLin').disabled = true;
                                    document.getElementById('btnEditLin').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotonesLin')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveLin');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE REGISTRO DE LINEAS'                                
                                    formLin.reset()                                    
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

                formLin.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formLin')
			let botonCancel = document.getElementById("btnCancelLin");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveLin', 'Actualizar', 'Guardar')
                funcLib.desactivaInput();

				document.getElementById('btnDeleteLin').disabled = true;
                document.getElementById('btnEditLin').disabled = true;
                document.getElementById('btnSearchLin').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewLin').disabled = false;
                document.getElementById('btnSaveLin').disabled = true; 
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
                let vlrNewButton2 = document.getElementsByName('presBtnNewLin')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewLin')[0].value;
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


