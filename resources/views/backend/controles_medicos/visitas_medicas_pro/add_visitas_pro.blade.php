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
    .fechaletras {
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
                    <form role="form" name="formAsignaMedicamento" id="formAsignaMedicamento" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtobasicoVisitas as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">VISITAS MEDICAS PROFESIONALES
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
                                    <input type="hidden" name="horadbf" id="horadbf">

 
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 border border-4">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body"> --}}
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                                        <label for="">Fecha Visita</label>
                                                        <input type="date" class="form-control text" name="fecha"
                                                            id="fecha" focusNext tabindex="1" 
                                                            title="fecha en la que inicia el tratamiento">
                                                    </div> 
                                                    
                                                        <div class="col-lg-1 col-sm-12 col-md-1"> 
                                                            <label for="" class="col-form-label">HH</label> 
                                                            <input type="text" placeholder="HH" class="form-control text text-center focusNext p-0" maxlength="2" size ="2" id="horaTime"  pattern="[0-9]+" name="horaTime" tabindex="2">
                                                        </div>
                                                        
                                                        <div class="col-sm-12 col-md-1 col-lg-1">
                                                            <label for="" class="col-form-label">MM</label>
                                                            <input type="text" placeholder="MM" class="form-control text-center text p-0 focusNext" maxlength="2" size"2" id="minutoTime" name="minutoTime"  pattern="[0-9]+" tabindex="3">
                                                        </div>
                                                        <div class="col-sm-12 col-md-1 col-lg-1 ">
                                                            <label for="" class="col-form-label">AMPM</label>
                                                            <select class="form-control p-0 focusNext text-center" style="width: 100%;" tabindex="4" 
                                                                name="ampmTime" id="ampmTime" focusNext tabindex="5">
                                                                <option selected="selected" disable value=""></option>
                                                                <option value="AM">AM</option>
                                                                <option value="PM">PM</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-lg-3 col-md-3 col-sm-12 border border-primary pb-2">
                                                            <label class="">Profesional</label>
                                                            <select class="form-control select2 select2-danger" tabindex="6"
                                                                data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                                name="empleado_id" id="empleado_id">
                                                                <option selected disable value=" ">Seleciona el profesional</option>
                                                                @foreach ($empleadosVisitas as $trabajador)
                                                                    <option value={{ $trabajador->id }}>{{ $trabajador->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-lg-3 col-md-3 col-sm-12 borderpb-2">
                                                            <label class="">Cuidador</label>
                                                            <select class="form-control select2 select2-danger" tabindex="6"
                                                                data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                                name="cuidador_id" id="cuidador_id">
                                                                <option selected disable value=" ">Seleciona cuidador</option>
                                                                @foreach ($empleadosVisitas as $trabajador)
                                                                    <option value={{ $trabajador->id }}>{{ $trabajador->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    <h3 id="message" style="font-weight: 900; font-size: 1em;" class="card-title bg bg-danger text-white message"></h3>                                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 fechaletras">
                                        <h3 class="card-title float-right  bg bg-warning text-center" id="fechaLetras" style="font-weight: 900; font-size: 1.5em;">fecha</h3>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 ">  
                                        <div class="card card-warning card-outline">
                                            <div class="col-lg-12 col-sm-12 col-md-12 bg-primary text-white"> 
                                                {{-- <label class="bg bg-success text-center" id="bgtext"><h3>Seleccione la fecha de administración de medicamentos</h3></label>  --}}
                                                <table id="example2" class="table table-bordered table-striped table-hover font-weight-bold" style="width:100%">
                                                    <thead class="bg-warning">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Fecha</th>
                                                            <th>Hora</th>
                                                            <th>Glucometria</th>
                                                            <th>Cuidador</th>
                                                            <th>Acción</th>
                                                        </tr>                                                            
                                                    </thead>
                                                    <tbody id="bodyTablaAsig">

                                                    </tbody>
                                                 </table>                                                            
                                            </div>
                                        </div>
                                    </div> 
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                           
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="card card-primary card-outline">
                                                        <div class="row">   
                                                            <div class="col-lg-12 col-sm-12 col-md-12 border">
                                                                <label for="">Observaciones generales:</label>
                                                                <textarea rows="1" class="form-control text" name="observaciones"
                                                                    id="observaciones"  focusNext tabindex="7" maxlength="245"
                                                                    title="Describa las observacionea necesarias">
                                                                </textarea>
                                                            </div>
                                                        </div> 
                                                </div> <!--card card-primary-->
                                            </div>  
                                            <div class="" id="resp" name='resp'></div>                                                                                 
                                        </div>
                            </div>                                                                                                    
                                        
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/visitas_medicas_pro/visitas_medicas.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                            </body>
                            <footer>
                                <div class="row"> 
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                 <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                    focusNext tabindex="8" id="enviar" accionBtn="Guardar"name="enviar>
                                                                    <i class="fa fa-save fa-lg" style="color:hsl(0, 0%, 100%);"></i> Guardar
                                                                </button>                                                            
                                                            
                                                                <a href="{{ URL::to('/admin_visitas_pro') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                                focusNext tabindex="7" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                style="color:#f30b0b;"></i> Salir</a>    
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

{{-- <script src="{{ asset('../resources/js/datatable.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>      --}}


<script>
    window.addEventListener('load', () => {
        let funcActi = new CtrlGlucometria()
        funcActi.horaminutos()
            fillTableInterna()
            /*GUARDA EL ITEN EN LA TABLA*/
            $('#enviar').on('click', function(e) {
                e.preventDefault()
                    funcAsigMed.horaText()
                    const seleccion     = [];
                    let _idGlu          = document.getElementsByName('datosbasicos_id')[0].value 
                    let _fechaGlu       = document.getElementsByName('fecha')[0].value 
                    let _userIdM        = document.getElementsByName('user_id')[0].value
                    let _empleado_id    = document.getElementsByName('empleado_id')[0].value
                    let _glucometria    = document.getElementsByName('glucometria')[0].value
                    let _hora           = document.getElementsByName('horadbf')[0].value
            // console.log(seleccion);
            $.ajax({
                url:'{{URL::to("/store-ctrglucometria")}}',
                "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                cache:false,
                type:'post',
                "dataType": 'json',
                data:{  
                        datosbasicos_id : _idGlu,
                        fecha : _fechaGlu,
                        user_id : _userIdM,
                        empleado_id : _empleado_id,
                        glucometria : _glucometria,
                        hora : _hora                
                    },
            }).then(function(data) {
                fillTableInterna()                
                if(data['message']=="Success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'PERFECTO',
                        text: 'Se guardó el Ctrl de glucometria',
                        footer: ''
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error interno',
                        text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                        '  ' + error,
                        footer: ''
                    })
                }            
            })
        })
  /*****************************************************
	                Anular Registro
	********************************************************/
    let botonAnula = document.getElementById("btnDeleteAdm");
    $('#example2').on("click", "button.btnCaptura", function () {
                let data = table.row($(this).parents("tr")).data();
                // console.log(data)
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
					const anulaReg = async () => {  
						await axios.post(
							"{{ URL::To('/destroy-ctrglucometria') }}", {
                                data: {dato_id: data.id}
							}).then((response) => {
					
                                if(response.data['message'] == "Success"){  
                                    fillTableInterna()
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

        return true   
        })        
        
    })
 /*******************************************************
     * Llenar la tabla las glucometria del usuario seleccionado
     * *****************************************************/  
    //  .substring(0, 8)  
    function fillTableInterna(){
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value; 
            table = $('#example2').DataTable({
                // fixedHeader : 'true',
                    scrollY: '400px',
                    // scrollx: 'false',
                    // responsive: 'true',
                    destroy: 'true',
                    // autoWidth: 'false',
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {datosbasicos_id: idasigmedic},
                        "url": "{{ URL::to('/show-ctrglucometria') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },     
                    "columns": [
                        {"data": "id"},
                        {"data": "fecha"},
                        {"data": "hora"},
                        {"data": "glucometria"},
                        {"data": "cuidador"},
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
                                        <button type='button' id='btnCaptura' class='btnCaptura btn btn-warning btn-md' title="Eliminar dia de la planilla"><i class="fa fa-trash"><i></button>
                                    `
                                return botones;
                                // style="color:#f30b0b;"
                            }
                        }
                    ],
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })
    }
  

 
</script>


