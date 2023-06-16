@extends('layouts.authenticate')

@section('page-title',"Tambah Kabupaten Kota")

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @livewire('form-kabupaten-kota')
        </div>
      </div>
    </div>
  </div>  
@endsection