@extends('layouts.authenticate')

@section('page-title')
    Data Kecamatan
@endsection

@section('content')

<div class="row">
    <div class="col-12">
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
          <a href="{{route('dashboard.data-master.kecamatan.tambah')}}" class="btn-add-data">
            Input Data Kecamatan
          </a>
        </div>
        <div class="card-body">
          <table id="tabel-kecamatan" class="display nowrap table table-bordered table-head-fixed" style="width: 100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kecamatan</th>
                <th>Kabupaten/Kota</th>
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
            $('#tabel-kecamatan').DataTable({
                responsive: true,
                serverSide : true,
                processing : true,
                ajax : "{{ route('ajax.kecamatan.semua') }}",
                columns: [
                    {name : 'no',data : 'DT_RowIndex'},
                    {name : 'nama_kecamatan',data : 'nama_kecamatan'},
                    {name : 'kab_kota',data : 'kab_kota'},
                    {name : 'action',data : 'action'},

                ]
            });
        });
    </script>
@endpush
