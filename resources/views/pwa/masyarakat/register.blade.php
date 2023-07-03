@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="auth-header">
                    <div class="blue-shade-top-lg"></div>
                    <div class="controller">
                        <button class="btn-back" onclick="history.back()">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <p>Back to Welcome</p>
                    </div>
                    <h2>{{$title}}</h2>
                    <p>Selamat datang Masyarakat kembali e-Kambing</p>
                </header>
                <section class="auth-form">
                    @livewire('pwa.masyarakat.form-register',['type'=>'masyarakat'])
                    <div class="option">
                        Belum punya akun? <a href="{{ $register_url ?? '' }}">Daftar Sekarang</a>
                    </div>
                </section>
                <footer>
                    <div class="blue-ring">
                        <div class="hole"></div>
                    </div>
                    <div class="yellow-ring">
                        <div class="hole"></div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
