<form wire:submit.prevent='hitung' action="" class="form">
    <div class="form-group">
        <select wire:model='data.jenis_kelamin' class="form-control">
            <option value="">Jenis Kelamin</option>
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
        </select>
        <i class="fa-sharp fa-solid fa-chevron-down"></i>
    </div>
    <div class="form-group">
        <select wire:model='data.umur' class="form-control">
            <option value="">Umur</option>
            @foreach (range(0, 60) as $item)
                <option value="{{ $item }}">{{ $item }} Bulan</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button wire:click="$emit('refresh')" class="btn-submit">Cek Ideal <span wire:loading
                wire:target='hitung'>Loading...</span> </button>
    </div>
</form>


<div class="detail-box">
    <header>Detail</header>
    <div class="content">
        <div>
            <p>Umur :</p>
            <p id="umur"></p>
        </div>
        <div>
            <p>Jenis kelamin :</p>
            <p id="jenis_k">{{ $data['jenis_kelamin'] ?? '' }}</p>
        </div>
        <div>
            <p>BB Ideal :</p>
            <p id="bb_ideal"></p>
        </div>
        <div>
            <p>TB/PB Ideal :</p>
            <p id="pb_tb"></p>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('data',function(val){
           const data = val.detail ?? console.error("_tidak ada data");
          document.getElementById('umur').innerHTML = data.umur+" Bulan";
          document.getElementById('jenis_k').innerHTML = data.jenis_kelamin;
          document.getElementById('bb_ideal').innerHTML = data.bb_ideal;
          document.getElementById('pb_tb').innerHTML = data.tb_ideal;

        });
    </script>
@endpush
