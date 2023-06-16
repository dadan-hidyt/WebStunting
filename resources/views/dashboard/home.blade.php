@extends('layouts.authenticate')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="statistic-wrapper">
        <div class="card">
            <h2>Statistic</h2>
            <span>Persentase total balita stunting dan jumlah pengukuran</span>

            <div class="content">

                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input type="text" class="knob" value="{{ $stunting }}" data-thickness="0.2"
                        data-max="{{ $total_balita }}" data-width="100" data-height="100" data-fgColor="#00a65a">
                    <label for="" class="mt-3">
                        Balita Stunting
                    </label>
                </div>
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input type="text" class="knob" value="{{ $total_pengukuran }}" data-max="{{ $total_balita }}"
                        data-width="100" data-height="100" data-fgColor="#0099ff">
                    <label for="" class="mt-3">
                        Jumlah Pengukuran
                    </label>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="district-picker">
                <h2>Kasus Per Kecamatan</h2>
                <select name="" id="">
                    <option value="">Pilih Kecamatan</option>
                    <option value="">Nagarawangi</option>
                    <option value="">Nagarawangi</option>
                    <option value="">Nagarawangi</option>
                    <option value="">Nagarawangi</option>
                    <option value="">Nagarawangi</option>
                </select>
            </div>
            <div class="content">
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input type="text" class="knob" value="10" data-thickness="0.2" data-max="100" data-width="100"
                        data-height="100" data-fgColor="#00a65a">
                    <label for="" class="mt-3">
                        Balita Stunting
                    </label>
                </div>
                <div class="d-flex flex-column align-items-center text-center w-50">
                    <input type="text" class="knob" value="80" data-thickness="0.2" data-max="100" data-width="100"
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
