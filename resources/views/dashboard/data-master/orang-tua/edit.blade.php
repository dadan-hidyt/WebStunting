@extends('layouts.authenticate')
@section('page-title', $title ?? 'Tambah orang tua')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				@livewire('form-orang-tua', [
					'type' => 'edit',
					'orangTua' => $orangTua ?? null,
					])
				</div>
			</div>
		</div>
	</div>
	@endsection
