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
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 8px 10px; /* e.g. change 8x to 4px here */
    }    
</style>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="content-wrapper jaminson">
        <section class="content">
            <div class="card border-2">
                {{-- <div class="card-body text-dark tarjeta_body"> --}}
                    <form role="form" name="formVisitaPro" id="formVisitaPro" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtoBasicoProgTerapia as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">SESIONES DE TERAPIAS Y/O ACTIVIDADES
                                        </h3>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                        USUARIO--> {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                        </h3>
                                    </div>
                                </div>
                                    <input type="hidden" id="datosbasicos_id" name="datosbasicos_id" value={{$datosRow->id}}>

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 border border-4">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 col-md-4 col-sm-12 border border-primary pb-2">
                                                        <label class="">Proceso/actividad</label>
                                                        <select class="form-control select2 select2-danger" tabindex="1"
                                                            data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                            name="proceso_medico_id" id="proceso_medico_id" title="Seleccione el tipo de terapia o actividad">
                                                            <option selected disable value="">Seleciona el proceso</option>
                                                            @foreach ($procesosMeidicos as $proMed)
                                                                <option value={{ $proMed->id }}>{{ $proMed->descripcion }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-12 border border-primary">
                                                            <label for="">Fecha inicia</label>
                                                            <input type="date" class="form-control text" name="fecha_ini"
                                                                id="fecha_ini" focusNext tabindex="2" 
                                                                title="fecha en la que inicia el tratamiento">
                                                        </div> 
                                                        <div class="col-lg-3 col-md-3 col-sm-12 border border-primary">
                                                            <label for="">Fecha final</label>
                                                            <input type="date" class="form-control text" name="fecha_fin"
                                                                id="fecha_fin" focusNext tabindex="3" 
                                                                title="fecha en la que inicia el tratamiento">
                                                        </div>  

                                                        <div class="col-12 col-lg-2 col-md-2 col-sm-12">
                                                            <label for="" class="">#Sesiones</label>
                                                            <input type="text" class="form-control text focusNext"  style="background-color: #ffffff" 
                                                                name="num_sesiones" id="num_sesiones"
                                                                tabindex="4" disabled>
                                                        </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 ">  
                                        <div class="card card-warning card-outline">
                                            <div class="col-lg-12 col-sm-12 col-md-12 bg-primary text-white"> 
                                                <table id="example2" class="table table-bordered table-striped table-hover font-weight-bold" style="width:100%">
                                                    <thead class="bg-warning">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Terapia/Actividad</th>
                                                            <th>Fecha Ini aaaa/mm/dd</th>
                                                            <th>Fecha Final</th>
                                                            <th># Sesiones</th>
                                                            <th>Acción</th>
                                                        </tr>                                                            
                                                    </thead>
                                                    <tbody id="bodyTablaAsig">

                                                    </tbody>
                                                 </table>                                                            
                                            </div>
                                        </div>
                                    </div> 
                             </div>                                                                                                    
                                        
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/seguimiento_terapia/segui_terapia.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                                <script src="{{ asset('../resources/js/enter_form.js') }}"></script>
                            </body>
                            <footer>
                                <div class="row"> 
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                 <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                    focusNext tabindex="8" id="enviar" accionBtn="Guardar"name="enviar>
                                                                    <i class="fa fa-save fa-lg" style="color:hsl(0, 0%, 100%);"></i> Guardar
                                                                </button>                                                            
                                                            
                                                                <a href="{{ URL::to('/index-seguimto-terapia') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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
<script>

    window.addEventListener('load', () => {
        let fini1 = document.querySelector('#fecha_ini')
        let ffin1 = document.querySelector('#fecha_fin')
                    
        fini1.addEventListener('change',(event)=>{
            let ffin2 = document.getElementsByName('fecha_fin')[0].value
            if(ffin2 ===""){
                console.log('haminson fin'+ffin2)
            }else{
                let fecha2 = new Date(document.getElementsByName('fecha_fin')[0].value).getTime();
                let fecha1 = new Date(document.getElementsByName('fecha_ini')[0].value).getTime();
                let numdias2 = fecha2-fecha1
                console.log(numdias2/(1000*60*60*24) );
                document.getElementsByName('num_sesiones')[0].value =  numdias2/(1000*60*60*24) 
            }
                      
        })
        ffin1.addEventListener('change',(event)=>{
            let fini2 = document.getElementsByName('fecha_ini')[0].value
            if(fini2 ===""){
                // console.log('jaminson ini'+fini2)
            }else{
                let fecha3 = new Date(document.getElementsByName('fecha_fin')[0].value).getTime();
                let fecha2 = new Date(document.getElementsByName('fecha_ini')[0].value).getTime();
                let numdias1 = fecha3-fecha2
                // console.log(numdias1/(1000*60*60*24) );
                document.getElementsByName('num_sesiones')[0].value = numdias1/(1000*60*60*24)         
            }
        })


        let funcActi = new SeguiTerapia()
 
            fillTableInterna()
            /*GUARDA EL ITEN EN LA TABLA*/
            $('#enviar').on('click', function(e) {
                e.preventDefault()
                    let _vacio = funcActi.validarCampos()
                if (_vacio === " "){
                    const seleccion     = [];
                    let _procesoMedTerapia      = document.getElementsByName('proceso_medico_id')[0].value 
                    let _idCliTerapia           = document.getElementsByName('datosbasicos_id')[0].value 
                    let _fechaIniTerapia        = document.getElementsByName('fecha_ini')[0].value 
                    let _fechaFinTerapia        = document.getElementsByName('fecha_fin')[0].value 
                    let _NumSesionTerapia       = document.getElementsByName('num_sesiones')[0].value
                    $.ajax({
                        url:'{{URL::to("/store-terapia")}}',
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache:false,
                        type:'post',
                        "dataType": 'json',
                        data:{  
                                proceso_medico_id: _procesoMedTerapia,
                                datosbasicos_id : _idCliTerapia,
                                fecha_ini : _fechaIniTerapia,
                                fecha_fin : _fechaFinTerapia,
                                num_sesiones:  _NumSesionTerapia 
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
                    }else{
                        Swal.fire({
                        icon: 'error',
                        title: 'El Formulario Tiene Datos Incompletos *',
                        text: _vacio,
                        footer: ''
                    })
                    }
        })

       return true
    })
 /*******************************************************
     * Llenar la tabla las glucometria del usuario seleccionado
     * *****************************************************/  
    function fillTableInterna(){
        let idasigmedic = document.getElementsByName('datosbasicos_id')[0].value
            table = $('#example2').DataTable({
                    "paging": true,
                    "ordering": true,
                    "destroy": true,
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {datosbasicos_id: idasigmedic},
                        "url": "{{ URL::to('/show-terapia') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },     
                    "columns": [
                        {"data": "id"},
                        {"data": "actividad_terapia"},
                        {"data": "fecha_ini"},
                        {"data": "fecha_fin"},
                        {"data": "num_sesiones"},
                    ],
                     columnDefs: [
                        {
                            targets: 4,
                            visible: true,

                        },                            
                        {
                            targets: 5,
                            orderable: false,
                            data: null,
                            render: function(data, type, row, meta) {
                                let fila = meta.row;
                                let botones =
                                    `
                                        <button type='button' id='btnCaptura' class='btnCaptura btn-md fa fa-trash' title="Eliminar programación Actividad y/o Terapia"></button>
                                    `
                                return botones;
                                // style="color:#f30b0b;"
                            }
                        }
                    ],
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })

  /*****************************************************
	                Anular Registro
	********************************************************/
    let botonAnula = document.getElementById("btnDeleteAdm");
    $('#example2').on("click", "button.btnCaptura", function () {
                let data = table.row($(this).parents("tr")).data();
			/******************************
			 ELIMINAR REGISTRO 
			 ******************************/
             Swal.fire({
			 title: 'Se ANULARÁ la programación seleccionada, Está seguro de Anularla?',
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
							"{{ URL::To('/destroy-terapia') }}", {
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
    }

</script>


