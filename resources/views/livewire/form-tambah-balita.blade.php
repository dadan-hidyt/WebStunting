<form wire:submit.prevent="tambah" action="">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <label for="">NIK</label>
                <input wire:model.lazy="data.nik" type="text" @class(['form-control', 'is-invalid' => $errors->has('data.nik')])>
                @error('data.nik')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">No KK</label>
                <input wire:model.lazy="data.no_kk" type="text" @class(['form-control', 'is-invalid' => $errors->has('data.no_kk')])>
                @error('data.no_kk')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input wire:model.lazy="data.nama_lengkap" type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('data.nama_lengkap'),
                ])>
                @error('data.nama_lengkap')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input wire:model.lazy="data.tanggal_lahir" type="date" @class([
                            'form-control',
                            'is-invalid' => $errors->has('data.tanggal_lahir'),
                        ])>
                        @error('data.tanggal_lahir')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select wire:model.lazy="data.jenis_kelamin" name="" id="" @class([
                            'form-control',
                            'is-invalid' => $errors->has('data.jenis_kelamin'),
                        ])>
                            <option value="">--pilih salah satu--</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('data.jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Anak ke -</label>
                <input wire:model.lazy="data.anak_ke" type="number" @class([
                            'form-control',
                            'is-invalid' => $errors->has('data.anak_ke'),
                        ])>
                @error('data.anak_ke')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Berat Badan Saat Lahir (kg)</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Panjang Badan Saat Lahir (cm)</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">Buku KIA</label>
                        <select name="" id="" class="form-control">
                            <option value="">--pilih salah satu--</option>
                            <option value="">Ya</option>
                            <option value="">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">IMD</label>
                        <select name="" id="" class="form-control">
                            <option value="">--pilih salah satu--</option>
                            <option value="">Ya</option>
                            <option value="">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">NIK Orangtua</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Nama Orangtua</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Telp/Hp Orang Tua</label>
                <input type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Desa/Kelurahan</label>
                <select name="" id="" class="form-control">
                    <option value="">--pilih salah satu--</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Posyandu Pembina</label>
                <select name="" id="" class="form-control">
                    <option value="">--pilih salah satu--</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                    <option value="">option</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat Lengkap</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-submit d-flex justify-content-end">
                <a href="data-balita.html" class="btn-cancel">Cancel</a>
                <button class="btn-submit" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
