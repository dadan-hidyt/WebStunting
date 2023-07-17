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
@error('nomor_kk')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model='nomor_kk' class="form-control" placeholder="No KK">
</div>
@error('data.nama_lengkap')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.nama_lengkap' class="form-control" placeholder="Nama Lengkap">
</div>
@error('data.tempat_lahir')
    <small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model='data.tempat_lahir' class="form-control" placeholder="Tempat Lahir">
</div>
@error('data.tanggal_lahir')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="date" wire:model.defar='data.tanggal_lahir' class="form-control" placeholder="Tanggal Lahir">
    <div class="icon">
        <i class="fa-solid fa-calendar-days"></i>
    </div>
</div>
@error('data.jenis_kelamin')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <select wire:model.defer='data.jenis_kelamin' class="form-control">
        <option value="">Jenis Kelamin</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
    <div class="icon">
        <i class="fa-solid fa-chevron-down"></i>
    </div>
</div>
@error('data.anak_ke')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.anak_ke' class="form-control" placeholder="Anak ke -">
</div>
@error('data.berat_lahir')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.berat_lahir' class="form-control" placeholder="Berat Badan Saat Lahir (kg)">
</div>
@error('data.tinggi')
<small style="color: red;font-size:9px;"><i>{{ $message }}</i></small>
@enderror
<div class="form-group">
    <input type="text" wire:model.defer='data.tinggi' class="form-control"
        placeholder="Panjang Badan Saat Lahir (cm)">
</div>
<div class="btn-group">
    <a href="#" class="btn-cancel" onclick="history.back()">Cancel</a><button type="submit"
        class="btn-save">Simpan <span wire:loading wire:target='tambah'>Menyimpan...</span>  <span wire:loading wire:target='edit'>Menyimpan...</span> </button>
</div>
</form>
