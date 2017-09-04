@extends('layouts.default')

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Post</h2>

        </div>

        <div class="pull-right">

        	<br/>

            <a class="btn btn-primary" href=""> <i class="glyphicon glyphicon-arrow-left"></i></a>

        </div>

    </div>

</div>


    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

       
    </div>


<div class="row">
<form action="{{ route('show') }}" method="post">
{!! Form::token() !!}
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Title:</strong>
            <input type="text" name="title" placeholder="Title" class="form-control">         

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Content:</strong>
            <textarea name="content" placeholder="Content" class="form-control" style="height:100px;"></textarea>

            

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</form>
</div>

@endsection

