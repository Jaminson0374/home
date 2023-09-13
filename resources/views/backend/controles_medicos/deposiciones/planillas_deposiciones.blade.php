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
                    <form role="form" name="formPlanillas" id="formPlanillas" action="">
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
                                                        <div class="col-lg-6 col-sm-12 col-md-6">                                                        
                                                            <label for="">AÑO:</label>
                                                            <input type="number" class="form-control text" name="ano"
                                                                id="ano"  focusNext tabindex="2" min="0"
                                                                title="Año de control deposiciones">
                                                        </div>

                                                        <div class="col-lg-6 col-sm-12 col-md-6">                                                        
                                                            <label for="">Mes</label>
                                                            <select class="select2 form-control text"
                                                                name="mes" id="mes" focusNext tabindex="1">
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
                                        </div>
                                    </div> 
                                        <div class="col-lg-8 col-sm-12 col-md-8 ">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="card card-warning card-outline">
                                                        <div class="col-lg-12 col-sm-12 col-md-12 bg bg-warning"> 
                                                            <table id="example2" class="table table-bordered table-striped table-hover font-weight-bold bg-success" style="width: 100%">
                                                                <thead class="bg-dark text--white">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Año</th>
                                                                        <th>Mes</th>
                                                                        <th>Fecha Creación</th>
                                                                        <th>Planilla #</th>
                                                                        <th>Acción</th>
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
                                <div class="row"> 
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body"> --}}
                                                        <div class="form-group">
                                                            <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                focusNext tabindex="19" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar la Planilla
                                                            </button>
                                                                <a href="{{ URL::to('/index_admin_deposiciones') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                                    focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                    style="color:#f30b0b;"></i> Salir</a>    
                                                        </div>
                                                {{-- </div>   --}}
                                            </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>

    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/

            let nDocumento = document.getElementById("num_documento");
     window.addEventListener('load', () => { 
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


        })                  

       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {  
 
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formPlanillas');

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
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'ERROR INTERNO',
                                        text: 'Por favor renicie la aplicación, si el problema persiste, comuniquese con su asesor',
                                        footer: ''
                                    })                                    
                                }
                            })
                            
                    }
                    desposicionesPlanilla()
                })
                return true
        })
  /*******************************************************
     * Llenar la tabla del de las asignaciones de medicamentos
     * *****************************************************/    
    function fillTablePlanillas(){
        
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
        
                table = $('#example2').DataTable({
                    scrollY: '450px',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {okFalse: "01",datosbasicos_id: idasigmedic},
                        "url": "{{ URL::to('/buscar_planillas') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "id"},
                        {"data": "ano"},
                        {"data": "mes_letra"},
                        {"data": "created_at"},
                        {"data": "useranomes"}
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
 

        window.addEventListener('load', () => { 
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
</script>


