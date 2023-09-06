@extends('backend.layouts.app')
@section('content')
<style>
    .tarjeta_body {
        margin: 2px;
        background-color: #60c4f6;
        border: 4em;
        border-color: #ee2015;
    }

    input:disabled {
        background: #2015f3;
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
    .card {
        background: #dfdef9;
    }
</style>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                {{-- <div class="card-body text-dark tarjeta_body"> --}}
                    <form role="form" name="formAddPlanillas" id="formAddPlanillas" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtobasicoMed as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Planilla para el control de desposiciones
                                        </h3>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                        USUARIO/CLIENTE --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                        </h3>
                                    </div>
                                </div>
                                    <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}>
                                    <input type="hidden" id="idAsignaMedica" name="idAsignaMedica">
                                    <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>

                                    <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                    <input type="hidden" name="presBtnNewAdm" id="presBtnNewAdm" value="N">
                                    <input type="hidden" name="horadbf" id="horadbf">
 
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-4">  
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                <div class="row">   
                                                    <div class="col-12 col-lg-4 col-sm-12 col-md-12">                                                        
                                                        <label for="">Planilla#</label>
                                                        <input type="text" class="form-control float-right text" name="useranomes"
                                                            id="useranomes"  focusNext tabindex="2" 
                                                            title="# de la planilla">
                                                    </div>
                                                    <div class="col-12 col-lg-3 col-sm-12 col-md-12">                                                        
                                                        <label for="">AÑO:</label>
                                                        <input type="text" class="form-control text" name="ano"
                                                            id="ano_ctrl"  focusNext tabindex="2" 
                                                            title="Año de control deposiciones">
                                                    </div> 
                                                    <div class="col-12 col-lg-5 col-sm-12 col-md-12">                                                        
                                                        <label for="">Mes</label>
                                                        <select class="form-control text"
                                                            name="mes_ctrl" id="mes_ctrl" focusNext tabindex="1">
                                                            <option selected="selected" disable value=" ">Selecione mes</option>
                                                                    <option value="01">Enero</option>
                                                                    <option value="02">Febrero</option>
                                                                    <option value="03">Marzo</option>
                                                                    <option value="04">Abril</option>
                                                                    <option value="05">Mayo</option>
                                                                    <option value="06">Junio</option>
                                                                    <option value="07">Juio</option>
                                                                    <option value="08">Agosto</option>
                                                                    <option value="09">Septiembre</option>
                                                                    <option value="10">Octubre</option>
                                                                    <option value="11">Noviembre</option>
                                                                    <option value="12">Diciembre</option>
                                                        </select>
                                                    </div>                                                                                                       
                                                </div>
                                            </div>                                            
                                                <div class="card card-primary card-outline">
                                                    <div class="row pt-2 pb-2">   
                                                        <div class="col-lg-6 col-sm-12 col-md-6">                                                        
                                                            <label for="">Día Ctrl  :</label>
                                                            <input type="number" class="form-control text" name="ano_ctrl"
                                                                id="ano_ctrl"  focusNext tabindex="2" min="0"
                                                                title="Año de control deposiciones">
                                                        </div>  
                                                    </div>
                                                </div>
                                                    <div class="card card-primary card-outline">
                                                        <label for="" class="text-center">Cant. de Deposiciones</label>
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-6 col-sm-12 col-md-6">  
                                                                <label for="">Día</label>
                                                                <input type="number" class="form-control text" name="ano_ctrl"
                                                                    id="ano_ctrl"  focusNext tabindex="2" min="0"
                                                                    title="Año de control deposiciones">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-md-6">        
                                                                    <label for="">Noche</label>
                                                                    <input type="number" class="form-control text" name="ano_ctrl"
                                                                        id="ano_ctrl"  focusNext tabindex="2" min="0"
                                                                        title="Año de control deposiciones"> 
                                                            </div>                                                                                                                                   
                                                               {{--  <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="deposicion_dia">
                                                                    <label class="form-check-label" style="font-size: 1.2em" for="flexCheckDefault">
                                                                     Deposiciones en el Día
                                                                    </label>
                                                                  </div>
                                                                  <div class="form-check">
                                                                    <input class="form-check-input"  type="checkbox" value="" id="flexCheckChecked" name="deposicion_noche">
                                                                    <label class="form-check-label" style="font-size: 1.2em" for="flexCheckChecked">
                                                                      Deposiciones en la Noche
                                                                    </label>
                                                                  </div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="card card-primary card-outline">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">                                                        
                                                                <label for="">Observación</label>
                                                                <textarea class="form-control text" name="observacion" id="observacion" cols="50" rows="2"></textarea>   
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <div class="card card-primary card-outline">
                                                                    {{-- <div class="card-body"> --}}
                                                                            <div class="form-group">
                                                                                <button type="button"
                                                                                    class="btn btn-primary form-group btnSearch btn-md m-2"
                                                                                    id="btnSearch" name="btnSearch" tabindex="30"><i
                                                                                    class="fa fa-search-location fa-lg" title="Buscar una planilla "></i>
                                                                                    <b>Planillas</b>
                                                                                </button>                                                                                                 
                                                                                <button  type="submit" class="btn btn-primary btn-md form-group m-2" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                                    focusNext tabindex="19" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                                    <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i>Guardar
                                                                                </button>
                                                                               
                                                                                    <a href="{{ URL::to('/index_admin_deposiciones') }}" class="btn btn-primary btn-md float-righ  m-2" title="Abandonar la ventana"
                                                                                        focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                                        style="color:#f30b0b;"></i> Salir</a>    
                                                                            </div>
                                                                    {{-- </div>   --}}
                                                                </div>
                                                        </div>
                                                    </div>                                                    
                                        </div>
                                    </div> 
                                        <div class="col-lg-8 col-sm-12 col-md-8 ">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="card card-warning card-outline">
                                                        <div class="col-lg-12 col-sm-12 col-md-12 bg-success"> 
                                                            <table id="example2" class="table table-bordered table-striped table-hover table-responsive" style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Días</th>
                                                                        <th class="text-center">Dposición Día</th>
                                                                        <th class="text-center">Dposición Noche</th>
                                                                        <th>Observación</th>
                                                                        <th>No. Veces</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="bodyTabla">
                            
                                                                </tbody>
                                                             </table>                                                            
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>                                                                                                    
                                         
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/deposiciones/deposiciones.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>

                            <footer>

                            </footer>
                        </div>
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
    <div class="modal fade" id="modalBuscarPln" class="modalBuscarPln" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista de Planillas de {{$datosRow->nombre.' '.$datosRow->apellidos}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable">

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Año</th>
                                        <th class="text-center">Mes#</th>
                                        <th class="text-center">Mes</th>
                                        <th class="text-center">Planilla No.</th>
                                        <th class="text-center">Acción</th>
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
<script>

    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
window.addEventListener('load', () => { 

     let formPlani = document.getElementById('formAddPlanillas')
        let btnSearch = document.getElementById('btnSearch');
        btnSearch.addEventListener('click', () => {
            let idUserPlanilla = document.getElementsByName('datosbasicos_id')[0].value 

                $("#modalBuscarPln").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                table_user = $('#example1').DataTable({
                    scrollY: '400px',
                    "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {datosbasicos_id: idUserPlanilla},
                        "url": "{{ URL::to('/buscar-plani-depo') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "ano"},
                            {"data": "mes"},
                            {"data": "mes_letra"},
                            {"data": "useranomes"},
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
                        "destroy": true,
                        "language":{"url": "../resources/js/espanol.json"}
                }).draw()
                    return true
            })
 
            $('#example1').on("click", "button.btnCaptura", function () {
                // formPlani.reset()
                // var datos = table_user.row($(this).parents("tr")).data();
                let data = table_user.row($(this).parents("tr")).data();
                
                console.log(data)

                // fillTablePlanillas(data.id)

                // funcBasic.asignaValorEdit(data)

                // var texto = document.getElementById("textB")
                // texto.innerHTML = 'CONSULTANDO EL REGISTRO DE USUARIO'
                
                /*Cuando se busca un registro se cambial atributo del input hidden*/
                // let newNom80 = document.getElementById('accionBotones')
                // newNom80.setAttribute('accion', "Actualizar");

                // var btnGuardar = document.getElementById('btnSave');
                // btnGuardar.innerHTML = 'Actualizar'

                // document.getElementById('btnDelete').disabled = false;
                // document.getElementById('btnSearch').disabled = true;
                // document.getElementById('btnSaveAdm').disabled = false;
            })
    /* FIN DEL CODIGO PARA LLENAR TABLA DEL MODAL DE BUSQUEDA DE LA PLANILLA            
    /************************************************************************/
     let nDocumento = document.getElementById("num_documento");
        const date = new Date();
        let yyy = date.getFullYear();
        document.getElementsByName('ano')[0].value = yyy;  
        document.getElementById('btnSaveAdm').disabled = true;

        fillTablePlanillas()

            // saltarEnter()
            /******************************************************************
             *Valida la existencia de la planilla en el mes y año seleccionado  
            *******************************************************************/
                let idclienteBasico = document.getElementsByName('datosbasicos_id')[0].value 
                let _mesChange = document.querySelector('#mes')
                
                $( "#mes" ).on( "change", function() {
                    let _ano3 = document.getElementsByName('ano')[0].value
                    let _mes3 = document.getElementsByName('mes')[0].value 
                    let locatePlanilla = idclienteBasico+_ano3+_mes3 
                    // alert(locatePlanilla)
                    if (_ano3 <=0){
                        alert('Por favor digite el año...')
                    }else{                    
                        const validaReg = async () => {
                            await axios.post("{{ URL::to('buscar_planillas')}}", {
                                data: {
                                    datosbasicos_id: idclienteBasico,
                                    mes: _mes3,
                                    ano: _ano3, 
                                    okFalse: '02',
                                    dato_id: locatePlanilla
                                }                        
                                }).then((response) => {
                                     console.log(response.data)
                                    if(response.data['message'] == "Error"){  
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'PLANILLA EXISTENTE',
                                        text: 'Ya existe una planilla en el mes y año seleccionado',
                                        footer: ''
                                    })                                        
                                        // alert('Ya hay una planilla del mes y año seleccionado')
                                        document.getElementById('btnSaveAdm').disabled = true;
                                    }else{
                                        // alert('puede crear esta planilla')
                                        document.getElementById('btnSaveAdm').disabled = false;
                                    }
    
                                }).catch(function(error) {
                                    alert('Error interno'+error+' '+'Por favor comuniquese con su asesor')
                            })
                        }
                        validaReg()
                    }
                });

        /*Captura el año de la fecha actual*/

        /*********************************/
        // document.querySelector('.message').style.display = 'none'
        // document.querySelector('.horaMuestra').style.display = 'none'
		// document.querySelector('.horaDbf').style.display = 'inline'

        /*Llena la tabla con las planillas existentes*/

       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formAddPlanillas');

        // _mesletra = meses[_mes3]
        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
                let idclienteBasico3 = document.getElementsByName('datosbasicos_id')[0].value 
                let _mes3 = document.getElementsByName('mes')[0].value 
                let _ano3 = document.getElementsByName('ano')[0].value 
                let _userId = document.getElementsByName('user_id')[0].value 
                var meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]             
                // alert(meses[_mes3-1]) 
                // let _planilla_actual = meses[_mes3]+" de "+_ano3           
                let _iduserAnoMes = idclienteBasico3+_ano3+_mes3
                    // let data = new FormData(formEvolQ)
                    // let valuesDat = [...data.entries()];
                    // console.log(valuesDat);

                         const desposicionesPlanilla = async () => {
                            await axios.post("{{URL::to('/store-planilla')}}",{
                                data: {
                                    datosbasicos_id: idclienteBasico3,
                                    mes: _mes3,
                                    ano: _ano3,
                                    useranomes: _iduserAnoMes,
                                    mes_letra: meses[_mes3-1],
                                    user_id: _userId
                                }                
                            }).then((resp) => {
                                // console.log(resp.data)
                                console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    document.getElementById('btnSaveAdm').disabled = true;
                                    $("#mes").val(" ").trigger('change.select2');

                                    fillTablePlanillas()                     
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'La Planilla se GUARDÓ Correctamente',
                                        footer: ''
                                    })
                                }
                            })
                            
                    }
                    desposicionesPlanilla()
                })

            $('#example2').on("click", "button.btnCaptura", function () {
                let data = table.row($(this).parents("tr")).data();
                // console.log(data)
                let idPlanilla = data.id;
                // console.log(idPlanilla)
                // return false 
                Swal.fire({
                title: 'Se ANULARÁ la planilla del mes de '+data.mes_letra+' del año: '+data.ano+' ,Está seguro de Anularla?',
                text: "!No podrás revertir el proceso!", 
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Anular',
                cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					// console.log(valuesDatE);	
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/deposiciones-destroy-planilla')}}",{
                                data: {
                                    id: idPlanilla
                                }                
                            }).then((response) => {

                                 console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                    // if (response.data){
                             
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'Se ANULO la planilla con exito',
                                        footer: ''
                                    })
                                    fillTablePlanillas()
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
                
                // let data = table.row($(this).parents("tr")).data();

                //  console.log(data.lenght)
                 //llenar array y luego con el array se llena la tabla
                // let tabmd = table.rows().data()
                // let tablaAsig =[];
                // for(let i = 0; i< tabmd.length; i++){
                //      var datoNew = tabmd[i]
                //     //  console.log(datoNew)
                //     tablaAsig.push(datoNew)
                // }
               
            })
})

  /*******************************************************
     * Llenar la tabla del de las asignaciones de medicamentos
     * *****************************************************/    
    function fillTablePlanillas(){
        
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
        
                table = $('#example2').DataTable({
                    scrollY: '300px',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {okFalse: "01",datosbasicos_id: idasigmedic},
                        "url": "{{ URL::to('/buscar-add-planillas') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "id"},
                        {"data": "dia_ctrl"},
                        {"data": "dia_deposicion"},
                        {"data": "noche_deposicion"},
                        {"data": "observacion"},
                        {"data": "num_veces"}
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
                                <button type='button' id='btnCaptura' class='btnCaptura btn btn-warning btn-md' title="Eliminar planilla"><i class="fa fa-trash" style="color:#f30b0b;"><i></button>`
                                return botones;
                                
                            }
                        }
                    ],
                    "destroy": true,
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                    
                })
        }        
</script>


