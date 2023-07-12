<form wire:submit.prevent='register'>
    @error('data.email')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required wire:model.defer='data.email' type="email" placeholder="Alamat Email" class="form-control">
    </div>
    @error('data.nama_posyandu')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" wire:model.defer='data.nama_posyandu' placeholder="Nama Posyandu"
            class="form-control">
    </div>
    @error('data.kontak')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" placeholder="Kontak Posyandu" wire:model.defer='data.kontak'
            class="form-control">
    </div>
    @error('data.alamat_lengkap')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" placeholder="Alamat Lengkap" wire:model.defer='data.alamat_lengkap'
            class="form-control">
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

    @error('data.kelurahan_desa_id')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <select class="form-control" wire:model='data.kelurahan_desa_id' name="" id="">
            <option value="">--Pilih Desa--</option>
            @foreach ($kelurahanDesa ?? [] as $item)
                <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
            @endforeach
        </select>
    </div> @error('data.password')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" wire:model.defer='data.password' placeholder="Password" class="form-control">
    </div>
    @error('data.password_confirmation')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" wire:model.defer='data.password_confirmation' placeholder="Ketikan Ulang"
            class="form-control">
    </div>


    <button class="btn-submit">
        Login <span wire:loading>Loading..</span>

    </button>
</form>
