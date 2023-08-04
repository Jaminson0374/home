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
                    <form role="form" name="formEmpleados" id="formEmpleados" action="">
                        @csrf
                        @method('post')
                        {{-- formEmpleados --}}
                        <div class="row justify-content-between">

                            <body>
                                {{-- @foreach($listaEmpleados as $datosRow)

                                @endforeach --}}
                                <div class="col-sm-12">
                                    <div class="card card-primary">
                                        {{-- card-header --}}
                                        <div class="border border-dark border-4 pt-2 rounded bg-primary">
                                            <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de Empleados
                                            </h3>
                    
                                            {{-- <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                                USUARIO/CLIENTE --- {{$listaEmpleados->num_documento.' '.$listaEmpleados->empleado}}
                                            </h3> --}}
                                            <input type="hidden" id="empleado_id" name="empleado_id">
                                            {{-- <input type="hidden" id="idAdminMedica" name="idAdminMedica"> --}}
                                            <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                            <input type="hidden" id="ciudad_id" name="ciudad_id" value=1>
                                            <input type="hidden" id="departamento_id" name="departamento_id" value=1>
                                            <input type="hidden" id="nacionalidad_id" name="nacionalidad_id" value=1>
                                            <input type="hidden" id="categoria_id" name="categoria_id" value=2>
                                            <input type="hidden" id="rutaTable" name="rutaTable" value={{'$tablaAuxiliar'}}>
                                        </div>
                                        <div class="card-body" style="background-color: hsl(195, 25%, 94%)">
                                            <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                            <input type="hidden" name="presBtnNewEmp" id="presBtnNewEmp" value="N">
                                            <div class="row border border-primary">
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label class="">Tipo Docu</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="1"
                                                        name="tipodocumento_id" id="tipodocumento_id">
                                                        <option selected disable value="">Tipo de Doc</option>
                                                        @foreach ($tipoDocu as $tipoDoc)
                                                            <option value={{ $tipoDoc->id }}>{{ $tipoDoc->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary pb-2">
                                                    <label for="" class="">#Documento</label>
                                                    <input type="text" class="form-control text" name="num_documento" id="num_documento"
                                                     tabindex="2">
                                                </div>  
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Nombre</label>
                                                    <input type="text" class="form-control text" name="nombre" id="nombre"
                                                     tabindex="3">
                                                </div>  
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Apellido</label>
                                                    <input type="text" class="form-control text" name="apellidos" id="apellidos"
                                                     tabindex="4">
                                                </div>                                                                                                  
                                            </div>  <!--cierre de row -->     
                                            
                                            <div class="row border border-primary">
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">F. Nacmto:</label>
                                                    <input type="date" class="form-control text" name="fecha_nacimiento"
                                                        id="fecha_nacimiento"  focusNext tabindex="5" 
                                                        title="">
                                                </div> 
                                                <div class="col-lg-2 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Edad:</label>
                                                    <input type="number" class="form-control text" name="edad"
                                                        id="edad"  focusNext tabindex="6" 
                                                        title="" disabled>
                                                </div> 
                                                <div class="col-lg-4 col-sm-5 col-sm-6 border border-primary">
                                                    <label for="">Lugar ncmto:</label>
                                                    <input type="text" class="form-control text" name="lugar_ncmto"
                                                        id="lugar_ncmto"  focusNext tabindex="7" 
                                                        title="">
                                                </div> 
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label class="col-form-label ">Genero</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="8"
                                                        name="sexo_id" id="sexo_id">
                                                        <option selected disable value="">Sele genero</option>
                                                        @foreach ($genero as $sexTipo)
                                                            <option value={{ $sexTipo->id }}>{{ $sexTipo->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label class="col-form-label ">Grp RH</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="9"
                                                        name="gruposanguineo_id" id="gruposanguineo_id">
                                                        <option selected disable value="">Sele RH</option>
                                                        @foreach ($grupo_rh as $grpS)
                                                            <option value={{ $grpS->id }}>{{ $grpS->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>   
                                            </div> <!-- cierre row -->

                                            <div class="row border border-primary">                                            
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Telefonos</label>
                                                    <input type="text" class="form-control text" name="telefonos" id="telefonos"
                                                     tabindex="10">
                                                </div>                                                                                     
                                                <div class="col-lg-4 col-sm-5 col-sm-6 border border-primary">
                                                        <label for="">Direccion</label>
                                                        <textarea rows="1" class="form-control text" name="direccion_res"
                                                            id="direccion_res"  placeholder="" focusNext tabindex="2" maxlength="100"
                                                            title="" tabindex="11">
                                                        </textarea>
                                                </div>
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label for="" class="">Email</label>
                                                    <input type="email" class="form-control text" name="email" id="email"
                                                     tabindex="12">
                                                </div>                                                
                                            </div>  <!--cierre de row --> 

                                            <div class="row border mt-2 mb-3 border border-primary">
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label class="col-form-label ">Profesión</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="13"
                                                        name="profesion_id" id="profesion_id">
                                                        <option selected disable value="">Seleccione profesion</option>
                                                        @foreach ($profesionEmp as $pEmp)
                                                            <option value={{$pEmp->id}}>{{$pEmp->descripcion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>    
                                                <div class="col-sm-5 col-md-4 col-lg-4 border border-primary">
                                                    <label class="col-form-label ">Cargo</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="14"
                                                        name="cargo_id" id="cargo_id">
                                                        <option selected disable value="">Seleccione cargo</option>
                                                        @foreach ($cargos as $grpS)
                                                            <option value={{ $grpS->id }}>{{ $grpS->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                                                                  
                                                
                                                <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                    <label class="col-form-label ">Contarto trabajo</label>
                                                    <select class="select2 select2-danger focusNext text"
                                                        data-dropdown-css-class="select2-danger select-sm"
                                                        class="my-class-drop" style="width: 100%" tabindex="51"
                                                        name="tipocontrato_id" id="tipocontrato_id">
                                                        <option selected disable value="">Seleccione C.Trabajo</option>
                                                        @foreach ($tipoCargoEmp as $tipoC)
                                                        <option value={{$tipoC->id}}>{{$tipoC->descripcion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>  <!--cierre de row -->  
                                            <div class="row border mt-2 mb-3 border border-primary">                                                                                        
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label for="">Fecha inicio:</label>
                                                    <input type="date" class="form-control text" name="fecha_inicio"
                                                        id="fecha_inicio"  focusNext tabindex="16" 
                                                        title="fecha en la que inicia el tratamiento">

                                                        {{-- <div class="col-sm-5 col-md-4 col-lg-12"> --}}
                                                            <label for="" class="col-form-label">Salario:</label>
                                                            <input type="number" class="form-control text " id="salario" name="salario"
                                                            tabindex="17">
                                                        {{-- </div>                                                                                                      --}}
                                                </div>    

                                                <div class="col-sm-5 col-md-4 col-lg-5 border border-primary">
                                                    <label for="" class="col-form-label">Funciones:</label>
                                                    <textarea type="text" class="form-control text " rows="7" id="funciones" name="funciones"
                                                    placeholder="Digite observaciones pertinentes" tabindex="18"></textarea>
                                                </div>                                                                                                     
 
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label for="">Foto perfil</label>
                                                        <div class="card card-primary">
                                                                <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                                    <div class="image">
                                                                        <img id="imagenPrevisualizacion" class="img-responsive"
                                                                            style="width:140px;height:130px">
                                                                    </div>
                                                            </div>
                                                            <input type="file" id="seleccionArchivos" class="btn btn-success" name="foto"
                                                                accept="image/*" tabindex="19">
                                                        </div>
                                                </div>
        
                                                <div class="col-sm-5 col-md-4 col-lg-2 border border-primary">
                                                    <label for="">Hoja de vida</label>
                                                    <div class="card card-primary">
                                                            <div class="user-panel mt-1 pb-1 mb-1 d-flex">
                                                                <div class="image">
                                                                    <img id="imagenPrevisualizacion" class="img-responsive"
                                                                        style="width:140px;height:130px">
                                                                </div>
                                                        </div>
                                                        <input type="file" id="seleccionArchivos" class="btn btn-success" name="hoja_vida"
                                                            accept="image/*" tabindex="20">
                                                    </div>
                                                </div>                                                            
        
                                                    <div class="col-sm-5 col-md-4 col-lg-1 border border-primary">
                                                        <label for="" class="col-form-label">Estado</label>
                                                        <input class="form-control text focusNext" type="checkbox"
                                                            tabindex="21" name="estado" id="estado" checked
                                                            data-bootstrap-switch data-off-color="danger"
                                                            data-on-color="success">
                                                    </div>            
                                                </div> <!--cierre de row -->   
                                                <div class="row border border-primary">  
                                                    <div class="col-lg-4 col-sm-5 col-sm-6 border border-primary">
                                                        <label for="">Nombre de familiar</label>
                                                       <input type="text" class="form-control text" name="nombre_familiar"
                                                            id="nombre_familiar"  placeholder="" focusNext tabindex="2" maxlength="80"
                                                            title="" tabindex="22">
                                                    </div>                                                                                              
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary">
                                                        <label for="" class="">Telefono familiar</label>
                                                        <input type="text" class="form-control text" name="telefono_familiar" id="telefono_familiar"
                                                         tabindex="23">
                                                    </div>                                                                                     

                                                    <div class="col-12 col-lg-4 col-md-4 col-sm-2 border border-primary">
                                                        <label for="" class="">Email familiar</label>
                                                        <input type="email" class="form-control text" name="email_famliar" id="email_famliar"
                                                         tabindex="24">
                                                    </div>    
                                                    <div class="col-12 col-lg-2 col-md-4 col-sm-2 border border-primary">
                                                        <label for="" class="">Parentezco</label>
                                                        <input type="text" class="form-control text" name="parentezco_familiar" id="parentezco_familiar"
                                                         tabindex="25">
                                                    </div>                                                                                                                                                                                     
                                                </div>  <!--cierre de row --> 
                                                
                                                <div class="row border mt-2 mb-3 border border-primary">                                                                                                                                                                                                   
                                                    <div class="col-sm-5 col-md-4 col-lg-12 border border-primary">
                                                        <label for="" class="col-form-label">Observaciones:</label>
                                                        <textarea type="text" class="form-control text observacion" rows="1" id="observacion" name="observacion"
                                                        placeholder="Digite observaciones pertinentes" tabindex="26"></textarea>
                                                    </div>                                                                                                                       
                                                </div> <!--cierra row-->                                            
                                        </div>  <!-- Cierre carBody -->    
                                    </div> <!-- Cierre Card Car Primary --> 
                                </div> <!-- cierre col 12--> 

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/empleados/empleados.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>   
                                <script src="{{ asset('../resources/js/imagen.js') }}"></script>
                             </body>
                        </div>  
                        <footer>
                            <div class="row"> 
                                <div class="col-sm-12">
                                    <div class="form-group pt-2">
                                        <button  type="button" class="btn btn-primary btn-lg form-group btnNewEmp" 
                                            focusNext tabindex="17" id="btnNewEmp" accionBtn="Nuevo" name="btnNewEmp">
                                            <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Empleado
                                        </button>
                                        <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                            focusNext tabindex="18" id="btnEditEmp" accionBtn="Modificar" name="btnEditEmp">
                                            <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                        </button>                                        
                                        <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                            focusNext tabindex="19" id="btnSaveEmp" accionBtn="Guardar"name="btnSaveEmp">
                                            <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-primary form-group btnSearchEmp btn-lg" title="Permite localizar un el refistro de un empleado"
                                            id="btnSearchEmp" name="btnSearchEmp" focusNext tabindex="20"><i
                                                class="fa fa-search-location fa-lg"></i>Buscar
                                        </button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelEmp" title="Cancela el proceso actual y limpia cada una de las celdas"
                                            focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                        <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteEmp" title="Anula el registro que esta en la ventana"
                                            focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                style="color:#f30b0b;"></i> Anular </button>

                                                <a href="{{ URL::to('/empledadosIndex') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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



// window.addEventListener('load', () => {
// let btnSearchEmp = document.getElementById('btnSearchEmp');
// // var rutaTablas = document.getElementsByName('rutaTable')[0].value; 

// btnSearchEmp.addEventListener('click', () => {  
//     alert('jaminson')
//   let data = new FormData();
//   data.append('codigo','100')
//    let prueba = async () => {
// //   var rutaTablas = document.getElementsByName('rutaTable')[0].value;
//     var rutaTablas ="ttsdta"
//        await axios.get("{{ URL::to($tablaAuxiliar) }}", data, {
 
//        }).then((resp) => {
//            let dataSelect = resp.data;
//            console.log(dataSelect);
 
//        }).catch(function(error) {
//            alert(
//                'Error, de jaminson intente nuevamente, si el error persiste, por favor comuniquese con su Ing. de sistemas'
//            )
//            //console.log(error);
//        })
      
//     } 
//     prueba() 
//     })
//     return false;
// })  

  
    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     window.addEventListener('load', () => {
        let formEvolB = document.getElementById('formEmpleados')

        document.getElementById('btnCancelEmp').disabled = true;
        // document.getElementById('btnSaveEmp').disabled = true;
        funcLib = new EmpleadoVista(); // 


        funcLib.desactivaInput();  
        document.getElementById('btnEditEmp').disabled = true;      

        let bodyTablaClientesEvol = document.getElementById("bodyTabla");
        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchEmp = document.getElementById('btnSearchEmp');
 
        btnSearchEmp.addEventListener('click', () => {
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
                        "url": "{{ URL::to('/empleadosListaShow') }}",
                        "dataSrc": ""
                    },
                    "columns": [{
                            "data": "num_documento"
                        },
                        {
                            "data": "empleado"
                        },
                        {
                            "data": "telefonos"
                        },
                        {
                            "data": "sexo"
                        },
                        {
                            "data": "sexo"
                        },
                        {
                            "data": "cargo"
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

                var btnGuardar = document.getElementById('btnSaveEmp');
                btnGuardar.innerHTML = 'Actualizar'
                
                document.getElementById('btnSaveEmp').disabled = true;
                document.getElementById('btnEditEmp').disabled = false;
                document.getElementById('btnCancelEmp').disabled = false;
                document.getElementById('btnNewEmp').disabled = true;
                document.getElementById('btnSearchEmp').disabled = true;
                let btnDeleteEmpclick1 = document.getElementById('btnDeleteEmp')
                btnDeleteEmpclick1.disabled = false
                
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
            let formEvolB2 = document.getElementById('formEmpleados')
            let botonEdit = document.getElementById("btnEditEmp");
			botonEdit.addEventListener('click', () => {
                funcLib.activaInput();                
                   // cambioTextBotton('btnSaveEmp', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveEmp');
                btnGuardar.innerHTML = 'Actualizar'    
                funcLib.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE EMPLEADOS'
                document.getElementsByName('presBtnNewEmp')[0].value="N"                
                document.getElementById('btnEditEmp').disabled = true;
                document.getElementById('btnNewEmp').disabled = true;                
				document.getElementById('btnDeleteEmp').disabled = true;
                document.getElementById('btnSearchEmp').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelEmp').disabled = false;
                document.getElementById('btnSaveEmp').disabled = false;
               
                document.getElementById('fecha').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
                document.getElementById('fecha').focus()
                // alert(attrAccion4)    
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewEmp");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcLib.activaInput();                
				
                //cambioTextBotton('btnSaveEmp', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveEmp');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelEmp').disabled = false;
                document.getElementById('btnSaveEmp').disabled = false;                       
             
                funcLib.clearElements()	//Limpia los elementos
				funcLib.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVO REGISTRO DE EMPLEADO'

                document.getElementsByName('presBtnNewEmp')[0].value="S"                
                
				document.getElementById('btnDeleteEmp').disabled = true;
                document.getElementById('btnEditEmp').disabled = true;
                document.getElementById('btnNewEmp').disabled = true;
                document.getElementById('btnSearchEmp').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('tipodocumento_id').focus()
                
				return true
			})
			return true
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        *********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveEmp')
        const formEmp = document.querySelector('#formEmpleados');
        formEmp.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";

                    validaOk = funcLib.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formEmp)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const empleadoSaveReg = async () => {
                            await axios.post("{{URL::to('/empleadoStore')}}",data,{
                            }).then((resp) => {
                                console.log(resp.data)
                                // console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    // if(resp.data){
                                    document.getElementById('btnDeleteEmp').disabled = true;
                                    document.getElementById('btnNewEmp').disabled = false;
                                    document.getElementById('btnCancelEmp').disabled = true;
                                    document.getElementById('btnEditEmp').disabled = true;                                 
                                    document.getElementById('btnSearchEmp').disabled = false;
                                    document.getElementById('btnSaveEmp').disabled = true;

                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveEmp');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'ADMINISTRACION DE DATOS DE EMPLEADOS'                                
                                    funcLib.clearElements()	                                
                                    formEmp.reset()                      
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
                        empleadoSaveReg()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('idAdminMedica')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/clienteUpdateEvol') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                document.getElementById('btnDeleteEmp').disabled = true;
                                document.getElementById('btnNewEmp').disabled = false;
                                document.getElementById('btnCancelEmp').disabled = true;
                                document.getElementById('btnSearchEmp').disabled = false;
                                document.getElementById('btnSaveEmp').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveEmp');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcLib.desactivaInput();

                                document.getElementById('textB').innerHTML = 'DATOS DE EMPLEADOS'                                
                                funcLib.clearElements()	                                
                                formEmp.reset()                                    
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
    let botonAnula = document.getElementById("btnDeleteEmp");
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
					const formEmpE = document.querySelector('#formEmpleados');
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
                                    document.getElementById('btnDeleteEmp').disabled = true;
                                    document.getElementById('btnNewEmp').disabled = false;
                                    document.getElementById('btnCancelEmp').disabled = true;
                                    document.getElementById('btnSearchEmp').disabled = false;
                                    document.getElementById('btnSaveEmp').disabled = true;
                                    document.getElementById('btnEditEmp').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveEmp');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcLib.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE ADMINISTRACION MEDICA'                                
                                    funcLib.clearElements()	                                
                                    formEmp.reset()                                    
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

                formEmp.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formEmpleados')
			let botonCancel = document.getElementById("btnCancelEmp");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveEmp', 'Actualizar', 'Guardar')
                funcLib.clearElements()	
                funcLib.desactivaInput();

				document.getElementById('btnDeleteEmp').disabled = true;
                document.getElementById('btnEditEmp').disabled = true;
                document.getElementById('btnSearchEmp').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewEmp').disabled = false;
                document.getElementById('btnSaveEmp').disabled = true; 
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
                let vlrNewButton2 = document.getElementsByName('presBtnNewEmp')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewEmp')[0].value;
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


