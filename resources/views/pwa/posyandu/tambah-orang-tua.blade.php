@extends('pwa.layout')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="container">
            <header class="pages-header">
                <a href="#" class="btn-back" onclick="history.back()">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <h1>Tambah Orang Tua</h1>
            </header>
            <section class="data-management-list">
                @livewire('pwa.posyandu.form-orang-tua')
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
        window.addEventListener('di_tambahkan',function(){
           if (confirm("Data Berhasil di tambahkan")) {
              window.location.replace("{{ route('mobile.posyandu.data_orang_tua') }}");
           } else{
            window.location.replace("{{ route('mobile.posyandu.data_orang_tua') }}");
           }
        })
        window.addEventListener('di_edit',function(){
           if (confirm("Data Berhasil di edit")) {
              window.location.replace("{{ route('mobile.posyandu.data_orang_tua') }}");
           } else{
            window.location.replace("{{ route('mobile.posyandu.data_orang_tua') }}");
           }
        })
        window.addEventListener('gagal_tambah',function(){
            alert("Data Gagal di tambahkan")
        })
        window.addEventListener('gagal_edit',function(){
            alert("Data Gagal di tambahkan")
        })
    </script>
@endpush