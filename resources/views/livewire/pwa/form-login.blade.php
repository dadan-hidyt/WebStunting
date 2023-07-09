<form wire:submit.prevent='login'>
    @error('data.email')
        <small style="color: red;">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.email' type="text" class="form-control" placeholder="Email">
    </div>
    @error('data.password')
        <small style="color: red;">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <input wire:model.defer='data.password' type="password" class="form-control" placeholder="Password">
        <div class="icon"><i class="fa-solid fa-lock"></i></div>
    </div>
    <button class="btn-submit">
        Login <span wire:loading wire:target='login'></span>
    </button>
</form>

@push('scripts')
    <script>
        window.addEventListener('login_gagal',()=>{
            alert("Login gagal");
        })
    </script>
@endpush