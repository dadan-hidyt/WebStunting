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
                        <div class="col-12 col-lg-12">
                            <form id='form-upload-excel-anak' method="POST" action="">
                                <div class="form-group">
                                    <label for="">Pilih File (excel)</label>
                                    <input required type="file" class="form-control" name="file" id="">
                                </div>
                                <div class="btn-group d-flex flex-fill flex-wrap">
                                    <a href="{{asset('xlsx/format-import-balita.xlsx')}}" class="btn btn-excel">Download template <i
                                            class="far fa-file-excel"></i></a>
                                    <button id="import-balita-btn" class="btn">Upload data balita</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="col-12 col-lg-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Pilih File (xlsx)</label>
                                    <input class="form-control" type="file" name="file">
                                </div>
                                <div class="btn-group d-flex flex-fill flex-wrap">
                                    <a href="" class="btn btn-excel">Download template <i
                                            class="far fa-file-excel"></i></a>
                                    <button class="btn btn-primary">IMPORT</button>
                                </div>
                            </form>
                        </div> --}}
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
            $('#import-balita-btn').html("Mengimport...");
            const data = new FormData($e.target);
            data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "{{ route('dashboard.export-import.import-balita-post') }}",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                error : function (e){
                    console.log(e)
                },
                success: function(e) {
                    $('#import-balita-btn').html('Upload data balita');
                    if(e.status === false) {
                        let err = '';
                        for (const key in e.gagal) {
                            if (e.gagal.hasOwnProperty.call(e.gagal, key)) {
                                const element = e.gagal[key];
                                err+= `<p class='alert alert-danger'>${element}</p>`;
                            }
                        }
                        $('#error').html(err)
                    } else {
                        $("#error").html(`<p class='alert alert-success'>Data Berhasil Di import</p>`)
                    }
                }
            })
        })
    </script>
@endpush
