@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">

        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-10">
           <div class="card">
            <div class="card-header bg-primary text-white mt-3 border-0">
            <b><h2 class="">Editar Usuarios</h2></b>

            </div>
            <div class="card-body p-3 mb-2 bg-secondary text-white">
                <form role="form" action="{{URL::to('/update-user/'.$edit->id)}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Digite Nombre comlpleto" value="{{$edit->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Digite Email existente" value="{{$edit->email}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Password:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="password" placeholder="Digite contraseña nueva" value="{{$edit->password}}">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Confirme password:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="password2" placeholder="Digite nuevamente se contraseña">
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Rol</label>
                        <div class="col-sm-4">
                        <select class="form-control" id="selectRol" name="role">
                                <option value="Administrador" {{'Administrador' == $edit->role ? 'selected' : ''}}>Administrador</option>
                                <option value="Manager" {{'Manager' == $edit->role ? 'selected' : ''}}>Manager</option>
                                <option value="Invitado" {{'Invitado' == $edit->role ? 'selected' : ''}}>Invitado</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info col-lg-2 form-group" >Guardar</button>
                        <button type="button" href="{{URL::to('/all-user') }}" class="btn btn-info col-lg-2 form-group " id="btnsalir_edit">Salir</button>
                    </div>
                </form>
            </div>
           </div>
        </div>

    </section>

</div>

@endsection
