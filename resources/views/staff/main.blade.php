@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h2 class="text-center">Utility Inventory System</h2>
	</div>
	<div class="col-md-3 ">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">My Profile</h3>
			</div>
			<div class="panel-body">
				<p><strong>Name:</strong>{{Auth::user()->fname}} {{Auth::user()->mname}} {{Auth::user()->lname}}</p>

				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation" class="active"><a href="">List</a></li>
				  <li role="presentation"><a href="{{ route('logout') }}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
		<div class="col-md-9 ">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Utility Inventory List</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('item'))
					<div class="alert alert-success">{{Session::get('item')}}</div>
				@endif
				<div>
					<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#newItems">New</a>

					<form class="pull-right" action="" method="POST">
						
						<input type="text" name="search" class="" required="">
						<button type="submit" class="btn btn-info btn-xs">Search</button>
						{{csrf_field()}}
					</form>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Borrowed</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($items as $key => $item)
						<tr>
							<td>{{ $item->name }}</td>
							<td>{{ $item->quantity }}</td>
							<td>{{ $item->user_id }}</td>
							<td>{{ $item->created_at }}</td>
							<td>del</td>
						</tr>
				    @endforeach		
					</tbody>
				</table>
			</div>
			<div class="text-center"></div>
		</div>
			<div class="modal fade" id="newItems">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>Enter New Items</h3>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="{{route('add_item')}}" method="POST">
						<div class="form-group">
							<label class="control-label col-md-3">Item Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Item Quantity</label>
							<div class="col-md-8">
								<input type="number" name="quantity" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-3">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
							
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
@endsection