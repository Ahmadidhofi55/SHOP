<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ORNOTSHOP | @yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::to('/') }}/favicon.png" type="image/x-icon">
    <!--Aos -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/aos.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/adminlte.min.css">
</head>
@php
if (auth()->check()){
$user = auth()->user();
}
@endphp

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ URL::to('/') }}/ORNOTDEV.png" alt="ORNOTDEV-LOGO" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (is_object($user) && property_exists($user, 'img') && !empty($user->img))
                        <img src="{{ asset($user->img) }}" class="img-circle" alt="img-user">
                        @else
                        <i class="fas fa-user fa-1x"></i>
                      @endif
                      <span class="hidden-xs">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if (is_object($user) && property_exists($user, 'img'))
                            <img src="{{ asset($user->img) }}" class="img-circle" alt="img-user">
                            @else
                              <i class="fas fa-user fa-8x"></i>
                            @endif
                            <p>
                                {{ $user->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="pull-left">
                                            <a href="" class="btn btn-default btn-flat ">Profile</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="pull-right">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-default btn-flat">{{ __('Logout')
                                                    }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin" class="brand-link">
                <img src="{{ URL::to('/') }}/ORNOTDEV.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">ORNOTSHOP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="/admin" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Annalistic
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-bag"></i>
                                <p>
                                    Produk
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('merek.index') }}" class="nav-link">
                                <img src="{{ URL::to('/') }}/brand.png" class="" width="26px" alt="">
                                <p>
                                    Merek
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('wallet.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Wallet
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Order Management
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('order.index') }}" class="nav-link">
                                        <img src="{{ URL::to('/') }}/order.png" class="" width="26px" alt="order">
                                        <p>Order</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <img src="{{ URL::to('/') }}/order.png" class="" width="26px" alt="order-dt">
                                        <p>Order Details</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <img src="{{ URL::to('/') }}/pembayaran.png" width="26px" alt="pembayaran">
                                        <p>Pembayaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('table') </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('dash')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('contend')
                </div>
        </div>
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://ornotdev.com">Ahmad Idhofi</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">

        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ URL::to('/') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::to('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ URL::to('/') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('/') }}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ URL::to('/') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ URL::to('/') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ URL::to('/') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ URL::to('/') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ URL::to('/') }}/plugins/chart.js/Chart.min.js"></script>
    <script src="{{ URL::to('/') }}/dist/js/demo.js"></script>
    <script src="{{ URL::to('/') }}/dist/js/pages/dashboard2.js"></script>
    <script src="{{ URL::to('/') }}/dist/js/aos.js"></script>
</body>

</html>
