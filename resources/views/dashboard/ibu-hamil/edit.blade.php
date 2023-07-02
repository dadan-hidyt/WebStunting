@extends('layouts.authenticate')

@section('page-title', $title ?? 'Ibu Hamil')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Ibu Hamil Baru</div>
                </div>
                <div class="card-body">
                    @livewire('form-ibu-hamil', [
                        'type' => 'edit',
                        'ibuHamil' => $ibuHamil,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
