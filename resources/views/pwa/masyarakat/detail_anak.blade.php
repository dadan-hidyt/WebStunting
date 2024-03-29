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
                    @if (auth()->user()->hak_akses === 'masyarakat')
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
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{{ route('mobile.masyarakat.hapus_anak',$anak->id) }}"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                        
                    </div>
                    @elseif (auth()->user()->hak_akses === 'posyandu')
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
                           <a href="{{ route('mobile.posyandu.edit_anak',$anak->id) }}">
                            <div class="action">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                           </a>
                            <div class="action">
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{{ route('mobile.posyandu.hapus_anak',$anak->id) }}"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                        
                    </div>
                    @endif
                    <h2>Statistik</h2>
                    <div class="menu-group">
                        <a href="{{ route('mobile.riwayat_bb', $anak->id) }}" class="btn">Riwayat BB<i
                                class="fa-solid fa-chevron-right"></i></a>
                        <a href="{{ route('mobile.riwayat_pb', $anak->id) }}" class="btn">Riwayat TB/PB<i
                                class="fa-solid fa-chevron-right"></i></a>
                        <a href="{{ route('mobile.full_report',$anak->id) }}" class="btn">KMS<i class="fa-solid fa-chevron-right"></i></a>
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
