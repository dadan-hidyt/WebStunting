<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ assets('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ assets('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ assets('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ assets('dist/css/custom.css') }}">
    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="{{ assets('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- datatables -->
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-fixedheader/css/fixedHeader.bootstrap4.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/datatables-fixedcolumns/css/fixedColumns.bootstrap4.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- sweetalert -->
    <link rel="stylesheet" href="{{ assets('plugins') }}/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- toast -->
    <link rel="stylesheet" href="{{ assets('plugins') }}/toastr/toastr.min.css">
    <!-- select2 -->
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ assets('plugins') }}/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ assets('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- c3js -->
    <link rel="stylesheet" href="{{ assets('plugins/d3js/css/c3.css') }}">

    <!-- datepicker -->

    <link rel="stylesheet"
        href="{{ assets('plugins/Zebra_Datepicker-master/dist/css/bootstrap/zebra_datepicker.css') }}">

    <style>
        *::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        *::-webkit-scrollbar {
            width: 6px;
            height: 6px;
            background-color: #F5F5F5;
        }

        *::-webkit-scrollbar-thumb {
            transition: 0.6s cubic-bezier(0.075, 0.82, 0.165, 1);
            border-radius: 50px;
            background-color: #575656;
        }

        *::-webkit-scrollbar-thumb:hover {
            background: #00ccff;
        }
    </style>
    @livewireStyles
</head>

<body @class(['hold-transition sidebar-mini layout-fixed']) style="height:auto;">

    <div class="wrapper">
        @if (!isset($no_loader))
            <div style="background: white!important;"
                class="preloader flex-column justify-content-center align-items-center">
                <h4 class="animation__bounce">
                    <img src="{{ asset('loading_24.gif') }}" alt="">
                </h4>
            </div>
        @endif
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto align-items-center">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    @include('dashboard.sections.notifikasi')
                </li>
                <li class="nav-item dropdown ml-3 mr-2">
                    <a class="user-logo-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right admin-dropdown">
                        <a href="#" class="dropdown-item text-secondary text-center">
                            {{ auth()->user()->name ?? 'null' }} -
                            {{ textHakAkses(auth()->user()->hak_akses ?? 'Unknwn') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('auth.logout') }}" class="dropdown-item text-danger text-center">
                            Logout <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @include('dashboard.sections.aside')
        <div class="content-wrapper">
            @hasSection('page-title')
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row my-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 page-title">@yield('page-title')</h1>
                            </div><!-- /.col -->
                            @hasSection('page-crumb')
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div><!-- /.col -->
                            @endif
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                    @yield('page-header')
                </div>
            @endif


            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">NusaAgency</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        const notifikasi = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            }
        });
    </script>

    <!-- jQuery -->
    <script src="{{ assets('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ assets('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- DataTables  & Plugins -->
    <script src="{{ assets('plugins') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ assets('plugins') }}/jszip/jszip.min.js"></script>
    <script src="{{ assets('plugins') }}/pdfmake/pdfmake.min.js"></script>
    <script src="{{ assets('plugins') }}/pdfmake/vfs_fonts.js"></script>
    <script src="{{ assets('plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ assets('plugins') }}/datatables-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="{{ assets('plugins') }}/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ assets('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ assets('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <!-- jQuery Knob Chart -->
    <script src="{{ assets('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ assets('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ assets('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ assets('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ assets('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ assets('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ assets('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ assets('dist/js/pages/dashboard.js') }}"></script>

    <!-- toastr -->
    <!-- SweetAlert2 -->
    <script src="{{ assets('plugins') }}/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ assets('plugins') }}/toastr/toastr.min.js"></script>
    <!-- select2 -->
    <script src="{{ assets('plugins') }}/select2/js/select2.full.min.js"></script>
    <script src="{{ assets('plugins/d3js/js/d3.js') }}"></script>
    <script src="{{ assets('plugins/d3js/js/c3.js') }}"></script>
    <!-- jebra datepicker -->

    <script src="{{ assets('plugins/Zebra_Datepicker-master/dist/zebra_datepicker.min.js') }}"></script>

    <!-- toast setting -->
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    </script>

    @stack('scripts')

</body>

</html>
