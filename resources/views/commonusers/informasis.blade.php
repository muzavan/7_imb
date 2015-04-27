@extends('commonusers.app')

@section('sidebar')
  @if($block['informasis']->count())
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Konten</th>
              </tr>
          </thead>

          <tbody>
              @foreach ($block['informasis'] as $informasi)
                  <tr>
                        <td><a href='{{ url("/informasis/$informasi->id")}}'>{{ $informasi->judul }}</a></td>
                  </tr>
              @endforeach
                
          </tbody>
        
      </table>
  @else
      Tidak ada Informasi yang Bisa Ditampilkan
  @endif
@stop

@section('content')
  @if($block['message'])
    <div class='alert-success'>
      {{ $block['message'] }}
    </div>
  @endif
  @if($block['informasi'])
    <div class="h2">{{$block['informasi']->judul}}</div>
    <div class="h6">Dibuat : {{$block['informasi']->created_at}}</div>
    <p>{{$block['informasi']->konten}}</p>
    <b>Referensi : </b>
    <p>{{$block['informasi']->referensi}}</p>

  @endif
  
  
@stop