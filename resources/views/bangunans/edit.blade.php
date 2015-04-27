<?php
	use App\Bangunan;
?>
@extends('app')

@section('content')
	@if($bangunan)
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			{!! Form::open(['url' => "/bangunans/bangunan/$bangunan->id/update" , 'files'=>true]) !!}
			<div class='form-group'>
				{!! Form::label('nama','Nama:') !!}
				{!! Form::text('nama',$bangunan->nama,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('fungsi','Fungsi:') !!}
				{!! Form::select('fungsi',Bangunan::getOptionBangunan(), $bangunan->fungsi,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('alamat','Alamat:') !!}
				{!! Form::textarea('lokasi',$bangunan->alamat,['class' => 'form-control','rows' => '3']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jenis','Jenis:') !!}
				{!! Form::select('jenis', array('1' => 'Permanen', '2' => 'Semi-Permanen', '3' => 'Sementara'), $bangunan->jenis,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('jumlah_lantai','Jumlah Lantai:') !!}
				{!! Form::selectRange('jumlah_lantai', 1, 20,['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::label('dokumen','Dokumen Teknis:') !!}
				{!! Form::file('dokumen',['class' => 'form-control']) !!}
			</div>
			<div class='form-group'>
				{!! Form::submit('Ubah Permohonan Bangunan',['class' => 'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
		</div>
		<div class='col-md-3'>
		</div>
	</div>
	@else

	@endif
@stop