@extends('layouts.authenticate')
@section('page-title', 'Data Posyandu')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('notifikasi'))
                <p class="alert alert-{{ session('notifikasi')['type'] }}">
                    {{ session('notifikasi')['msg'] }}
                </p>
            @endif
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="{{ route('dashboard.data-master.posyandu.tambah') }}" class="btn-add-data">
                        Input Posyandu
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
        $('#data-table-posyandu').DataTable({
            scrollX: true,
            lengthChange: true,
            autoWidth: true,
            info: true,
            fixedColumns: {
                left: 0,
                right: 1
            },
            ajax: "{{ route('ajax.posyandu.semua') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_posyandu',
                    name: 'nama_posyandu'
                },
                {
                    data: 'kab_kota',
                    name: 'kab_kota'
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan'
                },
                {
                    data: 'kelurahan_desa',
                    name: 'kelurahan_desa'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'kontak',
                    name: 'kontak'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
    </script>
@endpush
