@extends('layouts.authenticate')
@section('page-title', 'Export Import')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-print">
                <div class="card-header">
                    Ekspor data ke excel
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <label for="">Pilih Kabupaten</label>
                            <select name="" id="kabupaten" class="form-control">
                                @empty(!$kabupaten_kota)
                                    @foreach ($kabupaten_kota as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kab_kota }}</option>
                                    @endforeach
                                @endempty
                            </select>
                        </div>
                        <div class="btn-group d-flex flex-fill flex-wrap">
                            <button id="export-data-balita" class="btn">EXPORT DATA BALITA</button>
                            <button id="export-data-pengukuran" class="btn">EXPORT DATA PENGUKuRAN</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-print">
                <div class="card-header">
                    Impor data dari Excel
                </div>
                <div class="card-body">
                    <div id="error"></div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <form id='form-upload-excel-anak' method="POST" action="">
                                <div class="form-group">
                                    <label for="">Pilih File (excel)</label>
                                    <input type="file" class="form-control" name="file" id="">
                                </div>
                                <div class="btn-group d-flex flex-fill flex-wrap">
                                    <a href="" class="btn btn-excel">Download template <i
                                            class="far fa-file-excel"></i></a>
                                    <button class="btn">Upload data balita</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Pilih Kecamatan</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">--pilih salah satu--</option>
                                        <option value="">option</option>
                                        <option value="">option</option>
                                        <option value="">option</option>
                                        <option value="">option</option>
                                        <option value="">option</option>
                                    </select>
                                </div>
                                <div class="btn-group d-flex flex-fill flex-wrap">
                                    <a href="" class="btn btn-excel">Download template <i
                                            class="far fa-file-excel"></i></a>
                                    <a href="" class="btn">Upload data pengukuran</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(() => {
            const export_balita = $('#export-data-balita');

            const export_pengukuran = $('#export-data-pengukuran');

            export_balita.on('click', () => {
                export_balita.html("Memperosess...");
                const kec = $('#kabupaten').val();
                window.open(`{{ route('ajax.export.export-balita') }}?kec=${kec}`);
                export_balita.html("Export Data Balita");

            })
            export_pengukuran.on('click', () => {
                export_pengukuran.html("Memperosess...");
                const kec = $('#kabupaten').val();
                window.open(`{{ route('ajax.export.export-pengukuran') }}?kab_id=${kec}`);
                export_pengukuran.html("Export Data Balita");
            })



        });
        const form = document.getElementById('form-upload-excel-anak');
        form.addEventListener('submit', function($e) {
            $e.preventDefault();
            const data = new FormData($e.target);
            data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.export-import.import-balita') }}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(e) {
                    if(e.status === false) {
                        for (const key in e.gagal) {
                            if (e.gagal.hasOwnProperty.call(e.gagal, key)) {
                                const element = e.gagal[key];
                                console.log(element);
                            }
                        }
                    }
                }
            })
        })
    </script>
@endpush
