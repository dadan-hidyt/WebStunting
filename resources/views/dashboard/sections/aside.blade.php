<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ assets('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">EKAMBING</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Menu Utama</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.data-master.orang_tua') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Orangtua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.data-master.kabupaten_kota') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kabupaten / Kota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.data-master.posyandu') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Posyandu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.data-master.kecamatan') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.data-master.kelurahan_desa') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelurahan Desa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link">
                        <i class="nav-icon fas fa-child"></i>
                        <p>
                            Data Balita
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.balita.semua') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Balita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.balita.stunting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Balita Stunting</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Ibu Hamil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.ibu-hamil.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Ibu Hamil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.balita.stunting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Bumil Stunting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.balita.stunting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Pengukuran</p>
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
                            <a href="{{ route('dashboard.pengukuran.input-pengukuran') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Input Pengukuran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.pengukuran.hasil-pengukuran') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Pengukuran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Management</li>
                @if (auth()->user()->hak_akses === 'super_admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.akun.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('dashboard.export-import.index') }}" class="nav-link">
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
