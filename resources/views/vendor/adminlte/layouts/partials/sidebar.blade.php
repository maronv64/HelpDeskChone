<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(isset(Auth::user()->img))
                    <img src="{{ Auth::user()->img }}" class="img-circle" alt="User Image" />
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional)
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        /.search form -->

       
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"><strong><h6>MENU</h6></strong></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-tachometer'></i> <span>DASHBOARD</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="{{url('/dashboardhelpdesk')}}"><i class='fa fa-spinner'></i>Dashboard HelpDesk</a></li>   
                <li><a href="#"><i class="fa fa-pie-chart"></i>Dashboard Productividad</a> </li>
                </ul>
            </li>
             <li class="treeview">
                <a href="{{ url('/asigtareas') }}"><i class="fa fa-check"></i> <span>ASIGNAR TAREAS</span> <!-- <i class="fa fa-angle-left pull-right"></i> --></a>
          <!--       <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-bar-chart-o'></i>Dashboard HelpDesk</a></li>
                    <li><a href="#">Dashboard Peticiones</a></li>
                    <li><a href="#">Dashboard SLA</a></li>
                    <li><a href="#">Dashboard Prioridad</a></li>

                </ul> -->
            </li>
              <li class="treeview">
                <a href="{{ url('/misasignaciones') }}"><i class='fa fa-th-list'></i> <span>Mis Asignaciones</span> <!-- <i class="fa fa-angle-left pull-right"></i> --></a>
          <!--       <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-bar-chart-o'></i>Dashboard HelpDesk</a></li>
                    <li><a href="#">Dashboard Peticiones</a></li>
                    <li><a href="#">Dashboard SLA</a></li>
                    <li><a href="#">Dashboard Prioridad</a></li>

                </ul> -->
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-file-text-o'></i> <span>PETICIONES</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- <li><a href="{{ url('/dispositivos') }}">Dispositivos</a></li>
                    <li><a href="#">Asignar Dispositivos</a></li> -->
                    <!-- si no esta logeado -->
            
                        <li><a href="{{ url('/peticionesNorm') }}"> <i class="fa fa-file-o"></i> MIS PETICIONES</a></li>
                        <!-- <a href="{{ url('/peticionesNorm') }}"><i class='fa fa-tachometer'></i> <span>PETICIONES</span></a> -->
              
                            <li><a href="{{ url('/peticiones') }}"><i class="fa fa-pencil"></i> ADMIN PETICIONES</a></li>
                            <!-- <a href="{{ url('/peticiones') }}"><i class='fa fa-tachometer'></i> <span>PETICIONES ADMIN</span></a> -->
       


                </ul>
            </li>
                   
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-list-alt'></i> <span>INVENTARIO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/dispositivos') }}"><i class="fa fa-desktop"></i> Dispositivos</a></li>
                    <li><a href="{{ url('/asignacionDispositivos') }}"><i class="fa fa-plus-square"></i> Asignar Dispositivos</a></li>
                </ul>
            </li>
             
            <li class="treeview">
                <a href="#"><i class='fa  fa-circle-o'></i> <span>REGISTRO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
               
                    <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus"></i></i>Usuarios</a></li>
                 
                   <!-- <li><a href="#">Areas</a></li>-->
                   <!-- <li><a href="{{ url('/peticiones') }}">Peticiones</a></li>-->
                   <!-- <li><a href="#">Fichas</a></li>-->
                </ul>
            </li>
         

             <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart-o'></i> <span>INFORMES</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-file-o"></i>Informe Peticiones</a></li>
                    <li><a href="#"><i class='glyphicon glyphicon-list-alt'></i>Informe Inventario</a></li>
                    <li><a href="#"><i class='fa fa-th-list'></i>  Informe Asignaciones</a></li>
                    <li><a href="#"><i class="fa fa-pie-chart"></i>Informe Productividad</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa  fa-wrench'></i> <span>CONFIGURACIÓN</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/TipoUsuarios') }}"><i class="fa fa-user-plus"></i> Tipo de usuarios</a></li>
                    <li><a href="#"><i class="fa fa-th-large"></i> Areas</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Especialidad</a></li>
                    <li><a href="#"><i class="fa fa-desktop"></i> Tipo de dispositivos</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
