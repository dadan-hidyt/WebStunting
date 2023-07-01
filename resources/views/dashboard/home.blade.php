@extends('layouts.authenticate')
@section('page-title')
    Dashboard
@endsection
@section('content')
    @auth
        <p class="alert alert-info">Selamat Datang {{ auth()->user()->name }} Di dashboard {{ config('app.name') }}</p>
    @endauth
    <div class="statistic-wrapper">
        <div class="card">
            <h2>Statistic</h2>
            <span>Persentase total balita stunting dan jumlah pengukuran</span>
            <div class="content">
                <div class="d-flex flex-column align-items-center text-center w-full">
                    <input type="text" class="knob" disabled value="{{ $stunting }}" data-thickness="0.2"
                        data-max="{{ $total_balita }}" data-width="100" data-height="100" data-fgColor="#00a65a">
                    <label for="" class="mt-3">
                        Balita Stunting
                    </label>
                </div>
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input data-thickness="0.2" disabled type="text" class="knob" value="{{ $total_pengukuran }}"
                        data-max="{{ $total_balita }}" data-width="100" data-height="100" data-fgColor="#0099ff">
                    <label for="" class="mt-3">
                        Jumlah Pengukuran
                    </label>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="district-picker">
                <h2>Kasus Per Kabupaten</h2>
                <select name="" class="form-control select2 select2-purple" id="select_kab">
                    <option value="">--Pilih Kabupaten / Kota--</option>
                    @if (!empty($kabupatenKota))
                        @foreach ($kabupatenKota as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama_kab_kota }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="content">
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input id="balita_stunting_by_kab" type="text" class="knob" data-thickness="0.2" data-width="100"
                        data-height="100" data-fgColor="#00a65a">
                    <label for="" class="mt-3">
                        Balita Stunting
                    </label>
                </div>
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input id="jumlah_pengukuran_by_kab" type="text" class="knob" data-thickness="0.2" data-width="100"
                        data-height="100" data-fgColor="#0099ff">
                    <label for="" class="mt-3">
                        Jumlah Pengukuran
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="card small-box">
                <i class="fas fa-baby"></i>
                <div class="inner">
                    <h3>{{ $total_balita }}</h3>
                    <p>Total Balita</p>
                </div>
                <a href="{{ route('dashboard.balita.semua') }}" class="link-btn">Data Balita<i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="card small-box">
                <i class="fas fa-calculator"></i>
                <div class="inner">
                    <h3>{{ $total_pengukuran }}</h3>
                    <p>Total Pengukuran</p>
                </div>
                <a href="data-balita-stunting.html" class="link-btn">Data Pengukuran<i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="card small-box">
                <i class="fas fa-city"></i>
                <div class="inner">
                    <h3>{{ $kabupatenKota->count() }}</h3>
                    <p>Total Kabupaten</p>
                </div>
                <a href="{{ route('dashboard.data-master.kabupaten_kota') }}" class="link-btn">Data Kabupaten / Kota<i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="card small-box">
                <i class="fas fa-city"></i>
                <div class="inner">
                    <h3>{{ $total_kecamatan }}</h3>
                    <p>Total Kecamatan</p>
                </div>
                <a href="{{ route('dashboard.data-master.kecamatan') }}" class="link-btn">Data Kecamatan<i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('scripts')
    <script>
        $('#select_kab').select2({
            placeholder: 'Kab/Kota'
        });


        //request ajax

        $('#balita_stunting_by_kab').val(0);

        $('#jumlah_pengukuran_by_kab').val(0);


        $('#select_kab').on('change', (e) => {
            $.ajax({
                url: `{{ route('ajax.kabupaten_kota.get') }}?kab_id=${e.target.value}`,
                type: 'GET',
                success: function(response) {
                    $('#balita_stunting_by_kab').val(response.jumlah_stunting);

                    $('#jumlah_pengukuran_by_kab').val(response.jumlah_pengukuran);

                }
            });
        })
    </script>
@endpush
