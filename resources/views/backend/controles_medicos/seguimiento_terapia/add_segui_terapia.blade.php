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
.table-wrapper {
  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

/* Stuff not part of the demo */
table {
  background: #f1f1f1;
}

th,td {
  white-space: nowrap;
  padding: 5px;
  text-align: left;
}
</style>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                    <form role="form" name="formAddDiaPlanillas" id="formAddDiaPlanillas" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($createSeguiTerapia as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Planilla de Seguimto Terapia/Actividades. 
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
                                    <input type="hidden" name="planilla_id" id="planilla_id">
                                    ><input type="hidden" id="numsesion" name="numsesion">

                                    <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-4">  
                                        {{-- <div class="col-lg-12 col-sm-12 col-md-12"> --}}
                                             <div class="card card-primary card-outline">
                                                <div class="row pb-2">   
                                                    <div class="col-12 col-lg-5 col-sm-12 col-md-8">                                                        
                                                        <label for="">Fecha:</label>
                                                        <input type="date" class="form-control text" name="fecha"
                                                            id="fecha"  focusNext tabindex="1" 
                                                            title="Fecha de la sesión">
                                                    </div> 
                                                    <div class="col-lg-4 col-sm-12 col-md-4">                                                        
                                                        <label for="">#Sesión:</label>

                                                        <select class="form-control text"
                                                            name="sesion" id="sesion" focusNext tabindex="2">
                            
                                                        </select>                                                            
                                                    </div>                                                                                                                                                           
                                                </div>
                                                    <div class="card card-primary card-outline">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-12 col-md-4"> 
                                                                <label for="" class="col-form-label">HH</label> 
                                                                <input type="text" placeholder="HH" class="form-control text text-center focusNext p-0" maxlength="2" size ="2" id="horaTime"  pattern="[0-9]+" name="horaTime" tabindex="2">
                                                            </div>
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <label for="" class="col-form-label">MM</label>
                                                                <input type="text" placeholder="MM" class="form-control text-center text p-0 focusNext" maxlength="2" size"2" id="minutoTime" name="minutoTime"  pattern="[0-9]+" tabindex="3">
                                                            </div> 
                                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                                <label for="" class="col-form-label">AMPM</label>
                                                                <select class="form-control p-0 focusNext text-center" style="width: 100%;" tabindex="4" 
                                                                    name="ampmTime" id="ampmTime" focusNext tabindex="5">
                                                                    <option selected="selected" disable value=""></option>
                                                                    <option value="AM">AM</option>
                                                                    <option value="PM">PM</option>
                                                                </select>
                                                            </div>                                                                                                                                                                                         
                                                        </div>
                                                 
                                                    </div>
                                                    <div class="card card-primary card-outline">
                                                        <div class="row pb-2">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Profesional</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="personalexterno_id" id="personalexterno_id" focusNext tabindex="6" title = "Seleccione la persona encargada de la administracion del medicamento" >
                                                                    <option selected="selected" disable value="">Seleciona cuidador</option>
                                                                    @foreach ($personalExternoTerapia as $extGuiTep)
                                                                        <option value={{$extGuiTep->id}}>{{$extGuiTep->nombre.' '.$extGuiTep->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->    
                                                    </div>                                                    
                                                    <div class="card card-primary card-outline">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">                                                        
                                                                <label for="">Descripción</label>
                                                                <textarea class="form-control text" name="descripcion" id="descripcion" cols="50" rows="2" tabindex="7"></textarea>   
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
                                                                    @foreach ($empleadosSeguiTerapia as $sguiTep)
                                                                        <option value={{$sguiTep->id}}>{{$sguiTep->nombre.' '.$sguiTep->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->    
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
                                                                                    <a href="{{ URL::to('/index-seguimto-terapia') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="11" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                                        style="color:#f30b0b;"></i>Salir</a>    
                                                                            </div>
                                                                    {{-- </div>   --}}
                                                                </div>
                                                        </div>
                                                    </div>                                                    
                                            </div>
                                        {{-- </div> --}}
                                    </div> 
                                        <div class="col-lg-8 col-sm-12 col-md-8">
                                            {{-- <div class="col-lg-12 col-sm-12 col-md-12"> --}}
                                                        <div class="table-wrapper col-lg-12 col-sm-12 col-md-12 bg-primary text-white "> 
                                                            <table id="example2" class="table  table-bordered table-striped table-hover text-dark"  style="width: 100%; background-color: hsl(125, 85%, 79%)">
                                                                <thead class="bg bg-success" style="">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Hora</th>
                                                                        <th>Fecha</th>
                                                                        <th>Profesional</th>
                                                                        <th>Descripcion</th>
                                                                        <th>Cuidador</th>
                                                                        <th>Id</th>
                                                                        <th><i class="fa fa-trash"><i></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="bodyTabla">
 
                                                                </tbody>
                                                             </table>                                                            
                                                        </div>
                                            {{-- </div> --}}
                                        </div>
                            </div>                                                                                                    
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/seguimiento_terapia/segui_terapia.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                                <script src="{{ asset('../resources/js/enter_form.js') }}"></script>

                         </body>
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
        <div class="modal-dialog modal-lg" role="document">
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
                            <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Terapia</th>
                                        <th class="text-center">Fecha Ini</th>
                                        <th class="text-center">Fecha Fin</th>
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
    let funcSegui = new SeguiTerapia()
                document.querySelector('#empleado_id').style.display = 'none'
                document.querySelector('#personalexterno_id').style.display = 'none' 
                document.querySelector('#descripcion').style.display = 'none'  
                document.querySelector('#sesion').style.display = 'inline'  
                document.querySelector('#horaTime').style.display = 'none'  
                document.querySelector('#minutoTime').style.display = 'none'  
                document.querySelector('#ampmTime').style.display = 'none'  
                document.querySelector('#fecha').style.display = 'none'   
                document.querySelector('#btnSaveAdm').style.display = 'none'
                document.querySelector('#btnCancelAdm').style.display = 'none' 

        /*PROCEDIMIENTO PARA BUSCAR PLANILLA Y LLENAR*/
        let formPlani = document.getElementById('formAddDiaPlanillas')
        let btnSearch = document.getElementById('btnSearch');
        btnSearch.addEventListener('click', () => {
            let idUserPlanilla = document.getElementsByName('datosbasicos_id')[0].value 

               var myModal =  $("#modalBuscarPln").modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
                table_user = $('#example1').DataTable({
                    fixedHeader : 'true',
                    scrollY: '400px',
                    scrollx: 'true',
                    scrollX: '400´X',
                    destroy: 'true',
                    autoWidth: 'true',
                    responsive: 'true',

                    "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {datosbasicos_id: idUserPlanilla},
                        "url": "{{ URL::to('/show-plani-Modal-terapia') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "proceso_medico_id"},
                            {"data": "fecha_ini"},
                            {"data": "fecha_fin"},
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
                        "destroy": true,
                        "language":{"url": "../../resources/js/espanol.json"}
                }).draw()
                    return true
            })
 
            // $('#example1').on("click", "button.btnCaptura", function () {
                // let data = table_user.row($(this).parents("tr")).data();
                
            $('#example1 tbody').on('click', 'tr', function () {
                let data = table_user.row( this ).data();
                // console.log(dataTemp.id)                                
                fillTablePlanillas(data.id)

                document.getElementsByName('sesion')[0].value = 0
                var _idPlanilla = document.getElementsByName('planilla_id')[0].value = data.id
                
                document.getElementsByName("numsesion")[0].value = data.num_sesiones
                document.getElementById('sesion').focus()
                document.querySelector('#empleado_id').style.display = 'inline'
                document.querySelector('#personalexterno_id').style.display = 'inline' 
                document.querySelector('#descripcion').style.display = 'inline'  
                document.querySelector('#sesion').style.display = 'inline'  
                document.querySelector('#horaTime').style.display = 'inline'  
                document.querySelector('#minutoTime').style.display = 'inline'  
                document.querySelector('#ampmTime').style.display = 'inline'  
                document.querySelector('#fecha').style.display = 'inline'   
                document.querySelector('#btnSaveAdm').style.display = 'inline'
                document.querySelector('#btnCancelAdm').style.display = 'inline' 
                document.getElementById('btnSaveAdm').disabled = false;
                 $("#modalBuscarPln").dispose()                
            })
    /* FIN DEL CODIGO PARA LLENAR TABLA DEL MODAL DE BUSQUEDA DE LA PLANILLA            
    /************************************************************************/
    //  let nDocumento = document.getElementById("num_documento");
            
        /*Traigo el año actual de la fecha acrual*/
        /*const date = new Date();
        let yyy = date.getFullYear();
        document.getElementsByName('ano')[0].value = yyy;  
        document.getElementById('btnSaveAdm').disabled = true;*/

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
            let _horas = document.getElementsByName('horaTime')[0].value
		    let _ampm = document.getElementsByName('ampmTime')[0].value
		    let _minutos = document.getElementsByName('minutoTime')[0].value            
            let _hora = funcSegui.horaText(_horas,_minutos,_ampm)
            // document.getElementsByName('horadbf')[0].value = _hora		
            let valiCampos = funcSegui.validarSequiCampos()

            if (valiCampos === " "){
                let planiId2    = document.getElementsByName('planilla_id')[0].value 
                            const desposicionesPlanilla = async () => {
                                await axios.post("{{URL::to('/store-seguimto-terapia')}}",{
                                        data: {
                                            fecha : document.getElementsByName('fecha')[0].value,
                                            sesion : document.getElementsByName('sesion')[0].value,
                                            hora : _hora,
                                            personalexterno_id  : document.getElementsByName('personalexterno_id')[0].value,
                                            descripcion : document.getElementsByName('descripcion')[0].value,
                                            empleado_id : document.getElementsByName('empleado_id')[0].value, 
                                            datosbasicos_id : document.getElementsByName('datosbasicos_id')[0].value,
                                            planilla_id : document.getElementsByName('planilla_id')[0].value,
                                            user_id: document.getElementsByName('user_id')[0].value
                                        }                
                                    }).then((resp) => {
                                        // console.log(resp.data)
                                        console.log(resp.data['message'])
                                        if(resp.data['message']==="Success"){
                                            let _nsesion = document.getElementsByName('sesion')[0].value
                                            document.getElementsByName('fecha')[0].value = " "
                                            document.getElementsByName('sesion')[0].value = " "
                                            document.getElementsByName('horaTime')[0].value = " "
                                            document.getElementsByName('minutoTime')[0].value = " "
                                            document.getElementsByName('ampmTime')[0].value = " "
                                            document.getElementsByName('personalexterno_id')[0].value = " "
                                            document.getElementsByName('descripcion')[0].value = " "
                                            document.getElementsByName('empleado_id')[0].value = " " 

                                            document.querySelector('#btnSearch').style.display = 'none'
                                            document.querySelector('#btnCancelAdm').style.display = 'inline'

                                            document.getElementById('fecha').focus()
                                            fillTablePlanillas(planiId2) 
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PERFECTO',
                                                text: 'EL la sesión # '+Number(_nsesion)+' se GUARDÓ en la planilla Correctamente',
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

   /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
			let botonCancel = document.getElementById("btnCancelAdm");
			botonCancel.addEventListener('click', () => {
                
                document.querySelector('#btnSaveAdm').style.display = "none"
                document.querySelector('#btnSearch').style.display = "inline"
                document.getElementsByName('empleado_id')[0].value = " "
                document.getElementsByName('descripcion')[0].value = ""

                document.querySelector('#descripcion').style.display = 'none'  
                document.querySelector('#sesion').style.display = 'none'  
                document.querySelector('#fecha').style.display = 'none'  
                document.querySelector('#minutoTime').style.display = 'none'   
                document.querySelector('#horaTime').style.display = 'none'   
                document.querySelector('#ampmTime').style.display = 'none'   
                document.querySelector('#empleado_id').style.display = 'none'
                document.querySelector('#btnCancelAdm').style.display = 'none'               
            })                      
 }) 

    /*******************************************************
     * Llenar la tabla del de la PLANILLA DEL PROCESO SELECICONADO
     ******************************************************/    
    function fillTablePlanillas(idPlanilla){
            table = $('#example2').DataTable({
                    fixedHeader : 'true',
                    scrollY: '400px',
                    scrollx: 'true',
                    scrollX: '400´X',
                    destroy: 'true',
                    autoWidth: 'false',
                    responsive: 'true',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {okFalse: "01",planilla_id: idPlanilla},
                        "url": "{{ URL::to('/show-seguimto-Terapia') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                },
                        "initComplete":function( settings, data){
                            console.log(data)
                            let tabmd = data
                                let totDia =document.getElementsByName('numsesion')[0].value
                                console.log(totDia)
                                let seleDias = document.getElementById('sesion')
                                console.log(tabmd.length)

                                seleDias.innerHTML = '<option selected="selected" disable value=" ">Sesión</option>'
                                if(tabmd.length === 0){
                                    for(let i = 1; i <= totDia; i++){
                                        seleDias.innerHTML += `<option class="font-weight-bold" value=${i}>${i}</option>`
                                    }
                                }else{
                                    let sino = 0
                                    for(let i = 1; i <= totDia; i++){
                                    console.log(tabmd.length)
                                        let _dmi = i;
                                        if(i<10){_dmi = "0"+i;}
                                            for(let b = 0; b< tabmd.length; b++){   
                                                if(Number(tabmd[b]['sesion']) === Number(i)){
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
                                }                                    
                    },     
                    "columns": [
                        {"data": "sesion"},
                        {"data": "hora"},
                        {"data": "fecha"},
                        {"data": "doc_identidad"},
                        {"data": "descripcion"},
                        {"data": "num_documento"},
                        {"data": "id"}
                    ],
                     columnDefs: [{
                            targets: 6,
                            visible: true
                        },
                        {
                            targets: 7,
                            orderable: false,
                            data: null,
                            render: function(data, type, row, meta) {
                                let fila = meta.row;
                                let botones =
                                    `
                                     <i style="color: #ee2015" class="fa fa-trash"><button type='button' id='btnCaptura' class='btnCaptura' title="Eliminar dia de la planilla"></button></i>
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
   $('#example2 tbody').on('click', 'tr', function () {
        var dataTemp = table.row( this ).data();
        // console.log(dataTemp.id)
            // $('#example2').on("click", "button.btnCaptura", function () {
                // let data = table.row($(this).parents("tr")).data();
                // console.log(data)

                let idDiaPlanilla = dataTemp.id;
                Swal.fire({
                title: 'Se ANULARÁ LA SESIÓN No.'+dataTemp.sesion+' '+'Está seguro de Anularla?',
                text: "!No podrás revertir el proceso!", 
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Anular',
                cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
                    const anulaReg = async () => {
                            await axios.post("{{URL::to('/destroy-seguimto-terapia')}}",{
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
   }
</script>


