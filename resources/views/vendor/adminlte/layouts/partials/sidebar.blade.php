<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-tachometer'></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-bar-chart-o'></i>Dashboard HelpDesk</a></li>
                    <li><a href="#">Dashboard Peticiones</a></li>
                    <li><a href="#">Dashboard SLA</a></li>
                    <li><a href="#">Dashboard Prioridad</a></li>

                </ul>
            </li>
            
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-list-alt'></i> <span>INVENTARIO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/dispositivos') }}">Dispositivos</a></li>
                    <li><a href="#">Asignar Dispositivos</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart-o'></i> <span>REGISTRO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Perfil de Usuarios</a></li>
                    <li><a href="{{ url('/register') }}"><i class='fa fa-bar-chart-o'></i>Usuarios</a></li>
                    <li><a href="#">Areas</a></li>
                    <li><a href="{{ url('/peticiones') }}">Peticiones</a></li>
                    <li><a href="#">Fichas</a></li>

                </ul>
            </li>

             <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart-o'></i> <span>INFORMES</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Informe Peticiones</a></li>
                    <li><a href="#">Informe Inventario</a></li>
                    <li><a href="#">Informe Asignaciones</a></li>
                    <li><a href="#">Informe Productividad</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
