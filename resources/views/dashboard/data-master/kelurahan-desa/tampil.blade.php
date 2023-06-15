@extends('layouts.authenticate')
@section('page-title','Data Kelurahan / Desa')
@section('content')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card overflow-hidden">
                <div class="table-header">
                    <a href="data-desa-input.html" class="btn-add-data">
                        Input Data Desa
                    </a>
                </div>
                <div class="card-body">
                    <table id="data-kelurahan-desa" class="display table-striped table-bordered table-hover" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
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
        $(function() {
            $('#data-kelurahan-desa').DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: "{{ route('ajax.kelurahan-desa.semua') }}",
                columns: [
                    {name: 'no', data: 'DT_RowIndex'},
                    {name: 'nama_desa', data: 'nama_desa'},
                    {name: 'kecamatan', data: 'kecamatan'},
                    {name: 'action', data: 'action'},

                ]
            });
        })
     </script>
@endpush
