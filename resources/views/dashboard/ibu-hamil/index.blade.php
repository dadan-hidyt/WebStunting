@extends('layouts.authenticate')

@section('page-title', $title ?? 'Ibu Hamil')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="{{ route('dashboard.ibu-hamil.tambah') }}" class="btn-add-data">
                        Tambah Baru
                    </a>
                   
                </div>
                <div class="card-body">
                    <table id="data-table-ibu-hamil" class="display nowrap table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Kabupaten</th>
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
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@push('scripts')
    <script>
        $(function(){
            $('#data-table-ibu-hamil').DataTable({
                scrollX : true,
                serverSide : true,
                processing : true,
                ajax : "{{ route('ajax.ibu-hamil.getData') }}",
                columns : [
                    {name : 'DT_RowIndex', data : 'DT_RowIndex'},
                    {name : 'nik', data : 'nik'},
                    {name : 'nama', data : 'nama'},
                    {name : 'tanggal_lahir', data : 'tanggal_lahir'},
                    {name : 'umur', data : 'umur'},
                    {name : 'kabupaten', data : 'kabupaten'},
                    {name : 'alamat_lengkap', data : 'alamat_lengkap'},
                    {name : 'kontak', data : 'kontak'},
                    {name : 'action', data : 'action'},
                ]
            });
        })
    </script>
@endpush