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
                                @foreach($createChequeo as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Chequeo Entrega de Turno 
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
                                    <input type="hidden" name="idEvento" id="idEvento">

                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12 col-md-4 border bg-success">  
                                            <div class="row pb-2">   
                                                <div class="col-12 col-lg-6 col-sm-12 col-md-6">                                                        
                                                    <label for="">Fecha*</label>
                                                    <input type="date" class="form-control m-0 p-0" name="fecha"
                                                        id="fecha" focusNext tabindex="1" 
                                                        title="Fecha de la sesión">
                                                </div>
                                                <div class="col-12 col-lg-6 col-sm-12 col-md-6">                                                        
                                                    <label for="">Hora*</label>
                                                    <input type="time" class="form-control m-0 p-0"  name="hora" id="hora"
                                                        title="Hora de la entrega o del recibimiento del turno" focusNext tabindex="2">
                                                </div>                                                    
                                            </div>
                                                         <div class="row pb-2 border">
                                                            <div class="col-lg-6 col-sm-12 col-md-6">
                                                                <label for="">Turno*</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="entidadremitente_id" id="entidadremitente_id" focusNext tabindex="3" title = "Seleccione el turno que entrega o recibe" >
                                                                    <option selected="selected" disable value="">Turno</option>
                                                                        <option value="1">Día</option>
                                                                        <option value="2">Noche</option>
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->
 
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Cuidador que Entrega*</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="cuidador_entrega_id" id="cuidador_entrega_id" focusNext tabindex="5" title = "Seleccione el cuidador" >
                                                                    <option selected="selected" disable value="">Seleciona cuidador</option>
                                                                    @foreach ($empleadosChequeos as $cuidaChequeoEntr)
                                                                        <option value={{$cuidaChequeoEntr->id}}>{{$cuidaChequeoEntr->nombre.' '.$cuidaChequeoEntr->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->

                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Cuidador que Recibe*</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name=cuidador_recibe_id" id=cuidador_recibe_id" focusNext tabindex="5" title = "Seleccione el cuidador" >
                                                                    <option selected="selected" disable value="">Seleciona cuidador</option>
                                                                    @foreach ($empleadosChequeos as $cuidaChequeo)
                                                                        <option value={{$cuidaChequeo->id}}>{{$cuidaChequeo->nombre.' '.$cuidaChequeo->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->
                                                    
                                                    <div class="row"> 
                                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <div class="card card-primary card-outline">
                                                                            <div class="form-group butonAll">
                                                                                <button  type="button" class="btn btn-primary btn-lg form-group m-1" title="Crear nuevo evento a Usuario actual"
                                                                                focusNext tabindex="10" id="btnNewAdm" accionBtn="Nuevo" name="btnNewAdm">
                                                                                <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i>Nuevo
                                                                            </button>
                                                                                <button  type="submit" class="btn btn-primary btn-md form-group m-1" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                                    focusNext tabindex="11" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                                    <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i>Guardar
                                                                                </button>
                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                                    focusNext tabindex="12"> <i class="fa fa-ban fa-lg"></i> Cancelar
                                                                                </button>     

                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnDeleteAdm" title="Anula el registro que esta en la ventana"
                                                                                focusNext tabindex="13"><i class="fa fa-trash fa-lg"
                                                                                    style="color:#f30b0b;"></i> Anular </button>
                                    
                                                                                    <a href="{{ URL::to('/index-evento_adverso') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="14" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                                        style="color:#f30b0b;"></i> Salir</a>    
                                                                            </div>
                                                                </div>
                                                        </div>
                                                    </div>                                                    
                                            </div>
                                        <div class="col-lg-8 col-sm-12 col-md-8">
                                                        <div class="table-wrapper col-lg-12 col-sm-12 col-md-12 bg-primary text-white "> 
                                                            <table id="example2" class="table  table-bordered table-striped table-hover text-dark"  style="width: 100%; background-color: hsl(125, 85%, 79%)">
                                                                <thead class="bg bg-success" style="">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Lista Chequeo</th>
                                                                        <th>Si</th>
                                                                        <th>No</th>
                                                                        <th>Observación</th> 
                                                                        {{-- <th><i class="fa fa-trash"><i></th> --}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="bodyTabla" title="Haga click sobre una fila para mostrar todo el registro en el formulario">
 
                                                                </tbody>
                                                             </table>                                                            
                                                        </div>
                                        </div>
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/chequeo_entrega_turno/entrega_turno.js') }}"></script>
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

<script>
 
window.addEventListener('load', () => { 
            // $('#example1 tbody').on('click', 'tr', function () {
            //     let data = table_user.row( this ).data();
            //     // console.log(dataTemp.id)                                
            //     fillTablePlanillas(data.id)
            // })
            var funEvento = new EventoAdverso();
            funEvento.clear_element(true)
            document.querySelector('#btnNewAdm').style.display = 'inline'
	        document.querySelector('#btnSaveAdm').style.display = 'none'
            document.querySelector('#btnCancelAdm').style.display = 'none'
	        document.querySelector('#btnDeleteAdm').style.display = 'none'

            
            let idCliEvento = document.getElementsByName('datosbasicos_id')[0].value
            fillTablePlanillas(idCliEvento)
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formAddDiaPlanillas');

        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
  
            let valiCampos = funEvento.validarEventoCampos()

            if (valiCampos === " "){
                // let planiId2    = document.getElementsByName('planilla_id')[0].value 
                            const desposicionesPlanilla = async () => {
                                await axios.post("{{URL::to('/store-evento')}}",{
                                        data: {
                                            fecha : document.getElementsByName('fecha')[0].value,
                                            hora : document.getElementsByName('hora')[0].value,
                                            personalexterno_id : document.getElementsByName('personalexterno_id')[0].value,
                                            entidadremitente_id : document.getElementsByName('entidadremitente_id')[0].value,
                                            acompanante_id : document.getElementsByName('acompanante_id')[0].value,
                                            empleado_id : document.getElementsByName('empleado_id')[0].value,
                                            descripcion : document.getElementsByName('descripcion')[0].value,
                                            medio_informacion : document.getElementsByName('medio_informacion')[0].value,
                                            anexos : document.getElementsByName('anexos')[0].value,
                                            datosbasicos_id : document.getElementsByName('datosbasicos_id')[0].value,
                                            user_id : document.getElementsByName('user_id')[0].value,
                                            id : document.getElementsByName('id')[0].value,
                                            ult_reporte_evento : document.getElementsByName('fecha')[0].value
                                        }                
                                    }).then((resp) => {
                                        // console.log(resp.data)
                                        console.log(resp.data['message'])
                                        if(resp.data['message']==="Success"){
                                            document.querySelector('#btnSaveAdm').style.display = 'none'
                                            document.querySelector('#btnCancelAdm').style.display = 'inline'

                                            document.getElementById('fecha').focus()
                                            fillTablePlanillas(planiId2) 
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PERFECTO',
                                                text: 'Se GUARDÓ el Reporte de eventos',
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
                funEvento.clear_element(true)  
                document.querySelector('#btnCancelAdm').style.display = "none"              
  
            }) 
        /****************************************************
            Nuevo Registro
            ********************************************************/
            let botonNew = document.getElementById("btnNewAdm");
                    botonNew.addEventListener('click', () => {
                        let activaElme = false
                        funEvento.clear_element(false)                
                        document.querySelector('#btnSaveAdm').style.display = "inline"
                        document.querySelector('#btnNewAdm').style.display = "none"
                        document.getElementById('fecha').focus()                
            })                   

 }) 
    /***********************************************************************
     * Llenar la tabla con lsita de chequeo - al presional el boton NUEVO
     **********************************************************************/  
     function fillTableNuevo(){
            table = $('#example2').DataTable({
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
                        // "data": {planilla_id: idPlanilla},
                        "url": "{{ URL::to('/busquedaListaChequeo') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                },
                    "columns": [
                        {"data": "id"},
                        {"data": "fecha"},
                        {"data": "hora"},
                        {"data": "medio_informacion"}, 
                        {"data": "descripcion"},
                        {"data": "empleado_id"},
                        {"data": "personalexterno_id"},
	                    {"data": "entidadremitente_id"},
	                    {"data": "acompanante_id"},                                            
                     ],
                     columnDefs: [
                                  {targets: 4, visible: false},
                                  {targets: 5, visible: false},
                                  {targets: 6, visible: false},
                                  {targets: 7, visible: false},
                                  {targets: 8, visible: false},
                    ],
                    "destroy": true,
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })
        }

    /***********************************************************************
     * Llenar la tabla con lsita de chequeo - al presional el boton BUSCAR
     **********************************************************************/    
    function fillTablePlanillas(idPlanilla){
            table = $('#example2').DataTable({
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
                        "data": {planilla_id: idPlanilla},
                        "url": "{{ URL::to('/show-evento-adverso') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                },
                    "columns": [
                        {"data": "id"},
                        {"data": "fecha"},
                        {"data": "hora"},
                        {"data": "medio_informacion"}, 
                        {"data": "descripcion"},
                        {"data": "empleado_id"},
                        {"data": "personalexterno_id"},
	                    {"data": "entidadremitente_id"},
	                    {"data": "acompanante_id"},                                            
                     ],
                     columnDefs: [
                                  {targets: 4, visible: false},
                                  {targets: 5, visible: false},
                                  {targets: 6, visible: false},
                                  {targets: 7, visible: false},
                                  {targets: 8, visible: false},
                    ],
                    "destroy": true,
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })
   $('#example2 tbody').on('click', 'tr', function () {
        var dataTemp = table.row( this ).data();
        let funcEvento = new EventoAdverso();
        funcEvento.captura_datos(dataTemp)
        document.querySelector('#btnSaveAdm').style.display = "inline"
        document.querySelector('#btnCancelAdm').style.display = 'inline'
        document.querySelector('#btnDeleteAdm').style.display = 'inline'
        document.querySelector('#btnNewAdm').style.display = 'inline'
        return true;
   })
   /*****************************************************
	Elminar el registro que está en en el formulario
	********************************************************/
    let botonDelete = document.getElementById("btnDeleteAdm");
			botonDelete.addEventListener('click', () => {
                let funcEvento2 = new EventoAdverso();
                Swal.fire({
                title: 'Se ANULARÁ EL EVENTO QUE SE MUESTRA EN EL FORMULARIO, ¿Está seguro de Anularlo?',
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
                            await axios.post("{{URL::to('/destroy-evento')}}",{
                                data: {
                                    id:  document.getElementsByName('idEvento')[0].value
                                }                
                            }).then((response) => {
                                 console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                        funcEvento2.clear_element(true)  
                                        document.querySelector('#btnCancelAdm').style.display = 'none'
                                        let planiId3 = document.getElementsByName('datosbasicos_id')[0].value 
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'Se ANULO el Evento con exito',
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
            return true						
                
        })
   }
</script>


