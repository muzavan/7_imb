@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['pemiliks']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>alamat</th>
                  <th>telepon</th>
                  <th>fax</th>
                  <th>email</th>
                  <th>edit</th>
                  <th>delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['pemiliks'] as $pemilik)
                  <tr>
                        <td>{{ $pemilik->id }}</td>
                        <td>{{ $pemilik->nama }}</td>
                        <td>{{ $pemilik->alamat }}</td>
                        <td>{{ $pemilik->telepon }}</td>
                        <td>{{ $pemilik->fax }}</td>
                        <td>{{ $pemilik->email }}</td>
                        <td> <a href='pemiliks/pemilik/{{$pemilik->id}}/edit'>Edit</a> </td>
                        <td> <a href='pemiliks/pemilik/{{$pemilik->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop