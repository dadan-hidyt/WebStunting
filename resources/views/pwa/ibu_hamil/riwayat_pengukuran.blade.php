@extends('pwa.layout')

@section('content')
    <style>
        .history-item {
            border-bottom: 2px solid #dedede;
            box-sizing: border-box;
            display: flex;
            justify-content: space-between;
            font-size: small;
        }
        .history-item p{
            margin: 8px 0px;
        }
        #button_cetak{
            border: none;
            padding: 10px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            background: teal;
        }
        @media print{
            #button_cetak{
                display: none;
                visibility: hidden;
            }
        }
    </style>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Riwayat Pengukuran</h1>
                </header>
                <section class="detail-option-list">

                    <div class="child-info">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ auth()->user()->ibuHamil->nama }}</h5>
                            <p>Tanggal Lahir : {{ auth()->user()->ibuHamil->tanggal_lahir }}</p>
                        </div>
                        <div class="btn-count">
                            <a href="{{ route('mobile.ibu_hamil.tambah_pengukuran') }}" class="count-btn">
                                <i class="fa fa-plus"></i> <span>Tambah Pengukuran</span>
                            </a>
                        </div>
                    </div>
                    <h2>Riwayat Pengukuran</h2>
                    <div class="history-group">

                        <button id="button_cetak">CETAK RIWAYAT</button>

                        @foreach (auth()->user()->ibuHamil->pengukuran as $item)
                            <div class="history-item">
                                <div class="detail">
                                    <p><b>Umur kehamilan:</b> {{ $item->usia_kehamilan }}</p>
                                    <p><b>Tanggal Ukur:</b>{{ $item->tanggal_ukur }}</p>
                                </div>
                                <div class="statuses">
                                    <p>
                                       <b> IMT:</b>{{ $item->imt }}
                                    </p>
                                    <span><b>Status:</b>{{ App\Facades\UkurBuMil::getKategori($item->imt) }}</span>
                                </div>
                            </div>
                        @endforeach

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
@push('scripts')
<script>
window.onload = function(){
    document.getElementById('button_cetak').onclick = function(){
        window.print();
    }
    }
    </script>    

@endpush