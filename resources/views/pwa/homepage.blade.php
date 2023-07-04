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
                    @if (auth()->user()->hak_akses === 'orang_tua')
                        @include('pwa.masyarakat.sections.menu')
                    @elseif(false)
                        dadan
                    @endif
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
