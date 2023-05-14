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
            <div class="card-header border-0 ">

            <div class="info-box col-lg-10 vmt-3 bg-primary text-dark ">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus "></i></i></span>
              <b><h2 class="col sm-6 mt-3 bg-primary text-dark ">Crear usuarios</h2></b>

              <div class="info-box-content">
                <!-- <span class="info-box-text">Crear usuarios</span> -->
              </div>
              <!-- /.info-box-content -->

            </div>


            </div>
            <div class="card-body  p-3 mb-2 bg-secondary text-dark">
                <form role="form" action="{{URL::to('/insert-user')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Digite Nombre comlpleto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Digite Email existente">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-2 col-form-label">Password:</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="password" placeholder="Digite contraseña nueva">
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
                                <option value="Administrador">Administrador</option>
                                <option value="Manager">Manager</option>
                                <option value="Invitado">Invitado</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info col-lg-2 form-group">Guardar</button>
                        <button type="button" href="{{URL::to('/all-user') }}" class="btn btn-info col-lg-2 form-group " id="btnsalir_new">Salir</button>
                    </div>
                </form>
            </div>
           </div>
        </div>

    </section>

</div>

@endsection
