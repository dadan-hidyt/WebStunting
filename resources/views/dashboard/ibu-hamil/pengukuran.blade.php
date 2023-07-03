@extends('layouts.authenticate')

@section('page-title', $title ?? '')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pengukuran</div>
                </div>
                <div class="card-body">
                    <table>
                        <tbody>
                            <tr>
                                <th>Nama:</th>
                                <td>{{ $ibuHamil->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIK:</th>
                                <td>{{ $ibuHamil->nik }}</td>
                            </tr>
                            <tr>
                                <th>TTL:</th>
                                <td>{{ $ibuHamil->tempat_lahir }},{{ $ibuHamil->tanggal_lahir }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="mb-3">
                        <button id="input_pengukuran" class="btn btn-primary">Tambah Pengukuran</button>
                    </div>
                    <table id="tabel" class="table display nowrap  table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Ukur</th>
                                <th>Berat Badan</th>
                                <th>Lingkar Lengan Atas(LILA)</th>
                                <th>Tinggi Badan</th>
                                <th>Usia Kehamilan</th>
                                <th>BBI</th>
                                <th>BBIH</th>
                                <th>IMT</th>
                                <th>Kategori IMT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Input Pengukuran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('form-pengukuran-ibu-hamil', [
                        'ibuHamil' => $ibuHamil,
                    ])
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@push('scripts')
    <script>
        $(function() {


            $('#input_pengukuran').on('click', () => {
                $('#modal-lg').modal('show')
            })


            const tabel = $('#tabel').DataTable({
                serverSide: true,
                processing: true,
                scrollX: true,
                fixedColumns: {
                    left: 0,
                    right: 1
                },
                ajax: "{{ route('ajax.ibu-hamil.getPengukuran', $ibuHamil->id) }}",
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    },
                    {
                        name: 'tanggal_ukur',
                        data: 'tanggal_ukur'
                    },
                    {
                        name: 'berat_badan',
                        data: 'berat_badan'
                    },
                    {
                        name: 'lila',
                        data: 'lila'
                    },
                    {
                        name: 'tinggi_badan',
                        data: 'tinggi_badan'
                    },
                    {
                        name: 'usia_kehamilan',
                        data: 'usia_kehamilan'
                    },
                    {
                        name: 'bbi',
                        data: 'bbi'
                    },
                    {
                        name: 'bbih',
                        data: 'bbih'
                    },
                    {
                        name: 'imt',
                        data: 'imt'
                    },
                    {
                        name: 'kategori_imt',
                        data: 'kategori_imt',
                    },
                    {
                        name : 'action',
                        data : 'action'
                    }
                    

                ]
            })


            window.addEventListener('berhasil', () => {
                $('#modal-lg').modal('hide');
                tabel.ajax.reload();
            })

        });
    </script>
@endpush
