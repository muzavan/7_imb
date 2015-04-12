@extends('demo.app')

@section('sidebar')
  <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Tahapan</th>
              </tr>
          </thead>

          <tbody>
             <tr ><td>Izin Bangunan</td></tr>
             <tr class='active'><td>Izin Pemilik</td></tr>
             <tr><td>Izin Tanah</td></tr>
             <tr><td>Izin Lokasi</td></tr>
          </tbody>
        
      </table>
@stop

@section('content')
      {!! Form::open(['url' => 'demo/pemiliks']) !!}
      <div class='form-group'>
        {!! Form::label('nama','Nama:') !!}
        {!! Form::text('nama',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('alamat','Alamat:') !!}
        {!! Form::textarea('alamat',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('telepon','Telepon:') !!}
        {!! Form::text('telepon',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('fax','Fax:') !!}
        {!! Form::text('fax',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email','pemilik@pemilik.com',['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::submit('Tambah Pemilik',['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}

@stop