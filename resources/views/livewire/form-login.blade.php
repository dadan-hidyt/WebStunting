
<form  wire:submit.prevent="login" action="" method="post">
    @if(session()->has('login_gagal'))
        <p class="alert alert-danger">{{ session('login_gagal')  }}</p>
    @endif
    <div class="input-group mb-3">
        <input wire:model.lazy="data.email" type="email" @class([
        'form-control','is-invalid' => $errors->has('data.email')
]) placeholder="Ketikan Email Anda">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        @error('data.email')
            <span class="invalid-feedback">{{ $message  }}</span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input wire:model.lazy="data.password" type="password" @class([
        'form-control', 'is-invalid' => $errors->has('data.password'),
]) placeholder="Ketikan Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('data.password')
        <span class="invalid-feedback">{{ $message  }}</span>
        @enderror
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input wire:model="data.remember" type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                <span wire:loading.block wire:target="login">Loading...</span>
                <span wire:loading.remove wire:target="login">Login</span>
            </button>
        </div>
        <!-- /.col -->
    </div>
</form>
