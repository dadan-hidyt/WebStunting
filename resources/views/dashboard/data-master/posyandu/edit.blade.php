@extends('layouts.authenticate')
@section('page-title', $title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @livewire('form-posyandu', ['type' => 'edit', 'posyanduPembina' => $posyanduPembina])
                </div>
            </div>
        </div>
    </div>
@endsection
