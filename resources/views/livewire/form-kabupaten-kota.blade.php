@if ($type === 'tambah')
<form action="" wire:submit.prevent='tambah'>
@else
<form action="" wire:submit.prevent='ubah'>

@endif
<div class="form-group">
        <label for="kabupaten_kota" class="form-label">Nama Kabupaten/Kota</label>
        <input wire:model.defer='kabupaten_kota' type="text" class="form-control">
        @error('kabupaten_kota')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="mt-3">
        <button class="btn btn-primary">Tambah</button>
    </div>
</form>