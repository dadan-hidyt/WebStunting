@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Riwayat PB</h1>
                </header>
                <section class="detail-option-list">
                    <div class="child-info">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ $anak->nama_lengkap }}</h5>
                            <p>Umur : {{ hitungBulan($anak->tanggal_lahir) }} Bln</p>
                            <p>Tanggal lahir : {{ $anak->tanggal_lahir }}</p>
                        </div>
                        <div class="action">
                            <i class="fa-regular fa-trash-can"></i>
                        </div>
                    </div>
                    <div style="height: 400px;" id="chart"></div>
                    <h2>Riwayat Pengukuran</h2>
                    <div class="history-group">

                        @foreach ($anak->pengukuran as $item)
                            <div class="card red">
                                <header>
                                    <div class="general">
                                        <p>{{ $item->tanggal_ukur }}</p>
                                        <h4>Umur {{ $item->umur ?? '-' }} Bulan </h4>
                                    </div>
                                    <div class="status">
                                        {!! kategoriStatusPbTb($item->pb_zscore ?? $item->tb_zscore, true) !!}
                                    </div>
                                </header>
                                <div class="card-footer">
                                    <div class="col">
                                        <p>Berat Badan</p>
                                        <h4>{{ $item->tb ?? $item->pb }} KG</h4>
                                    </div>
                                    <div class="col">
                                        <p>Nilai Z-Score</p>
                                        <h4>{{ $item->tb_zscore ?? $item->pb_zscore }} ZS</h4>
                                    </div>
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
        window.onload = function() {
            var chart = c3.generate({
                bindto: '#chart',
                tooltip: {
                    grouped: false,
                },
                point: {
                    show: false,
                },

                zoom: {
                    enabled: true
                },
                subchart: {
                    show: false
                },
                data: {
                    empty: {
                        label: {
                            text: "Tidak ada data!",
                        }
                    },

                    x: 'umur',
                    columns: {!! json_encode($pengukuran_pb, true) !!},
                    onclick: function(d, element) {

                    },
                }
            });
        }
    </script>
@endpush
