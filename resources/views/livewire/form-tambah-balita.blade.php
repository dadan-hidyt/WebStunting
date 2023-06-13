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
                <input wire:model.defer="orang_tua.nomor_kk" type="text" @class(['form-control', 'is-invalid' => $errors->has('orang_tua.nomor_kk')])>
                @error('orang_tua.nomor_kk')
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
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input wire:model.lazy="data.tempat_lahir" type="text" @class(['form-control', 'is-invalid' => $errors->has('data.tempat_lahir')])>
                @error('data.tempat_lahir')
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
                        <select wire:model.lazy="data.jenis_kelamin" name="" id=""
                            @class([
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
                <input wire:model.lazy="data.anak_ke" type="number" @class(['form-control', 'is-invalid' => $errors->has('data.anak_ke')])>
                @error('data.anak_ke')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Berat Badan Saat Lahir (kg)</label>
                <input wire:model.defer='data.berat_lahir' type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('data.berat_lahir'),
                ])>
                @error('data.berat_lahir')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Panjang Badan Saat Lahir (cm)</label>
                <input wire:model.lazy='data.panjang_badan' type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('data.panjang_badan'),
                ])>
                @error('data.panjang_badan')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">Buku KIA</label>
                        <select name="" id="" class="form-control">
                            <option value="">--pilih salah satu--</option>
                            <option value="YA">Ya</option>
                            <option value="TIDAK">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="">IMD</label>
                        <select name="" id="" class="form-control">
                            <option value="">--pilih salah satu--</option>
                            <option value="YA">Ya</option>
                            <option value="TIDAK">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="">NIK Orangtua</label>
                <input wire:model='orang_tua.nik' type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.nik'),
                ])>
                @error('orang_tua.nik')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <p class="form-text text-info" style="font-size: 13px;">
                    Jika nik orang tua terdaftar di database, data orang tua akan otomatis terisi. Jika ingin merubah data orang tua bisa di menu data orang tua!
                </p>
            </div>

            <div class="form-group">
                <label for="">Nama Orangtua</label>
                <input wire:model.defer='orang_tua.nama' type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.nama'),
                ])>
                @error('orang_tua.nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Telp/Hp Orang Tua</label>
                <input type="text" wire:model.defer='orang_tua.kontak' @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.kontak'),
                ])>
                @error('orang_tua.kontak')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Desa/Kelurahan</label>
                <select wire:model='orang_tua.kelurahan_desa_id' name="" id="" @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.kelurahan_desa_id'),
                ])>
                    <option value="">--pilih salah satu--</option>
                    @if($desa_kelurahan)
                        @foreach($desa_kelurahan as $val)
                            <option value="{{$val->id}}">{{ $val->nama_desa  }} - {{ $val->kecamatan->nama_kecamatan ?? '' }}</option>
                        @endforeach
                    @endif
                </select>
                @error('orang_tua.kelurahan_desa_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Posyandu Pembina</label>
                <select wire:model.defer='orang_tua.posyandu_pembina_id' name="" id="" @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.posyandu_pembina_id'),
                ])>
                    <option value="">--pilih salah satu--</option>
                    @if ($posyandu)
                        @foreach ($posyandu as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_posyandu }}</option>
                        @endforeach
                    @endif
                </select>
                @error('orang_tua.posyandu_pembina_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Alamat Lengkap</label>
                <input wire:model.defer='orang_tua.alamat_lengkap' type="text" @class([
                    'form-control',
                    'is-invalid' => $errors->has('orang_tua.alamat_lengkap'),
                ])>
                @error('orang_tua.alamat_lengkap')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-submit d-flex justify-content-end">
                <a href="{{ route('dashboard.balita.semua') }}" class="btn-cancel">Cancel</a>
                <button class="btn-submit" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>
@push('scripts')
    <script>
        window.addEventListener('notifikasi',function(e){
            if ( e.detail.type == 'success' ) {
                notifikasi.success(e.detail.msg);
            } else {
                notifikasi.error(e.detail.msg);
            }
        })
    </script>
@endpush
