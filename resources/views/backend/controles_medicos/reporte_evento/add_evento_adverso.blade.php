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
                                @foreach($createEvento as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">EVENTO ADVERSO, SINTOMATOLOGÍA O MUERTE 
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
                                                    <label for="">Fecha:</label>
                                                    <input type="date" class="form-control m-0 p-0" name="fecha"
                                                        id="fecha" focusNext tabindex="1" 
                                                        title="Fecha de la sesión">
                                                </div>
                                                <div class="col-12 col-lg-6 col-sm-12 col-md-6">                                                        
                                                    <label for="">Hora:</label>
                                                    <input type="time" class="form-control m-0 p-0"  name="hora" id="hora"
                                                        title="Hora de el evento" focusNext tabindex="2">
                                                </div>                                                    
                                            </div>
                                                         <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <label for="">Entidad Remitenter</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="entidadremitente_id" id="entidadremitente_id" focusNext tabindex="3" title = "Seleccione la entidad que remite al usuario" >
                                                                    <option selected="selected" disable value="">Entidad</option>
                                                                    @foreach ($empresaRemitenteEvento as $entidadEvento)
                                                                        <option value={{$entidadEvento->id}}>{{$entidadEvento->nombre_eps}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->
                                                        <div class="row pb-2border">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <label for="">Profesional</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="personalexterno_id" id="personalexterno_id" focusNext tabindex="4" title = "Seleccione el profesional" >
                                                                    <option selected="selected" disable value="">Profesiona</option>
                                                                    @foreach ($personalExternoEvento as $extEvento)
                                                                        <option value={{$extEvento->id}}>{{$extEvento->nombre.' '.$extEvento->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                                </div>                                                               
                                                            </div> <!-- cierre de row -->    
 
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Cuidador</label>
                                                                    <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="empleado_id" id="empleado_id" focusNext tabindex="5" title = "Seleccione el cuidador" >
                                                                    <option selected="selected" disable value="">Seleciona cuidador</option>
                                                                    @foreach ($empleadosEventos as $cuidaEvento)
                                                                        <option value={{$cuidaEvento->id}}>{{$cuidaEvento->nombre.' '.$cuidaEvento->apellidos}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-5 col-md-12">
                                                                <label for="">Familiar</label>
                                                                <select class="select2 select2-danger"
                                                                    data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                    name="acompanante_id" id="acompanante_id" focusNext tabindex="6" title = "Seleccione familia y/o Acompañante" >
                                                                    <option selected="selected" disable value="">Familiar</option>
                                                                        @foreach ($acompananteEvento as $acompaEvento)
                                                                            <option value={{$acompaEvento->id}}>{{$acompaEvento->nombre.' '.$acompaEvento->apellidos}}
                                                                             </option>
                                                                        @endforeach
                                                                </select>                                                        
                                                            </div>                                                               
                                                        </div> <!-- cierre de row -->
                                                        <div class="row border">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">                                                        
                                                                <label for="">Novedad</label>
                                                                <textarea class="form-control text" name="descripcion" id="descripcion" cols="50" rows="2" tabindex="7"></textarea>   
                                                            </div>
                                                        </div> 
                                                        <div class="row boeder">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">                                                        
                                                                <label for="">Medio de la info</label>
                                                                <textarea class="form-control text" name="medio_informacion" id="medio_informacion" cols="50" rows="1" tabindex="8"></textarea>   
                                                            </div>
                                                        </div> 
                                                    {{-- </div>   --}}
                                                    <div class="col-sm-12 col-md-12 col-lg-12 border border-primary">
                                                        <label for="">Anexos</label>
                                                            <div class="card card-primary">
                                                                <input type="file" id="seleccionArchivos" class="btn btn-success" name="anexos"
                                                                    accept="image/*" tabindex="9">
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="row"> 
                                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <div class="card card-primary card-outline">
                                                                            <div class="form-group butonAll">
                                                                                <button type="button"
                                                                                    class="btn btn-primary form-group btnSearch btn-md m-1"
                                                                                    id="btnSearch" name="btnSearch" tabindex="10"><i
                                                                                    class="fa fa-search-location fa-lg" title="Buscar una planilla "></i>
                                                                                    <b>Nueva</b>
                                                                                </button>                                                                                                 
                                                                                <button  type="submit" class="btn btn-primary btn-md form-group m-1" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                                    focusNext tabindex="11" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                                    <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i>Guardar
                                                                                </button>
                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                                    focusNext tabindex="12"> <i class="fa fa-ban fa-lg"></i> Cancelar
                                                                                </button>                                                                               
                                                                                    <a href="{{ URL::to('/index-evento_adverso') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="13" id="btnExit"><i class="fa fa-arrow-right fa-lg"
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
                                                                        <th>Fecha</th>
                                                                        <th>Hora</th>
                                                                        <th>Profesional</th>
                                                                        <th>Novedad</th>
                                                                        <th><i class="fa fa-trash"><i></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="bodyTabla">
 
                                                                </tbody>
                                                             </table>                                                            
                                                        </div>
                                        </div>
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/reporte_evento/evento.js') }}"></script>
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
            let funEvento = new EventoAdverso();

       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formAddDiaPlanillas');

        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
            // let _horas = document.getElementsByName('horaTime')[0].value
		    // let _ampm = document.getElementsByName('ampmTime')[0].value
		    // let _minutos = document.getElementsByName('minutoTime')[0].value            
            // let _hora = funcSegui.horaText(_horas,_minutos,_ampm)
            // document.getElementsByName('horadbf')[0].value = _hora

        //    document.getElementsByName('fecha')[0].value
        //    document.getElementsByName('hora')[0].value
        //    document.getElementsByName('personalexterno_id')[0].value
        //    document.getElementsByName('entidadremitente_id')[0].value
        //    document.getElementsByName('acompanante_id')[0].value
        //    document.getElementsByName('emnpleado_id')[0].value
        //    document.getElementsByName('descripcion')[0].value
        //    document.getElementsByName('medio_informacion')[0].value
        //    document.getElementsByName('anexos')[0].value
        //    document.getElementsByName('datosbasicos_id')[0].value
        //    document.getElementsByName('user_id')[0].value
        //    document.getElementsByName('id')[0].value = "000"
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


