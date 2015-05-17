@extends('commonusers.app')

@section('sidebar')

@stop

@section('content')
  <div class='row'>
    <div class='col-md-3'>
    </div>
    @if(isset($lokasi))
      <div class='col-md-6'>
        <div class="alert alert-danger">{{$lokasi['error']}}</div>
        {!! Form::open(['url' => '/user/pengajuan-lokasi' , 'files'=>true]) !!}
        <div class='form-group'>
          {!! Form::label('email','Email:') !!}
          {!! Form::email('email', $lokasi['email'],['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('alamat','Alamat:') !!}
          {!! Form::text('alamat',$lokasi['alamat'],['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('luas','Luas:') !!}
          {!! Form::text('luas',$lokasi['luas'],['class' => 'form-control','rows' => '3']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('kelurahan','Kelurahan:') !!}
          {!! Form::text('kelurahan',$lokasi['kelurahan'],['class' => 'form-control','rows' => '3']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('kecamatan','Kecamatan:') !!}
          {!! Form::text('kecamatan',$lokasi['kecamatan'],['class' => 'form-control','rows' => '3']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('dokumen','Dokumen Teknis:') !!}
          {!! Form::file('dokumen',['class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::submit('Tambah Permohonan Lokasi',['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    @else
    <div class='col-md-6'>
      {!! Form::open(['url' => '/user/pengajuan-lokasi' , 'files'=>true]) !!}
      <div class='form-group'>
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email','',['class' => 'form-control','placeholder' => 'mail@email.com']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('alamat','Alamat:') !!}
        {!! Form::text('alamat','',['class' => 'form-control','placeholder' => '(Alamat Lokasi)']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('luas','Luas (m2):') !!}
        {!! Form::text('luas','',['class' => 'form-control','placeholder' => 'Luas (dalam meter persegi)']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('kelurahan','Kelurahan:') !!}
        {!! Form::text('kelurahan','',['class' => 'form-control','placeholder' => 'Kelurahan']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('kecamatan','Kecamatan:') !!}
        {!! Form::text('kecamatan','',['class' => 'form-control','placeholder' => 'Kecamatan']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('dokumen','Dokumen Teknis:') !!}
        {!! Form::file('dokumen',['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::submit('Tambah Permohonan Lokasi',['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}
    </div>
    @endif
    <div class='col-md-3'>
    </div>
  </div>
@stop