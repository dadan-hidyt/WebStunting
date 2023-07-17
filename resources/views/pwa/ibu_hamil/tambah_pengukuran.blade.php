@extends('pwa.layout')

@section('content')
    <style>
        .form-control {
            display: block;
        }

        .form-group {
            display: block !important;
        }

        .form-group label {
            display: block;
            margin-block: 5px;
            font-size: small;
        }

        .row {
            width: 100% !important;
            display: block;
        }

        .btn {
            display: block !important;
            background: teal;
            padding: 10px;
            cursor: pointer;
            border: none;
            color: white;
            font-weight: bold;
            width: 100%;
            border-radius: 10px;
        }
    </style>
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <header class="pages-header">
                    <a href="#" class="btn-back" onclick="history.back()">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>
                    <h1>Tambah Anak</h1>
                </header>
                <section class="data-management-list">
                    @livewire('form-pengukuran-ibu-hamil', [
                        'ibuHamil' => auth()->user()->ibuHamil,
                    ])
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
@push('scripts')
    <script>
        window.addEventListener('berhasil', () => {
           alert("Pengukuran berhasil!");
           window.location.replace(`{{ route('mobile.ibu_hamil.riwayat_pengukuran') }}`)
        })
        window.addEventListener('gagal', function() {
            alert("Data gagal di ubah");
        })
    </script>
@endpush
