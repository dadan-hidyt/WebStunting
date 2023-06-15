@extends('layouts.authenticate')

@section('page-title')
    Edit Kecamatan
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-4">

            <div class="card">
                <div class="card-body">
                    @livewire('form-kecamatan',['type'=>'edit','kecamatan'=>$kecamatan])
                </div>
            </div>
        </div>
    </div>
@endsection
