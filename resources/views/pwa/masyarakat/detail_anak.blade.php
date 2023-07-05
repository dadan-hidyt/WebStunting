@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Detail Anak</h1>
                </header>
                <section class="detail-option-list">
                    <div class="child-info">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ $anak->nama_lengkap }}</h5>
                            <p>Umur : {{ hitungBulan($anak->tanggal_lahir) }} Bulan</p>
                            <p>Tanggal lahir :{{ $anak->tanggal_lahir }}</p>
                        </div>
                        <div class="action-group">
                           <a href="{{ route('mobile.masyarakat.edit_anak',$anak->id) }}">
                            <div class="action">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                           </a>
                            <div class="action">
                                <i class="fa-regular fa-trash-can"></i>
                            </div>
                        </div>
                        
                    </div>
                    <h2>Statistik</h2>
                    <div class="menu-group">
                        <a href="{{ route('mobile.masyarakat.riwayat_bb', $anak->id) }}" class="btn">Riwayat BB<i
                                class="fa-solid fa-chevron-right"></i></a>
                        <a href="{{ route('mobile.masyarakat.riwayat_pb', $anak->id) }}" class="btn">Riwayat TB/PB<i
                                class="fa-solid fa-chevron-right"></i></a>
                        <a href="kms.html" class="btn">KMS<i class="fa-solid fa-chevron-right"></i></a>
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
