@extends('layouts.default')
@section('content')

<div class="row">
            <div class="col-lg-12 margin-tb">                   
                <div class="pull-left">
                    <h2>Laravel upload image display after resize</h2>
                </div>
                <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('intervention.getresizeimage') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
	            </div>
                
            </div>
            <div id="delmsg"></div>
</div>

<!-- content -->
     <div class="row">
      <div class="col-sm-6">
      <label>Original Image:</label>
        <img src="{{ asset('images') }}/{{ $result->photo }}" alt="" class="img-responsive center-block">
      </div>
      <div class="row col-sm-6">
        <div class="col-xs-6">
        <label>100X Image:</label>
          <img src="{{ asset('images/normal_images') }}/{{ $result->photo }}" alt="" class="img-responsive">
        </div>
        <div class="col-xs-6">
        <label>X200 Image:</label>
          <img src="{{ asset('images/thumbnail_images') }}/{{ $result->photo }}" alt="" class="img-responsive">
        </div>        
      </div>
    </div>

@endsection