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
                  	<div class="pull-left" style="margin-left: 5px"><a href="/admin/informasi/tambah" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah Informasi</a></div><br><br>
                  	@if($block['informasi'])
                  	@foreach ($block['informasi'] as $informasi)
						<section class="task-panel tasks-widget">
							
							<div class="panel-body">
								<div class="task-content">
								<div class="h2">{{$informasi->judul}}</div><hr></hr>
								<p>{{$informasi->konten}}</p><br><br>
								@if($informasi->referensi)
								<b>Referensi : </b>
								<p>{{$informasi->referensi}}</p>
								@endif
								<div class="h6"><b>Dibuat :</b> {{$informasi->created_at}}</div>
								<div class="h6"><b>Terakhir diperbaharui :</b> {{$informasi->updated_at}}</div>

								<div class="pull-right">
									<a href="/admin/informasi/sunting/{{$informasi->id}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span> Sunting</a>
									<a href="/admin/informasi/hapus/{{$informasi->id}}" onclick="return confirm('Yakin ingin menghapus informasi ini?');" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
								</div>
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