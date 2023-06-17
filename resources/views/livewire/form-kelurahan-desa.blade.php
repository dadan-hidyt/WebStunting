@if ($type === 'tambah')
<form wire:submit.prevent='tambah' action="">
    @else
    <form wire:submit.prevent='ubah' action="">
        @endif
        <div class="form-group">
          <label for="">Nama Desa</label>
          <input wire:model.defer='data.nama_desa' type="text" class="form-control" required>
          @error('data.nama_desa')
          <p style="display: block;" class="invalid-feedback">{{ $message }}</p>
          @enderror
      </div>
      <div class="form-group">
        <label for="">Kecamatan</label>
        <select wire:model.defer='data.kecamatan_id' class="form-control" name="" id="">
            <option value="">Pilih Kelurahan Desa</option>
            @foreach ($kecamatan as $element)
            <option value="{{ $element->id }}">{{ $element->nama_kecamatan }} - {{ $element->kabupatenKota->nama_kab_kota }}</option>
            @endforeach
        </select>
        @error('data.kecamatan_id')
        <p style="display: block;" class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-submit d-flex justify-content-end">
       <a href="data-balita.html" class="btn-cancel">Cancel</a>
       <button class="btn-submit" type="submit">Submit</button>
   </div>
</div>
</form> 