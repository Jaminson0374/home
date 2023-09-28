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
            <div class="card border-2 bg-primary text-dark">
                {{-- <div class="card-body text-dark tarjeta_body"> --}}
                    <form role="form" name="formAsignaMedicamento" id="formAsignaMedicamento" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtobasicoMed as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-success">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de Medicamentos TEMPORALES
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
                                    {{-- <input type="hidden" id="total" name="userf"> --}}

                                    <input type="hidden" name="accionBotones" accion="Guardar" id="accionBotones">
                                    <input type="hidden" name="presBtnNewAdm" id="presBtnNewAdm" value="N">
 
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 border border-4">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body"> --}}
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-12">
                                                        <label for="">Fecha Admin:</label>
                                                        <input type="date" class="form-control text" name="fecha_ingerir"
                                                            id="fecha_ingerir"  focusNext tabindex="5" 
                                                            title="fecha en la que inicia el tratamiento">
                                                    </div> 
                                                    <div class="col-12 col-lg-3 col-md-5 col-sm-12 border border-primary pb-2">
                                                        <label class="">Cuidador</label>
                                                        <select class="form-control select2 select2-danger"
                                                            data-dropdown-css-class="select2-danger" style="width: 100%;"
                                                            name="empleado_id" id="empleado_id">
                                                            <option selected disable value=" ">Seleciona cuidador</option>
                                                            @foreach ($empleadosAdmMed as $trabajador)
                                                                <option value={{ $trabajador->id }}>{{ $trabajador->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-lg-3 col-sm-12 col-md-4">
                                                        <label for="">DX</label>  
                                                        <textarea type="text" class="form-control text text" rows="1" id="dx" name="dx" title="" focusNext tabindex = "4" disabled = "true" >{{$datosRow->diagnostico}}</textarea>                                                                                                           
                                                    </div>
                                                    {{-- <div class="row">--}}
                                                        <div class="col-lg-2 col-sm-12 col-md-6">  
                                                            <label for="">Desde</label>
                                                            <input type="date" class="form-control text " disabled name="fecha_inicio"
                                                            id="fecha_inicio"  focusNext tabindex="3" 
                                                            title="fecha en la que inicia el tratamiento">
                                                        </div>
                                                        <div class="col-lg-2 col-sm-12 col-md-6">                                                        
                                                            <label for="">Hasta</label>
                                                            <input type="date" class="form-control text " disabled name="fecha_fin"
                                                            id="fecha_fin"  focusNext tabindex="4" 
                                                            title="fecha en la que termina el tratamiento">
                                                        </div>                                                        
                                                    {{-- </div>   --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 fechaletras">
                                        <h3 class="card-title float-right  bg bg-success text-center" id="fechaLetras" style="font-weight: 900; font-size: 1.5em;">fecha</h3>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 ">  
                                        <div class="card card-warning card-outline">
                                            <div class="col-lg-12 col-sm-12 col-md-12 bg-info"> 
                                                {{-- <label class="bg bg-success text-center" id="bgtext"><h3>Seleccione la fecha de administración de medicamentos</h3></label>  --}}
                                                <table id="example2" class="table table-bordered table-striped table-hover tbl-buys" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" class="" id="todos"></th>
                                                            <th>Medicamento</th>
                                                            <th>Hora</th>
                                                            <th>Dosis</th>
                                                            <th>U. Medidad</th>
                                                            <th>Viad Admin</th>
                                                            <th>id</th>
                                                            <th>idAsigna</th>
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
                                                    {{-- <div class="card-body">    --}}
                                                        <div class="row">   
                                                            <div class="col-lg-12 col-sm-12 col-md-12 border">
                                                                <label for="">Observaciones:</label>
                                                                <textarea rows="1" class="form-control text" name="indicaciones"
                                                                    id="indicaciones"  focusNext tabindex="15" maxlength="245"
                                                                    title="Describa las indicaciones pertinentes a la administración del medicamento">
                                                                </textarea>
                                                            </div>
                                                        </div> 
                                                    {{-- </div> <!--card-body--> --}}
                                                </div> <!--card card-primary-->
                                            </div>  
                                            <div class="" id="resp" name='resp'></div>                                                                                 
                                        </div>
                            </div>                                                                                                    
                                        
                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/controles_medicos/administra_medicamentos/asignar_medicamento.js') }}"></script>
                                <script src="{{ asset('../resources/js/funciones.js') }}"></script>
                            </body>
                            <footer>
                                <div class="row"> 
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                <div class="card-body">
                                                        <div class="form-group">
                                                            {{-- <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                focusNext tabindex="19" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                <i class="fa fa-save fa-lg" style="color:hsl(0, 0%, 100%);"></i> Guardar
                                                            </button> --}}
                                                                 <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                    focusNext tabindex="19" id="enviar" accionBtn="Guardar"name="enviar>
                                                                    <i class="fa fa-save fa-lg" style="color:hsl(0, 0%, 100%);"></i> Guardar
                                                                </button>                                                            
                                                            
                                                            <button type="button" class="btn btn-primary form-group btnSearchAdm btn-lg" title="Permite localizar un tratamiento, para consultar, modificar o agregar una administracion de una dosis del medicamento"
                                                                id="btnSearchAdm" name="btnSearchAdm" focusNext tabindex="20"><i
                                                                    class="fa fa-search-location fa-lg"></i>
                                                            Buscar Tratamiento
                                                            </button>

                                                            <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                                                <a href="{{ URL::to('/admin_med_tempo') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                                focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                style="color:#f30b0b;"></i> Salir</a>    
                                                        </div>
                                                </div>  
                                            </div>
                                    </div>
                                </div>
                            </footer>
                            <div class="col-lg-8 col-sm-12 col-md-8 p-0 m-0">
                                {{-- tabla 2 --}}
                            </div>                            
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
 
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     window.addEventListener('load', () => {
            var fechar = document.getElementById('fecha_ingerir')
           
            fechar.addEventListener("change", ()=>{
                funcAsigMed.fechaletras()

                //let bgtext = document.getElementById('gbtext').innerHTML = 'Marque los Medicamentos que le suministró al uausuario en la fecha especificada'
                    var fechaingerir = document.getElementsByName('fecha_ingerir')[0].value  
                    fillTableInterna()
            })
                
        let formEvolB = document.getElementById('formAsignaMedicamento')

        document.getElementById('btnCancelAdm').disabled = true;
        funcAsigMed = new AsigMedicamento(); // 

        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchAdm = document.getElementById('btnSearchAdm');
        })                    

    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
 
            let formAnula = document.getElementById('formAsignaMedicamento')
			let botonCancel = document.getElementById("btnCancelAdm");
            
            botonCancel.addEventListener('click', () => {
                document.getElementById('btnCancelAdm').disabled = true;
                botonCancel.disabled = true;
                // let texto4 = document.getElementById('textB')
                // texto4.innerHTML = 'CONTROL DE ADMINISTRACION DE MEDICAMENTOS'                

				funcAsigMed.accionSaveNew()
				// formAnula.reset()
				return true
			})
    
			return true
    })		
    
    function nobackbutton()
    {
            window.addEventListener('load', ()=>{
                let vlrNewButton2 = document.getElementsByName('presBtnNewAdm')[0].value
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
            let vlrNewButton = document.getElementsByName('presBtnNewAdm')[0].value;
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

  /*******************************************************
     * Llenar la tabla del de las asignaciones de medicamentos
     * *****************************************************/  
    //  .substring(0, 8)  
    function fillTableInterna(){
        var checkCol = 0;         //checkbox column
         var idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
         var fechaingerir = document.getElementsByName('fecha_ingerir')[0].value 
         $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
            }); 
                var $tablaMed = $('#example2')
                var tablaMed = $tablaMed.DataTable({
                    order: false,
                "ajax":{
                    type: "POST",
                    dataType: "JSON",
                    headers: {'X-CSRF-TOKEN': $('meta[nam="csrf-token"]').attr('content')},
                    data: {dato_id: idasigmedic,fecha_ingerir: fechaingerir},
                    url: "{{ URL::to('/show-asig-med_tempo') }}",
                    "dataSrc": ""
                },
                    
                    "columns":[  
                        {"data": "ok"},        
                        {"data": "medicamento",orderin: false},
                        {"data": "hora",orderin: false},
                        {"data": "dosis"},
                        {"data": "medida"},
                        {"data": "via_admin"},
                        {"data": "id"},
                        {"data": "asignamed_id"},
                        
                    ],
                    columnDefs:[
                        {
                          targets: [0],
                          orderable: false,
                          render: function (data, type, row) {
                              if (type === 'display') {
                                return '<input type="checkbox" ' + ((row.ok == '1') ? 'checked' : '') + ' id="input' + row.id + '" class="filter-ck"/>';
                              }
                              return data;
                          } 
                      }
                    //   {targets: 6, visible: false},
                    

                            // {targets: [checkCol], 
                            // render: function ( data, type, row ) {
                            //     if ( type === 'display' ) {             //if column data is 1 then set attr to checked, use row id as input id (plus prefix)
                            //          return '<input type="checkbox" ' + ((row.ok == 'true') ? 'checked' : '') + ' id="input' + row.id + '" class="filter-ck" />';
                            //      }
                            //         return data;
                            //     },
                            //     className: "dt-body-center"
                            //     },
                            //     {targets: 0, className: "dt-body-center"},
                            ],
                             "destroy": true,
                            "language":{"url": "../../resources/js/espanol.json"},
                             order: [[6, 'asc']],
        })
        // al hacer clic en el checkbox del head
        $tablaMed.on('change', 'thead input', function(evt) {
        // Obtener todas las filas con la búsqueda aplicada
        var rows = tablaMed.rows({ 'search': 'applied' }).nodes();
        // Marcar/desmarcar casillas de verificación para todas las filas de la tabla
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
         });

         let formAsigMed = document.getElementById('formAsignaMedicamento')
            $('#example2 tbody').on('click', 'tr', function () {
                    let dataTemp = tablaMed.row( this ).data();
                    // let data = table.row($(this).parents("tr")).data();
                    console.log(dataTemp)
                    formAsigMed.reset()
                    document.getElementsByName('dx')[0].value = dataTemp.dx
                    document.getElementsByName('fecha_fin')[0].value = dataTemp.fecha_fin     
		            document.getElementsByName('fecha_inicio')[0].value = dataTemp.fecha_inicio                    
                    // funcAsigMed.asignaValorEdit(dataTemp)
            })               
    }

    window.addEventListener('load', () => {             
            
        $('#enviar').on('click', function(e) {
            e.preventDefault()
            
                const seleccion = [];
                let idasigmedic2 = document.getElementsByName('datosbasicos_id')[0].value 
                let fechaingerir2 = document.getElementsByName('fecha_ingerir')[0].value 
                let userIdM = document.getElementsByName('user_id')[0].value
                let empleado_id = document.getElementsByName('empleado_id')[0].value

                // con este se llena el array solo con los checkboz activos
            // $("#tablaAsignados tr td input[type='checkbox']:checked").each(function(){

                //Recorro la tabla 
            $("#example2 tr td input[type='checkbox']").each(function(){
                row = $(this).closest('tr');
                
                info = $(this).closest('tr').data();
                info.checked = this.checked
                // console.log(info.checked = this.checked)
                let _okk = 0;
                if( info.checked){
                    _okk = 1
                    // console.log('verdadero')
                }else{
                    _okk = 0
                    // console.log('falso')
                }
                // this.checked
                seleccion.push({
                    id : row.find('td').eq(6).text(),
                    datosbasicos_id : idasigmedic2,
                    fecha_ingerir : fechaingerir2,
                    ok : _okk,
                    user_id : userIdM,
                    asignamed_id : row.find('td').eq(7).text(),
                    empleado_id : empleado_id

                    // hora_ingerir : row.find('td:eq(2)').text() ,                    
         //             articulos_id : row.find('td:eq(5)').text(),
        //             ok : row.find('td:eq(6)').text()
        //             id : row.find('td').eq(0).text(),                
                });
        });
        // console.log(seleccion.length);
        let dtoEmpleado = document.getElementsByName('empleado_id')[0].value
        let fechaAdmin = document.getElementsByName('fecha_ingerir')[0].value
        if (seleccion.length == 0){
                alert('ERROR SELECCIONE LA FECHA DE ADMINISTRACIÓN DE MEDICAMENTOS')
                return false;
        }else if (dtoEmpleado == " "){
            alert('Debe seleccionar el cuidador que Admisnitró el medicamento')
            return false;
        }else if(fechaAdmin == ""){
            alert('Seleccione la fecha en la que está administrando los medicamentos')
            return false
        }else{
 
        //Ordeno el array por la key id de forma ascendente
        seleccion.sort( (a, b) => {
            if (a.id > b.id) {
                return  1;
            }
            if (a.id < b.id) {
                return  -1;
            }            
            if (a.id == b.id){
                return 0
            }            
        })
        // console.log(seleccion);
        const jamin = seleccion
       let regi_seleccion = jamin.sort(((a, b) => a.id - b.id));
       console.log(regi_seleccion)
        // return false
         $.ajax({
            url:'{{URL::to("/store-med_tempo")}}',
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            cache:false,
            type:'post',
            "dataType": 'json',
            data:{registros:regi_seleccion},
         }).then(function(data) {
            console.log(data);
            // $("p").text(data.title)
            if(data['message']=="Success"){
                Swal.fire({
                    icon: 'success',
                    title: 'PERFECTO',
                    text: 'Se guardó la lista de medicamento administrados al usuario',
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
        });
    }
    });
})
</script>


