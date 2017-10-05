@extends('layouts.default')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading"><h2>Laravel 5.3 Image Upload with Validation example</h2></div>
  <div class="panel-body">

 

        <form action="{{ route('imageUploadSuc') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <input type="file" name="image" />
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </form>

  </div>
</div>

@endsection