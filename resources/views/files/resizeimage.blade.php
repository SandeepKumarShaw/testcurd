@extends('layouts.default')
@section('content')

<div class="row">
            <div class="col-lg-12 margin-tb">                   
                <div class="pull-left">
                    <h2>Laravel upload image display after resize</h2>
                </div>
                <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('thumbcreate') }}">Create item</a>
                </div>
            </div>
            <div id="delmsg"></div>
</div>
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
    <tr>
        <th width="80px">No</th>       
        <th>Image</th>
        <th width="140px" class="text-center">
            Action
        </th>
       
    </tr>
    
@if (isset($results)) 
  @foreach($results as $result)
  <tr class="listview">
<td>{{ $result->id }}</td>
<td> 
<img src="{{ asset('images/normal_images') }}/{{ $result->photo }}" alt="" title="" />
</td>
<td>
<a class="btn btn-info btn-sm" href="{{ route('thumshow', $result->id) }}"><i class="glyphicon glyphicon-th-large"></i></a> 
</td>
</tr>
@endforeach
@endif  
</table> 

@endsection