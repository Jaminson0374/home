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
    .butonAll {
        display: flex;
        justify-content: center;
    }        
</style>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                {{-- <div class="card-body text-dark tarjeta_body"> --}}
                    <form role="form" name="formAddDiaPlanillas" id="formAddDiaPlanillas" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtobasicoMed as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Planilla de control de desposiciones Diarias No. 
                                        </h3>
                                        <h3 id="num_plani" class="float-right m-0 p-0 bg-danger" style="font-weight: 900; font-size: 1.5em;" class="card-title"></h3>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                        USUARIO --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                        </h3>
                                    </div>
                                </div>
                                    <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                    <input type="hidden" name="datosbasicos_id" value={{$datosRow->id}}>
                                    <input type="hidden" name="planilla_id">

                                    <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-4">  
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                             <div class="card card-primary card-outline">
                                                <div class="row pb-2">   
                                                    <div class="col-12 col-lg-3 col-sm-12 col-md-12">                                                        
                                                        <label for="">AÑO:</label>
                                                        <input type="text" class="form-control text bg-info" name="ano"
                                                            id="ano"  focusNext tabindex="1" 
                                                            title="Año de control deposiciones" disabled>
                                                    </div> 
                                                    <div class="col-12 col-lg-5 col-sm-12 col-md-12">                                                        
                                                        <label for="">Mes</label>
                                                        <select class="form-control text bg-info"
                                                            name="mes_ctrl" id="mes_ctrl" focusNext tabindex="2" disabled>
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
                                                        <div class="col-lg-4 col-sm-12 col-md-4">                                                        
                                                            <label for="">Día del Ctrl  :</label>
                                                            <input type="number" class="form-control text" name="dia_ctrl"
                                                                id="dia_ctrl"  focusNext tabindex="3" min="0"
                                                                title="Año de control deposiciones">
                                                        </div>                                                                                                                                                           
                                                </div>
                                                    <div class="card card-primary card-outline">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12 col-md-6">  
                                                                <label for="">Deposiciones Día</label>
                                                                <input type="number" class="form-control text" name="dia_deposicion"
                                                                    id="dia_deposicion"  focusNext min="0" tabindex="4"
                                                                    title="Digite la cantidad de deposicione realizadas en el día">
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-md-6">        
                                                                    <label for="">Deposiciones Noche</label>
                                                                    <input type="number" class="form-control text" name="noche_deposicion"
                                                                        id="noche_deposicion"  focusNext min="0" tabindex="5"
                                                                        title="Año de la planilla"> 
                                                            </div>                                                                                                                                   
                                                        </div>
                                                    </div>
                                                    <div class="card card-primary card-outline">
                                                        <div class="row pb-2">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Cuidador</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="empleado_id" id="empleado_id" focusNext tabindex="6" title = "Seleccione la persona encargada de la administracion del medicamento" >
                                                                    <option selected="selected" disable value="">Seleciona cuidador</option>
                                                                    @foreach ($deposicionMedMedicos as $depoCtrl)
                                                                        <option value={{$depoCtrl->id}}>{{$depoCtrl->nombre.' '.$depoCtrl->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->    
                                                    </div>                                                    
                                                    <div class="card card-primary card-outline">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">                                                        
                                                                <label for="">Observación</label>
                                                                <textarea class="form-control text" name="observacion" id="observacion" cols="50" rows="2" tabindex="7"></textarea>   
                                                            </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="row"> 
                                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <div class="card card-primary card-outline">
                                                                    {{-- <div class="card-body"> --}}
                                                                            <div class="form-group butonAll">
                                                                                <button type="button"
                                                                                    class="btn btn-primary form-group btnSearch btn-md m-1"
                                                                                    id="btnSearch" name="btnSearch" tabindex="8"><i
                                                                                    class="fa fa-search-location fa-lg" title="Buscar una planilla "></i>
                                                                                    <b>Planillas</b>
                                                                                </button>                                                                                                 
                                                                                <button  type="submit" class="btn btn-primary btn-md form-group m-1" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                                    focusNext tabindex="9" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                                    <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i>Guardar
                                                                                </button>
                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                                    focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar
                                                                                </button>                                                                               
                                                                                    <a href="{{ URL::to('/index_admin_deposiciones') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                                        style="color:#f30b0b;"></i> Salir</a>    
                                                                            </div>
                                                                    {{-- </div>   --}}
                                                                </div>
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
    let funcDepo = new DeposicionesCtrl()
                document.querySelector('#empleado_id').style.display = 'none'
                // document.querySelector('#total_deposicion')
                document.querySelector('#observacion').style.display = 'none'  
                document.querySelector('#dia_ctrl').style.display = 'none'  
                document.querySelector('#dia_deposicion').style.display = 'none'  
                document.querySelector('#noche_deposicion').style.display = 'none'   
                document.querySelector('#btnSaveAdm').style.display = 'none'
                document.querySelector('#empleado_id').style.display = 'none' 

        /*PROCEDIMIENTO PARA BUSCAR PLANILLA Y LLENAR*/
        let formPlani = document.getElementById('formAddDiaPlanillas')
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
                        "language":{"url": "../../resources/js/espanol.json"}
                }).draw()
                    return true
            })
 
            $('#example1').on("click", "button.btnCaptura", function () {
                // formPlani.reset()
                // var datos = table_user.row($(this).parents("tr")).data();

                let data = table_user.row($(this).parents("tr")).data();
                
                document.getElementById("num_plani").innerHTML ='No.'+data.useranomes
                document.getElementsByName("mes_ctrl")[0].value = data.mes
                document.getElementsByName('ano')[0].value = data.ano
                document.getElementsByName('dia_ctrl')[0].value = 0
                var _idPlanilla = document.getElementsByName('planilla_id')[0].value = data.id
                document.getElementById('dia_ctrl').focus()

                document.querySelector('#empleado_id').style.display = 'inline'
                // document.querySelector('#total_deposicion')
                document.querySelector('#observacion').style.display = 'inline'  
                document.querySelector('#dia_ctrl').style.display = 'inline'  
                document.querySelector('#dia_deposicion').style.display = 'inline'  
                document.querySelector('#noche_deposicion').style.display = 'inline'   
                document.querySelector('#btnSaveAdm').style.display = 'inline' 
                document.querySelector('#empleado_id').style.display = 'inline'                



                // let numplani = document.getElementById("num_plani").innerHTML ='No.'+data.useranomes
                // let userId = document.getElementById("user_id").innerHTML
                // let diaCtrl = document.getElementsByName('dia_ctrl')[0].value  
                // let diaDepo = document.getElementsByName('dia_desposicion')[0].value  
                // let nocheDepo = document.getElementsByName('noche_deposicion')[0].value  
                // let planiId = data.id 
                // let emplaId = document.getElementsByName('empleado_id')[0].value
                // let totalDepo = document.getElementsByName('total_deposicion')[0].value = diaDepo+nocheDepo
                // let observaDepo = document.getElementsByName('observacion')[0].value  
                             

                console.log(data.id)

                fillTablePlanillas(data.id)

                 document.getElementById('btnSearch').disabled = true;
                document.getElementById('btnSaveAdm').disabled = false;
            })
    /* FIN DEL CODIGO PARA LLENAR TABLA DEL MODAL DE BUSQUEDA DE LA PLANILLA            
    /************************************************************************/
     let nDocumento = document.getElementById("num_documento");
        const date = new Date();
        let yyy = date.getFullYear();
        document.getElementsByName('ano')[0].value = yyy;  
        document.getElementById('btnSaveAdm').disabled = true;

        // fillTablePlanillas() //pendiente

            // saltarEnter()
            /******************************************************************
             *Valida la existencia de la planilla en el mes y año seleccionado  
            *******************************************************************/
                let _mesChange = document.querySelector('#mes')
                
                $( "#mes" ).on( "change", function() {
                    let _ano3 = document.getElementsByName('ano')[0].value
                    let _mes3 = document.getElementsByName('mes_ctrl')[0].value 
                    // alert(locatePlanilla)
                    if (_ano3 <=0){
                        alert('Por favor digite el año...')
                    }else{                    
                        const validaReg = async () => {
                            await axios.post("{{ URL::to('buscar_planillas')}}", {
                                data: {
                                    mes: _mes3,
                                    ano: _ano3, 
                                    okFalse: '02',
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
        const formEvolQ = document.querySelector('#formAddDiaPlanillas');

        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
            var meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
            valiCampos = funcDepo.validarCampos()
            if (valiCampos === "ok"){
                let _diaDepo    = document.getElementsByName('dia_deposicion')[0].value 
                let _nocheDepo  = document.getElementsByName('noche_deposicion')[0].value
                let _diaCtrl    = document.getElementsByName('dia_ctrl')[0].value
                let _mesCtrl    = document.getElementsByName('mes_ctrl')[0].value
                let _totalDepo  = Number(_diaDepo)+Number(_nocheDepo)
                if(_totalDepo === 0){
                    Swal.fire({
                        title: '!ALERTA! Se guardará este día: '+_diaCtrl+' '+'de la planilla de: '+meses[Number(_mesCtrl)-1]+' '+'sin deposiciones, Está seguro de Continuar?',
                        text: "!No podrás revertir el proceso!", 
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Continuar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {                
                            const desposicionesPlanilla = async () => {
                                await axios.post("{{URL::to('/store-dia-planilla')}}",{
                                        data: {
                                            observacion : document.getElementsByName('observacion')[0].value,
                                            dia_ctrl : Number(_diaCtrl),
                                            dia_deposicion : document.getElementsByName('dia_deposicion')[0].value,
                                            noche_deposicion :document.getElementsByName('noche_deposicion')[0].value,
                                            total_deposiciones : _totalDepo,
                                            empleado_id : document.getElementsByName('empleado_id')[0].value,
                                            planilla_id : document.getElementsByName('planilla_id')[0].value,
                                            user_id: document.getElementsByName('user_id')[0].value
                                        }                
                                    }).then((resp) => {
                                        // console.log(resp.data)
                                        console.log(resp.data['message'])
                                        if(resp.data['message']=="Success"){
                                            document.getElementById('btnSaveAdm').disabled = true;
                                            document.getElementsByName('dia_ctrl')[0].value  =""
                                            document.getElementsByName('dia_desposicion')[0].value =""
                                            document.getElementsByName('noche_deposicion')[0].value =""
                                            document.getElementsByName('empleado_id')[0].value = " "
                                            document.getElementsByName('observacion')[0].value = ""
                                            document.getElementsByName('planilla_id')[0].value =""

                                            document.querySelector('#observacion').style.display = 'none'  
                                            document.querySelector('#dia_ctrl').style.display = 'none'  
                                            document.querySelector('#dia_deposicion').style.display = 'none'  
                                            document.querySelector('#noche_deposicion').style.display = 'none'   
                                            document.querySelector('#btnSaveAdm').style.display = 'none'
                                            document.querySelector('#empleado_id').style.display = 'none'                                      

                                            // fillTablePlanillas() pendiente                    
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PERFECTO',
                                                text: 'Este día se GUARDÓ en la planilla Correctamente',
                                                footer: ''
                                            })
                                        }
                                    })
                            }
                            desposicionesPlanilla()
                        }else{
                            document.getElementById('dia_deposicion').focus()
                        }
                    })
                }
            }else{
                Swal.fire({
                        icon: 'error',
                        title: 'El Formulario Tiene Datos Incompletos *',
                        text: valiCampos,
                        footer: ''
                    })
            }    
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
                                    // fillTablePlanillas() //pendiente
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
     * Llenar la tabla del de la PLANILLA DEL MES SELECICONADO
     ******************************************************/    
    function fillTablePlanillas(){
        
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 

            table = $('#example2').DataTable({
                    scrollY: '300px',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {okFalse: "01",planilla_id: _idPlanilla},
                        "url": "{{ URL::to('/buscar-add-plani_dia') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "dia_ctrl"},
                        {"data": "dia_deposicion"},
                        {"data": "noche_deposicion"},
                        {"data": "total_deposiciones"},
                        {"data": "cuidador"},
                        {"data": "observacion"}
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


