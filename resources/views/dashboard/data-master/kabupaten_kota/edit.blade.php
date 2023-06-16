@extends('layouts.authenticate')

@section('page-title',"Update Kabupaten Kota")

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          @livewire('form-kabupaten-kota',[
            'type' => 'edit',
            'kabupatenKota' => $kabupatenKota,
          ])
        </div>
      </div>
    </div>
  </div>  
@endsection