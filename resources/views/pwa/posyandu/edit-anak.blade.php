@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Edit Anak</h1>
                </header>
                <section class="data-management-list">
                    @livewire('pwa.posyandu.form-anak', ['type' => 'edit','anak' => $anak,])
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
