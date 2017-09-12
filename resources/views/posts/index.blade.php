@extends('layouts.default')
@section('content')
<div class="row">
            <div class="col-lg-12 margin-tb">                   
                <div class="pull-left">
                    <h2>Laravel CRUD Example</h2>
                </div>
                <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('create') }}">Create item</a>
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
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th width="140px" class="text-center">
            Action
        </th>
       
    </tr>
    
    @foreach($posts as $key => $p)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $p->title }}</td>
        <td>{{ $p->content }}</td>
        <td>
        @if($p->image_file)
        <img src="{{ asset('images') }}/{{ $p->image_file }}" style="height: 100px;width: 100px;">
        @endif
        </td>
        <td>
          <a class="btn btn-info btn-sm" href="{{ route('show', $p->id) }}"><i class="glyphicon glyphicon-th-large"></i></a>      
          <a class="btn btn-primary btn-sm" href="{{ route('edit', $p->id) }}"><i class="glyphicon glyphicon-pencil"></i></a> 
          <a class="btn btn-danger btn-sm" href="{{ route('destroy', $p->id) }}"><i class="glyphicon glyphicon-trash"></i></a> 

        </td>
      </tr>    
    @endforeach
  
</table>
{!! $posts->render() !!}
@endsection