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
                                                    <div class="col-lg-4 col-sm-12 col-md-4">                                            
                                                        <label for="">Medicamento</label>
                                                        <select class="select2 select2-danger"
                                                            data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                            name="articulos_id" id="articulos_id" focusNext tabindex="1">
                                                            <option selected="selected" disable value=" ">Selecione medicameneto</option>
                                                                @foreach ($medicamentos as $medica)
                                                                    <option value={{$medica->id}}>{{$medica->descripcion}}
                                                                    </option>
                                                                @endforeach
                                                        </select>
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
                                    <div class="col-lg-4 col-sm-12 col-md-4 ">  
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body">    --}}
                                                    <div class="row">   
                                                        <div class="col-lg-6 col-sm-12 col-md-6">                                                        
                                                            <label for="">Fecha Inicio:</label>
                                                            <input type="date" class="form-control text" name="fecha_inicio"
                                                                id="fecha_inicio"  focusNext tabindex="5" 
                                                                title="fecha en la que inicia el tratamiento">
                                                        </div>
                                                        <div class="col-lg-6 col-sm-12 col-md-6"> 
                                                            <label for="" class="col-form-label">Hora</label>
                                                            <input type="time" class="form-control text" name="hora" max="24:00" min="01:00" step="1" id="hora"
                                                            style="height: 30px" title="Hora en la que se debe suministrar el medicamento" tabindex="6">
                                                        </div> 
                                                    </div> 
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body">    --}}
                                                    <div class="row">   
                                                        <div class="col-lg-3 col-sm-12 col-md-3">                                                        
                                                            <label for="">Dosis:</label>
                                                            <input type="text" class="form-control text p-0 text-center" name="dosis" id="dosis"
                                                            title="Cantidad de medicamento a suministrar" tabindex="7">
                                                        </div>        
                                                        <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                                                            <label for="">Uni. Med</label>
                                                            <select class="select2 select2-danger"6
                                                                data-dropdown-css-class="select2-primary" style="width: 100%;"
                                                                name="unimedida_id" id="unimedida_id" focusNext tabindex="8">
                                                                <option selected="selected" disable value=" ">Seleciona U. Med </option>
                                                                @foreach ($uniMedId as $unimedId)
                                                                <option value={{$unimedId->id}}>{{$unimedId->descripcion}}
                                                                </option>
                                                                @endforeach
                                                            </select>                                                        
                                                        </div> 
                                                    </div>
                                                {{-- </div>  --}}
                                            </div>
                                        </div>  

                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body">    --}}
                                                    <div class="row">   
                                                        <div class="col-lg-5 col-sm-12 col-md-5"> 
                                                            <label for="">Via Admin</label>
                                                            <select class="form-control tipoadmin_med_id" style="width: 100%;"
                                                                name="tipoadmin_med_id" id="tipoadmin_med_id" focusNext tabindex="9" title="Seleccione la via o forma de como se suministrará el medicamento">
                                                                <option selected="selected" disable value=" ">Seleciona Via</option>
                                                                    @foreach ($tipoViaAdmin as $tpoMedica)
                                                                        <option value={{$tpoMedica->id}}>{{$tpoMedica->descripcion}}
                                                                        </option>
                                                                    @endforeach
                                                            </select>                                                        
                                                        </div> 
                                                        <div class="col-lg-3 col-sm-12 col-md-3">
                                                            <label for="">Cada:</label>
                                                            <input type="text" class="form-control text p-0 text-center" name="pososlogia_t"
                                                            id="pososlogia_t"  focusNext tabindex="10" 
                                                            title="Intervalo de tiempo entre dosis">
                                                        </div>  
                                                        <div class="col-lg-4 col-sm-12 col-md-4 ">                                                     
                                                            <label for="">Hora/Día</label>
                                                            <select class="form-control" style="width: 100%;"
                                                                name="pososlogia_h_d" id="pososlogia_h_d" focusNext tabindex="11" title="Selecicones Horas o dias para el suministró del medicamento">
                                                                <option selected="selected" disable value=" ">Selecione</option>
                                                                <option value="Horas">Horas</option>
                                                                <option value="Dias">Dias</option>
                                                            </select> 
                                                        </div>                                                                                                               
                                                    </div> 
                                                {{-- </div>  --}}
                                            </div>
                                        </div>  
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                            <div class="card card-primary card-outline">
                                                {{-- <div class="card-body">    --}}
                                                    <div class="row">   
                                                        <div class="col-lg-12 col-sm-12 col-md-12 border">
                                                            <label for="">Indicaciones:</label>
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
                                        <div class="col-lg-8 col-sm-12 col-md-8 p-0 m-0">
                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                <div class="card card-warning card-outline">
                                                    {{-- <div class="card-body"> --}}
                                                        <div class="col-lg-12 col-sm-12 col-md-12 bg-success"> 
                                                            <table id="tablaAsigMedic" class="table table-bordered table-striped table-hover table-responsive">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Medicamento</th>
                                                                        <th>Hora</th>
                                                                        <th>Dosis</th>
                                                                        <th>Medida</th>
                                                                        <th>Via Admin</th>
                                                                        <th>Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="bodyTabla">
                            
                                                                </tbody>
                                                             </table>                                                            
                                                        </div>
                                                    {{-- </div>  --}}
                                                </div>
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
                                                            <button  type="button" class="btn btn-primary btn-lg form-group btnNewAdm" title="Permite administrar un nuevo medicamento al usuario"
                                                                focusNext tabindex="17" id="btnNewAdm" accionBtn="Nuevo" name="btnNewAdm">
                                                                <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i> Nuevo Medicamento
                                                            </button>
                                                            <button  type="button" class="btn btn-primary btn-lg form-group" title="Permite realizar modificaciones al registro que se encuentra actualmente en la venetana"
                                                                focusNext tabindex="18" id="btnEditAdm" accionBtn="Modificar" name="btnEditAdm">
                                                                <i class="fa fa-edit fa-lg" style="color:#fffefed8;"></i> Modificar
                                                            </button>                                        
                                                            <button  type="submit" class="btn btn-primary btn-lg form-group" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                focusNext tabindex="19" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i> Guardar
                                                            </button>
                                                            <button type="button" class="btn btn-primary form-group btnSearchAdm btn-lg" title="Permite localizar un tratamiento, para consultar, modificar o agregar una administracion de una dosis del medicamento"
                                                                id="btnSearchAdm" name="btnSearchAdm" focusNext tabindex="20"><i
                                                                    class="fa fa-search-location fa-lg"></i>
                                                            Buscar Tratamiento
                                                            </button>

                                                            <button type="button" class="btn btn-primary form-group btn-lg" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                focusNext tabindex="21"> <i class="fa fa-ban fa-lg"></i> Cancelar</button>

                                                            <button type="button" class="btn btn-primary form-group btn-lg" id="btnDeleteAdm" title="Anula el registro que esta en la ventana"
                                                                focusNext tabindex="22" disabled="true"><i class="fa fa-trash fa-lg"
                                                                    style="color:#f30b0b;"></i> Anular </button>

                                                                    <a href="{{ URL::to('/admin_medicamento_user') }}" class="btn btn-primary btn-lg float-right" title="Abandonar la ventana"
                                                                    focusNext tabindex="23" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                        style="color:#f30b0b;"></i> Salir</a>    
                                                        </div>
                                                </div>  
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

<script src="{{ asset('../resources/js/datatable.js') }}"></script>


<script>
    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     window.addEventListener('load', () => {
    
            fillTableInterna()
        let formEvolB = document.getElementById('formAsignaMedicamento')

        document.getElementById('btnCancelAdm').disabled = true;
        document.getElementById('btnSaveAdm').disabled = true;
        funcAsigMed = new AsigMedicamento(); // 


        funcAsigMed.desactivaInput();  
        document.getElementById('btnEditAdm').disabled = true;      

        let bodyTablaClientesEvol = document.getElementById("bodyTabla");
        let modalBuscarEvol = document.getElementById('modalBuscarEvol');
        let btnSearchAdm = document.getElementById('btnSearchAdm');
 
			/*****************************************************
				AL PRESIONAR EL BOTON MODIFICAR
			********************************************************/

            let formEvolB2 = document.getElementById('formAsignaMedicamento')
            let botonEdit = document.getElementById("btnEditAdm");
			botonEdit.addEventListener('click', () => {
                funcAsigMed.activaInput();                
                   // cambioTextBotton('btnSaveAdm', 'Guardar', 'Actualizar'); //si es igual aguardar coloquele actualizar

                var btnGuardar = document.getElementById('btnSaveAdm');
                btnGuardar.innerHTML = 'Actualizar'    
                funcAsigMed.accionUpdate()  //coloca en accion botones 'Actualizar'

                var texto = document.getElementById("textB")
                texto.innerHTML = 'EDITANDO REGISTRO DE CONTROL MEDICO'
                document.getElementsByName('presBtnNewAdm')[0].value="N"                
                document.getElementById('btnEditAdm').disabled = true;
                document.getElementById('btnNewAdm').disabled = true;                
				document.getElementById('btnDeleteAdm').disabled = true;
                document.getElementById('btnSearchAdm').disabled = true;
                botonEdit.disabled = true;
                document.getElementById('btnCancelAdm').disabled = false;
                document.getElementById('btnSaveAdm').disabled = false;
               
                document.getElementById('articulos_id').focus()
                var attrAccion4 = $("#accionBotones").attr("accion");
				return true
			})

			/*****************************************************
				Limpia los campos al presionar el boton nuevo
			********************************************************/
			let botonNew = document.getElementById("btnNewAdm");
			botonNew.addEventListener('click', () => {
                var attrAccion3 = $("#accionBotones").attr("accion");
                // alert('botonNew'+' '+attrAccion3)
                funcAsigMed.activaInput();                
				
                //cambioTextBotton('btnSaveAdm', 'Actualizar', 'Guardar')
                var btnGuardar = document.getElementById('btnSaveAdm');
                btnGuardar.innerHTML = 'Guardar'    
                document.getElementById('btnCancelAdm').disabled = false;
                document.getElementById('btnSaveAdm').disabled = false;                       
             
                funcAsigMed.clearElements()	//Limpia los elementos
				funcAsigMed.accionSaveNew() //Cambia el nombre a los bonotes
                
                let texto2 = document.getElementById('textB')
                texto2.innerHTML = 'NUEVA ADMINISTRACION DE MEDICAMENTO A USUARIO'

                document.getElementsByName('presBtnNewAdm')[0].value="S"                
                
				document.getElementById('btnDeleteAdm').disabled = true;
                document.getElementById('btnEditAdm').disabled = true;
                document.getElementById('btnNewAdm').disabled = true;
                document.getElementById('btnSearchAdm').disabled = true;
                botonNew.disabled = true;
 
                formEvolB2.reset()
                document.getElementById('articulos_id').focus()
                
				return true
			})
			return true
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
                                    document.getElementById('btnDeleteAdm').disabled = true;
                                    document.getElementById('btnNewAdm').disabled = false;
                                    document.getElementById('btnCancelAdm').disabled = true;
                                    document.getElementById('btnEditAdm').disabled = true;                                 
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

                                document.getElementById('btnDeleteAdm').disabled = true;
                                document.getElementById('btnNewAdm').disabled = false;
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
        //             responsive: true,
        //             scroll: true,
        //             scrollCollapse: true,
        //             scrollY: '400px',
        //             scrollx: true,
        //             "ajax": {
        //                 "url": "{{ URL::to('/buscar-CtrlMed') }}",
        //                 "dataSrc": ""
        //             },
        //             "columns": [{
        //                     "data": "id"
        //                 },
        //                 {
        //                     "data": "fecha"
        //                 },
        //                 {
        //                     "data": "hora"
        //                 },
        //                 {
        //                     "data": "nombre"
        //                 },
        //                 {
        //                     "data": "apellidos"
        //                 },
        //                 {
        //                     "data": "descripcion"
        //                 },
        //             ],
        //             columnDefs: [{
        //                     targets: 5,
        //                     visible: true
        //                 },
        //                 {
        //                     targets: 6,
        //                     orderable: false,
        //                     data: null,
        //                     render: function(data, type, row, meta) {
        //                         let fila = meta.row;
        //                         let botones =
        //                             `
        //                         <button type='button' id='btnCaptura' class='btnCaptura btn btn-primary btn-md' data-dismiss="modal"><i class="fa fa-check-circle"></i></i></button>`
        //                         return botones;
        //                     }
        //                 }

        //             ],
        //             "language": espanol,
        //             "destroy": true

        //         })
                
        // table4.ajax.reload(function(){
        // $(".paginate_button > a").on("focus",function(){
        // $(this).blur();
        // });
        // }, false);
        // }, 10000);    
    
    /*****************************************************
	                Anular Registro
	********************************************************/
    let botonAnula = document.getElementById("btnDeleteAdm");
    botonAnula.addEventListener('click', () => {
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
					const formEvolQE = document.querySelector('#formAsignaMedicamento');
					let idEvolMed = document.getElementsByName('idAsignaMedica')[0].value
					let data = new FormData()
					data.append("idEvolucion",idEvolMed);
					let valuesDatE = [...data.entries()];
					console.log(valuesDatE);	

					const anulaReg = async () => {  

						await axios.post(
							"{{ URL::To('/anula-CtrlMed') }}",data, {
							}).then((response) => {
					
                                if(response.data['message'] == "Success"){  
                                    document.getElementById('btnDeleteAdm').disabled = true;
                                    document.getElementById('btnNewAdm').disabled = false;
                                    document.getElementById('btnCancelAdm').disabled = true;
                                    document.getElementById('btnSearchAdm').disabled = false;
                                    document.getElementById('btnSaveAdm').disabled = true;
                                    document.getElementById('btnEditAdm').disabled = true;  
                            
                                    let newNom88 = document.getElementById('accionBotones')
                                    newNom88.setAttribute('accion', "Guardar");
                            
                                    var btnGuardar2 = document.getElementById('btnSaveAdm');
                                    btnGuardar2.innerHTML = 'Guardar'
                                    funcAsigMed.desactivaInput();
                            
                                    document.getElementById('textB').innerHTML = 'ANULACION DE ADMINISTRACION MEDICA'                                
                                    funcAsigMed.clearElements()	                                
                                    formEvolQ.reset()                                    
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

                formEvolQ.reset()            
            })  
    return true
    })
    /*****************************************************
	Limpia los campos al presionar el boton cancelar
	********************************************************/
    window.addEventListener('load', () => {
            let formAnula = document.getElementById('formAsignaMedicamento')
			let botonCancel = document.getElementById("btnCancelAdm");
			botonCancel.addEventListener('click', () => {
                
                cambioTextBotton('btnSaveAdm', 'Actualizar', 'Guardar')
                funcAsigMed.clearElements()	
                funcAsigMed.desactivaInput();

				document.getElementById('btnDeleteAdm').disabled = true;
                document.getElementById('btnEditAdm').disabled = true;
                document.getElementById('btnSearchAdm').disabled = false;
                botonCancel.disabled = true;
                document.getElementById('btnNewAdm').disabled = false;
                document.getElementById('btnSaveAdm').disabled = true; 
                let texto4 = document.getElementById('textB')
                texto4.innerHTML = 'CONTROL DE ADMINISTRACION DE MEDICAMENTOS'                

				funcAsigMed.accionSaveNew()
				formAnula.reset()
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
        // let btnSearchService = document.getElementById('btnSearchServicio');
        // function fillTableInterna(){  
 
                table = $('#tablaAsigMedic').DataTable({
                responsive: true,
                serverSide: true,
                destroy: false,
                scroll: true,
                scrollY: '260px',
                scrollx: true,
                deferRender: true,
                ordering: false,
                searching: false,
                paging: false,
                select: true,
                bAutoWidth: false,
                scrollCollapse: false,
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {dato_id: idasigmedic},
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

        window.addEventListener('load', () => { 
            let formAsigMed = document.getElementById('formAsignaMedicamento')
            $('#tablaAsigMedic').on("click", "button.btnCaptura", function () {
                let formAsigMed = document.getElementById('formAsignaMedicamento')
                let _diagnostico = document.getElementsByName('diagnostico')[0].value
                formAsigMed.reset()
                document.getElementsByName('diagnostico')[0].value = _diagnostico
                let data = table.row($(this).parents("tr")).data();
                // console.log(data)
                funcAsigMed.asignaValorEdit(data)
                // $idCli3=$request['idEvolMedica'];
                /*Cuando se busca un registro se cambial atributo del input hidden*/
                let newNom80 = document.getElementById('accionBotones')
                newNom80.setAttribute('accion', "Actualizar");

                var btnGuardar = document.getElementById('btnSaveAdm');
                btnGuardar.innerHTML = 'Actualizar'

                document.getElementById('btnDeleteAdm').disabled = false
                document.getElementById('btnEditAdm').disabled = false
            })
        })
</script>


