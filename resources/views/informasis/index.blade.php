@extends('app')

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['informasis']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>id</th>
                  <th>judul</th>
                  <th>konten</th>
                  <th>referensi</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['informasis'] as $informasi)
                  <tr>
                        <td>{{ $informasi->id }}</td>
                        <td><a href="informasis/informasi/{{$informasi->id}}">{{ $informasi->judul }}</a></td>
                        <td>{{ $informasi->konten }}</td>
                        <td>{{ $informasi->referensi }}</td>
                        <td> <a href='informasis/informasi/{{$informasi->id}}/edit'>Edit</a> </td>
                        <td> <a href='informasis/informasi/{{$informasi->id}}/delete'>Delete</a> </td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop