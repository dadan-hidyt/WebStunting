@extends('pwa.layout')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>EXPORT DATA</h1>
                </header>


                <div class="menu-selection">
                    <div class="menu-group">
                        <a href="{{ route('mobile.posyandu.export_anak') }}" class="card">
                            <div class="icon">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div class="title">
                                <h3>IDENTITAS ANAK</h3>
                            </div>
                            
                        </a>
                        {{-- <a href="{{ route('mobile.posyandu.export_pengukuran') }}" class="card">
                            <div class="icon">
                                <i class="fa-solid fa-calculator"></i>
                            </div>
                            <div class="title">
                                <h3>PENGUKURAN</h3>
                            </div>
                            <div class="arrow">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </a> --}}
                    </div>
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
    @endsection
