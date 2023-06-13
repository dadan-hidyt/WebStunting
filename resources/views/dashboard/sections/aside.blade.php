<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ assets('dist/img/AdminLTELogo.png')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">EKAMBING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Modul Data</li>
                <li class="nav-item">
                    <a href="data-balita.html" class="nav-link">
                        <i class="nav-icon fas fa-child"></i>
                        <p>
                            Data Balita
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.balita.semua')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Balita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="data-balita-stunting.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Balita Stunting</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Data Pengukuran
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="data-pengukuran-input.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Pengukuran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Management</li>
                <li class="nav-item">
                    <a href="data-user.html" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ekspor-import.html" class="nav-link">
                        <i class="nav-icon far fa-file-excel"></i>
                        <p>
                            Eksport/Import
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>