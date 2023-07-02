<form wire:submit.prevent='simpan' action="">
    <div class="form-group">
        <label for="tanggal_ukur">Tanggal Ukur</label>
        <input required wire:model='data.tanggal_ukur' type="date" name="" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="tanggal_ukur">Usia Kehamilan Sekarang (Minggu)</label>
        <select  required wire:model='data.usia_kehamilan' name="" id="" class="form-control">
            <option value="">--Pilih Salah Satu--</option>
            @foreach (range(1, 37) as $item)
                <option value="{{ $item }}">{{ $item }} Minggu</option>
            @endforeach
        </select>
    </div>
    <div class="row">
        <div class="col-6"> 
            <div class="form-group">
                <label for="tinggiBadan">Tinggi Badan (Sekarang) <sup>CM</sup></label>
                <input  required wire:model='data.tinggi_badan' type="text" class="form-control">
            </div>
        </div>
        <div class="col-6"> 
            <div class="form-group">
                <label for="Berat">Berat Badan (Sekarang) <sup>KG</sup></label>
                <input required wire:model='data.berat_badan' type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="lingkar_lengan_atas">Lingkar Lengan Atas (LILA) <sup>CM</sup></label>
        <input type="text" required wire:model='data.lila' class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">SIMPAN</button>
    </div>
</form>
