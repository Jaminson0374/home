  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/home')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/fundahogarlaroca.jpg')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fundación la Roca</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      {{-- mt-3 pb-3 mb-3 --}}
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/foto.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{asset('/home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Info Tablero 

              </p>
            </a>
          </li>
          @if(auth()->user()->role=='Administrador')
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              {{-- <i class='fas fa-user-tie' style='font-size:24px;color:rgb(183, 228, 241)'></i> --}}
              <p>
                NUESTROS USUARIOS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                {{-- <a href="{{URL::to('/admin-clientes')}}" class="nav-link"> --}}
                <a href="{{URL::to('/admin-clientes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Usuarios</p>
                </a>
              </li> 
 
              <li class="nav-item">
                <a href="{{URL::to('/admin-clientes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asignar Servicio</p>
                </a>
              </li>                        
              <li class="nav-item" tile ="menus">
                <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Acompañantes</p>
                </a>
              </li>          
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                MIS COLABORADORES
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/empledadosIndex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/add-user-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personal Externo</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                CONTROLES MÉDICOS
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            {{-- data-widget="pushmenu" --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/admin-clientes-Citas')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Control Citas Médicas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/admin-evolucion-diaria')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ctrl Evolución diaria</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="{{URL::to('/admin-signos-vitales')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Signos vitales</p>
                </a>
              </li>                  
              <li class="nav-item">
                <a href="{{URL::to('/admin_medicamento_user')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicmento Permante</p>
                </a>
              </li> 
              <li class="nav-item">
                {{-- admin_medicamento_tempo --}}
                <a href="{{URL::to('/index_admin_deposiciones')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposiciones</p>
                </a>
              </li>               

              <li class="nav-item">
                <a href="{{URL::to('/admin-clientes-Citas')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas de enfermería</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{URL::to('/admin-clientes-Citas')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ctrl signos vitales</p>
                </a>
              </li>                                                 
              <li class="nav-item">
                <a href="{{URL::to('/index_admin_glucometria')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ctrl Glucometría</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/admin-clientes-Citas')}}" class="nav-link"> 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ctrl signos vitales</p>
                </a>
              </li>                                                 
              <li class="nav-item">
                <a href="{{URL::to('/index_visitas_pro')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visita Profesionales</p>
                </a>
              </li>    
              <li class="nav-item">
                <a href="{{URL::to('/index-seguimto-terapia')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seguimto Terapia</p>
                </a>
              </li>                                                        
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                MIS INVENTARIOS
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/inv_articulos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Articulos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingreso de Mcia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salida Mcia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Movimientos de E/S</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>   
              <li class="nav-item">
                <a href="{{URL::to('/admin_RequiMedicamento_user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Requisición Medmentos</p>
                </a>
              </li>                                          

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Complementos
                    <i class="fas fa-angle-left right"></i>
                    <!-- <span class="badge badge-info right">6</span> -->
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Categorias</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lineas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Und. Medida</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>C. de Costo</p>
                    </a>
                  </li>                                                      
                </ul>              
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                MI CONTABILIDAD
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturación</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              
            </ul>
          </li>


          @endif
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                MIS INFORMES
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="right badge badge-danger"></span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de usuarios</p>
                </a>
              </li>              
              <li class="nav-item" tile ="menus">
                <a href="{{URL::to('/all-cliente')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Planiallas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ficha de usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/add-cliente-index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de controles</p>
                </a>
              </li>              
            </ul>            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               DATOS AUXILIARES
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/datosAuxiliarIndex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Administrador</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Perfil</p>
            </a>
          </li>
        <li class="nav-item">

        <!-- fas fa-power-off -->
        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir del Sistema') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
