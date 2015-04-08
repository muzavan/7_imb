@extends('app')

@section('content')
	@if($permohonanlokasi)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/permohonanlokasis/$permohonanlokasi->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('id_pemohon','ID Pemohon:') !!}
				{!! Form::text('id_pemohon',$permohonanlokasi->id_pemohon,['class' => 'form-control']) !!}
			</div>
			
			<div class='form-group'>
				{!! Form::label('id_lokasi','ID Lokasi:') !!}
				{!! Form::text('id_lokasi',$permohonanlokasi->id_lokasi,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('status','Status:') !!}
				{!! Form::text('status',$permohonanlokasi->status,['class' => 'form-control']) !!}
				<div class='form-group'>
				{!! Form::label('code','Code:') !!}
				{!! Form::text('code',$permohonanlokasi->code,['class' => 'form-control']) !!}
			</div>
			</div>
			<div class='form-group'>
				{!! Form::submit('Tambah Informasi',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop