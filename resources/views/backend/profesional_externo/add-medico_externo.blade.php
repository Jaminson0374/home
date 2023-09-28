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
html {
  font-family: Helvetica, Arial;
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
                    <form role="form" name="formExternos" id="formExternos" action="">
                        @csrf

                        <div class="col-lg-12 col-md-12">
                            <body>
                                @foreach($createFamily as $datosRow)
                                @endforeach
                                <div class="row border border-dark border-4 m-2 rounded bg-primary">
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 id="textB" style="font-weight: 900; font-size: 1em;" class="card-title">Datos del profesional o Personal Externo 
                                        </h3>

                                        <h3 id="accion" class="float-right m-0 p-0 bg-danger" style="font-weight: 900; font-size: 1.5em;" class="card-title"></h3>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6 col-md-6">
                                        <h3 class="card-title float-right" style="font-weight: 900; font-size: 1em;">
                                        USUARIO --- {{$datosRow->num_documento.' '.$datosRow->nombre.' '.$datosRow->apellidos}}
                                        </h3>
                                    </div>
                                </div>
                                    <input type="hidden" id="user_id" name="user_id" value={{auth()->user()->id}}>
                                    <input type="hidden" name="datosbasicos_id" value={{$datosRow->id}}>
                                    <input type="hidden" name="idFamiliar" id="idFamiliar">
                                    <input type="hidden" id="newUpdate" name="newUpdate">


                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12 border bg-success">  
                                            <div class="row pb-2">   
                                                <div class="col-12 col-lg-2 col-sm-12 col-md-4">                                                        
                                                    <label class=" ">*Tipo_Documento</label>
                                                    <select class="form-control focusNext text"
                                                    style="width: 100%" tabindex="1" name="tipodocumento_id" id="tipodocumento_id">
                                                    @foreach ($tipoDocFami as $tipoDoc)
                                                        <option value={{ $tipoDoc->id }}>
                                                            {{ $tipoDoc->descripcion }}
                                                        </option> 
                                                    @endforeach
                                                    </select> 
                                                </div>
                                                <div class="col-12 col-lg-2 col-sm-12 col-md-2">                                                        
                                                    <label for="" class="">*Doc Identidad</label>
                                                    <input type="text" class="form-control text focusNext pb-2" maxlength="25"
                                                        tabindex="2" name="doc_identidad" id="doc_identidad"
                                                        pattern="[A-Za-z0-9]{1,25}" placeholder="#Doc. Identidad"
                                                        style="height:40px;">
                                                </div>   
                                                <div class="col-lg-3 col-sm-12 col-md-3">
                                                    <label for="nombre" class="">*Nombre:</label>
                                                    <input type="text" class="form-control text focusNext" maxlength="40"
                                                        tabindex="3" name="nombre" id="nombre" placeholder="Nombre">                                            
                                                </div>    
                                                <div class="col-lg-3 col-sm-12 col-md-3">
                                                    <label for="apellidos" class="">*Apellidos:</label>
                                                    <input type="text" class="form-control text focusNext" maxlength="40"
                                                    tabindex="4" name="apellidos" id="apellidos"
                                                    placeholder="Apellidos"> 
                                                </div>         
                                                <div class="col-lg-2 col-sm-12 col-md-2">
                                                    <label for="SelectSexo" class="">*Genero</label>
                                                    <select class="form-control focusNext text" id="sexo_id" tabindex="5"
                                                        name="sexo_id">
                                                        <option selected disable value="">Genero</option>
                                                        @foreach ($generoFamiliar as $datoInput)
                                                            <option value={{ $datoInput->id }}>
                                                                {{ $datoInput->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                         
                                            </div>
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="dirRes" class="">Dir residencial</label>                                                                 
                                                                 Residencial:</label>
                                                                <input type="text" class="form-control text focusNext" maxlength="100"
                                                                    name="direccion_residencial" tabindex="6" id="direccion_residencial"
                                                                    placeholder=" Dirección residencial">                                               
                                                            </div>     
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="" class="">Dir Organización</label>                                                                 
                                                                 </label>
                                                                <input type="text" class="form-control text focusNext" maxlength="100"
                                                                    name="direccion_laboral" tabindex="7" id="direccion_laboral"
                                                                    placeholder="Dirección laboral">                                               
                                                            </div>                                                                 
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="" class="">*Teléfonos:</label>
                                                                <input type="text" class="form-control text focusNext" maxlength="60"
                                                                    tabindex="8" id="telefonos" name="telefonos"
                                                                    placeholder="Telfonos">                                                           
                                                            </div>    
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="" class="">*Email Usuario:</label>
                                                                <input type="email" class="form-control text focusNext" maxlength="50"
                                                                    tabindex="9" id="email" name="email"
                                                                    placeholder="Email de contacto">
                                                            </div>                
                                                        </div> <!-- cierre de row -->
 
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="" class="">T.P</label>
                                                                <input type="text" class="form-control text focusNext" maxlength="60"
                                                                    tabindex="10" id="tprofesional" name="tprofesional"
                                                                    placeholder="T. profesional">                                                           
                                                            </div>           
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for=" " class="">Especialidad</label>
                                                                <select class="form-control focusNext text" id="especialidad_id" tabindex="11"
                                                                    name="especialidad_id">
                                                                    <option selected disable value="">Seleccione</option>
                                                                    @foreach ($especialidad as $datoInput)
                                                                        <option value={{ $datoInput->id }}>
                                                                            {{ $datoInput->descripcion }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>  
                                                            <div class="col-lg-3 col-sm-12 col-md-3">
                                                                <label for="" class="">Orgnanización</label>
                                                                <input type="text" class="form-control text focusNext" maxlength="60"
                                                                    tabindex="12" id="organizacion" name="organizacion"
                                                                    placeholder="Empresa donde labora">                                                           
                                                            </div>                                                                                                                                                                                             
                                                        </div>
                                                        <div class="row pb-2 border">
                                                            <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <label for="" class=""><b>Observación</b></label>
                                                                <textarea type="text" class="form-control text diagnostico" id="observacion" name="observacion" tabindex="13"
                                                                    placeholder="Ingrese información relevante"
                                                                    title="Ingrese información relevante acerca del profesional" rows="1"></textarea>        
                                                            </div>
                                                        </div>
                                                    <div class="row"> 
                                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                                                <div class="card card-primary card-outline">
                                                                            <div class="form-group butonAll">
                                                                                <button  type="button" class="btn btn-primary btn-md form-group m-1" title="Crear nuevo evento a Usuario actual"
                                                                                focusNext tabindex="11" id="btnNewAdm" accionBtn="Nuevo" name="btnNewAdm">
                                                                                <i class="fa fa-file-archive fa-lg" style="color:#fffefed8;"></i>Nuevo
                                                                            </button>
                                                                                <button  type="submit" class="btn btn-primary btn-md form-group m-1" title="Guarda en la base de datos el nuevo registr o lactualización"
                                                                                    focusNext tabindex="12" id="btnSaveAdm" accionBtn="Guardar"name="btnSaveAdm">
                                                                                    <i class="fa fa-save fa-lg" style="color:#fffefee0;"></i>Guardar
                                                                                </button>
                                                                                <button type="button" class="btn btn-primary form-group btnSearchAdm btn-md m-1" title="Permite localizar un el refistro de un empleado"
                                                                                id="btnSearchAdm" focusNext tabindex="20"><i
                                                                                    class="fa fa-search-location fa-lg"></i>Buscar
                                                                                    </button>                                                                                
                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnCancelAdm" title="Cancela el proceso actual y limpia cada una de las celdas"
                                                                                    focusNext tabindex="13"> <i class="fa fa-ban fa-lg"></i> Cancelar
                                                                                </button>     
                                                                                <button type="button" class="btn btn-primary form-group btn-md m-1" id="btnDeleteAdm" title="Anula el registro que esta en la ventana"
                                                                                focusNext tabindex="14"><i class="fa fa-trash fa-lg"
                                                                                    style="color:#f30b0b;"></i> Anular </button>
                                    
                                                                                    <a href="{{ URL::to('/index-medicoexterno') }}" class="btn btn-primary form-group btn-md float-righ  m-1" title="Abandonar la ventana"
                                                                                        focusNext tabindex="15" id="btnExit"><i class="fa fa-arrow-right fa-lg"
                                                                                        style="color:#f30b0b;"></i> Salir</a>    
                                                                            </div>
                                                                </div>
                                                        </div>
                                                    </div>                                                    
                                            </div>

                                <script src="{{ asset('../resources/js/back_off.js') }}"></script>
                                <script src="{{ asset('../resources/views/backend/profesional_externo/medico_externo.js') }}"></script>
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
<!-- ******************************************************
      MODAL PARA LA BUSQUEDA DE CLIENTES DATOS BASICOS
      *****************************************************-->
<!-- Modal -->


<!-- Modal -->
<div class="container-lg">
    <div class="modal fade" id="modalBuscarExt" class="modalBuscar" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Lista de usarios datos básicos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- tablaDtBasico --}}
                <form action="" id="modalTable">

                <body>
                    <div class="modal-body">
                        <div class="card-body p-2 mb-0 bg-primary text-white">
                            <table id="tablaMediExterno" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>DocIdent</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Apellido</th>
                                        <th class="text-center">Telefono</th>
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
@endsection
<script>
 
window.addEventListener('load', () => { 
            // $('#example1 tbody').on('click', 'tr', function () {
            //     let data = table_user.row( this ).data();
            //     // console.log(dataTemp.id)                                
            // })
            document.getElementsByName('idFamiliar')[0].value ='0'
            var funEvento = new Familiares();
            let btnSearch = document.getElementById('btnSearchAdm')
            
            btnSearch.addEventListener('click', ()=>{
                $("#modalBuscarExt").modal({
                        backdrop: 'static',
                        keyboard: false,
                        show: true
                    });                
                busquedaProfesionales()
                let formExt = document.querySelector('#formExternos')
                $('#tablaMediExterno tbody').on('click', 'tr', function () {
                    let data = table_user.row( this ).data();
                    formExt.reset()
                    // console.log(data)
                    funEvento.showHideElement('inline')
                    funEvento.captura_datos(data)
                    
                    document.getElementsByName('idFamiliar')[0].value = data.id
                    document.querySelector('#doc_identidad').disabled = true
                    document.querySelector('#tipodocumento_id').disabled = true

                    
                    /*Cuando se busca un registro se cambial atributo del input hidden*/
                    let text4 =  document.querySelector("#accion").innerHTML ="Puede CONSULTAR, EDITAR O ANULAR"                     
                    document.querySelector('#btnDeleteAdm').style.display = "inline";
                    document.querySelector('#btnNewAdm').style.display = "none";
                    document.querySelector('#btnSearchAdm').style.display = "inline";
                    document.querySelector('#btnCancelAdm').style.display = "inline";
                    document.querySelector('#btnSaveAdm').style.display = "inline";
                    $("#modalBuscarExt").modal("toggle");
                /*limpia la tabla */
                    // var table = $('#tablaMediExterno').DataTable();
                    //         //clear datatable
                    //         table.clear().draw();
                    //         //destroy datatable
                    //         table.destroy();                
    
                })                
            })
            document.getElementsByName('newUpdate')[0].value = " "                       
            /**************************************************************
             *Valida la existencia del documento de identidad del usuario   
            ***************************************************************/
            $("#doc_identidad").blur(function(){
                let idFamiliar = document.getElementById("'idFamiliar");
                let nDocInput = document.getElementsByName('doc_identidad')[0].value 
                var nnew8 = document.getElementsByName('newUpdate')[0].value 
                
                if (nnew8 == '1' ){  // si es nuevo registro
                    const validaReg = async () => {
                            await axios.post("{{URL::to('/validaDoc-medicoExterno')}}",{
                                data: { doc_identidad : nDocInput }
                            }).then((response) => {
                                // console.log(response.data[0]['num_documento'])
                                // console.log(nDocInput)
                                if(response.data[0]['num_documento'] == nDocInput){
                                        document.getElementsByName('doc_identidad')[0].value= "";
                                        document.getElementById('doc_identidad').focus()
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Error Duplicado de documento',
                                        text: 'EL DOCUMENTO DE IDENTIDAD QUE ESTÁ INGRESANDO YA EXISTE',
                                        footer: 'No puede ingresar el mismo documento varias veces'
                                    })  
                                    document.querySelector('#btnSaveAdm').style.display = "none";
                                }else{
                                    document.querySelector('#btnSaveAdm').style.display = "inline";;
                                }

							}).catch(function(error) {
						})
					}
					validaReg();
                }
            })
            // return true


            funEvento.showHideElement('none')
            document.querySelector('#btnNewAdm').style.display = 'inline'
	        document.querySelector('#btnSaveAdm').style.display = 'none'
            document.querySelector('#btnCancelAdm').style.display = 'none'
	        document.querySelector('#btnDeleteAdm').style.display = 'none'
            
            let idCliEvento = document.getElementsByName('datosbasicos_id')[0].value
            fillTableNuevo(idCliEvento)
       /********************************************************************************************
            GUARDA o ACTUALIZA EL RESGISTRO, PRIMERO VERIFICA QUE NO HAYAN CAMPOS REQUERIDOS VACIOS 
        ***********************************************************************************************/
        selectorGuardar = document.querySelector('#btnSaveAdm')
        const formEvolQ = document.querySelector('#formExternos');

        formEvolQ.addEventListener("submit", (e) => {
            e.preventDefault();
            let data = new FormData(formEvolQ);
                // let valuesDat = [...data.entries()];
                // console.log(valuesDat)
                // return false
            let valiCampos = funEvento.validarCampos()
            if(valiCampos == " "){
                /*En este código recorro la tabla, verifico los check y los input y traigo la información*/
                            const saveFamiliar = async () => {
                                    await axios.post("{{URL::to('/store-medicoExterno')}}",{
                                        data :{
                                            tipodocumento_id:  document.getElementsByName('tipodocumento_id')[0].value, 
                                            doc_identidad : document.getElementsByName('doc_identidad')[0].value, 
                                            nombre : document.getElementsByName('nombre')[0].value, 
                                            apellidos: document.getElementsByName('apellidos')[0].value, 
                                            telefonos : document.getElementsByName('telefonos')[0].value, 
                                            email : document.getElementsByName('email')[0].value, 
                                            direccion_residencial : document.getElementsByName('direccion_residencial')[0].value, 
                                            direccion_laboral : document.getElementsByName('direccion_laboral')[0].value, 
                                            sexo_id : document.getElementsByName('sexo_id')[0].value, 
                                            organizacion : document.getElementsByName('organizacion')[0].value, 
                                            especialidad_id : document.getElementsByName('especialidad_id')[0].value, 
                                            tprofesional : document.getElementsByName('tprofesional')[0].value ,
                                            observacion : document.getElementsByName('observacion')[0].value ,
                                            id : document.getElementsByName('idFamiliar')[0].value,
                                            user_id : document.getElementsByName('user_id')[0].value
                                        }                                    
                                    }).then((resp) => {
                                        // console.log(resp.data)
                                        // console.log(resp.data['message'])
                                        if(resp.data['message']==="Success"){
                                            let text4 =  document.querySelector("#accion").innerHTML =""
                                            document.getElementsByName('idFamiliar')[0].value = " " 
                                            document.querySelector('#btnSaveAdm').style.display = 'none'
                                            document.querySelector('#btnCancelAdm').style.display = 'inline'
                                            formEvolQ.reset()   
                                            fillTableNuevo(idCliEvento) 
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PERFECTO',
                                                text: 'Se GUARDÓ el Registro con Exito',
                                                footer: ''
                                            })
                                        }
                                    })
                            }
                            saveFamiliar()
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
	BOTON CANCELAR - Limpia los campos al presionar el boton cancelar
	********************************************************/
			let botonCancel = document.getElementById("btnCancelAdm");
			botonCancel.addEventListener('click', () => {
                formEvolQ.reset()
                document.querySelector('#tipodocumento_id').disabled = false                       
                document.querySelector('#doc_identidad').disabled = false                        
                document.querySelector('#btnCancelAdm').style.display = "none" 
                document.querySelector('#btnSearchAdm').style.display = "inline" 
                document.querySelector('#btnSaveAdm').style.display = "none"  
                document.querySelector('#btnDeleteAdm').style.display = "none"  
                document.querySelector('#btnNewAdm').style.display = "inline"
                document.querySelector("#accion").innerHTML =""

                funEvento.showHideElement('none')
                
            //     /*limpia la tabla */
            //     var table = $('#example2').DataTable();
            //             //clear datatable
            //             table.clear().draw();
            //             //destroy datatable
            //             table.destroy();
            }) 
        /****************************************************
            BOTON NUEVO - Nuevo Registro
            ********************************************************/
            let botonNew = document.getElementById("btnNewAdm");
                    botonNew.addEventListener('click', () => {
                        formEvolQ.reset()
                        document.getElementsByName('newUpdate')[0].value = "1"   //new                    
                        funEvento.showHideElement('inline')
                        document.querySelector('#btnSaveAdm').style.display = "inline"
                        document.querySelector('#btnNewAdm').style.display = "none"
                        document.querySelector('#btnCancelAdm').style.display = "inline"
                        document.querySelector('#btnSearchAdm').style.display = "none"
                        document.getElementsByName('newUpdate')[0].value = "1"
                        document.querySelector('#tipodocumento_id').disabled = false                        
                        document.querySelector('#doc_identidad').disabled = false
                        let text4 =  document.querySelector("#accion").innerHTML ="Está creando un NUEVO registro"
                        document.getElementById('tipodocumento_id').focus()   
            })  

           /***********************************************************
            * CUANDO SE HACE CLICK SOBRE UN REGISTRO DE LA TABLA
            ***********************************************************/
                $('#example2 tbody').on('click', 'tr', function () {
                    let data = table.row( this ).data();
                    // console.log(data)         
                    document.getElementsByName('newUpdate')[0].value = "2" //update                       
                    document.getElementsByName('idFamiliar')[0].value = data.id
                        funEvento.showHideElement('inline')
                        funEvento.captura_datos(data)
                        document.querySelector('#btnNewAdm').style.display = 'none'
                        document.querySelector('#btnSaveAdm').style.display = 'inline'
                        document.querySelector('#btnCancelAdm').style.display = 'inline'
                        document.querySelector('#btnDeleteAdm').style.display = 'inline'
                        document.querySelector('#tipodocumento_id').disabled = true                        
                        document.querySelector('#doc_identidad').disabled = true   
                        let text4 =  document.querySelector("#accion").innerHTML ="Puede CONSULTAR, EDITAR O ANULAR"                     
                })
                
   /*****************************************************
	Elminar el registro que está en en el formulario
	********************************************************/
    let botonDel = document.getElementById("btnDeleteAdm");
			botonDel.addEventListener('click', () => {
                // let funcEvento2 = new EventoAdverso();
            Swal.fire({
                title: 'Se ANULARÁ EL REGISTRO QUE SE MUESTRA EN EL FORMULARIO, ¿Está seguro de Anularlo?',
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
                            await axios.post("{{URL::to('/destroy-medicoExterno')}}",{
                                data: {
                                    id:  document.getElementsByName('idFamiliar')[0].value
                                }                
                            }).then((response) => {
                                //  console.log(response.data)
                                if(response.data['message'] == "Success"){  
                                        document.querySelector("#accion").innerHTML =""
                                        formEvolQ.reset()
                                        funEvento.showHideElement('none')
                                        document.querySelector('#btnNewAdm').style.display = 'inline'
                                        document.querySelector('#btnSaveAdm').style.display = 'none'
                                        document.querySelector('#btnCancelAdm').style.display = 'none'
                                        document.querySelector('#btnDeleteAdm').style.display = 'none'
                                        document.querySelector('#tipodocumento_id').disabled = false                        
                                        document.querySelector('#doc_identidad').disabled = false
                                        funEvento.showHideElement('none')   
                                        fillTableNuevo(idCliEvento)
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
        return true
    }) 
 
   
    /***********************************************************************
     * Llenar la tabla example (al guardar o al entrar al formulario)
     **********************************************************************/    
    function fillTableNuevo(idPlanilla){
            table = $('#example2').DataTable({
                    "pageLengt": '25',
                    "fixedHeader" : 'true',
                    "destroy": 'true',
                    "autoWidth": 'true',
                    "responsive": 'true',
                    "ordering": false,
                    "searching": false,
                    "info" : false,
                    "paginate" : false,                    
                "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                        "data": {datosbasicos_id: idPlanilla},
                        "url": "{{ URL::to('/show-familiares') }}",
                        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        "dataSrc": ""
                },
                    "columns": [
                        {"data": "id"},
                        {"data": "familiar"},
                        {"data": "telefonos"},
                        {"data": "email"}
                     ],

                    "destroy": true,
                    "language":{"url": "../../resources/js/espanol.json"
                    }
                })

                // $('#example1').on("click", "button.btnCaptura", function () {
                //     // formularioDbasic.reset()
                //     // var datos = table_user.row($(this).parents("tr")).data();
                //     let data = table_user.row($(this).parents("tr")).data();
                //     console.log(data)
                //     // funcBasic.asignaValorEdit(data)
                // })
    }

    //  nobackbutton()
    // saltarEnterFormulario()
    /*******************************************************
     * Llena la tabla del modal para la busqueda de clientes
     * *****************************************************/
     function busquedaProfesionales(){  
                table_user = $('#tablaMediExterno').DataTable({
                    destroy: 'true',
                    "ajax": {
                        "type": "POST",
                        "dataType": 'json',
                            "url": "{{ URL::to('/busca-medicoExterno') }}",
                            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            "dataSrc": ""
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "doc_identidad"},
                            {"data": "nombre"},
                            {"data": "apellidos"},
                            {"data": "telefonos"},
                        ],
                         "destroy": true,
                         "language":{"url": "../../resources/js/espanol.json"
                        }
                }).draw()
                  

        }
</script>


