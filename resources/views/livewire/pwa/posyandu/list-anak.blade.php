<section class="data-management-list">
    <form action="">
        <div class="form-group">
            <input wire:model='searchQuery' type="search" class="form-control" placeholder="Search">
            <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        @if ($type != 'list_pengukuran')
            <a href="{{ route('mobile.posyandu.tambah_anak') }}" class="btn-add">
                Tambah Data
            </a>
        @endif
    </form>
    <h2>List data</h2>
    <div class="data-group">
        <div wire:loading wire:target='searchQuery' class="loading">
            <small><i> Mencari...</i></small>
        </div>

        @if (count($anak) > 0)
            @foreach ($anak as $item)
                @if ($type && $type == 'list_pengukuran')
                    <div class="card">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ $item->nama_lengkap }}</h5>
                            <p>Umur : {{ hitungBulan($item->tanggal_lahir) }}</p>
                            <p>Tanggal lahir : {{ $item->tanggal_lahir }}</p>
                            <p>Orang Tua : {{ $item->orangTua->nama }}</p>
                        </div>
                        <div class="action">
                            <a href="{{ route('mobile.ukur_bb_tb', $item->id) }}" class="count-btn">
                                Ukur
                            </a>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="general">
                            <h5>{{ $item->nama_lengkap }}</h5>
                            <p>Umur : {{ hitungBulan($item->tanggal_lahir) }} bulan</p>
                            <p>Tanggal lahir : {{ $item->tanggal_lahir }}</p>
                            <p>Orang Tua : {{ $item->orangTua->nama }}</p>
                        </div>
                        <div class="action">
                            <a href="{{ route('mobile.ukur_bb_tb', $item->id) }}"><i class="fa-sharp fa-solid fa-circle-info"></i>
                            </a>
                            <a href="{{ route('mobile.detail_anak', $item->id) }}"><i class="fa-solid fa-calculator beat-fade"></i>
                            </a>
                      
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div>
                <i>Anak '{{ $searchQuery }}' tidak di temukan</i>
            </div>
        @endif

    </div>
</section>
