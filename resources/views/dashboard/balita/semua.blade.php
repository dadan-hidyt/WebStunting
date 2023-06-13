@extends('layouts.authenticate')

@section('page-title') {{$title}} @endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="{{route('dashboard.balita.tambah')}}" class="btn-add-data">
                        Input Data Balita
                    </a>
                    <a href="#" class="btn-print">
                        <i class="fas fa-print"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table id="example1" class="display nowrap table table-striped" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Anak Ke</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Orang  Tua</th>
                            <th>Desa/Kel</th>
                            <th>Posyandu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
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
        $(function () {
            $("#example1").DataTable({
                processing :true,
                serverSide : true,
                ajax : "{{ route('ajax.balita.getData') }}" ,
                columns : [
                    {data : 'id', name : 'id'},
                    {data : 'nik',name : 'nik'},
                    {data : 'nama_lengkap', name : 'nama_lengkap'},
                    {data:'anak_ke',name : 'anak_ke'},
                    {data : 'jenis_kelamin', name : 'jenis_kelamin'},
                    {data : 'tempat_tanggal_lahir', name : 'tempat_tanggal_lahir'},
                    {data:'umur',name : 'umur'},
                    {data : 'orang_tua', name : 'orang_tua'},
                    {data:'kelurahan_desa',name : 'kelurahan_desa'},
                    {data : 'posyandu',name : 'posyandu'},
                    {data:'action',name : 'action'}
                ],
                scrollX: true,
                "lengthChange": true,
                "autoWidth": false,
                "info": false,
            })
        });
    </script>


@endpush
