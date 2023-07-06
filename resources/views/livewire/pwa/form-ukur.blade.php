<form wire:submit.prevent='ukur'>
    <div class="form-group">
        <input wire:model.defer='data.bb' type="text" class="form-control" placeholder="Masukan Berat Badan (Kg)">
    </div>
    <div class="form-group">
        <input wire:model.defer='data.tb' type="text" class="form-control" placeholder="Masukan Tinggi Badan (PB/TB)">
    </div>
    <div class="btn-group">
        <a href="#" class="btn-cancel" onclick="history.back()">Cancel</a>
        <button type="submit"
            class="btn-save">Simpan</button>
    </div>
</form>

@push('scripts')
    <script>
        window.addEventListener('gagal',()=>{
            alert("Pengukuran gagal di tambahkan");
        });
    </script>
@endpush