@if ($type === 'tambah')
    <form action="" wire:submit.prevent='tambah'>
    @else
        <form action="" wire:submit.prevent='edit'>
@endif
@error('data.nik')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">

    <input type="text" wire:model.defer='data.nik' class="form-control" placeholder="NIK">
</div>
@error('data.nomor_kk')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model='data.nomor_kk' class="form-control" placeholder="No KK">
</div>
@error('data.nama')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.nama' class="form-control" placeholder="Nama Lengkap">
</div>
@error('data.tanggal_lahir')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="date" wire:model='data.tanggal_lahir' class="form-control" placeholder="Tanggal Lahir">
</div>

@error('data.pekerjaan')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model='data.pekerjaan' class="form-control" placeholder="Pekerjaan">
</div>
@error('data.alamat_lengkap')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defar='data.alamat_lengkap' class="form-control" placeholder="Alamat lengkap">
    <div class="icon">
        <i class="fa-solid fa-calendar-days"></i>
    </div>
</div>

@error('data.kontak')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.kontak' class="form-control" placeholder="Kontak">
</div>

<div class="btn-group">
    <a href="#" class="btn-cancel" onclick="history.back()">Cancel</a><button type="submit"
        class="btn-save">Simpan <span wire:loading wire:target='tambah'>Loading...</span><span wire:loading wire:target='edit'>Loading...</span></button>
</div>
</form>
