@extends('izin_admin.app')
@section('content')
			<div class="col-md-3"></div>
			<div class='col-md-6'>
				<div class="alert alert-warning">Pastikan anda sudah benar-benar melakukan analisis permohonan ini!</div>
				{!! Form::open(['url' => './admin/lokasi/tolak' , 'files'=>true]) !!}
				<div class='form-group hidden'>
					{!! Form::text('id', $id,['class' => 'form-control','hidden'=>'true']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('komentar','Komentar:') !!}
					{!! Form::textarea('komentar','Penjelasan mengapa izin ini ditolak',['class' => 'form-control','required' => 'true']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit('Tolak Permohonan',['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-3"></div>
@stop