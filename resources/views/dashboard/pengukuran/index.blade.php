@extends("layouts.authenticate")
@section('page-title', "Pengukuran");
@section('content')
<div class="row">
    <div class="col-12 mt-4">
      <div class="card card-count-form overflow-hidden">
        <div class="card-header">
          Data balita
          <div class="row  mt-3">
            <div class="data-group col-12 col-lg-6">
              <div class="data">
                <h6>NIK:</h6>
                <p>{{$balita->nik}}</p>
              </div>
              <div class="data">
                <h6>Nama:</h6>
                <p>{{ $balita->nama_lengkap ?? '?' }}</p>
              </div>
              <div class="data">
                <h6>Jenis Kelamin:</h6>
                <p>{{ parseJenisKelamin($balita->jenis_kelamin)  }}</p>
              </div>
            </div>
            <div class="data-group col-12 col-lg-6">
              <div class="data">
                <h6>Umur:</h6>
                <p>{{ hitungBulan($balita->tanggal_lahir) }} Bulan - {{ parseTanggalLahir($balita->tanggal_lahir)->y }} Tahun {{ parseTanggalLahir($balita->tanggal_lahir)->m }} Bulan {{ parseTanggalLahir($balita->tanggal_lahir)->d }} Hari</p>
              </div>
              <div class="data">
                <h6>Nama Ibu:</h6>
                <p>{{ $balita->orangTua->nama ?? 'Unknown' }}</p>
              </div>
              <div class="data">
                <h6>Anak ke:</h6>
                <p>{{ $balita->anak_ke }}</p>
              </div>
            </div>
            <div class="menu-group col-12 d-flex flex-wrap">
              <button  type="button" data-toggle="modal" data-target="#modal-lg" class="menu">Tambah Pengukuran</button>
{{--              <a href="" class="menu">Tambah Asi</a>--}}
            </div>
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="display nowrap table table-striped" style="width: 100%;">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Berat</th>
                <th>Tinggi</th>
                <th>BB/U</th>
                <th>ZS BB/U</th>
                <th>ZS BB/U</th>
                <th>BB/TB</th>
                <th>ZS BB/TB</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="act-btn-group">
                  <button class="btn-delete"><i class="far fa-trash-alt"></i></button>
                </td>
              </tr>
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
