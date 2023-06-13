@extends('layouts.authenticate')
@section('page-title') {{$title}} @endsection
@section('content')
  <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                   @livewire('form-update-balita', ['balita'=>$balita])
                </div>
            </div>
        </div>
    </div>
@endsection