<form wire:submit.prevent='simpan' action="">
    <div class="form-group">
        <input wire:model='data.name' type="text" class="form-control" placeholder="Nama">
    </div>
    <div class="form-group">
        <input type="email" wire:model='data.email' class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="text" wire:model='data.password' class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn-submit">Simpan Perubahan</button>
</form>

@push('scripts')
    <script>
        window.addEventListener('success',function(){
            alert("Data berhasil di update");
        })
        window.addEventListener('gagal',function(){
            alert("Data gagal di update");
        })
    </script>
@endpush