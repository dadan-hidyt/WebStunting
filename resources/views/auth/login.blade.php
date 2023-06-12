@extends('layouts.guest')
@section('content')
    <div class="login-box rounded">
        <div class="login-logo">
            <a href="../../index2.html"><b>E-Kambing</b>.com</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login Untuk Mengunakan Fitur Aplikasi</p>

                @livewire('form-login')
                <!-- /.social-auth-links -->

                <p class="mb-1 mt-3">
                    <span>Untuk Mengubah Password Silahkan Hubungi Admin!</span>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

@endsection
