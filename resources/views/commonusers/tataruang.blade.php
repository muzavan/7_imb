@extends('commonusers.app')

@section('content')
<div class='span8'>
<div style="margin-left:70px"><h2>Tata Ruang Kota Bandung</h2></div></div>

<div class="row">
	<div class="span8 offset1">
		<div id="googleMap" style="width: 100%; height: 500px; border: 12px solid #FFFFFF;"></div>
	</div>
	<div class="span3">
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
</div>
@stop