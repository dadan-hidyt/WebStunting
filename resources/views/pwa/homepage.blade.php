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

                        <a href="data-anak.html" class="card">
                            <div class="icon">
                                <i class="fa-solid fa-baby"></i>
                            </div>
                            <div class="title">
                                <h3>Data Anak</h3>
                                <p>Lacak dan atur data anak Anda dengan mudah menggunakan fitur Data Anak kami</p>
                            </div>
                            <div class="arrow">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="data-pengukuran.html" class="card">
                            <div class="icon">
                                <i class="fa-solid fa-calculator"></i>
                            </div>
                            <div class="title">
                                <h3>Pengukuran Anak</h3>
                                <p>Dapatkan informasi yang akurat dan terperinci tentang pertumbuhan anak Anda</p>
                            </div>
                            <div class="arrow">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="bb-tb-ideal.html" class="card">
                            <div class="icon">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div class="title">
                                <h3>Berat/Tinggi Ideal</h3>
                                <p>Pahami apakah anak Anda memiliki pertumbuhan yang sehat</p>
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
