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
                    <form role="form" name="formEps" id="formEps">
                        @csrf
                        {{-- formEps --}}
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($listaEmpleados as $datosRow)

                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de EPS
                                            </h3>
                    
                                            <input type="hidden" id="eps_id" name="eps_id">
                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                            {{-- <input type="hidden" id="rutaTable" name="rutaTable" value={{$tablaAuxiliar}}"> --}}
                                        </div>
                                        <div class="card-body" style="background-color: hsl(195, 25%, 94%)">
                                            <input type="hidden" name="accionBotonesEps" accion="Guardar" id="accionBotonesEps">
                                            <input type="hidden" name="presBtnNewEps" id="presBtnNewEps" value="N">
                                            <div class="row border border-primary">
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">Nit/Cédula</label>
                                                    <input type="text" class="form-control text" name="num_documento" id="num_documento"
                                                     tabindex="2">
                                                </div>  
                                                <div class="col-12 col-lg-5 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Nombre Eps</label>
                                                    <input type="text" class="form-control text" name="nombre_eps" id="nombre_eps"
                                                     tabindex="3">
                                                </div> 
                                                <div class="col-lg-5 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Direccion</label>
                                                    <textarea rows="1" class="form-control text" name="direccion_eps"
                                                        id="direccion_eps"  placeholder="" focusNext tabindex="2" maxlength="100"
                                                        title="" tabindex="11">
                                                    </textarea>
                                                </div>    
                                            </div> <!-- cierre de row -->                                                                                             
                                            
                                            <div class="row border border-primary">   
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Telefonos Eps</label>
                                                    <input type="text" class="form-control mb-2 text" name="telefono_eps" id="telefono_eps"
                                                     tabindex="10">
                                                </div>                                                                                     
                                                                                       
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label class="">Rango</label>
                                                    <select class="form-control text"
                                                        style="width: 100%" tabindex="8"
                                                        name="rango_eps_id" id="rango_eps_id">
                                                        <option selected disable value="">Sele rango</option>
                                                        @foreach ($rangoEps as $rEps)
                                                            <option value={{ $rEps->id }}>{{ $rEps->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>  
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Representante</label>
                                                    <input type="text" class="form-control text" name="nombre_repre" id="nombre_repre"
                                                     tabindex="10">
                                                </div>
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                                        <label for="" class="">Tel representante</label>
                                                        <input type="text" class="form-control text" name="telefono_repre" id="telefono_repre"
                                                         tabindex="10">
                                                </div>                                                             
                                            </div>  <!--cierre de row --> 

                                            <div class="row border border-primary">  
                                                <div class="col-12 col-lg-3 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Fecha Ingreso</label>
                                                    <input type="date" class="form-control text mb-2" name="fecha_ini_contrato" id="fecha_ini_contrato"
                                                     tabindex="10">
                                                </div>           
                                                <div class="col-lg-9 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Observación</label>
                                                    <textarea rows="1" class="form-control text" name="observacion"
                                                        id="observacion"  placeholder="" focusNext tabindex="2" maxlength="100"
                                                        title="" tabindex="11">
                                                    </textarea>
                                                </div>    
                                            </div>  <!--cierre de row -->            

                                    </div> <!-- Cierre Card Car Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/tablas_auxiliares/eps.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                             </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewEps" 
                                            focusNext tabindex="17" id="btnNewEps" accionBtn="Nuevo" name="btnNewEps">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Reg
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditEps" accionBtn="Modificar" name="btnEditEps">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveEps" accionBtn="Guardar"name="btnSaveEps">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchEps btn-lg" title="Permite localizar un el registro"
                                            id="btnSearchEps" name="btnSearchEps" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelEps" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteEps" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/admin_medicamento_user') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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
    <div class="modal fade" id="modalBuscarEps" class="modalBuscarEps" data-backdrop="static" focusNext tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista General de EPSs </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable"></form>

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaEps" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nit/Cédula</th>
                                        <th>Nombre Eps</th>
                                        <th>Telefono Eps</th>
                                        <th>Representante</th>
                                        <th>Telefono Repre</th>
                                        <th>Rango de Eps</th>
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
        let formEvolB = document.getElementById('formEps')

        document.getElementById('btnCancelEps').disabled = true;
        document.getElementById('btnSaveEps').disabled = true;
        funcLib = new EpsFunciones(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditEps').disabled = true;      

        let bodyTablaEps = document.getElementById("bodyTabla");
        let modalBuscarEps = document.getElementById('modalBuscarEps');
        let btnSearchEps = document.getElementById('btnSearchEps');
 
        btnSearchEps.addEventListener('click', () => {
            if ($.fn.DataTable.isDataTable('#tablaEps')) { 
                let jaminson = $('#tablaEps').DataTable();
                // alert(jaminson)
                const buscarClientes = function() {
                    $("#modalBuscarEps").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });
 
                    $('#modalBuscarEps .modal-dialog').draggable({
                        handle: ".modal-header"
                    });

                    let table = $('#tablaEps').DataTable({
                        "columns": [],
                        "language": espanol,
                        "destroy": true
                    }) 
                }
                buscarClientes()
            }

            let espanol = idioma()
            const buscarClientes = function() {
                $("#modalBuscarEps").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });

                    // $('#modalBuscarCita .modal-dialog').draggable({
                    //     handle: ".modal-header"
                    // });
                let table = $('#tablaEps').DataTable({
                    responsive: true,
                    scroll: true,
                    scrollCollapse: true,
                    scrollY: '400px',
                    scrollx: true,
                    "ajax": {
                        "url": "{{ URL::to('/epsListaShow') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "num_documento"
                        },
                        {
                            "data": "nombre_eps"
                        },
                        {
                            "data": "telefono_eps"
                        },
                        {
                            "data": "nombre_repre"
                        },
                        {
                            "data": "telefono_repre"
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
                
                obtener_data_buscar("#tablaEps tbody", table)
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
                let dataEps = data;
                console.log(dataEps)
                funcLib.asignaValorEdit(dataEps)

                var btnGuardar = document.getElementById('btnSaveEps');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveEps').disabled = true;
                document.getElementById('btnEditEps').disabled = false;
                document.getElementById('btnCancelEps').disabled = false;
                document.getElementById('btnNewEps').disabled = true;
                document.getElementById('btnSearchEps').disabled = true;
                let btnDeleteEpsclick1 = document.getElementById('btnDeleteEps')
                btnDeleteEpsclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formEps')
            let botonEdit = document.getElementById("btnEditEps");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveEps', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveEps');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE EPS'
                document.getElementsByName('presBtnNewEps')[0].value="N"                
                document.getElementById('btnEditEps').disabled = true;
                document.getElementById('btnNewEps').disabled = true;                
				document.getElementById('btnDeleteEps').disabled = true;
                document.getElementById('btnSearchEps').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelEps').disabled = false;
                document.getElementById('btnSaveEps').disabled = false;
               
                var attrAccion4 = $("#accionBotonesEps").attr("accion");
                document.getElementById('num_documento').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewEps");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotonesEps").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcLib.activaInput();                
				
                //cambioTextBotton('btnSaveEps', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveEps');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelEps').disabled = false;
                document.getElementById('btnSaveEps').disabled = false;                       
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE EPSs'

                document.getElementsByName('presBtnNewEps')[0].value="S"                
                
				document.getElementById('btnDeleteEps').disabled = true;
                document.getElementById('btnEditEps').disabled = true;
                document.getElementById('btnNewEps').disabled = true;
                document.getElementById('btnSearchEps').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('num_documento').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        *********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveEps')
        const formEps = document.querySelector('#formEps');
        formEps.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";
                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotonesEps").attr("accion");
                    let data = new FormData(formEps)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const epsSaveReg = async () => {
                            await axios.post("{{URL::to('/epsRemiteStore')}}",data,{
                            }).then((response) => {
                                console.log(response.data)
                                // console.log(resp.data['message'])
                                if(response.data['message']=="Success"){
                                    // if(resp.data){
                                    document.getElementById('btnDeleteEps').disabled = true;
                                    document.getElementById('btnNewEps').disabled = false;
                                    document.getElementById('btnCancelEps').disabled = true;
                                    document.getElementById('btnEditEps').disabled = true;                                 
                                    document.getElementById('btnSearchEps').disabled = false;
                                    document.getElementById('btnSaveEps').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotonesEps')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveEps');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'ADMINISTRACION DE DATOS DE LAS EPS'                                
                                    funcLib.clearElements()	                                
                                    formEps.reset()                      
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
                        epsSaveReg()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('eps_id')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/epsRemiteUpdate') }}",
                                data, {

                                }).then((response) => {
                                    if(response.data['message']=="Success"){
                                        console.log(response.data['message'])

                                        document.getElementById('btnDeleteEps').disabled = true;
                                        document.getElementById('btnNewEps').disabled = false;
                                        document.getElementById('btnCancelEps').disabled = true;
                                        document.getElementById('btnSearchEps').disabled = false;
                                        document.getElementById('btnSaveEps').disabled = true;

                                        /*Cuando se busca un registro se cambial atributo del input hidden*/
                                        let newNom88 = document.getElementById('accionBotonesEps')
                                        newNom88.setAttribute('accion', "Guardar");

                                        var btnGuardar2 = document.getElementById('btnSaveEps');
                                        btnGuardar2.innerHTML = 'Guardar'
                                        funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'DATOS DE EPSs'                                
                                    funcLib.clearElements()	                                
                                    formEps.reset()                                    
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'El registro se ACTUALIZÓ con exito',
                                        footer: ''
                                    })
                                }else{
                                // }).catch(function(error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error interno',
                                        text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' ,
                                        footer: ''
                                    })
                                    // console.log(error);
                                }
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
    let botonAnula = document.getElementById("btnDeleteEps");
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
					const formEpsE = document.querySelector('#formEps');
					let idEvolMed = document.getElementsByName('eps_id')[0].value
					let data = new FormData()
					data.append("eps_id",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/anulaRegistroEps')}}",data,{

                            }).then((response) => {

                                 console.log(response.data)
                                // if(response.data['message'] == "Success"){  
                                    if (response.data){
                                    document.getElementById('btnDeleteEps').disabled = true;
                                    document.getElementById('btnNewEps').disabled = false;
                                    document.getElementById('btnCancelEps').disabled = true;
                                    document.getElementById('btnSearchEps').disabled = false;
                                    document.getElementById('btnSaveEps').disabled = true;
                                    document.getElementById('btnEditEps').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotonesEps')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveEps');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE REGISTRO DE EPS'                                
                                    funcLib.clearElements()	                                
                                    formEps.reset()                                    
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

                formEps.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formEps')
			let botonCancel = document.getElementById("btnCancelEps");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveEps', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteEps').disabled = true;
                document.getElementById('btnEditEps').disabled = true;
                document.getElementById('btnSearchEps').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewEps').disabled = false;
                document.getElementById('btnSaveEps').disabled = true; 
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
                let vlrNewButton2 = document.getElementsByName('presBtnNewEps')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewEps')[0].value;
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


