@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="welcome-header">
                    <div class="ring-top">
                        <div class="hole"></div>
                    </div>
                    <div class="blue-shade-top-lg"></div>
                    <h1 class="logo">LOGO</h1>
                    <h2>Selamat Datang, di E-Kambing</h2>
                    <p>Solusi Terpadu untuk Pencegahan, Pencatatan, dan Edukasi Stunting!</p>
                </header>
                <section class="login-selection">
                    <h1>Login Sebagai</h1>
                    <a href="{{ route('mobile.login') }}?_type=masyarakat" class="btn">
                        <i class="fa-solid fa-user user"></i>
                        <p>Masyarakat/Ortu</p>
                        <i class="fa-solid fa-chevron-right arrow"></i>
                    </a>
                    <a href="{{ route('mobile.login') }}?_type=posyandu" class="btn">
                        <i class="fa-solid fa-user-nurse user"></i>
                        <p>Posyandu</p>
                        <i class="fa-solid fa-chevron-right arrow"></i>
                    </a>
                    <a href="{{ route('mobile.login') }}?_type=buhamil" class="btn">
                        <i class="fa-solid fa-person-breastfeeding user"></i>
                        <p>Ibu Hamil</p>
                        <i class="fa-solid fa-chevron-right arrow"></i>
                    </a>
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
