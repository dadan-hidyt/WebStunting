@extends('layouts.authenticate')
@section('page-title','Tambah Data Keluarahan / Desa')
@section('content')
<div class="row">
   <div class="col-12 mt-4">
     <div class="card">
       <div class="card-body">
          @livewire('form-kelurahan-desa',['type'=>'tambah','kelurahanDesa'=>null])
       </div>
    </div>
 </div>
</div>
@endsection