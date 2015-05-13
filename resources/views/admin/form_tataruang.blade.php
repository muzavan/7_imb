@extends('admin.app')

@section('sidebar')

@stop

@section('content')
        <section id="main-content">
          <section class="wrapper">
<div class="row mt">
<div class="col-md-12">
  <section class="task-panel tasks-widget">
              
  <div class="panel-body">
    <div class="task-content">

  <form method="POST" action="http://localhost:8000/admin/informasi/tambah" accept-charset="UTF-8" class="form-horizontal style-form" enctype="multipart/form-data"><input name="_token" type="hidden" value="g8OD6obvJuDYP4M9liV2OeHWf3w9wc2cKMfrAFel">
      <div class='form-group'>
        <div class="controls" style="margin-left: 20px"><h3>Tambah Wilayah</h3></div>
      </div>
      <div class='control-group'>
        <label class="col-sm-2 col-sm-2 control-label"><label for="judul">Nama Kecamatan:</label></label>
        <div class="col-sm-10"><input required="required" class="form-control" name="judul" type="text" value="" id="judul"></div>
      </div><br><br><br>
      <div class='control-group'>
      <label class="col-sm-2 col-sm-2 control-label" for="checkboxes">Fungsi Ruang:</label>
  <div class="col-sm-5">
    <div class="checkbox">
      <label for="checkboxes-0">
        <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
        Option one
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-1">
        <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
        Option two
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-2">
        <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
        Option Three
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-3">
        <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4">
        Option 4
      </label>
    </div>
  </div>

  <div class="col-sm-5">
    <div class="checkbox">
      <label for="checkboxes-0">
        <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
        Option one
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-1">
        <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
        Option two
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-2">
        <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
        Option Three
      </label>
    </div>
    <div class="checkbox">
      <label for="checkboxes-3">
        <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4">
        Option 4
      </label>
    </div>
  </div>
</div><br><br><br><br><br>
      <div class='control-group'><br><br><br>
        <div class="controls"><input class="btn btn-warning form-control" type="submit" value="Tambah Wilayah"></div>
      </div>
      </form>
    </div>
  </div>
              
  </section>                      
</div><!-- /col-md-12-->   
</div>   
</section>
</section>
@stop