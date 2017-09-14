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
						<tr>
							<td>abc</td>
							<td>1</td>
							<td>1/2/12</td>
							<td>del</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="text-center"></div>
		</div>
	</div>
@endsection