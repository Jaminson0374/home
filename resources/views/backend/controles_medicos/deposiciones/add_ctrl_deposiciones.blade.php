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
    /* div.container {
        width: 1000px;
    }     */
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
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Planilla Ctrl desposiciones Diarias No. 
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

                                                            <select class="form-control text"
                                                                name="dia_ctrl" id="dia_ctrl" focusNext tabindex="2">
                            
                                                            </select>                                                            
                                                             <!--<input type="number" class="form-control text" name="dia_ctrl"
                                                                 id="dia_ctrl"  focusNext tabindex="3" min="0"
                                                                 title="Año de control deposiciones">-->
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
                                                                                    focusNext tabindex="10"> <i class="fa fa-ban fa-lg"></i> Cancelar
                                                                                </button>                                                                               
                                                                                    <a href="{{ URL::to('/index_admin_deposiciones') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="11" id="btnExit"><i class="fa fa-arrow-right fa-lg"
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
                                                        <div class=" container col-lg-12 col-sm-12 col-md-12 bg-primary text-white"> 
                                                            {{-- table-responsive --}}
                                                            <table id="example2" class="table table-bordered table-striped table-hover bg-danger text-white" style="width: 100%">
                                                                <thead class="bg bg-success">
                                                                    <tr>
                                                                        <th>Fecha Dia</th>
                                                                        <th class="text-center">De Día</th>
                                                                        <th class="text-center">De Noche</th>
                                                                        <th>No. Veces</th>
                                                                        <th>Cuidador</th>
                                                                        <th>#</th>
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
    var meses = ["Enero","Febrero", "Marzo","Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
    let funcDepo = new DeposicionesCtrl()
                document.querySelector('#empleado_id').style.display = 'none'
                // document.querySelector('#total_deposicion')
                document.querySelector('#observacion').style.display = 'none'  
                document.querySelector('#dia_ctrl').style.display = 'none'  
                document.querySelector('#dia_deposicion').style.display = 'none'  
                document.querySelector('#noche_deposicion').style.display = 'none'   
                document.querySelector('#btnSaveAdm').style.display = 'none'
                document.querySelector('#empleado_id').style.display = 'none'
                document.querySelector('#btnCancelAdm').style.display = 'none' 

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
                let data = table_user.row($(this).parents("tr")).data();
                fillTablePlanillas(data.id)

                document.getElementById("num_plani").innerHTML ='No.'+data.useranomes
                document.getElementsByName("mes_ctrl")[0].value = data.mes
                document.getElementsByName('ano')[0].value = data.ano
                document.getElementsByName('dia_ctrl')[0].value = 0
                var _idPlanilla = document.getElementsByName('planilla_id')[0].value = data.id
                document.getElementById('dia_ctrl').focus()
 
                document.querySelector('#empleado_id').style.display = 'inline'
                document.querySelector('#observacion').style.display = 'inline'  
                document.querySelector('#dia_ctrl').style.display = 'inline'  
                document.querySelector('#dia_deposicion').style.display = 'inline'  
                document.querySelector('#noche_deposicion').style.display = 'inline'   
                document.querySelector('#btnSaveAdm').style.display = 'inline' 
                document.querySelector('#empleado_id').style.display = 'inline'  

                //  document.getElementById('btnSearch').disabled = true;
                document.getElementById('btnSaveAdm').disabled = false;
            })
    /* FIN DEL CODIGO PARA LLENAR TABLA DEL MODAL DE BUSQUEDA DE LA PLANILLA            
    /************************************************************************/
     let nDocumento = document.getElementById("num_documento");
        const date = new Date();
        let yyy = date.getFullYear();
        document.getElementsByName('ano')[0].value = yyy;  
        document.getElementById('btnSaveAdm').disabled = true;

             // saltarEnter()

        /*********************************/
        // document.querySelector('.message').style.display = 'none'
        // document.querySelector('.horaMuestra').style.display = 'none'
		// document.querySelector('.horaDbf').style.display = 'inline'

       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formAddDiaPlanillas');

        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
            
            let valiCampos = funcDepo.validarCampos()
            // alert(valiCampos)
            if (valiCampos === " "){
                let _diaDepo    = document.getElementsByName('dia_deposicion')[0].value 
                let _nocheDepo  = document.getElementsByName('noche_deposicion')[0].value
                let _diaCtrl    = document.getElementsByName('dia_ctrl')[0].value
                let planiId2    = document.getElementsByName('planilla_id')[0].value 
                let _mesCtrl    = document.getElementsByName('mes_ctrl')[0].value
                let _totalDepo  = Number(_diaDepo)+Number(_nocheDepo)
                // if(_totalDepo === 0){ // si total deposiciones es = 0
                // }              
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
                                        if(resp.data['message']==="Success"){
                                            // document.getElementsByName('dia_ctrl')[0].value  =""
                                            document.getElementsByName('dia_deposicion')[0].value =""
                                            document.getElementsByName('noche_deposicion')[0].value =""
                                            document.getElementsByName('empleado_id')[0].value = " "
                                            document.getElementsByName('observacion')[0].value = ""
                                            // document.getElementsByName('planilla_id')[0].value =""

                                            // document.querySelector('#observacion').style.display = 'none'  
                                            // document.querySelector('#dia_ctrl').style.display = 'none'  
                                            // document.querySelector('#dia_deposicion').style.display = 'none'  
                                            // document.querySelector('#noche_deposicion').style.display = 'none'   
                                            // document.querySelector('#btnSaveAdm').style.display = 'none'
                                            // document.querySelector('#empleado_id').style.display = 'none' 
                                             document.querySelector('#btnSearch').style.display = 'none'
                                             document.querySelector('#btnCancelAdm').style.display = 'inline'

                                             document.getElementById('dia_ctrl').focus()
                                            fillTablePlanillas(planiId2) 
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PERFECTO',
                                                text: 'EL Día '+Number(_diaCtrl)+' se GUARDÓ en la planilla Correctamente',
                                                footer: ''
                                            })
                                        }
                                    })
                            }
                            desposicionesPlanilla()
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
                console.log(data)

                let anoctr2 = document.getElementsByName('ano')[0].value
                let mesctr2 =document.getElementsByName('mes_ctrl')[0].value
                let idDiaPlanilla = data.id;
                Swal.fire({
                title: 'Se ANULARÁ el día '+data.dia_ctrl+' '+'de la planilla del mes de '+meses[Number(mesctr2)-1]+' '+'del año: '+anoctr2+' '+',Está seguro de Anularla?',
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
                            await axios.post("{{URL::to('/destroy-dia-plani')}}",{
                                data: {
                                    id: idDiaPlanilla
                                }                
                            }).then((response) => {
                                 console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                    // if (response.data){
                                        let planiId3 = document.getElementsByName('planilla_id')[0].value 
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'Se ANULO la planilla con exito',
                                        footer: ''
                                    })
                                    fillTablePlanillas(planiId3) 
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
                
        })


   /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
			let botonCancel = document.getElementById("btnCancelAdm");
			botonCancel.addEventListener('click', () => {
                
                document.querySelector('#btnSaveAdm').style.display = "none"
                document.querySelector('#btnSearch').style.display = "inline"
                document.getElementsByName('dia_deposicion')[0].value =""
                document.getElementsByName('noche_deposicion')[0].value =""
                document.getElementsByName('empleado_id')[0].value = " "
                document.getElementsByName('observacion')[0].value = ""

                document.querySelector('#observacion').style.display = 'none'  
                document.querySelector('#dia_ctrl').style.display = 'none'  
                document.querySelector('#dia_deposicion').style.display = 'none'  
                document.querySelector('#noche_deposicion').style.display = 'none'   
                document.querySelector('#empleado_id').style.display = 'none'
                document.querySelector('#btnCancelAdm').style.display = 'none'               
            })               
 }) 

    /*******************************************************
     * Llenar la tabla del de la PLANILLA DEL MES SELECICONADO
     ******************************************************/    
    function fillTablePlanillas(idPlanilla){
        
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
        // table32 = $('#example2').destroy()
            table = $('#example2').DataTable({
                    fixedHeader : 'true',
                    scrollY: '400px',
                    scrollx: 'false',
                    responsive: 'true',
                    destroy: 'true',
                    autoWidth: 'false',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {okFalse: "01",planilla_id: idPlanilla},
                        "url": "{{ URL::to('/buscar-add-plani_dia') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                },
                        "initComplete":function( settings, data){
                            console.log(data)
                            let tabmd = data
                                let _anos = document.getElementsByName('ano')[0].value // data.ano
                                let _mesCt = document.getElementsByName('mes_ctrl')[0].value // data.mes
                                let totDia =diasDelMes(_anos,Number(_mesCt)-1)   
                                let seleDias = document.getElementById('dia_ctrl')
                                seleDias.innerHTML = '<option selected="selected" disable value=" ">Días</option>'
                                    let sino = 0
                                    for(let i = 1; i <= totDia; i++){
                                        let _dmi = i;
                                        if(i<10){_dmi = "0"+i;}
                                            for(let b = 0; b< tabmd.length; b++){   
                                                if(Number(tabmd[b]['dia_ctrl']) === Number(i)){
                                                    sino = 0
                                                    break
                                                }else{
                                                    sino = 1
                                                }
                                            }
                                            if(sino === 1){
                                                seleDias.innerHTML += `<option class="font-weight-bold" value=${_dmi}>${_dmi}</option>`
                                                sino = 0
                                            }
                                    }                                    
                    },     
                    "columns": [
                        {"data": "dia_ctrl"},
                        {"data": "dia_deposicion"},
                        {"data": "noche_deposicion"},
                        {"data": "total_deposiciones"},
                        {"data": "num_documento"},
                        {"data": "id"}
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
                                        <button type='button' id='btnCaptura' class='btnCaptura btn btn-warning btn-md' title="Eliminar dia de la planilla"><i class="fa fa-trash"><i></button>
                                    `
                                return botones;
                                // style="color:#f30b0b;"
                            }
                        }
                    ],
                    "destroy": true,
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })
    }

    /*PROCESEO PARA LLENAR EL SELECT DE LOS DIA_CTRL CON LOS DÍAS QUE ESTÁ SIN PROCESAR*/
    // window.addEventListener('load', () => {
    //     $('#example1').on("click", "button.btnCaptura", function () { 
    //         setTimeout(function(){ 
    //             var table = $('#example2').DataTable();
    //                 let tabmd = table.rows().data()
    //                 let _anos = document.getElementsByName('ano')[0].value // data.ano
    //                 let _mesCt = document.getElementsByName('mes_ctrl')[0].value // data.mes
    //                 let totDia =diasDelMes(_anos,Number(_mesCt)-1)   
    //                 let seleDias = document.getElementById('dia_ctrl')
    //                 seleDias.innerHTML = '<option selected="selected" disable value=" ">Días</option>'
    //                     let sino = 0
    //                     for(let i = 1; i <= totDia; i++){
    //                         let _dmi = i;
    //                         if(i<10){_dmi = "0"+i;}
    //                             for(let b = 0; b< tabmd.length; b++){   
    //                                 if(Number(tabmd[b]['dia_ctrl']) === Number(i)){
    //                                     sino = 0
    //                                     break
    //                                 }else{
    //                                     sino = 1
    //                                 }
    //                             }
    //                             if(sino === 1){
    //                                 seleDias.innerHTML += `<option class="font-weight-bold" value=${_dmi}>${_dmi}</option>`
    //                                 sino = 0
    //                             }
    //                     }        
    //         }, 500); 
    //     })

    // })
</script>


