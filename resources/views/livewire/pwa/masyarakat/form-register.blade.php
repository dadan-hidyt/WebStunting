<form wire:submit.prevent='simpan' action="">
    @error('data.nomor_kk')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.nomor_kk' type="text" class="form-control"
            placeholder="NIK (Nomor Induk Kependudukan)">


    </div>
    @error('data.nik')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.nik' type="text" class="form-control"
            placeholder="NIK (Nomor Induk Kependudukan)">
    </div>
    @error('data.name')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.name' type="text" class="form-control" placeholder="Nama lengkap">
    </div>
    @error('data.email')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.email' type="text" class="form-control" placeholder="Email">
    </div>
    @error('data.kelurahan_desa_id')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <select wire:model='data.kelurahan_desa_id' name="" id="" class="form-control">
            <option value="">--Pilih Kelurahan Desa Kota--</option>
            @foreach ($kelurahanDesa as $item)
                <option value="{{ $item->id }}">{{ $item->nama_desa }} - {{ $item->kecamatan->nama_kecamatan }} -
                    {{ $item->kecamatan->kabupatenKota->nama_kab_kota }}</option>
            @endforeach
        </select>
    </div>
    @error('data.posyandu_pembina_id')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <select wire:model='data.posyandu_pembina_id' name="" id="" class="form-control">
            <option value="">--Pilih Posyandu--</option>
            @foreach ($posyandu as $item)
                <option value="{{ $item->id }}">{{ $item->nama_posyandu }}</option>
            @endforeach
        </select>
    </div>
    @error('data.password')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.password' type="password" class="form-control" placeholder="Password">
        <div class="icon"><i class="fa-solid fa-lock"></i></div>
    </div>
    @error('data.password_confirmation')
        <div style="color: red;margin-top:0;">
            <small>
                {{ $message }}
            </small>
        </div>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.password_confirmation' type="password" class="form-control"
            placeholder="Ketikan Ulang Password Anda">
        <div class="icon"><i class="fa-solid fa-lock"></i></div>
    </div>
    <button class="btn-submit">
        Login     <span wire:loading>Loading..</span>

    </button>
</form>

<script>
    window.onload = ()=>{
        window.addEventListener('gagal',()=>{
            alert("Pendaftarak akun gagal")
        });

        
    }
</script>