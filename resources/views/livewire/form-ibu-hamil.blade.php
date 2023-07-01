@if ($type === 'edit')
    <form wire:submit.prevent='edit' action="">
    @else
        <form wire:submit.prevent='tambah' action="">
@endif


<div class="form-group">
    <label for="nik" class="form-label">NIK (No Induk Kependudukan)</label>
    <input type="text" class="form-control">
</div>


<div class="form-group">
    <label for="nama" class="form-label">Nama Lengkap</label>
    <input type="text" class="form-control">
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="tempat_lahir" class="form-label">Tempat lahir</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
            <input type="date" class="form-control">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kontak" class="form-label">Kontak (No Telp/Email/Wa)</label>
    <input type="text" class="form-control">
</div>
<div class="form-group">
    <label for="alamat" class="form-label">Tanggal lahir</label>
    <textarea id="alamat" cols="30" rows="10" class="form-control"></textarea>
</div>
<div class="form-group">
    <label for="berat_badan_sebelum_hamil" class="form-label">Berat Badan (Sebelum Hamil)</label>
    <input type="text" id="berat_badan_sebelum_hamil" class="form-control">
</div>
<div class="form-group">
    <button class="btn btn-primary">TAMBAH</button>
</div>
</form>
