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
        <button wire:click="$emit('refresh') type="submit" class="btn-submit">Cek Ideal <span wire:loading
                wire:target='hitung'>Loading...</span> </button>
    </div>
</form>

@dump($datas);

<div class="detail-box">
    <header>Detail</header>
    <div class="content">
        <div>
            <p>Umur :</p>
            <p>{{ $data['umur'] ?? '' }}</p>
        </div>
        <div>
            <p>Jenis kelamin :</p>
            <p>{{ $data['jenis_kelamin'] ?? '' }}</p>
        </div>
        <div>
            <p>BB Ideal :</p>
            <p>{{ $datas['bb']['-3sd'] ?? '-' }} - {{ $datas['bb']['3sd'] ?? '-' }}</p>
        </div>
        <div>
            <p>TB/PB Ideal :</p>
            <p>{{ $datas['tb_pb']['-3sd'] ?? '-' }} - {{ $datas['tb_pb']['3sd'] ?? '-' }}</p>
        </div>
    </div>
</div>
