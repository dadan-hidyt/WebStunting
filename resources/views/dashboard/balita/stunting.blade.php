@extends('layouts.authenticate')

@section('page-title')
    Daftar Bayi Stunting
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <table id="data-bayi-stunting" class="display table table-bordered table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur/bulan</th>
                                <th>Umur Terakhir Pengukuran</th>
                                <th>ZS TB/U(Terakhir)</th>
                                <th>ZS BB/U(Terakhir)</th>
                                <th>Action</th>
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
                scrollX: false,
                serverSide : true,
                processing : true,
                responsive : true,
                ajax : "{{ route('ajax.balita.getDataStunting') }}" ,
                columns : [
                    {name : 'DT_RowIndex',data:'DT_RowIndex'},
                    {name : 'nik',data : 'nik'},
                    {name : 'nama_lengkap',data : 'nama_lengkap'},
                    {name : 'jenis_kelamin',data : 'jenis_kelamin'},
                    {name : 'umur',data : 'umur'},
                    {name : 'umur_terakhir_pengukuran', data : 'umur_terakhir_pengukuran'},
                    {name : 'tinggi_badan', data : 'tinggi_badan'},
                    {name : 'berat', data : 'berat'},
                    {name : 'action', data : 'action'}

                ]
               
            })
    </script>
@endpush
