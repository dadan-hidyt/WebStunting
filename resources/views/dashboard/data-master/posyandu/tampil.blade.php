@extends('layouts.authenticate')
@section('page-title', 'Data Posyandu')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="{{ route('dashboard.balita.tambah') }}" class="btn-add-data">
                        Input Data Balita
                    </a>
                    <a href="{{ route('dashboard.export.semua.excel') }}" class="btn-print">
                        <i class="fas fa-print"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table id="data-table-posyandu" class="display nowrap table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Posyandu</th>
                                <th>Kab/Kota</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan Desa</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No</td>
                                <td>Bunda Harapan</td>
                                <td>Kab. Sumedang</td>
                                <td>Sumedang Selatan</td>
                                <td>Desa. Margalaksana</td>
                                <td>Jalan Kebon Kol</td>
                                <td>0888282373652</td>
                                <td>Action</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(() => {
            $('#data-table-posyandu').DataTable({
                scrollX: true,
                lengthChange: true,
                autoWidth: true,
                info: true,
                ajax : "{{ route('ajax.posyandu.semua') }}",
                columns : [
                    {data : 'DT_RowIndex', name : 'DT_RowIndex'},
                    {data : 'nama_posyandu',name : 'nama_posyandu'},
                    {data : 'kab_kota', name : 'kab_kota'},
                    {data:'kecamatan',name : 'kecamatan'},
                    {data : 'kelurahan_desa', name : 'kelurahan_desa'},
                    {data : 'alamat', name : 'alamat'},
                    {data:'kontak',name : 'kontak'},
                    {data:'action',name : 'action'}
                ],
            });
        })
    </script>
@endpush
