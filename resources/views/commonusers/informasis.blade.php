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
                        <td><a href='{{ url("/informasi/$informasi->id")}}'>{{ $informasi->judul }}</a></td>
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
    <div class="h2">{{$block['informasi']->judul}}</div><hr></hr>
    <p>{{$block['informasi']->konten}}</p><br><br>
    @if($block['informasi']->referensi)
    <b>Referensi : </b>
    <p>{{$block['informasi']->referensi}}</p>
    @endif
    <div class="h6"><b>Dibuat :</b> {{$block['informasi']->created_at}}</div>
    <div class="h6"><b>Terakhir diperbaharui :</b> {{$block['informasi']->updated_at}}</div>

  @endif
  
  
@stop