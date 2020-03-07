@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<div class="row">

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		<div class="col-lg-3"></div>

		<div class="col-lg-6 panel panel-primary">

			<div class="panel-heading">User(s) </div>
			<div class="panel-body">
				
				@if(count($user) <= 4)
				<a href="{{ route('admin/adduser') }}" class="btn btn-primary fa fa-user-plus">Add new user</a>
				@endif

				<table class="table table-bordered">
					<tr>
						<td colspan="3"><center>{{ \Auth::User()->name }} Users</center></td>
					</tr>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>
					@foreach($user as $results)
					<tr>
						<td>{{ $results->contact_name }}</td>
						<td>{{ $results->contact_phone }}</td>
						<td>{{ $results->email }}</td>
						<td><a href="{{ url('user/edit/'.$results->id) }}"><i class="fa fa-edit"></i></a></td>
						<td><a href="{{ url('user/delete/'.$results->id) }}"><i class="fa fa-trash btn btn-danger"></i></a></td>
					</tr>
					@endforeach
				</table>

			</div>

		</div>


	</div>
</div>
@endsection
