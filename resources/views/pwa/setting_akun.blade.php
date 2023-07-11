@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Pengaturan</h1>
                </header>
                <section class="setting-wrapper">
                    <div class="user-info">
                        <div class="icon">
                            <i class="fa-solid fa-user-nurse"></i>
                        </div>
                        <div class="general">
                            <h5>{{ Auth::user()->name }}</h5>
                            <p>Tipe Akun : {{Auth::user()->hak_akses}}</p>
                            <p>Email : {{Auth::user()->email}}</p>
                        </div>
                        <div class="action">
                           <a href="{{ route('mobile.logout') }}" onclick="return confirm('Apakah anda yakin ingin logout?')"> <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </div>
                    </div>
                    <h2>Edit Profil</h2>
                    @livewire('pwa.form-setting-profile')
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
