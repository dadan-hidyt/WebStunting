@extends('pwa.layout')


@section('content')
    <style>
        .table-container {
            overflow-x: auto;
            max-width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            white-space: nowrap;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>KMS</h1>
                </header>
                <section class="detail-option-list">
                    <div class="child-info">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ $anak->nama_lengkap }}</h5>
                            <p>Umur : {{ hitungBulan($anak->tanggal_lahir) }}</p>
                            <p>Tanggal lahir : {{ $anak->tanggal_lahir }}</p>
                        </div>
                        <div class="btn-count">
                            <a href="pengukuran-anak.html" class="count-btn">
                                Ukur
                            </a>
                        </div>
                    </div>


                    @php
                        $pengukuranTerakhir = $anak
                            ->pengukuran()
                            ->latest()
                            ->first();
                    @endphp


                    <div class="child-status">
                        <p class="general">Tanggal Ukur : {{ $pengukuranTerakhir->tanggal_ukur }} </p>
                        <p class="general">BB : {{ $pengukuranTerakhir->bb ?? '-' }} Kg </p>
                        <p class="general">TB/PB : {{ $pengukuranTerakhir->pb ?? $pengukuranTerakhir->tb }} Cm</p>
                        <div class="status">
                            <div class="card">
                                <p>Status BB</p>
                                <h6>
                                    {!! kategoriStatusBb($pengukuranTerakhir->bb_zscore ?? null) !!}</h6>
                            </div>
                            <div class="card">
                                <p>Status TB/PB</p>
                                <h6>
                                    {!! kategoriStatusPbTb($pengukuranTerakhir->pb_zscore ?? $pengukuranTerakhir->tb_zscore) !!}</h6>
                            </div>
                        </div>
                    </div>
                    <h2>Kurva BB</h2>
                    <div style="height: 400px" id="chart"></div>
                    <h2>Kurva TB/PB</h2>
                    <div style="height: 400px" id="chart2"></div>
                    <h2>Riwayat Pengukuran</h2>
                    <div class="table-container">
                    <table class="tableq mt-3">
                        <thead>
                            <tr>
                                <th>UMUR</th>
                                <th>Tanggal Ukur</th>
                                <th>UMUR</th>
                                <th>Berat</th>
                                <th>Tinggi</th>
                                <th>BB-ZSCORE</th>
                                <th>TB-ZSCORE</th>
                                <th>BB/U</th>
                                <th>TB/U</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umur as $item)
                                <tr>
                                    <td>{{ $item }}</td>
                                    @php
                                        $dat = $anak
                                            ->pengukuran()
                                            ->where('umur', $item)
                                            ->first();
                                    @endphp
                                    <td>{{ $dat->tanggal_ukur ?? '-' }}</td>
                                    <td>{{ $dat->umur ?? '-' }}</td>
                                    <td>{{ $dat->bb ?? '-' }}</td>
                                    <td>
                                        {{ $dat->pb ?? ($dat->tb ?? '-') }}
                                    </td>
                                    <td>
                                        {{ $dat->bb_zscore ?? '-' }}
                                    </td>
                                    <td>
                                        {{ $dat->pb_zscore ?? ($dat->tb_zscore ?? '-') }}
                                    </td>
                                    <td>{!! kategoriStatusBb($dat->bb_zscore ?? null) ?? '-' !!}</td>
                                    <td>{!! kategoriStatusPbTb($dat->tb_zscore ?? null) ?? '-' !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                bindto: '#chart2',
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
                    columns: {!! json_encode($kurva_pb_tb, true) !!},
                    onclick: function(d, element) {

                    },
                }
            });

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
                    columns: {!! json_encode($kurva_bb['data'], true) !!},
                    onclick: function(d, element) {

                    },
                }
            });
        }
    </script>
@endpush
