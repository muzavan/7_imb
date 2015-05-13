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

    {!! Form::open(['url' => '/admin/tataruang/sunting' , 'class'=>'form-horizontal' , 'files'=>true]) !!}
      <div class='form-group'>
        <div class="controls" style="margin-left: 20px"><h3>Sunting Wilayah</h3></div>
      </div>
      <div class='control-group'>
        {!! Form::hidden('id', $block['wilayah']->id) !!}
        <label class="col-sm-2 col-sm-2 control-label"><label for="judul">Nama Kecamatan:</label></label>
        <div class="col-sm-10">{!! Form::text('wilayah',$block['wilayah']->wilayah,['required', 'placeholder' => 'Contoh : Lengkong', 'class' => 'form-control']) !!}</div>
      </div><br><br><br>
      <div class='control-group'>
      <label class="col-sm-2 col-sm-2 control-label" for="checkboxes">Fungsi Ruang:</label>
    <?php $i=1; $num = $block['fungsiruang']->count(); $isgenap = $num%2==0; ?>
    <div class="col-sm-5">
    @foreach($block['fungsiruang'] as $fungsiruang)
    @if(($i <= $num/2 && $isgenap) || ($i <= $num/2 +1 && !$isgenap))
    <div class="checkbox">
      <label for="checkboxes-0">
        @if(in_array($fungsiruang['id'], $block['tataruang']))
          {!! Form::checkbox('fungsi ' . $fungsiruang['id'],$fungsiruang['id'], true) !!}{{$fungsiruang['fungsi']}}
        @else
          {!! Form::checkbox('fungsi ' . $fungsiruang['id'],$fungsiruang['id']) !!}{{$fungsiruang['fungsi']}}
        @endif
      </label>
    </div>
    @endif
    <?php $i++ ?>
    @endforeach
  </div>

  <?php $i=1 ?>
  <div class="col-sm-5">
    @foreach($block['fungsiruang'] as $fungsiruang)
    @if(($i > $num/2 && $isgenap) || ($i > $num/2 +1 && !$isgenap))
    <div class="checkbox">
      <label for="checkboxes-0">
        @if(in_array($fungsiruang['id'], $block['tataruang']))
          {!! Form::checkbox('fungsi ' . $fungsiruang['id'],$fungsiruang['id'], true) !!}{{$fungsiruang['fungsi']}}
        @else
          {!! Form::checkbox('fungsi ' . $fungsiruang['id'],$fungsiruang['id']) !!}{{$fungsiruang['fungsi']}}
        @endif
      </label>
    </div>
    @endif
    <?php $i++ ?>
    @endforeach
  </div>
</div><br><br><br><br><br>
      <div class='control-group'><br><br><br>
        <div class="controls"><input class="btn btn-warning form-control" type="submit" value="Sunting Wilayah"></div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
              
  </section>                      
</div><!-- /col-md-12-->   
</div>   
</section>
</section>
@stop