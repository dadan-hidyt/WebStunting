<form wire:submit.prevent='ukur' action="">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="">Tanggal Pengukuran</label>
          <input wire:model='data.tanggal_ukur' type="date"  class="form-control" >
           @error('data.tanggal_ukur')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Berat Badan (kg)</label>
          <input wire:model.defer='data.berat_badan' type="text" class="form-control" >
          @error('data.berat_badan')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Tinggi Badan (cm)</label>
          <input wire:model.defer='data.tinggi' type="text" class="form-control" >
            @error('data.tinggi')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Lila (cm)</label>
          <input type="text" wire:model.defer='data.lila' class="form-control" >
            @error('data.lila')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="">Lingkar Kepala (cm)</label>
          <input type="text" wire:model.defer='data.lingkar_kepala' class="form-control" >
            @error('data.lingkar_kepala')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Cara Ukur Tinggi Badan</label>
          <select wire:model.defer='data.cara_ukur' name="" id="" class="form-control" >
            <option value="">--pilih salah satu--</option>
            <option value="berdiri">Berdiri</option>
            <option value="telentang">Terlentang</option>
          </select>
            @error('data.cara_ukur')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="">Vitamin A</label>
          <select wire:model.defer='data.vitamin_a' name="" id="" class="form-control" >
            <option value="">--pilih salah satu--</option>
            <option value="YA">YA</option>
            <option value="TIDAK">TIDAK</option>
          </select>
            @error('data.vitamin_a')
            <span style="display: block" class="d-block invalid-feedback">{{$message}}</span>
            @enderror
        </div>
        <div class="form-submit d-flex justify-content-end">
          <a href="{{route('dashboard.balita.semua')}}" class="btn-cancel">Cancel</a>
          <button class="btn-submit" wire:loading.remove wire:target="ukur" type="submit">Submit</button>
            <button class="btn-submit" wire:loading.block wire:target="ukur" type="submit">Mengkalkulasikan...</button>

        </div>
      </div>
    </div>
  </form>
