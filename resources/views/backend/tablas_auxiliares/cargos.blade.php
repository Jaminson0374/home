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
                    <form role="form" name="formCar" id="formCar">
                        @csrf
                        {{-- formCar --}}
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($listaEmpleados as $datosRow)

                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de los Cargos de empleados
                                            </h3>
                    
                                            <input type="hidden" id="car_id" name="car_id">
                                            {{-- <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}> --}}
                                            {{-- <input type="hidden" id="rutaTable" name="rutaTable" value={{$tablaAuxiliar}}"> --}}
                                        </div>
                                        <div class="card-body" style="background-color: hsl(195, 25%, 94%)">
                                            <input type="hidden" name="accionBotonesCar" accion="Guardar" id="accionBotonesCar">
                                            <input type="hidden" name="presBtnNewCar" id="presBtnNewCar" value="N">
                                            <div class="row border border-primary">
                                                <div class="col-12 col-lg-8 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Descripcion</label>
                                                    <input type="text" class="form-control text" name="descripcion" id="descripcion"
                                                     tabindex="2">
                                                </div>  
                                                <div class="col-sm-5 col-md-4 col-lg-4 border border-primary">
                                                    <label class="">Categoría</label>
                                                    <select class="form-control text"
                                                        style="width: 100%" tabindex="8"
                                                        name="categoria_id" id="categoria_id">
                                                        <option selected disable value="">Sele Categoria</option>
                                                        @foreach ($categoriaCargo as $rCar)
                                                            <option value={{ $rCar->id }}>{{ $rCar->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                      
                                                <div class="col-lg-12 col-sm-5 col-sm-6 border border-primary pb-2">
                                                    <label for="">Funciones</label>
                                                    <textarea rows="2" class="form-control text " name="funciones"
                                                        id="funciones"  placeholder="" focusNext tabindex="2" maxlength="100"
                                                        title="" tabindex="11">
                                                    </textarea>
                                                </div>    

                                            </div>  <!--cierre de row -->            

                                    </div> <!-- Cierre Card Car Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/tablas_auxiliares/cargos.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                             </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewCar" 
                                            focusNext tabindex="17" id="btnNewCar" accionBtn="Nuevo" name="btnNewCar">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Reg
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditCar" accionBtn="Modificar" name="btnEditCar">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveCar" accionBtn="Guardar"name="btnSaveCar">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchCar btn-lg" title="Permite localizar un el registro"
                                            id="btnSearchCar" name="btnSearchCar" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelCar" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteCar" title="Anula el registro que esta en la ventana"
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
    <div class="modal fade" id="modalBuscarCar" class="modalBuscarCar" data-backdrop="static" focusNext tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista General de CARGOS </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaCar" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Cargo</th>
                                        <th>Categoría</th>
                                        <th>Funciones</th>
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
        let formEvolB = document.getElementById('formCar')

        document.getElementById('btnCancelCar').disabled = true;
        document.getElementById('btnSaveCar').disabled = true;
        funcLib = new CargosFunciones(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditCar').disabled = true;      

        let bodyTablaCar = document.getElementById("bodyTabla");
        let modalBuscarCar = document.getElementById('modalBuscarCar');
        let btnSearchCar = document.getElementById('btnSearchCar');
 
        btnSearchCar.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaCar')) { 
                let jaminson = $('#tablaCar').DataTable();
                // alert(jaminson)
                const buscarCargos = function() {
                    $("#modalBuscarCar").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
 
                    // $('#tablaCar .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });

                    let table = $('#tablaCar').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarCargos()
            }

            let espanol = idioma()
            const buscarCargos = function() {
                $("#modalBuscarCar").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaCar').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/carListaShow') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "cargo"
                        },
                        {
                            "data": "categoria"
                        },
                        {
                            "data": "funciones"
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
                
                obtener_data_buscar("#tablaCar tbody", table)
            }
            
            buscarCargos()
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
                let dataCar = data;
                console.log(dataCar)
                funcLib.asignaValorEdit(dataCar)

                var btnGuardar = document.getElementById('btnSaveCar');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveCar').disabled = true;
                document.getElementById('btnEditCar').disabled = false;
                document.getElementById('btnCancelCar').disabled = false;
                document.getElementById('btnNewCar').disabled = true;
                document.getElementById('btnSearchCar').disabled = true;
                let btnDeleteCarclick1 = document.getElementById('btnDeleteCar')
                btnDeleteCarclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formCar')
            let botonEdit = document.getElementById("btnEditCar");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveCar', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveCar');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CARGOS'
                document.getElementsByName('presBtnNewCar')[0].value="N"                
                document.getElementById('btnEditCar').disabled = true;
                document.getElementById('btnNewCar').disabled = true;                
				document.getElementById('btnDeleteCar').disabled = true;
                document.getElementById('btnSearchCar').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelCar').disabled = false;
                document.getElementById('btnSaveCar').disabled = false;
               
                var attrAccion4 = $("#accionBotonesCar").attr("accion");
                document.getElementById('descripcion').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewCar");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotonesCar").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcLib.activaInput();                
				
                //cambioTextBotton('btnSaveCar', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveCar');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelCar').disabled = false;
                document.getElementById('btnSaveCar').disabled = false;                       
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE CARGOS'

                document.getElementsByName('presBtnNewCar')[0].value="S"                
                
				document.getElementById('btnDeleteCar').disabled = true;
                document.getElementById('btnEditCar').disabled = true;
                document.getElementById('btnNewCar').disabled = true;
                document.getElementById('btnSearchCar').disabled = true;
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
                    
        selectorGuardar = document.querySelector('#btnSaveCar')
        const formCar = document.querySelector('#formCar');
        formCar.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";
                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotonesCar").attr("accion");
                    let data = new FormData(formCar)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const carSaveReg = async () => {
                            await axios.post("{{URL::to('/cargosStore')}}",data,{
                            }).then((resp) => {
                                console.log(resp.data)
                                // console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    // if(resp.data){
                                    document.getElementById('btnDeleteCar').disabled = true;
                                    document.getElementById('btnNewCar').disabled = false;
                                    document.getElementById('btnCancelCar').disabled = true;
                                    document.getElementById('btnEditCar').disabled = true;                                 
                                    document.getElementById('btnSearchCar').disabled = false;
                                    document.getElementById('btnSaveCar').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotonesCar')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveCar');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'ADMINISTRACION DE DATOS DE LAS CARGOS'                                
                                    funcLib.clearElements()	                                
                                    formCar.reset()                      
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
                        let idEvolMed = document.getElementsByName('car_id')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/cargosUpdate') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteCar').disabled = true;
                                document.getElementById('btnNewCar').disabled = false;
                                document.getElementById('btnCancelCar').disabled = true;
                                document.getElementById('btnSearchCar').disabled = false;
                                document.getElementById('btnSaveCar').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotonesCar')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveCar');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'DATOS DE CARGOS'                                
                                funcLib.clearElements()	                                
                                formCar.reset()                                    
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
    let botonAnula = document.getElementById("btnDeleteCar");
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
					const formCarE = document.querySelector('#formCar');
					let idEvolMed = document.getElementsByName('car_id')[0].value
					let data = new FormData()
					data.append("car_id",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/anulaRegistroCar')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                // if(response.data['message'] == "Success"){  
                                    if (response.data){
                                    document.getElementById('btnDeleteCar').disabled = true;
                                    document.getElementById('btnNewCar').disabled = false;
                                    document.getElementById('btnCancelCar').disabled = true;
                                    document.getElementById('btnSearchCar').disabled = false;
                                    document.getElementById('btnSaveCar').disabled = true;
                                    document.getElementById('btnEditCar').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotonesCar')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveCar');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE REGISTRO DE CARGOS'                                
                                    funcLib.clearElements()	                                
                                    formCar.reset()                                    
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

                formCar.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formCar')
			let botonCancel = document.getElementById("btnCancelCar");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveCar', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteCar').disabled = true;
                document.getElementById('btnEditCar').disabled = true;
                document.getElementById('btnSearchCar').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewCar').disabled = false;
                document.getElementById('btnSaveCar').disabled = true; 
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
                let vlrNewButton2 = document.getElementsByName('presBtnNewCar')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewCar')[0].value;
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


