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
                    <form role="form" name="formCat" id="formCat">
                        @csrfCateas
                        {{-- formCat --}}
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($listaEmpleados as $datosRow)

                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de las Categorías de productos
                                            </h3>
                    
                                            <input type="hidden" id="cat_id" name="cat_id">
                                            {{-- <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}> --}}
                                            {{-- <input type="hidden" id="rutaTable" name="rutaTable" value={{$tablaAuxiliar}}"> --}}
                                        </div>
                                        <div class="card-body" style="background-color: hsl(195, 25%, 94%)">
                                            <input type="hidden" name="accionBotonesCat" accion="Guardar" id="accionBotonesCat">
                                            <input type="hidden" name="presBtnNewCat" id="presBtnNewCat" value="N">
                                            <div class="row border border-primary">

                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Código</label>
                                                    <input type="text" class="form-control text" name="codigo" id="codigo"
                                                     tabindex="2">
                                                </div>             
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Abreviatura</label>
                                                    <input type="text" class="form-control text" name="abreviatura" id="abreviatura"
                                                     tabindex="2">
                                                </div>                             
                                            </div> 
                                            <div class="row border border-primary">          
                                                <div class="col-12 col-lg-12 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Descripcion</label>
                                                    <input type="text" class="form-control text" name="descripcion" id="descripcion"
                                                     tabindex="2">
                                                </div>  
                                            </div>  <!--cierre de row -->            

                                    </div> <!-- Cierre Catd Cat Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/tablas_auxiliares/inv_categorias.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                             </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewCat" 
                                            focusNext tabindex="17" id="btnNewCat" accionBtn="Nuevo" name="btnNewCat">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Reg
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditCat" accionBtn="Modificar" name="btnEditCat">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveCat" accionBtn="Guardar"name="btnSaveCat">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchCat btn-lg" title="Permite localizar un el registro"
                                            id="btnSearchCat" name="btnSearchCat" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelCat" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteCat" title="Anula el registro que esta en la ventana"
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
    <div class="modal fade" id="modalBuscarCat" class="modalBuscarCat" data-backdrop="static" focusNext tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista General de Cateas </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaCat" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Descripcion</th>
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
        let formEvolB = document.getElementById('formCat')

        document.getElementById('btnCancelCat').disabled = true;
        document.getElementById('btnSaveCat').disabled = true;
        document.getElementById('btnEditCat').disabled = true;
        funcCat = new CategoriasFunciones(); // 


        funcCat.desactivaInput();  
        document.getElementById('btnEditCat').disabled = true;      

        let bodyTablaCat = document.getElementById("bodyTabla");
        let modalBuscarCat = document.getElementById('modalBuscarCat');
        let btnSearchCat = document.getElementById('btnSearchCat');
 
        btnSearchCat.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaCat')) { 
                let jaminson = $('#tablaCat').DataTable();
                // alert(jaminson)
                const buscarCatgos = function() {
                    $("#modalBuscarCat").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
 
                    // $('#tablaCat .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaCat').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarCatgos()
            }

            let espanol = idioma()
            const buscarCatgos = function() {
                $("#modalBuscarCat").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaCat').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/invCatListaShow') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "codigo"
                        },
                        {
                            "data": "descripcion"
                        },
                        {
                            "data": "abreviatura"
                        },                        
                    ],
                     columnDefs: [{
                            targets: 2,
                            visible: true
                        },
                        {
                            targets: 3,
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
                
                obtener_data_buscar("#tablaCat tbody", table)
            }
            
            buscarCatgos()
            return true;
        })
            // actualizacion de contenido en tiempo real

        let obtener_data_buscar = function(tbody, table) {
            // $("#idModal").on('hidden.bs.modal', function() {
            //         DataTableCatgaDatos();
            //     });
 
            $(tbody).on("click", "button.btnCaptura", function() {
                let data = table.row($(this).parents("tr")).data();
                // console.log(data.fecha_pedido_cita)
                // formEvolB.reset()
                let dataCat = data;
                console.log(dataCat)
                funcCat.asignaValorEdit(dataCat)

                var btnGuardar = document.getElementById('btnSaveCat');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveCat').disabled = true;
                document.getElementById('btnEditCat').disabled = false;
                document.getElementById('btnCancelCat').disabled = false;
                document.getElementById('btnNewCat').disabled = true;
                document.getElementById('btnSearchCat').disabled = true;
                let btnDeleteCatclick1 = document.getElementById('btnDeleteCat')
                btnDeleteCatclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formCat')
            let botonEdit = document.getElementById("btnEditCat");
			botonEdit.addEventListener('click', () => {
                funcCat.activaInput();                
                   // cambioTextBotton('btnSaveCat', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveCat');
                btnGuardar.innerHTML = 'Actualizar'    
                funcCat.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CATEGORIAS'
                document.getElementsByName('presBtnNewCat')[0].value="N"                
                document.getElementById('btnEditCat').disabled = true;
                document.getElementById('btnNewCat').disabled = true;                
				document.getElementById('btnDeleteCat').disabled = true;
                document.getElementById('btnSearchCat').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelCat').disabled = false;
                document.getElementById('btnSaveCat').disabled = false;
               
                var attrAccion4 = $("#accionBotonesCat").attr("accion");
                document.getElementById('codigo').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewCat");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotonesCat").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcCat.activaInput();                
				
                //cambioTextBotton('btnSaveCat', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveCat');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelCat').disabled = false;
                document.getElementById('btnSaveCat').disabled = false;                       
             
				funcCat.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE CATEGORIAS'

                document.getElementsByName('presBtnNewCat')[0].value="S"                
                
				document.getElementById('btnDeleteCat').disabled = true;
                document.getElementById('btnEditCat').disabled = true;
                document.getElementById('btnNewCat').disabled = true;
                document.getElementById('btnSearchCat').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('codigo').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        *********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveCat')
        const formCat = document.querySelector('#formCat');
        formCat.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";
                    validaOk = funcCat.validarCampos2()
                    var attrAccion2 = $("#accionBotonesCat").attr("accion");
                    let data = new FormData(formCat)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const carSaveReg = async () => {
                            await axios.post("{{URL::to('/invCategoriaStore')}}",data,{
                            }).then((resp) => {
                                console.log(resp.data)
                                // console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    // if(resp.data){
                                    document.getElementById('btnDeleteCat').disabled = true;
                                    document.getElementById('btnNewCat').disabled = false;
                                    document.getElementById('btnCancelCat').disabled = true;
                                    document.getElementById('btnEditCat').disabled = true;                                 
                                    document.getElementById('btnSearchCat').disabled = false;
                                    document.getElementById('btnSaveCat').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotonesCat')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveCat');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcCat.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'ADMINISTRACION DE DATOS DE LAS CATEGORIAS'                                
                                    formCat.reset()                      
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
                        let idEvolMed = document.getElementsByName('cat_id')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/invCategoriaUpdate') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteCat').disabled = true;
                                document.getElementById('btnNewCat').disabled = false;
                                document.getElementById('btnCancelCat').disabled = true;
                                document.getElementById('btnSearchCat').disabled = false;
                                document.getElementById('btnSaveCat').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotonesCat')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveCat');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcCat.desactivaInput();

                                document.getElementById('textB').innerHTML = 'DATOS DE CATEGORIAS'                                
                                formCat.reset()                                    
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
    let botonAnula = document.getElementById("btnDeleteCat");
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
					const formCatE = document.querySelector('#formCat');
					let idEvolMed = document.getElementsByName('cat_id')[0].value
					let data = new FormData()
					data.append("cat_id",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/anulaRegistroCate')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                // if(response.data['message'] == "Success"){  
                                    if (response.data){
                                    document.getElementById('btnDeleteCat').disabled = true;
                                    document.getElementById('btnNewCat').disabled = false;
                                    document.getElementById('btnCancelCat').disabled = true;
                                    document.getElementById('btnSearchCat').disabled = false;
                                    document.getElementById('btnSaveCat').disabled = true;
                                    document.getElementById('btnEditCat').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotonesCat')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveCat');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcCat.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE REGISTRO DE CATEGORIAS'                                
                                    formCat.reset()                                    
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

                formCat.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formCat')
			let botonCancel = document.getElementById("btnCancelCat");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveCat', 'Actualizar', 'Guardar')
                funcCat.desactivaInput();

				document.getElementById('btnDeleteCat').disabled = true;
                document.getElementById('btnEditCat').disabled = true;
                document.getElementById('btnSearchCat').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewCat').disabled = false;
                document.getElementById('btnSaveCat').disabled = true; 
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DE ADMINISTRACION DE MEDICAMENTOS'                

				funcCat.accionSaveNew()
				formAnula.reset()
				return true
			})
    
			return true
    })		
    
    function nobackbutton()
    {
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNewCat')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewCat')[0].value;
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


