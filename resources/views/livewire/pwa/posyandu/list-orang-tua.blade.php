<section class="data-management-list">
    <form action="">
        <div class="form-group">
            <input wire:model='searchQuery' type="search" class="form-control" placeholder="Search">
            <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        @if ($type != 'list_pengukuran')
            <a href="{{ route('mobile.posyandu.tambah_orang_tua') }}" class="btn-add">
                Tambah Data
            </a>
        @endif
    </form>
    <h2>List data</h2>
    <div class="data-group">
        <div wire:loading wire:target='searchQuery' class="loading">
            <small><i> Mencari...</i></small>
        </div>

        @if (count($data) > 0)
            @foreach ($data as $item)
                <div class="card">
                    <div class="icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="general">
                        <h5>{{ $item->nama }}</h5>
                        <p>NIK:{{ $item->nik }}</p>
                    </div>
                    <div class="action">
                        <a href="{{ route('mobile.posyandu.edit_orang_tua',$item->id) }}"> <i class="fa-solid fa-edit"></i></a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus?');return confirm('Data yang di hapus tidak bisa di kembalikan lagi!')" href="{{ route('mobile.posyandu.delete_orang_tua',$item->id) }}"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        @else
            <div>
                <i>Anak '{{ $searchQuery }}' tidak di temukan</i>
            </div>
        @endif

    </div>
</section>
