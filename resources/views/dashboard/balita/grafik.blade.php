@extends('layouts.authenticate')

@section('page-title')
    {{ $title ?? 'Grafik' }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="card-body">



                    <div class="widget-header widget-header-small">
                        <h5 class="widget-title lighter green"><i class="ace-icon fa fa-child"></i> <b>Data Balita</b></h5>
                        <hr>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main">
                            <input type="hidden" name="id" value="3315014106210001">

                            <div class="row row-demo-grid">
                                <div class="col-xl-4">
                                    <div style="text-align: left; height: 30px;">NIK : {{ $anak->nik ?? null }}</div>
                                </div>
                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;">Umur :
                                        {{ hitungBulan($anak->tanggal_lahir) ?? null }} Bulan -
                                        {{ parseTanggalLahir($anak->tanggal_lahir)->y }} Tahun
                                        {{ parseTanggalLahir($anak->tanggal_lahir)->m }} Bulan
                                        {{ parseTanggalLahir($anak->tanggal_lahir)->y }} Hari</div>
                                </div>


                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;">Nama : <b>{{ $anak->nama_lengkap }}</b>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;"> Nama Ibu :
                                        <b>{{ $anak->orangTua->nama }}</b>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;"> Posyandu :
                                        <b>{{ $anak->orangTua->posyandu->nama_posyandu ?? '-' }}</b></div>
                                </div>

                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;">Jenis Kelamin :
                                        {{ $anak->jenis_kelamin === 'L' ? 'LAKI LAKI' : 'WANITA' }}</div>
                                </div>
                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;"> Anak Ke : {{ $anak->anak_ke }}</div>
                                </div>
                                <div class="col-xl-4">
                                    <div style="text-align: left;  height: 30px;"> Alamat :
                                        {{ $anak->orangTua->alamat_lengkap ?? '-' }}</div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <br>


                <div class="card-header">
                    <div class="card-title">Grafik Berat Badan</div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="ChartBeratBadan" class="chartjs-render-monitor col-12"></canvas>
                    </div>
                </div>

                <div class="card-header">
                    <div class="card-title">Grafik Tinggi Badan</div>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="ChartTinggiBadan" class="col-12"></canvas>
                    </div>
                </div>

            </div>
        </div>





    </div>
@endsection
@push('scripts')
    <script>
        ChartOptions1 = {
            responsive: false,
            layout: {
                padding: {
                    top: 12,
                    left: 12,
                    bottom: 12,
                },
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        borderDash: [],
                    },
                }],

                yAxes: [{
                    gridLines: {
                        borderDash: [],
                    },
                }],
            },
            plugins: {
                datalabels: {
                    display: true,
                    font: {
                        style: ' bold',
                    },
                },
            },
            legend: {
                labels: {
                    generateLabels: function(chart) {
                        return chart.data.datasets.map(function(dataset, i) {
                            return {
                                text: dataset.label,
                                lineCap: dataset.borderCapStyle,
                                lineDash: [],
                                lineDashOffset: 0,
                                lineJoin: dataset.borderJoinStyle,
                                fillStyle: dataset.backgroundColor,
                                strokeStyle: dataset.borderColor,
                                lineWidth: dataset.pointBorderWidth,
                                lineDash: dataset.borderDash,
                            }
                        })
                    },

                },
            },

            title: {
                display: true,
                text: 'Grafik Pertumbuhan Berat Badan',
                fontColor: '#3498db',
                fontSize: 22,
                fontStyle: ' bold',
            },
            elements: {
                arc: {},
                point: {
                    pointStyle: 'circle',
                },
                line: {
                    tension: 0.05,
                    fill: false,
                    borderWidth: 1,
                },
                rectangle: {},
            },
            tooltips: {
                backgroundColor: 'rgba(0,0,0,0.6)',
                titleSpacing: 0,
                cornerRadius: 5,
            },
            hover: {
                mode: 'nearest',
                animationDuration: 400,
            },
        };

        var ChartDataBeratBadan = {
            labels: {!! json_encode($umur) !!},
            datasets: [{
                    data: {!! json_encode($bbsdmin3) !!},
                    backgroundColor: '#ff0000',
                    borderColor: '#ff0000',
                    pointBackgroundColor: '#ff0000',
                    label: "-3sd"
                },

                {
                    data: {!! json_encode($bbsdmin2) !!},
                    backgroundColor: '#d42d2d',
                    borderColor: '#d42d2d',
                    pointBackgroundColor: '#ff0000',
                    label: "-2sd"
                },

                {
                    data: {!! json_encode($bbsdmin1) !!},
                    backgroundColor: '#ffee00',
                    borderColor: '#ffee00',
                    pointBackgroundColor: '#ffee00',
                    label: "-1sd"
                },

                {
                    data: {!! json_encode($bbmedian) !!},
                    backgroundColor: '#00ff0d',
                    borderColor: '#00ff0d',
                    pointBackgroundColor: '#ff0000',
                    pointBorderColor: '#ffffff',
                    label: "Median"
                },

                {
                    data: {!! json_encode($bbsd1) !!},
                    backgroundColor: 'red',
                    borderColor: 'red',
                    pointBackgroundColor: 'red',
                    pointBorderColor: '#ffffff',
                    label: "1sd"
                },

                {
                    data: {!! json_encode($bbsd2) !!},
                    backgroundColor: '#d42d2d',
                    borderColor: '#d42d2d',
                    pointBackgroundColor: '#ff0000',
                    label: "2sd"
                },

                {
                    data: {!! json_encode($bbsd3) !!},
                    backgroundColor: '#ff0000',
                    borderColor: '#ffee00',
                    pointBackgroundColor: '#ff0000',
                    label: "3sd"
                },

                {
                    data: {!! json_encode($bbpengukuran) !!},
                    backgroundColor: '#0044ff',
                    borderColor: '#0044ff',
                    pointBackgroundColor: '#ff0000',
                    label: "Pengukuran"
                },

            ]
        };


        var myLine = new Chart(document.getElementById('ChartBeratBadan').getContext("2d"), {
            type: 'line',
            data: ChartDataBeratBadan,
            options: ChartOptions1
        });
        document.getElementById('ChartBeratBadan').getContext("2d").stroke();
		
		ChartOptions2 = {
            responsive: false,
            layout: {
                padding: {
                    top: 12,
                    left: 12,
                    bottom: 12,
                },
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        borderDash: [],
                    },
                }],

                yAxes: [{
                    gridLines: {
                        borderDash: [],
                    },
                }],
            },
            plugins: {
                datalabels: {
                    display: true,
                    font: {
                        style: ' bold',
                    },
                },
            },
            legend: {
                labels: {
                    generateLabels: function(chart) {
                        return chart.data.datasets.map(function(dataset, i) {
                            return {
                                text: dataset.label,
                                lineCap: dataset.borderCapStyle,
                                lineDash: [],
                                lineDashOffset: 0,
                                lineJoin: dataset.borderJoinStyle,
                                fillStyle: dataset.backgroundColor,
                                strokeStyle: dataset.borderColor,
                                lineWidth: dataset.pointBorderWidth,
                                lineDash: dataset.borderDash,
                            }
                        })
                    },

                },
            },

            title: {
                display: true,
                text: 'Grafik Pertumbuhan Tinggi / Panjang Badan',
                fontColor: '#3498db',
                fontSize: 22,
                fontStyle: ' bold',
            },
            elements: {
                arc: {},
                point: {
                    pointStyle: 'circle',
                },
                line: {
                    tension: 0.05,
                    fill: false,
                    borderWidth: 2,
                },
                rectangle: {},
            },
            tooltips: {
                backgroundColor: 'rgba(0,0,0,0.6)',
                titleSpacing: 0,
                cornerRadius: 5,
            },
            hover: {
                mode: 'nearest',
                animationDuration: 400,
            },
        };

		var myLine2 = new Chart(document.getElementById('ChartTinggiBadan').getContext("2d"), {
            type: 'line',
            data: ChartDataBeratBadan,
            options: ChartOptions2
        });
        document.getElementById('ChartTinggiBadan').getContext("2d").stroke();
    </script>
@endpush
