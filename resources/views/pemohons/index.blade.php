@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['pemohons']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>nama</th>
                  <th>nik</th>
                  <th>alamat</th>
                  <th>email</th>
                  <th>edit</th>
                  <th>delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['pemohons'] as $pemohon)
                  <tr>
                        <td>{{ $pemohon->id }}</td>
                        <td>{{ $pemohon->nama }}</td>
                        <td>{{ $pemohon->nik }}</td>
                        <td>{{ $pemohon->alamat }}</td>
                        <td>{{ $pemohon->email }}</td>
                        <td> <a href='pemohons/pemohon/{{$pemohon->id}}/edit'>Edit</a> </td>
                        <td> <a href='pemohons/pemohon/{{$pemohon->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop