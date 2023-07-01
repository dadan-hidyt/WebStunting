@extends('layouts.authenticate')
@section('page-title', $title ?? 'Orang Tua')

@section('content')
    <div class="row">
        <div class="col-12">
			@if (session()->has('notifikasi'))
                @if (session('notifikasi')['type'] === 'success')
                   <p class="alert alert-success">{{session('notifikasi')['msg']}}</p>
                @else
                    <p class="alert alert-danger">{{session('notifikasi')['msg']}}</p>

                @endif
            @endif
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="{{ route('dashboard.data-master.orang_tua.tambah') }}" class="btn-add-data">
                        Input Data Orangtua
                    </a>
                </div>
                <div class="card-body">
                    <table id="tabel-orang-tua" class="display nowrap table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>No KK</th>
                                <th>Nama</th>
                                <th>Kabupaten / Kota</th>
                                <th>Kecamatan</th>
                                <th>Posyandu Pembina</th>
                                <th>Alamat Lengkap</th>
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
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@push('scripts')
    <script>
        $(() => {
            $('#tabel-orang-tua').DataTable({
            
                processing: true,
                scrollX : true,
                fixedColumns: {
                    right : 1,
                },
                serverSide: true,
                ajax: "{{ route('ajax.orang-tua.semua') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data : 'kabupaten',
                        name : 'kabupaten'
                    },
                    {
                        data : 'kecamatan',
                        name : 'kecamatan'
                    },
                    {
                        data : 'posyandu_pembina',
                        name : 'posyandu_pembina'
                    },
                    {
                        data : 'alamat_lengkap',
                        name : 'alamat_lengkap'
                    },
                    {
                        data : 'kontak',
                        name : 'kontak'
                    },
                    {
                        data : 'action',
                        name : 'action'
                    },
                    

                ]
            });
        })
    </script>
@endpush
