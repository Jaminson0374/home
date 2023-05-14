@extends('backend.layouts.app')
@section('content')

<style>
.tarjeta_body {
    margin: 2px;
    background-color: #eef3eb;
    border: 4em;
    border-color: #ee2015;
}

</style>

<div class="content-wrapper jaminson"> 
    @if ($errors->any())
    <script>
        document.getElementById('selectDptoN').value = "old('dpto_nacimiento')";
    </script>          
    <div class="alert alert-danger"><h2 class ="boder boder-primary">ERRORES EN LOS DATOS INGRESADOS</h2>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif    
     <section class="content">
            <div class="card border-2">
                <div class="card-body text-dark tarjeta_body" >
                    <form role="form" action="{{URL::to('/insert-cliente')}}" method="post">
                     @csrf

                        <div class="row justify-content-between">
                            <div class="col-sm-7">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title ">SERVICIOS QUE PRESTA LA FUNDACIÓN HOGAR LA ROCA</h3>
                                        {{-- <h3 class="card-title float-right">Datos Personales</h3> --}}
                                    </div>
                                    <div class="card-body bg-info">
                                        <div class="row">
                                            <div>
                                                <input type="text" name="tipo_usuario" value="1" hidden>
                                            </div>   
                                            <div class="col-sm-2">
                                                <label>Tipo Servicio</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <select class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="tipo_servicios" id="selectServicios">
                                                <option selected="selected" disable value=" ">Seleciona un servicio</option>
                                                @foreach($tipoServicio as $tipoServi)
                                                    <option value = {{$tipoServi->id}}>{{$tipoServi->descripcion}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <script>
                                                // var id_names = document.getElementById("selectServicios").value="old('id_tipodoc')";
                                                // console.log("MEENSAJW"+id_names[0].tagName)
                                                // console.log("MEENSAJW*---"+id_names)
                                                // document.getElementByName('id_tipodoc').value = "old('id_tipodoc')";
                                            </script> 
                                        </div>  <!--cierra row-->                                                                          
                        
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group pt-2">
                                        {{-- <button type="submit" class="btn btn-primary form-group">Aceptar</button> --}}
                                        <a href="{{URL::to('/add-cliente-index') }}" class="btn btn-primary float-left " id="btn_cli_salir_new">Aceptar</a>
                                        <a href="{{URL::to('/all-cliente') }}" class="btn btn-primary float-right " id="btn_cli_salir_new">Salir</a>
                                    </div>
                                    
                                </div>
                            </div>  <!--cierra row-->
                    </form>
                </div>
            </div>
    </section>

</div>

@endsection

