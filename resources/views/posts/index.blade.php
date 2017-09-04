@extends('layouts.default')

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Post CRUD</h2>

        </div>

    </div>

</div>


   <!--  <div class="alert alert-success">

        <p></p>

    </div> -->


<table class="table table-bordered">

    <tr>

        <th width="80px">No</th>

        <th>Title</th>

        <th>Content</th>

        <th width="140px" class="text-center">

            <a class="btn btn-success btn-sm" href="{{ route('create') }}"><i class="glyphicon glyphicon-plus"></i></a>

        </th>

    </tr>


<tr>

    <td>1</td>

    <td>post1</td>

    <td>Lorem Ipsum</td>

    <td>

      <a class="btn btn-info btn-sm" href=""><i class="glyphicon glyphicon-th-large"></i></a>
      
      <a class="btn btn-primary btn-sm" href=""><i class="glyphicon glyphicon-pencil"></i></a>
      
   
      
      <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
      
      
    </td>

</tr>


</table>


@endsection