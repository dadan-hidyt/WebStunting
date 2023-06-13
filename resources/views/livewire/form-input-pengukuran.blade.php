<form wire:submit.prevent='ukur' action="">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="">Tanggal Pengukuran</label>
          <input wire:model='data.tanggal_ukur' type="date" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Berat Badan (kg)</label>
          <input wire:model.defer='data.berat_badan' type="text" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Tinggi Badan (cm)</label>
          <input wire:model.defer='data.tinggi' type="text" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Lila (cm)</label>
          <input type="text" wire:model.defer='data.lila' class="form-control" >
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="form-group">
          <label for="">Lingkar Kepala (cm)</label>
          <input type="text" wire:model.defer='data.lingkar_kepala' class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Cara Ukur Tinggi Badan</label>
          <select wire:model.defer='data.cara_ukur' name="" id="" class="form-control" >
            <option value="">--pilih salah satu--</option>
            <option value="berdiri">Berdiri</option>
            <option value="telentang">Terlentang</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Vitamin A</label>
          <select wire:model.defer='data.vitamin_a' name="" id="" class="form-control" >
            <option value="">--pilih salah satu--</option>
            <option value="YA">YA</option>
            <option value="TIDAK">TIDAK</option>
          </select>
        </div>
        <div class="form-submit d-flex justify-content-end">
          <a href="data-balita.html" class="btn-cancel">Cancel</a>
          <button class="btn-submit" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>