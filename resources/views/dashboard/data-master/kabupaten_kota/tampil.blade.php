@extends('layouts.authenticate')
@section('page-title','Kabupaten Kota')

@section('content')
        <div class="row">
            <div class="col-12 mt-4">
                <div class="col-12 mt-4">
                    @if (session()->has('notifikasi'))
                        @if (session('notifikasi')['type'] === 'success')
                            <p class="alert alert-success">{{session('notifikasi')['msg']}}</p>
                        @else
                            <p class="alert alert-danger">{{session('notifikasi')['msg']}}</p>

                        @endif
                    @endif
                    <div class="card overflow-hidden">
                        <div class="table-header">
                            <a href="{{route('dashboard.data-master.kabupaten_kota.tambah')}}" class="btn-add-data">
                                Input Data Kab/Kota
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="kab-kota" class="display nowrap table table-bordered table-head-fixed" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kab / Kota</th>
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
                        $('#kab-kota').DataTable({
                            responsive: true,
                            serverSide : true,
                            processing : true,
                            ajax : "{{ route('ajax.kabupaten_kota.semua') }}",
                            columns: [
                                {name : 'no',data : 'DT_RowIndex'},
                                {name : 'nama_kab_kota',data : 'nama_kab_kota'},
                                {name : 'action',data : 'action'},

                            ]
                        });
                    });
                </script>
        @endpush

