<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grafik Pertumbuhan Anak</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ assets('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ assets('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ assets('dist/css/adminlte.css') }}">

    <link rel="stylesheet" href="{{ assets('plugins/d3js/css/c3.css') }}">

    <style>
        .tableq {
            background: white;
            width: 100%;
            border: 1px solid #dedede;
            border-collapse: collapse;
        }

        .tableq thead {
            box-sizing: border-box;
            color: white;
            background: #008cff;
        }

        .tableq th {
            padding: 4px;
            text-align: center;
            border: 1px solid #dedede;
        }

        .tableq td {
            text-align: center;
            border: 1px solid #dedede;
        }
    </style>

</head>

<body>
    @php
        $pengukuranTerakhir = $anak
            ->pengukuran()
            ->latest()
            ->first();
    @endphp
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 border p-4">
                <h4>Data Anak</h4>
                <div class="col-12">
                    <div>
                        <span>Nama: {{ $anak->nama_lengkap ?? 'pragos' }}</span>
                    </div>
                    <div>
                        <span>Orang Tua: {{ $anak->orangTua->nama ?? 'pragos' }}</span>
                    </div>
                    <div>
                        <span>Jenis kelamin: {{ $anak->jenis_kelamin ?? 'pragos' }}</span>
                    </div>
                    <div>
                        <span>Tanggal Lahir: {{ $anak->tanggal_lahir ?? 'pragos' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-6 border p-4">
                <h4>Data Pengukuran</h4>
                <div class="col-12">
                    <div>
                        <span>BB: {{ $pengukuranTerakhir->bb ?? '-' }} KG</span>
                    </div>
                    <div>
                        <span>TB: {{ $pengukuranTerakhir->pb ?? ($pengukuranTerakhir->tb ?? '-') }} CM</span>
                    </div>
                    <div>
                        <span>BB-ZSCORE: {{ $pengukuranTerakhir->bb_zscore ?? '-' }} </span>
                    </div>
                    <div>
                        <span>TB-ZSCORE:
                            {{ $pengukuranTerakhir->pb_zscore ?? ($pengukuranTerakhir->tb_zscore ?? '-') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 border">
                <div class="row  p-3">
                    <div class="col-6">Status BB (Pengukuran Terakhir) <span class="d-block">

                            <small>{!! kategoriStatusBb($pengukuranTerakhir->bb_zscore ?? null, true) ?? '' !!}</small>
                        </span></div>
                    <div class="col-6">Status BB (Pengukuran Terakhir) <span class="d-block">
                            <small> {!! kategoriStatusPbTb($pengukuranTerakhir->pb_zscore ?? ($pengukuranTerakhir->tb_zscore ?? null), true) ?? '' !!}
                            </small>
                        </span></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3 border p-3">
                <b>Kurva Berat Badan</b>
                <div class="mt-3">
                    <div class="mb-3">
                        <small class="d-block">Hasil pengukuran: <span id="kg"></span></small>
                        <small>Umur: <span id="umur"></span></small>
                    </div>
                    <div id="kurva-bb"></div>
                </div>
            </div>
            <div class="col-12 mt-3 border p-3">
                <b>Kurva Panjang/Tinggi Badan Badan</b>
                <div class="mt-3">
                    <div class="mb-3">
                        <small class="d-block">Hasil pengukuran: <span id="kg"></span></small>
                        <small>Umur: <span id="umur"></span></small>
                    </div>
                    <div id="kurva-pb-tb"></div>
                </div>
            </div>

            <div class="col-12 mb-3 mt-3 border p-3">

                <b>Riwayat Pengukuran</b>

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

        </div>

    </div>
    <script src="{{ assets('plugins/d3js/js/d3.js') }}"></script>
    <script src="{{ assets('plugins/d3js/js/c3.js') }}"></script>
    <script src="{{ assets('plugins/d3js/js/c3.js') }}"></script>



    <script>
        window.onload = function() {
            var chart = c3.generate({
                bindto: '#kurva-bb',
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
                        if (d.name === 'pengukuran') {
                            document.getElementById('kg').innerHTML = d.value + " Kg";
                            document.getElementById('umur').innerHTML = d.x + " Bulan";
                        }
                    },
                }
            });

            /** KURVA TB/PB BADAN **/
            const chart2 = c3.generate({
                bindto: '#kurva-pb-tb',
                zoom: {
                    enabled: true,
                },
                subchart: {
                    show: false,
                },
                
                point: {
                    show: false,
                   
                },
                tooltip: {
                    grouped: false,
                },
                data: {

                    empty: {
                        label: {
                            text: "Tidak ada data!",
                        }
                    },
                    x: 'umur',
                    columns: {!! json_encode($kurva_pb_tb) !!},
                }
            })
        }
    </script>


</body>

</html>
