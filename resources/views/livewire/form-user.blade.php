<form wire:submit.prevent='tambah'>
    <div class="form-group">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input wire:model.defer='data.name' type="text" class="form-control">
        @error('data.name')
            <p style="display: block" class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" wire:model.defer='data.email' class="form-control">
        @error('data.email')
            <p style="display: block" class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="role" class="form-label">Hak Akses</label>
        <select wire:model.defer='data.hak_akses' class="form-control" name="" id="">
            <option value="">Pilih Hak Akses</option>
            @foreach ($hak_akses as $key => $item)
                <option value="{{ $key }}">{{ $item }}</option>
            @endforeach
        </select>
        @error('data.hak_akses')
            <p style="display: block" class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input wire:model.defer='data.password' type="text" class="form-control">
                @error('data.password')
                    <p style="display: block" class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="password" class="form-label">Ketikan Ulang</label>
                <input wire:model.defer='data.password_2' type="text" class="form-control">
                @error('data.password_2')
                    <p style="display: block" class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <input wire:model.defer='data.active' type="checkbox" name="" id=""> Aktif
        @error('data.active')
            <p style="display: block" class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>

</form>
