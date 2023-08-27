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
                    <form role="form" name="formAsignaMedicamento" id="formAsignaMedicamento" action="">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($dtobasicoMed as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1.5em;" class="card-title">Administracion de Medicamentos
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
 
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 border border-4">
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body"> --}}
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-4 col-sm-6">
                                                        <label for="">Fecha en la que se administran los medicamentos:</label>
                                                        <input type="date" class="form-control text" name="fecha_ingerir"
                                                            id="fecha_ingerir"  focusNext tabindex="5" 
                                                            title="fecha en la que inicia el tratamiento">
                                                    </div>                                                                 
                                                    <div class="col-lg-8 col-sm-12 col-md-8">
                                                        <label for="">Diagnóstico</label>  
                                                        <textarea type="text" class="form-control text text" rows="1" id="diagnostico" name="diagnostico" title="Problema o diagnóstico con el que entra el paciente a la fundación" focusNext tabindex = "4" disabled = "true" >{{$datosRow->diagnostico}}</textarea>                                                                                                           
                                                    </div>
                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 ">  
                                        <div class="card card-warning card-outline">
                                            <div class="col-lg-12 col-sm-12 col-md-12 bg-primary"> 
                                                <label class="bg bg-success text-center" for="">MEDICAMENTOS QUE SE ADMINISTRARON EN LA FECHA</label> 
                                                <table id="tablaAsignados" class="table table-bordered table-striped table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Medicamento</th>
                                                            <th>Hora</th>
                                                            <th>Fecha</th>
                                                            <th>Id Us</th>
                                                            <th>Id Medi</th>
                                                            <th>OK</th>
                                                        </tr>                                                            
                                                    </thead>
                                                    <tbody id="bodyTablaAsig">
                
                                                    </tbody>
                                                 </table>                                                            
                                            </div>
                                        </div>
                                    </div> 
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="col-lg-12 col-sm-12 col-md-12 butonAll processAll">
                                                <button type="button" class="btn btn-primary form-group btn-lg" title="Genera uatomáticamente todas administraciones de de medicamentos permanentes de la fecha especificada"
                                                id="processAll" name="processAll" focusNext tabindex="20"><i class="fa fa-check fa-lg" style="color:#fffefee0;"></i>  
                                                    Procesar todos ==>
                                            </button>                 
                                            </div>                               
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
                                                                    <i class="fa fa-save fa-lg" style="color:hsl(0, 0%, 100%);"></i> Enviar
                                                                </button>                                                            
                                                            
                                                            <button type="button" class="btn btn-primary form-group btnSearchAdm btn-lg" title="Permite localizar un tratamiento, para consultar, modificar o agregar una administracion de una dosis del medicamento"
                                                                id="btnSearchAdm" name="btnSearchAdm" focusNext tabindex="20"><i
                                                                    class="fa fa-search-location fa-lg"></i>
                                                            Buscar Tratamiento
                                                            </button>

                                                            <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                                                <a href="{{ URL::to('/admin_medicamento_user') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
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

<script src="{{ asset('../resources/js/datatable.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>      --}}


<script>
    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     window.addEventListener('load', () => {
        // document.querySelector('.horaMuestra').style.display = 'none'
		// document.querySelector('.horaDbf').style.display = 'inline'

        // window.addEventListener('load', () => {
            var fechar = document.getElementById('fecha_ingerir')
           
            fechar.addEventListener("change", ()=>{
                    alert('se cambio')
                    var fechaingerir = document.getElementsByName('fecha_ingerir')[0].value  
                    fillTableInterna()
            })
                
        // 
       
            
            
        // })
        let formEvolB = document.getElementById('formAsignaMedicamento')

        document.getElementById('btnCancelAdm').disabled = true;
        document.getElementById('btnSaveAdm').disabled = true;
        funcAsigMed = new AsigMedicamento(); // 


        // funcAsigMed.desactivaInput();  

        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchAdm = document.getElementById('btnSearchAdm');
        })                  
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
    window.addEventListener('load', () => {
                    
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formAsignaMedicamento');
        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
                    let validaOk ="Ok";

                    validaOk = funcAsigMed.validarCampos2()
                    var attrAccion2 = $("#accionBotones").attr("accion");
                    let data = new FormData(formEvolQ)
                    let valuesDat = [...data.entries()];
                    console.log(valuesDat);
                    // return false;
                if (validaOk === '') {
                    // console.log(values)                   
                    if (attrAccion2 === 'Guardar') {
                        const AdminMedicaUser = async () => {
                            await axios.post("{{URL::to('/store-asigna-medicamento')}}",data,{

                            }).then((resp) => {
                                // console.log(resp.data)
                                console.log(resp.data['message'])
                                if(resp.data['message']=="Success"){
                                    // document.getElementById('btnDeleteAdm').disabled = true;
                                    // document.getElementById('btnNewAdm').disabled = false;
                                    document.getElementById('btnCancelAdm').disabled = true;
                                    // document.getElementById('btnEditAdm').disabled = true;                                 
                                    document.getElementById('btnSearchAdm').disabled = false;
                                    document.getElementById('btnSaveAdm').disabled = true;
                                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");

                                    var btnGuardar10 = document.getElementById('btnSaveAdm');
                                    btnGuardar10.innerHTML = 'Guardar'
                                    funcAsigMed.desactivaInput();

                                    document.getElementById('textB').innerHTML = 'CONTROL DE ADMINISTRACION DE MEDICAMENTOS A USUARIOS'                                
                                    funcAsigMed.clearElements()	                                
                                    // formEvolQ.reset() 
                                    fillTableInterna()                     
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PERFECTO',
                                        text: 'El registro se GUARDÓ con exito',
                                        footer: ''
                                    })
                                }
                                // }else{
                                //     Swal.fire({
                                //         icon: 'error',
                                //         title: 'Error interno',
                                //         text: 'Por favor reinicie la apliación, si el problema continua comuniquese con su asesor' +
                                //             '  ',
                                //         footer: ''
                                //     })                                    
                                // }
                            })
                        }
                        AdminMedicaUser()
                    } else if (attrAccion2 === 'Actualizar'){ //Si se va a actualizar el registro
                        let idEvolMed = document.getElementsByName('idAsignaMedica')[0].value
                        const clienteCitaActualiza = async () => {  
                            await axios.post(
                                "{{ URL::to('/update-asig-medic') }}",
                                data, {

                                }).then((response) => {

                                console.log(response.data['message'])

                                // document.getElementById('btnDeleteAdm').disabled = true;
                                // document.getElementById('btnNewAdm').disabled = false;
                                document.getElementById('btnCancelAdm').disabled = true;
                                document.getElementById('btnSearchAdm').disabled = false;
                                document.getElementById('btnSaveAdm').disabled = true;

                                /*Cuando se busca un registro se cambial atributo del input hidden*/
                                let newNom88 = document.getElementById('accionBotones')
                                newNom88.setAttribute('accion', "Guardar");

                                var btnGuardar2 = document.getElementById('btnSaveAdm');
                                btnGuardar2.innerHTML = 'Guardar'
                                funcAsigMed.desactivaInput();

                                document.getElementById('textB').innerHTML = 'REQUISICION DE MEDICAMENTOS'                                
                                funcAsigMed.clearElements()	                                
                                formEvolQ.reset()
                                fillTableInterna()                                    
                                Swal.fire({
                                    icon: 'success',
                                    title: 'PERFECTO',
                                    text: 'El registro se ACTUALIZÓ con exito',
                                    footer: ''
                                })

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
                        clienteCitaActualiza()
                    }
                }else {
                    Swal.fire({
                        icon: 'error',
                        title: 'El Formulario Tiene Datos Incompletos *',
                        text: validaOk,
                        footer: ''
                    })
                }
                return true
        })

        // setInterval(function() { 
        //     let espanol = idioma()
        //     let table4 = $('#tablaClientesEvol').DataTable({
    
        //         })
                
        // table4.ajax.reload(function(){
        // $(".paginate_button > a").on("focus",function(){
        // $(this).blur();
        // });
        // }, false);
        // }, 10000);    
    
    
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
 
            let formAnula = document.getElementById('formAsignaMedicamento')
			let botonCancel = document.getElementById("btnCancelAdm");
            
            botonCancel.addEventListener('click', () => {

                document.getElementById('btnCancelAdm').disabled = true;
                document.getElementById('processAll').disabled = false;

                cambioTextBotton('btnSaveAdm', 'Actualizar', 'Guardar')
                // funcAsigMed.clearElements()	
                // funcAsigMed.desactivaInput();

				// document.getElementById('btnDeleteAdm').disabled = true;
                // document.getElementById('btnEditAdm').disabled = true;
                document.getElementById('btnSearchAdm').disabled = false;
                botonCancel.disabled = true;
                // document.getElementById('btnNewAdm').disabled = false;
                document.getElementById('btnSaveAdm').disabled = true; 
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
    function fillTableInterna(){
         var idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
         var fechaingerir = document.getElementsByName('fecha_ingerir')[0].value 
        // let btnSearchService = document.getElementById('btnSearchServicio');
        // function fillTableInterna(){  
            $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
            });
                var consulta = $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        headers: {'X-CSRF-TOKEN': $('meta[nam="csrf-token"]').attr('content')},
                        data: {dato_id: idasigmedic,fecha_ingerir: fechaingerir},
                        url: "{{ URL::to('/show-asig-medic') }}",
                        success:function(data){
                            console.log(data)
                        }
                })
    
    $('#processAll').on("click", function () {                
        consulta.done(function (data) {
            if (data.error !== undefined) {
                console.log('Ha ocurrido un error: ' + data.error);
                return false;
            } else {
                    $('#tablaAsignados').DataTable({
                    "lengthChange": false,
                    "destroy": true,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "paging": false,
                    "info": false,
                    }); 
                    let formAsigMed = document.getElementById('formAsignaMedicamento')
                    let tablaAsigDatos2 = document.querySelector('#bodyTablaAsig')
                    searching = false
                    tablaAsigDatos2.innerHTML="";

                    let id_clienteB = document.getElementsByName('datosbasicos_id')[0].value
                    let ok = "true";
     
                    document.getElementById('btnCancelAdm').disabled = false;
                    document.getElementById('processAll').disabled = true;
                    let fechaing2 = document.getElementsByName('fecha_ingerir')[0].value

                    // let data = table.row($(this).parents("tr")).data();

                    //llenar array 
                    let tabmd = data //table.rows().data()
                    let tablaAsig =[];
                    for(let i = 0; i< tabmd.length; i++){
                        var datoNew = tabmd[i]
                        //  console.log(datoNew)
                        tablaAsig.push(datoNew)
                    }
                    // console.log(tablaAsig)

                    let tablaAsigDatos = document.querySelector('#bodyTablaAsig')
                    tablaAsigDatos.innerHTML="";
                    for (let datoJson of tablaAsig){
                        let hora1 =datoJson.hora;
                            let hora =(hora1.substring(0, 8))
                            tablaAsigDatos.innerHTML+=`
                        <tr>
                            <td>${datoJson.id}</td>
                            <td>${datoJson.medicamento}</td>
                            <td>${hora}</td>
                            <td>${fechaing2}</td>                              
                            <td>${id_clienteB}</td>
                            <td>${datoJson.articulos_id}</td>
                            <td><input type="checkbox" class="custom-control custom-checkbox my-1 mr-sm-2" id="customControlInline" value="1" checked></td>
                        
                        </tr>`                      
                    }                
            }
                return true;
        });
            consulta.fail(function () {
            console.log('Ha habido un error contactando el servido de clientesr.');
            return false;
            });

    })
        
    }
        window.addEventListener('load', () => { 
 
            //      $('#tablaAsignados').DataTable({
            //         "lengthChange": false,
            //         "searching": true,
            //         "ordering": true,
            //         "info": true,
            //         "autoWidth": true,
            //         "responsive": true,
            //         "paging": false,
            //         "info": false,
            //     }); 
            // let formAsigMed = document.getElementById('formAsignaMedicamento')
            // let tablaAsigDatos2 = document.querySelector('#bodyTablaAsig')
            // searching = false
            //     tablaAsigDatos2.innerHTML="";

            //     let id_clienteB = document.getElementsByName('datosbasicos_id')[0].value
            //     let ok = "true";
            // $('#tablaAsigMedic').on("click", "button.btnCaptura", function () {
            //     let fechaing1 = document.getElementsByName('fecha_ingerir')[0].value
            //     document.getElementById('btnCancelAdm').disabled = true;
               
            //     let datoJson = table.row($(this).parents("tr")).data();
            //             tablaAsigDatos1.innerHTML+=`
            //           <tr>
            //             <td>${datoJson.id}</td>
            //             <td>${datoJson.medicamento}</td>
            //             <td>${datoJson.hora}</td>
            //             <td>${fechaing1}</td>                              
            //             <td>${id_clienteB}</td>
            //             <td>${datoJson.articulos_id}</td>
            //             <td><input type="checkbox" class="custom-control custom-checkbox my-1 mr-sm-2" id="customControlInline" checked></td>           
            //           </tr>`                      
            //  })

            // $('#processAll').on("click", function () {
            //     document.getElementById('btnCancelAdm').disabled = false;
            //     document.getElementById('processAll').disabled = true;
            //     let fechaing2 = document.getElementsByName('fecha_ingerir')[0].value

            //     let data = table.row($(this).parents("tr")).data();

            //     let tabmd = table.rows().data()
            //     let tablaAsig =[];
            //     for(let i = 0; i< tabmd.length; i++){
            //          var datoNew = tabmd[i]
            //         tablaAsig.push(datoNew)
            //     }

            //     let tablaAsigDatos = document.querySelector('#bodyTablaAsig')
            //     tablaAsigDatos.innerHTML="";
            //    for (let datoJson of tablaAsig){
            //     let hora1 =datoJson.hora;
            //             let hora =(hora1.substring(0, 8))
            //             tablaAsigDatos.innerHTML+=`
            //           <tr>
            //             <td>${datoJson.medicamento}</td>
            //             <td>${hora}</td>
            //             <td>${fechaing2}</td>                              
            //             <td>${id_clienteB}</td>
            //             <td>${datoJson.articulos_id}</td>
            //             <td><input type="checkbox" class="custom-control custom-checkbox my-1 mr-sm-2" id="customControlInline" value="1" checked></td>
                       
            //           </tr>`                      
            //    }                
 
            //  })             


    $('#enviar').on('click', function(e) {
        e.preventDefault()
        seleccion = [];
        $("#tablaAsignados tr td input[type='checkbox']:checked").each(function(){
            row = $(this).closest('tr');
            seleccion.push({
                id : row.find('td').eq(0).text(),
                medicamento : row.find('td').eq(1).text(),
                hora : row.find('td').eq(2).text(),
                fecha_ingerir : row.find('td').eq(3).text(),
                datosbasicos_id : row.find('td:eq(4)').text(),
                articulos_id : row.find('td:eq(5)').text(),
                ok : row.find('td:eq(6)').text()
            });
    });
    console.log(seleccion);
    
    // var filas = [];
    // $('#tablaAsignados tbody tr').each(function() {
    //   var medicamento = $(this).find('td').eq(0).text();
    //   var hora = $(this).find('td').eq(1).text();
    //   var fecha_ingerir = $(this).find('td').eq(2).text();
    //   var datosbasicos_id = $(this).find('td').eq(3).text();
    //   var articulos_id = $(this).find('td').eq(4).text();
    //   var ok = $(this).find('td').eq(5).text();

    //   var fila = {
    //     medicamento,
    //     hora,
    //     fecha_ingerir,
    //     datosbasicos_id,
    //     articulos_id,
    //     ok
    //   };
    //   filas.push(fila);
    // });
    // console.log(filas);

        $.ajax({
            url:'{{URL::to("/store-medicamentos_perm")}}',
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            cache:false,
            type:'post',
            "dataType": 'json',
            data:{registros:seleccion}
            // success:function(data){
            //     $('.resp_recetas').html(data.html3);
            // }
        });    
    });
})

function fillTableInterna2(){
         var idasigmedic = document.getElementsByName('datosbasicos_id')[0].value 
         
        // let btnSearchService = document.getElementById('btnSearchServicio');
        // function fillTableInterna(){  
 
                table = $('#tablaAsigMedic').DataTable({
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "paging": false,
                    "info": false,
                 "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {dato_id: idasigmedic, fecha_ingerir: fechaingerir},
                        "url": "{{ URL::to('/show-asig-medic') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                    },
                    "columns": [
                        {"data": "medicamento"},
                        {"data": "hora"},
                        {"data": "dosis"},
                        {"data": "medida"},
                        {"data": "via_admin"},
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
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                    
                }).draw()
                    
        }

</script>


