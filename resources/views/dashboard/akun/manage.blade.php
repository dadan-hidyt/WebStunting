@extends('layouts.authenticate')

@section('page-title', 'Manage User')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @elseif (session()->has('gagal'))
                <p class="alert alert-danger">{{ session('gagal') }}</p>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" class="btn btn-success btn-sm" id="open-modal-tambah">
                            Tambah Baru
                        </button>
                    </div>

                </div>
                <div class="card-body">

                    <table id="manage-user" class="display nowrap table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('form-user')
                </div>
                {{-- <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> --}}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- E:modal -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#open-modal-tambah').on('click', () => {
                $('#modal-tambah').modal('show')

            });




            const table = $('#manage-user').DataTable({
                processing: true,
                serverSide: true,
                columns: [{
                        name: 'action',
                        data: 'action'
                    },
                    {
                        name: 'nama',
                        data: 'name'
                    },
                    {
                        name: 'email',
                        data: 'email'
                    },
                    {
                        name: 'role',
                        data: 'role'
                    },
                    {
                        name: 'active',
                        data: 'active'
                    },
                ],
                fixedColumns: {
                    left: 1,
                },
                ajax: "{{ route('ajax.akun.get') }}",
                scrollX: true,

            })



            window.addEventListener('sukses', () => {
                Toast.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'User berhasil di buat.'
                })
                $('#modal-tambah').modal('hide');
                table.ajax.reload();
            })
        })
    </script>
@endpush
