@extends('pwa.layout')


@section('content')
    <div class="wrapper">
    <div class="content-wrapper">
        <div class="container">
            <header class="pages-header">
                <a class="btn-back" onclick="history.back()">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <h1>KMS</h1>
            </header>
            <section class="detail-option-list">
                <div class="child-info">
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="general">
                        <h5>Nama Anak</h5>
                        <p>Umur :</p>
                        <p>Tanggal lahir :</p>
                    </div>
                    <div class="btn-count">
                        <a href="pengukuran-anak.html" class="count-btn">
                            Ukur
                        </a>
                    </div>
                </div>
                <div class="child-status">
                    <p class="general">Tanggal Ukur : 12-09-2023 </p>
                    <p class="general">BB : 20kg </p>
                    <p class="general">TB/PB : 50cm </p>
                    <div class="status">
                        <div class="card">
                            <p>Status BB</p>
                            <h6 class="yellow">Lebih</h6>
                        </div>
                        <div class="card">
                            <p>Status TB/PB</p>
                            <h6 class="red">Stunting</h6>
                        </div>
                    </div>
                </div>
                <h2>Kurva BB</h2>
                <div id="chart"></div>
                <h2>Kurva TB/PB</h2>
                <div id="chart2"></div>
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