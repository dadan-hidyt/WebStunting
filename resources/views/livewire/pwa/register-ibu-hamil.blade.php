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
    @error('data.nik')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required wire:model.defer='data.nik' type="nik" placeholder="Nomor nik" class="form-control">
    </div>
    @error('data.nama')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input required type="text" wire:model.defer='data.nama' placeholder="Nama Lengkap" class="form-control">
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
    </div>
    @error('data.alamat_lengkap')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input type="text" wire:model.defer='data.alamat_lengkap' placeholder="Ketikan alamat lengkap"
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
        <input type="text" wire:model.defer='data.kontak' placeholder="Ketikan kontak anda" class="form-control">
    </div>
    @error('data.tempat_lahir')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input type="text" wire:model.defer='data.tempat_lahir' placeholder="Ketikan tempat lahir"
            class="form-control">
    </div>
    @error('data.berat_badan_sebelum_hamil')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input type="text" wire:model.defer='data.berat_badan_sebelum_hamil'
            placeholder="Berat badan sebelum hamil(kg)" class="form-control">
    </div>
    @error('data.tinggi_badan_sebelum_hamil')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input type="text" wire:model.defer='data.tinggi_badan_sebelum_hamil'
            placeholder="Tinggi badan sebelum hamil(cm)" class="form-control">
    </div>
    @error('data.tanggal_lahir')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input type="date" wire:model.defer='data.tanggal_lahir' placeholder="Ketikan tanggal lahir"
            class="form-control">
    </div>
    @error('data.password')
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
        Register <span wire:loading>Mendaftarkan..</span>

    </button>
</form>
