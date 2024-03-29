@extends('layouts.authenticate')
@section('page-title', 'Input NIK')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <select class="form-control select2" style="width: 100%;" id="anak">
                            <option selected>Pilih Anak</option>
                            @foreach ($anak as $item)
                                <option value="{{ $item->id }}">{{ $item->nik }}-{{ $item->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="det-anak" class="mt-3">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(() => {
            $('#anak').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih anak yang mau di ukur!',
            })
            const anak = $('#anak');

            anak.on('change', (event) => {
                document.getElementById('det-anak').innerHTML = "Loading...";
                const anak_id = event.target.value ?? null;
                $.ajax({
                    type: 'GET',
                    url: `/data/ajax/anak/getAnak/${anak_id}`,
                    success: function(e) {
                        document.getElementById('det-anak').innerHTML = e;
                    },
                    error: function(e) {
                        document.getElementById('det-anak').innerHTML = "Tidak Di temukan";
                    }
                })
            })
        })
    </script>
@endpush
