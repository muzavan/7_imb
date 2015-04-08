@extends('app')

@section('content')
	@if($permohonanimb)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/permohonanimbs/$permohonanimb->id/update"]) !!}
			<div class='form-group'>
				{!! Form::label('id_bangunan','ID Bangunan:') !!}
				{!! Form::text('id_bangunan',$permohonanimb->id_bangunan,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_pemohon','ID Pemohon:') !!}
				{!! Form::text('id_pemohon',$permohonanimb->id_pemohon,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_pemilik','ID Pemilik:') !!}
				{!! Form::text('id_pemohon',$permohonanimb->id_pemilik,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_tanah','ID Tanah:') !!}
				{!! Form::text('id_tanah',$permohonanimb->id_tanah,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('id_lokasi','ID Lokasi:') !!}
				{!! Form::text('id_lokasi',$permohonanimb->id_lokasi,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('status','Status:') !!}
				{!! Form::text('status',$permohonanimb->status,['class' => 'form-control']) !!}
				<div class='form-group'>
				{!! Form::label('code','Code:') !!}
				{!! Form::text('code',$permohonanimb->code,['class' => 'form-control']) !!}
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