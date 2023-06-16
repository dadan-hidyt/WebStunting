@extends('layouts.authenticate')

@section('page-title')
    Hasil Analisa Pengukuran
@endsection


@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="tablesaw table-hover table" data-tablesaw-mode="swipe">
                    <tbody>
                        <tr>
                            <td width="70%">Nama Bayi/Balita</td>
                            <td>:</td>
                            <td>{{ $anak->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>Orang Tua</td>
                            <td>:</td>
                            <td>{{ $anak->orangTua->nama }}</td>
                        </tr>
                        <tr>
                            <td>Hubungan dengan Bayi/Balita</td>
                            <td>:</td>
                            <td>Ibu</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $anak->jenis_kelamin === 'L' ? 'LAKI-LAKI' : 'PEREMPUAn' }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ $anak->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td>Umur Bayi/Balita</td>
                            <td>:</td>
                            <td>{{ hitungBulan($anak->tanggal_lahir) }} Bulan</td>
                        </tr>
                        <tr>
                            <td>Berat Badan (Kg)</td>
                            <td>:</td>
                            <td>{{ $pengukuran->bb }} KG</td>
                        </tr>
                        <tr>
                            <td>Tinggi Badan Berdiri (Cm)</td>
                            <td>:</td>
                            <td>{{ $pengukuran->tb }} Cm</td>
                        </tr>
                        <tr>
                            <td>Tinggi Badan Tidur (Cm)</td>
                            <td>:</td>
                            <td>{{ $pengukuran->pb ?? '-' }} Cm</td>
                        </tr>


                    </tbody>
                </table>
                <table class="tablesaw table-hover table" data-tablesaw-mode="swipe">
                    <tbody>
                        <tr>
                            <td style="text-align:left"><b><u>HASIL ANALISA</u></b></td>
                        </tr>

                        <tr>
                            <td>

                                <p style="text-align:left;">- Tinggi / Panjang Badan pada anak berdasarkan Umur berada pada
                                    kategori &nbsp;<b>{!! kategoriStatusPbTb($pengukuran->tb_zscore ?? $pengukuran->pb_zscore) !!}</b></p>
                                <p style="text-align:left;">- Berat Badan pada anak berdasarkan Umur berada pada kategori
                                    &nbsp;<b>{!! kategoriStatusBb($pengukuran->bb_zscore) !!}</b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="tablesaw table-hover table" data-tablesaw-mode="swipe">
                    <tbody>
                        <tr>
                            <td style="text-align:left"><b><u>REKOMENDASI</u></b></td>
                        </tr>

                        <tr>
                            <td>
                                <p style="text-align:left;">
                                    {!! rekomendasiDanSaranHidupSehatByZscore($pengukuran->bb_zscore) !!}
                                    </b></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
