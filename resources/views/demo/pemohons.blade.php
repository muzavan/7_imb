@extends('demo.app')

@section('sidebar')
  <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Ubah Identitas</th>
              </tr>
          </thead>
      </table>
@stop

 @section('content')
  @if($pemohon)
      {!! Form::open(['url' => "/demo/pemohons/$pemohon->id"]) !!}
      <div class='form-group'>
        {!! Form::label('nama','Nama:') !!}
        {!! Form::text('nama',$pemohon->nama,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('nik','NIK:') !!}
        {!! Form::text('nik',$pemohon->nik,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('alamat','Alamat:') !!}
        {!! Form::textarea('alamat',$pemohon->alamat,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',$pemohon->email,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::submit('Ubah Data Pemohon',['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}
  @else
  @endif
@stop
