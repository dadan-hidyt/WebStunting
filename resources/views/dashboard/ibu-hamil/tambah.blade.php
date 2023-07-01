@extends('layouts.authenticate')

@section('page-title', $title ?? 'Ibu Hamil')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Ibu Hamil Baru</div>
                </div>
                <div class="card-body">
                    @livewire('form-ibu-hamil', [
                        'type' => 'tambah',
                        'ibuHamil' => null,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
