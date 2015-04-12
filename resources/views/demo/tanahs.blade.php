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
             <tr><td>Izin Pemilik</td></tr>
             <tr class='active'><td>Izin Tanah</td></tr>
             <tr><td>Izin Lokasi</td></tr>
          </tbody>
        
      </table>
@stop

@section('content')
  {!! Form::open(['url' => "/demo/tanahs"]) !!}
      <div class='form-group'>
        {!! Form::label('nama_pemilik','Nama Pemilik:') !!}
        {!! Form::text('nama_pemilik',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::label('luas','Luas:') !!}
        {!! Form::text('luas',null,['class' => 'form-control']) !!}
      </div>
      <div class='form-group'>
        {!! Form::submit('Tambah Tanah',['class' => 'btn btn-primary form-control']) !!}
      </div>
      {!! Form::close() !!}
  
@stop