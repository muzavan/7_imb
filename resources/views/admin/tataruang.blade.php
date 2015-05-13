@extends('admin.app')

@section('content')

      	<section id="main-content">
          <section class="wrapper">

<h3><i class="fa fa-angle-right"></i> Tata Ruang Kota Bandung</h3>
@if($block['message'])
	<div class='alert-success'>
	{{ $block['message'] }}
	</div>
@endif

<div class="row mt">

	<div class="col-md-8">
		<div id="googleMap" style="width: 100%; height: 500px; border: 12px solid #FFFFFF;"></div>
	</div>
	<div class="col-md-3">
		Pilih Kecamatan: <br>
		<select class="form-control" id="jenisruang" name="jenisruang">
			<option value="0">-- Pilih Kecamatan --</option>
		@foreach ($block['wilayah'] as $wilayah)
			<option value="{{$wilayah->id}}">{{$wilayah->wilayah}}</option>
		@endforeach
		</select>

		<div id="tulisfungsi"></div>
	</div>
</div>


</section>
</section>

@stop