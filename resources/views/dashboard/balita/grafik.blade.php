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
                                        <b>{{ $anak->orangTua->posyandu->nama_posyandu ?? '-' }}</b>
                                    </div>
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
                    <div class="card-title">Kurva Berat Badan</div>
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
                        <div id="kurva-bb" class="chartjs-render-monitor col-12"></div>
                    </div>
                </div>

                <div class="card-header">
                    <div class="card-title">Kurva Tinggi Badan</div>
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
                        <div id="kurva-pb-tb" class="col-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail-berat-badan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Kurva</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>Tanggal Ukur: <span id="tanggal-ukur"></span></div>
                    <div>BB: <span id="bb"></span></div>
                    <div>BB Z-SCORE: <span id="bb_zscore"></span></div>
                    <div>Status: <span id="status"></span></div>
                    <div>UMUR: <span id="umur"></span> Bulan</div>
                </div>
                <div class="modal-footer">
                    <button id="detail-bb-close" class="btn btn-info">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-detail-tinggi-badan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Kurva</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>Tanggal Ukur: <span id="tanggal-ukur"></span></div>
                    <div>TB: <span id="bb"></span></div>
                    <div>TB Z-SCORE: <span id="bb_zscore"></span></div>
                    <div>Status: <span id="status"></span></div>
                    <div>UMUR: <span id="umur"></span> Bulan</div>
                </div>
                <div class="modal-footer">
                    <button id="detail-tb-close" class="btn btn-info">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function() {


            $('#detail-bb-close').on('click', () => {
                $('#modal-detail-berat-badan').modal('hide');
                $('#modal-detail-berat-badan #tanggal-ukur').html('');
                $('#modal-detail-berat-badan #bb').html('');
                $('#modal-detail-berat-badan #bb_zscore').html('');
                $('#modal-detail-berat-badan #umur').html('');
                $('#modal-detail-berat-badan #status').html('');
            })

            $('#detail-tb-close').on('click', () => {
                $('#modal-detail-tinggi-badan').modal('hide');
                $('#modal-detail-tinggi-badan #tanggal-ukur').html('');
                $('#modal-detail-tinggi-badan #bb').html('');
                $('#modal-detail-tinggi-badan #bb_zscore').html('');
                $('#modal-detail-tinggi-badan #umur').html('');
                $('#modal-detail-tinggi-badan #status').html('');
            })

            async function detailKurvaPengukuranBB(d) {
                const data = await fetch(
                    `{{ route('ajax.detail_kurva_bb') }}?anak_id={{ $anak->id }}&bulan=${d.x}`);
                const response = await data.json();
                if (response.length != 0) {
                    $('#modal-detail-berat-badan #tanggal-ukur').html(response.tanggal_ukur);
                    $('#modal-detail-berat-badan #bb').html(response.bb + ' KG');
                    $('#modal-detail-berat-badan #bb_zscore').html(response.bb_zscore);
                    $('#modal-detail-berat-badan #umur').html(response.umur);
                    $('#modal-detail-berat-badan #status').html(response.status);

                } else {
                    $('#modal-detail-berat-badan #tanggal-ukur').html('Belum ada pengukuran');
                    $('#modal-detail-berat-badan #bb').html('Belum ada pengukuran');
                    $('#modal-detail-berat-badan #bb_zscore').html('Belum ada pengukuran');
                    $('#modal-detail-berat-badan #umur').html('Belum ada pengukuran');
                    $('#modal-detail-berat-badan #status').html('Belum ada pengukuran');
                }
            }
            async function detailKurvaPengukuranTb(d) {
                const data = await fetch(
                    `{{ route('ajax.detail_kurva_tb') }}?anak_id={{ $anak->id }}&bulan=${d.x}`);
                const response = await data.json();
                if (response.length != 0) {
                    $('#modal-detail-tinggi-badan #tanggal-ukur').html(response.tanggal_ukur);
                    $('#modal-detail-tinggi-badan #bb').html(response.tb + ' CM');
                    $('#modal-detail-tinggi-badan #bb_zscore').html(response.tb_zscore);
                    $('#modal-detail-tinggi-badan #umur').html(response.umur);
                    $('#modal-detail-tinggi-badan #status').html(response.status);

                } else {
                    $('#modal-detail-tinggi-badan #tanggal-ukur').html('Belum ada pengukuran');
                    $('#modal-detail-tinggi-badan #bb').html('Belum ada pengukuran');
                    $('#modal-detail-tinggi-badan #bb_zscore').html('Belum ada pengukuran');
                    $('#modal-detail-tinggi-badan #umur').html('Belum ada pengukuran');
                    $('#modal-detail-tinggi-badan #status').html('Belum ada pengukuran');
                }
            }

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
                    x: 'umur',
                    columns: {!! json_encode($kurva_bb['data'], true) !!},
                    onclick: function(d, element) {
                        if (d.name === 'pengukuran') {
                            $('#modal-detail-berat-badan').modal('show');
                            detailKurvaPengukuranBB(d);

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
                    x: 'umur',
                    columns: {!! json_encode($kurva_pb_tb) !!},
                    onclick: function(d, element) {
                        if (d.name === 'pengukuran') {
                            $('#modal-detail-tinggi-badan').modal('show');
                            detailKurvaPengukuranTb(d);

                        }
                    },
                }
            })
        }
    </script>
@endpush
