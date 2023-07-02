@if ($type === 'edit')
    <form wire:submit.prevent='edit' action="">
    @else
        <form wire:submit.prevent='tambah' action="">
@endif


<div class="form-group">
    <label for="nik" class="form-label">NIK (No Induk Kependudukan)</label>
    <input wire:model.defer='data.nik' type="text" class="form-control">
    @error('data.nik')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    <label for="nama" class="form-label">Nama Lengkap</label>
    <input wire:model.defer='data.nama' type="text" class="form-control">
    @error('data.nama')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="tempat_lahir" class="form-label">Tempat lahir</label>
            <input wire:model.defer='data.tempat_lahir' type="text" class="form-control">
            @error('data.tempat_lahir')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
            <input id="tanggal_lahir" wire:model.defer='data.tanggal_lahir' type="date" class="form-control">
            @error('data.tanggal_lahir')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kontak" class="form-label">Kontak (No Telp/Email/Wa)</label>
    <input type="text" wire:model.defer='data.kontak' class="form-control">
    @error('data.kontak')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea cols="30" wire:model.defer='data.alamat_lengkap' rows="10" class="form-control"></textarea>
    @error('data.alamat_lengkap')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="berat_badan_sebelum_hamil" class="form-label">Berat Badan (Sebelum Hamil)</label>
    <input type="text" wire:model.defer='data.berat_badan_sebelum_hamil' id="berat_badan_sebelum_hamil"
        class="form-control">
    @error('data.berat_badan_sebelum_hamil')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="berat_badan_sebelum_hamil" class="form-label">Berat Badan (Sebelum Hamil)</label>
    <input type="text" wire:model.defer='data.tinggi_badan_sebelum_hamil' id="tinggi_badan_sebelum_hamil"
        class="form-control">
    @error('data.tinggi_badan_sebelum_hamil')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <select class="form-control" wire:model='data.kabupaten' id="">
                <option value="">--Kabupaten--</option>
                @foreach ($kelurahanDesaSelektor['kabupaten'] as $item)
                    <option value="{{ $item['id'] ?? null }}">{{ $item['nama_kab_kota'] }}</option>
                @endforeach
            </select>
            @error('data.kabupaten')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="tanggal_lahir" class="form-label">Kecamatan</label>
            <select class="form-control" wire:model='data.kecamatan' id="">
                <option value="">--Kecamatan--</option>
                @foreach ($kelurahanDesaSelektor['kecamatan'] ?? [] as $item)
                    <option value="{{ $item['id'] }}">{{ $item['nama_kecamatan'] }}</option>
                @endforeach
            </select>
            @error('data.kecamatan')
                <span class="invalid-feedback d-block">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="kabupaten" class="form-label">Kabupaten</label>
    <select class="form-control" wire:model='data.kelurahan_desa_id' id="">
        <option value="">--Kelurahan / Desa--</option>
        @foreach ($kelurahanDesaSelektor['kelurahan_desa'] ?? [] as $item)
            <option value="{{ $item['id'] ?? null }}">{{ $item['nama_desa'] }}</option>
        @endforeach
    </select>
    @error('data.kelurahan_desa_id')
        <span class="invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <button class="btn btn-primary">SIMPAN</button>
</div>
</form>

@push('scripts')
    <script>
        $(function(){
            window.addEventListener('berhasil',function(){
                Toast.fire({
                    title : 'Berhasil',
                    icon : 'success',
                    text : "IBU Hamil Berhasil Di simpan"
                });
            })
            window.addEventListener('gagal',function(){
                Toast.fire({
                    title : 'Gagal',
                    icon : 'error',
                    text : "IBU Hamil Gagal Di simpan"
                });
            })
        })
    </script>
@endpush
