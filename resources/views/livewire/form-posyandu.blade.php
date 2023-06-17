@if ($type === 'tambah')
    <form wire:submit.prevent='tambah'>
    @else
        <form wire:submit.prevent='edit'>
@endif
<div class="form-group">
    <label for="nama_posyandu" class="form-label">Nama Posyandu</label>
    <input wire:model.defer='data.nama_posyandu' type="text" @class([
        'form-control',
        'is-invalid' => $errors->has('data.nama_posyandu'),
    ])>
    @error('data.nama_posyandu')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="kontak" class="form-label">Kontak</label>
    <input type="text" wire:model.defer='data.kontak' @class(['form-control', 'is-invalid' => $errors->has('data.kontak')])>
    @error('data.nama_posyandu')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
    <textarea wire:model.defer='data.alamat_lengkap' type="text" @class([
        'form-control',
        'is-invalid' => $errors->has('data.alamat_lengkap'),
    ])></textarea>
    @error('data.alamat_lengkap')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="" class="form-label">Kelurahan / Desa</label>
    <select wire:model.defer='data.kelurahan_desa_id' @class([
        'form-control',
        'is-invalid' => $errors->has('data.kelurahan_desa_id'),
    ]) wire:model='data.kelurahan_desa_id'
        name="" id="">
        <option value="">--Pilih Desa--</option>
        @foreach ($kelurahanDesa as $item)
            <option value="{{ $item->id }}">{{ $item->nama_desa }} - {{ $item->kecamatan->nama_kecamatan }} -
                {{ $item->kecamatan->kabupatenKota->nama_kab_kota }}</option>
        @endforeach
    </select>
    @error('data.kelurahan_desa_id')
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <button class="btn btn-primary">Tambah</button>
</div>
</form>
