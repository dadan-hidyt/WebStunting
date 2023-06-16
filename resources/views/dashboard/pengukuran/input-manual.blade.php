@extends('layouts.authenticate')
@section('page-title', 'Input NIK')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04">
                                <option selected>Pilih Anak Yang Mau Di Ukur</option>
                                @foreach ($anak as $item)
                                    <option value="{{$item->id}}">{{ $item->nik }}-{{ $item->nama_lengkap }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">UKUR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
