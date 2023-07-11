@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="home-header">
                    <div class="blue-shade-top-sm"></div>
                    <div class="user-greeting">
                        <h2>Hai, {{ auth()->user()->name ?? '?' }} - {{ textHakAkses(auth()->user()->hak_akses ?? '') }}</h2>
                        <p>Selamat datang di e-Kambing</p>
                    </div>
                    <a href="" class="btn-setting">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </header>
                <section class="menu-selection">
                    <h2>Menu</h2>
                    <div class="menu-group">
                    @if (auth()->user()->hak_akses === 'orang_tua')
                        @include('pwa.masyarakat.sections.menu')
                    @elseif(auth()->user()->hak_akses === 'posyandu')
                    @include('pwa.posyandu.sections.menu')
                    @endif
                    <a href="{{ route('mobile.setting_akun') }}" class="card">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="title">
                            <h3>Pengaturan Akun</h3>
                            <p>Ubah Nama, Email, Kata sandi</p>
                        </div>
                        <div class="arrow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </a>
                    </div>
                </section>
                <footer>
                    <div class="blue-ring">
                        <div class="hole"></div>
                    </div>
                    <div class="yellow-ring">
                        <div class="hole"></div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
