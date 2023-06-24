@extends('layouts.authenticate')

@section('page-title', 'Manage User')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Manage User</div>
                </div>
                <div class="card-body">
                    <table id="manage-user" class="display nowrap table table-striped">
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
@endsection
@push('scripts')
    <script>
        $('#manage-user').DataTable({
            processing : true,
            serverSide : true,
            columns : [
                {name : 'action',data : 'action'},
                {name : 'nama', data : 'name'},
                {name : 'email', data : 'email'},
                {name : 'role', data : 'role'},
                {name : 'active',data:'active'},
            ],
            ajax: "{{ route('ajax.akun.get') }}",
            responsive: true,
            scrollX: true,
            lengthChange: true,
            autoWidth: true,
            info: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                left:0,
                right: 0
            }
        })
    </script>
@endpush
