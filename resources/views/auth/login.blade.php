@extends('layouts.guest')
@section('content')
    <div class="login-box rounded">
        <div class="login-logo">
            <a href="javascript:void(0)"><b>E-Kambing</b>.com</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Login Untuk Mengunakan Fitur Aplikasi</p>

                @livewire('form-login')
                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
