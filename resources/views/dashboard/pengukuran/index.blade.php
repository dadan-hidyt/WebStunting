@extends('layouts.authenticate')
@section('page-title', 'Pengukuran')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-count-form overflow-hidden">
                <div class="card-header">
                    Data balita
                    <div class="row  mt-3">
                        <div class="data-group col-12 col-lg-6">
                            <div class="data">
                                <h6>NIK:</h6>
                                <p>{{ $balita->nik }}</p>
                            </div>
                            <div class="data">
                                <h6>Nama:</h6>
                                <p>{{ $balita->nama_lengkap ?? '?' }}</p>
                            </div>
                            <div class="data">
                                <h6>Jenis Kelamin:</h6>
                                <p>{{ parseJenisKelamin($balita->jenis_kelamin) }}</p>
                            </div>
                        </div>
                        <div class="data-group col-12 col-lg-6">
                            <div class="data">
                                <h6>Umur:</h6>
                                <p>{{ hitungBulan($balita->tanggal_lahir) }} Bulan -
                                    {{ parseTanggalLahir($balita->tanggal_lahir)->y }} Tahun
                                    {{ parseTanggalLahir($balita->tanggal_lahir)->m }} Bulan
                                    {{ parseTanggalLahir($balita->tanggal_lahir)->d }} Hari</p>
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
                            <button type="button" data-toggle="modal" data-target="#modal-lg" class="menu">Tambah
                                Pengukuran</button>
                            {{--              <a href="" class="menu">Tambah Asi</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('notifikasi'))
                        @if (session('notifikasi')['type'] === 'success')
                            <p class="alert alert-success">
                                {{ session('notifikasi')['msg'] }}
                            </p>
                        @else
                            <p class="alert alert-danger">
                                {{ session('notifikasi')['msg'] }}
                            </p>
                        @endif
                    @endif
                    <table id="example1" class="display nowrap table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Umur</th>
                                <th>Lingkar Kepala (cm)</th>
                                <th>BB(KG)</th>
                                <th>TB/PB(CM)</th>
                                <th>ZS BB/U(Z-Score)</th>
                                <th>BB/U(Kategori)</th>
                                <th>TB-PB/U</th>
                                <th>ZS TB-PB/U</th>
                                <th>ZS BB/TB</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($balita->pengukuran))
                                @foreach ($balita->pengukuran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_ukur }}</td>
                                        <td>{{ $item->umur }} Bulan</td>
                                        <td>{{ $item->lingkar_kepala }} Cm</td>
                                        <!-- BB -->
                                        <td>{{ $item->bb }} Kg</td>
                                        <!-- TB -->
                                        <td>{{ $item->tb ?? $item->pb }} Cm -
                                            {{ \Illuminate\Support\Str::ucfirst($item->cara_ukur) }}</td>
                                        <td>{{ $item->bb_zscore }}</td>
                                        <!-- ZSCORE-BB -->
                                        <td>{!! kategoriStatusBb($item->bb_zscore) !!}</td>
                                        @if ($item->umur >= 24)
                                            <td>{{ $item->tb_zscore }}</td>
                                            <td>{!! kategoriStatusPbTb($item->tb_zscore) !!}</td>
                                        @else
                                            <td>{{ $item->pb_zscore }}</td>
                                            <td>{!! kategoriStatusPbTb($item->pb_zscore) !!}</td>
                                        @endif
                                        <td>{{ $item->bb_zscore }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('dashboard.pengukuran.hasil_analisa', [$balita->id, $item->id]) }}"><i
                                                    class="fa fa-list"></i></a>
                                            &nbsp;
                                            <a onclick="return confirm('Apakah anda yakin?')"
                                                href="{{ route('dashboard.pengukuran.delete', [$balita->id, $item->id]) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Input Pengukuran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('form-input-pengukuran', [
                            'balita' => $balita,
                        ])
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#example1").DataTable({
            scrollX: true,
            lengthChange: true,
            autoWidth: true,
            info: true,
            scrollCollapse: true,
            fixedColumns: {
                left: 0,
                right: 1
            }
        })
    </script>
@endpush
