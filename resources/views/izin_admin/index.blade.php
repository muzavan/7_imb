@extends('izin_admin.app')

@section('content')
	<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Informasi</h3>

            <!-- COMPLEX TO DO LIST -->     
              <div class="row mt">
                  <div class="col-md-12">
                      <section class="task-panel tasks-widget">
						@if($block['message'])
							<div class='alert-success'>
							{{ $block['message'] }}
							</div>
						@endif

						@foreach ($block['informasi'] as $informasi)

							<div class="h2">{{$informasi->judul}}</div>
							<div class="h6">Dibuat : {{$informasi->created_at}}</div>
							<p>{{$informasi->konten}}</p>
							<b>Referensi : </b>
							<p>{{$informasi->referensi}}</p>

						@endforeach
                      </section>
                  </div><!-- /col-md-12-->
              </div><!-- /row -->          
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop