<form wire:submit.prevent='register'>

    <div class="form-group">
        <input wire:model.defer='data.email' type="email" placeholder="Alamat Email" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" wire:model.defer='data.nama_posyandu' placeholder="Nama Posyandu" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Kontak Posyandu" wire:model.defer='data.kontak' class="form-control">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Alamat Lengkap" wire:model.defer='data.alamat_lengkap' class="form-control">
    </div>

    <div class="form-group">
        <select class="form-control" wire:model='selector.kabupaten'>
            <option value="">--Pilih Kabupaten--</option>
            @foreach ($kabupaten as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kab_kota }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <select class="form-control" wire:model='selector.kecamatan' name="" id="">
            <option value="">--Pilih Kecamatan--</option>
            @foreach ($kecamatan ?? [] as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <select class="form-control" wire:model='data.kelurahan_desa_id' name="" id="">
            <option value="">--Pilih Desa--</option>
            @foreach ($kelurahanDesa ?? [] as $item)
                <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="text" wire:model.defer='data.password' placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
        <input type="text" wire:model.defer='data.ketikan_ulang' placeholder="Ketikan Ulang" class="form-control">
    </div>


    <button class="btn-submit">
        Login <span wire:loading>Loading..</span>

    </button>
</form>
