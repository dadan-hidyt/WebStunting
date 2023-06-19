@if ($type === 'tambah')
    <form wire:submit.prevent='tambah'>
    @else
        <form wire:submit.prevent='edit'>
@endif
<div class="mb-2">
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nik" class="form-label">NIK</label>
                    <input wire:model.defer='data.nik' type="text" @class(['form-control', 'is-invalid' => $errors->has('data.nik')])>
                    @error('data.nik')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="nomor_kk" class="form-label">Nomor KK</label>
                    <input wire:model.defer='data.nomor_kk' type="text" @class([
                        'form-control',
                        'is-invalid' => $errors->has('data.nomor_kk'),
                    ])>
                    @error('data.nomor_kk')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nama" class="form-label">Nama Orang Tua</label>
                <input wire:model.defer='data.nama' type="text" @class(['form-control', 'is-invalid' => $errors->has('data.nama')])>
                @error('data.nama')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input wire:model.defer='data.tanggal_lahir' type="date" @class([
                    'form-control',
                    'is-invalid' => $errors->has('data.tanggal_lahir'),
                ])>
                @error('data.tanggal_lahir')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="form-group mt-2">
    <label for="pekerjaan" class="form-label">Pekerjaan</label>
    <input wire:model.defer='data.pekerjaan' type="text" @class([
        'form-control',
        'is-invalid' => $errors->has('data.pekerjaan'),
    ])>
    @error('data.pekerjaan')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="kontak" class="form-label">Kontak</label>
    <input wire:model.defer='data.kontak' type="text" @class([
        'form-control',
        'is-invalid' => $errors->has('data.kontak'),
    ])>
    @error('data.kontak')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea wire:model.defer='data.alamat_lengkap' name="" id="" cols="30" rows="10"
        @class([
            'form-control',
            'is-invalid' => $errors->has('data.alamat_lengkap'),
        ])></textarea>
    @error('data.alamat_lengkap')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="kelurahan_desa" class="form-label">Kelurahan Desa</label>
    <select wire:model.defer='data.kelurahan_desa_id' wire:change='selectPosyandu($event.target.value)' name=""
        @class([
            'form-control',
            'is-invalid' => $errors->has('data.kelurahan_desa_id'),
        ]) id="">
        <option value="">Pilih Kelurahan/Desa</option>
        @if ($kelurahanDesa)
            @foreach ($kelurahanDesa as $item)
                <option value="{{ $item->id }}">{{ $item->nama_desa }} - {{ $item->kecamatan->nama_kecamatan }}
                    - {{ $item->kecamatan->kabupatenKota->nama_kab_kota }}</option>
            @endforeach
        @endif
    </select>
    @error('data.kelurahan_desa_id')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="posyandu" class="form-label">Posyandu</label>
    <select name="" @class([
        'form-control',
        'is-invalid' => $errors->has('data.posyandu_pembina_id'),
    ]) wire:model.defer='data.posyandu_pembina_id' id="">
    <option value="">Pilih Posyandu</option>
        @if ($posyandu)
            @foreach ($posyandu as $item)
                <option value="{{ $item->id }}">{{ $item->nama_posyandu }}</option>
            @endforeach
        @else
            <option value="">Pilih Posyandu</option>
        @endif
    </select>
    @error('data.posyandu_pembina_id')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<button class="btn btn-primary">SIMPAN</button>
</form>

