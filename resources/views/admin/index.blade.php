@extends('admin.app')

@section('content')
	<section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Informasi</h3>

            <!-- COMPLEX TO DO LIST -->   
              <div class="row mt">
              	@if($block['message'])
					<div class='alert-success'>
					{{ $block['message'] }}
					</div>
				@endif
                  <div class="col-md-12">
                  	@if($block['informasi'])
                  	@foreach ($block['informasi'] as $informasi)
						<section class="task-panel tasks-widget">
							
							<div class="panel-body">
								<div class="task-content">
								<div class="h2">{{$informasi->judul}}</div>
								<div class="h6">Dibuat : {{$informasi->created_at}}</div>
								<p>{{$informasi->konten}}</p>
								<b>Referensi : </b>
								<p>{{$informasi->referensi}}</p>
								</div>
							</div>
							
						</section>
                      @endforeach
              	@else
					Tidak ada informasi yang dapat ditampilkan
				@endif
                  </div><!-- /col-md-12-->
              </div><!-- /row -->          
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop