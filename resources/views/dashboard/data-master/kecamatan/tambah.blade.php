@extends('layouts.authenticate')

@section('page-title')
    Tambah Kecamatan
@endsection

@section('content')
<div class="row">
    <div class="col-12 mt-4">

      <div class="card">
        <div class="card-body">
          @livewire('form-kecamatan')
        </div>
      </div>
    </div>
  </div>
@endsection
