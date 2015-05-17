@extends('admin.app')
@section('content')
<h1> <br/><br/><br/></h1>
<div class='col-md-3'></div>
<div class='col-md-6'>
  <div class='well'>
    <div class="alert alert-danger"> {{"Anda akan menolak izin dengan id ".$id}}</div>
    {!! Form::open(['url' => '/admin/lokasi/tolak']) !!}
    <div class='form-group'>
      {!! Form::text('id',$id,['class'=>'form-contol','hidden'=>'true']) !!}
    </div>
    <div class='form-group'>
      {!! Form::label('komentar','Keterangan:') !!}
      {!! Form::textarea('komentar','',['class'=>'form-contol','placeholder'=>'Keterangan yang menjelaskan kenapa izin ini ditolak']) !!}
    </div>
    <div class='form-group'>
      {!! Form::submit('Tolak',['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
  </div>
</div>
<div class='col-md-3'></div>
@stop