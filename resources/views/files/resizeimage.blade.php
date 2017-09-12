@extends('layouts.default')
@section('content')
<div class="panel panel-primary">
 <div class="panel-heading">Laravel upload image display after resize</div>
  <div class="panel-body"> 
<div class="row">
<div class="col-md-12">
<table class="table table-striped table-condensed voc_list ">
<thead>
<tr>
<th style="width:30%;">Sl.</th>
<th style="width:40%;">Image(100x)</th>
<th style="width:30%;">Action</th>
</tr>
</thead>
<tbody>
<tr class="listview">
<td>1</td>
<td> 
<img src="" alt="" title="" />
</td>
<td style="width: 50%;">
View
</td>
</tr>
</tbody>
</table>
</div>
  </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p class="error_item">{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <form action="{{ route('intervention.postresizeimage') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">


        <div class="row">
        
            <div class="col-md-6">
                <br/>
                <input type="file" class="form-control" name="photo">

                
            </div>
            <div class="col-md-6">
                <br/>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </div>
        </div>
    </form>
 </div>
</div>
@endsection