@extends('layouts.authenticate')

@section('page-title', 'Manage User')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit User</div>
                </div>
                <div class="card-body">
                    @livewire('form-user',[
                        'type' => 'edit',
                        'user' => $user,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            window.addEventListener('sukses', () => {
                Toast.fire({
                    icon: 'success',
                    title : 'Sukses',
                    text: 'User berhasil di edit.'
                })
            })
            window.addEventListener('gagal', () => {
                Toast.fire({
                    icon: 'danger',
                    title : 'Gagal',
                    text: 'User gagal di edit.'
                })
            })
        })
    </script>
@endpush
