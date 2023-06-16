@extends('layouts.authenticate')
@section('page-title','Edit Data Keluarahan / Desa')
@section('content')
<div class="row">
   <div class="col-12 mt-4">
     <div class="card">
       <div class="card-body">
          @livewire('form-kelurahan-desa',['type'=>'edit','kelurahanDesa'=>$kelurahanDesa])
       </div>
    </div>
 </div>
</div>
@endsection