<form wire:submit.prevent='tambah' action="">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nama Kecamatan</label>
            <input wire:model='kecamatan' type="text" class="form-control" required>
            @error('kecamatan')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-submit d-flex justify-content-end">
            <a href="data-balita.html" class="btn-cancel">Cancel</a>
            <button class="btn-submit" type="submit">Submit</button>
        </div>
    </div>
</form>
