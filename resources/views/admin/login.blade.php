@extends('commonusers.app')
@section('content')
<div class='col-md-3'></div>
<div class='col-md-6'>
  <div class="well">
    @if(isset($message))
    <div class="alert alert-danger"> {{$message}}</div>
    {!! Form::open(['url' => '/loginAdmin']) !!}
    <div class='form-group'>
      {!! Form::label('password','Passowrd Admin:') !!}
      {!! Form::password('password') !!}
    </div>
    <div class='form-group'>
      {!! Form::submit('Login',['class' => 'btn btn-primary form-control']) !!}
    </div>
    @else
    {!! Form::open(['url' => '/loginAdmin']) !!}
    <div class='form-group'>
      {!! Form::label('password','Passowrd Admin:') !!}
      {!! Form::password('password') !!}
    </div>
    <div class='form-group'>
      {!! Form::submit('Login',['class' => 'btn btn-primary form-control']) !!}
    </div>
    @endif
    {!! Form::close() !!}
  </div>
</div>
<div class='col-md-3'></div>
@stop