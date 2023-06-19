@extends('layouts.authenticate')

@section('page-title')
    Hasil Pengukuran
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <table id="data-bayi-stunting" class="display nowrap  table table-bordered table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Ukur</th>
                                <th>NOMOR KK</th>
                                <th>KK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur/bulan</th>
                                <th>ZS TB/U</th>
                                <th>ZS PB/U</th>
                                <th>ZS BB/U</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@push('scripts')
    <script>
        $("#data-bayi-stunting").DataTable({
                scrollX: true,
                serverSide : true,
                processing : true,
                lengthChange: true,
                autoWidth: true,
                fixedColumns: {
                    right : 0,
                    left : 2,
                },
                info: true,
                scrollCollapse: true,
                ajax : "{{ route('ajax.pengukuran.semua') }}" ,
                columns : [
                    {name : 'DT_RowIndex',data:'DT_RowIndex'},
                    {name : 'tanggal_ukur',data:'tanggal_ukur'},
                    {name : 'nomor_kk',data : 'nomor_kk'},
                    {name : 'nik',data : 'nik'},
                    {name : 'nama_lengkap',data : 'nama_lengkap'},
                    {name : 'jenis_kelamin',data : 'jenis_kelamin'},
                    {name : 'umur',data : 'umur'},
                    {name : 'tinggi_badan', data : 'tinggi_badan'},
                    {name : 'panjang_badan', data : 'panjang_badan'},
                    {name : 'berat', data : 'berat'},
                ]

            })
    </script>
@endpush
