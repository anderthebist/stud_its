<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панель - @yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/fontawesome-free/css/all.min.css") }}>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}>
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/jqvmap/jqvmap.min.css") }}>
    <link rel="stylesheet" href={{ asset("/admin_resourses/dist/css/adminlte.min.css") }}>
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
    <link rel="stylesheet" href={{ asset("/admin_resourses/plugins/daterangepicker/daterangepicker.css") }}>
    
    <link rel="stylesheet" href={{ asset("/css/admin.css") }}>
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">@yield('title')</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="aside_admin main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <div class="brand-text font-weight-light" style="text-align: center">Админ панель</div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/admin_resourses/dist/img/user.png" style="background: white" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href={{route("admin")}} class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route("news.index")}} class="nav-link {{ Request::is('admin/news') ? 'active' : '' }}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Новости
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route("header.index")}} class="nav-link {{ Request::is('admin/header') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Шапки
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/stud/*') ||  Request::is('admin/stud') ? 'menu-open' : '' }}">
                    <a href={{route("stud.index")}} class="nav-link {{ Request::is('admin/stud/*') ||  Request::is('admin/stud') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Склад СР ІТС
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route("stud.index")}} class="nav-link {{Request::is('admin/stud') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Просмотр</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{route("stud.create")}} class="nav-link {{Request::is('admin/stud/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить учасника</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href={{route("stud_curators.index")}} class="nav-link {{ Request::is('admin/stud_curators') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Студкураторы
                        </p>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a href={{route("mister_miss.index")}} class="nav-link {{ Request::is('admin/mister_miss') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-venus-mars"></i>
                        <p>
                            Mister & Miss ITS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route("abit_fest.index")}} class="nav-link {{ Request::is('admin/abit_fest') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            KPIAbitFest
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route("open_air.index")}} class="nav-link {{ Request::is('admin/open_air') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paper-plane"></i>
                        <p>
                            OpenAir
                        </p>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

    </div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>

    <script src={{ asset("/admin_resourses/plugins/jquery/jquery.min.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/jquery-ui/jquery-ui.min.js") }}></script>
    
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src={{ asset("/admin_resourses/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/chart.js/Chart.min.js") }}></script>
    <!--
    <script src="/admin_resourses/plugins/sparklines/sparkline.js"></script>-->
    <script src={{ asset("/admin_resourses/plugins/jqvmap/jquery.vmap.min.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/jqvmap/maps/jquery.vmap.usa.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/jquery-knob/jquery.knob.min.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/moment/moment.min.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/daterangepicker/daterangepicker.js") }}></script>
    <script src={{ asset("/admin_resourses/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}></script>
    
    <script src={{ asset("/admin_resourses/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
    <script src={{ asset("/admin_resourses/dist/js/adminlte.js") }}></script>
    <script src={{ asset("/admin_resourses/dist/js/demo.js") }}></script>
   <!-- <script src="/admin_resourses/dist/js/pages/dashboard.js"></script>-->
    @yield('scripts')
</body>
</html>
