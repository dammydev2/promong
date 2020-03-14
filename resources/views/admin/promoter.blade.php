@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

		@if(Session::has('error'))
		<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif

		@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		<div class="col-md-1"></div>
		<div class="col-md-10 panel panel-primary">
			<div class="panel-heading">Promoter(s)</div>
			<div class="panel-body">
				<table class="table table-bordered" style="width: 500px; height: 600; overflow-y: scroll;">
					{{ $user->links() }}
					<tr>
						<th></th>
						<th>Promoter</th>
						<th>Contact Person</th>
						<th>Phone</th>
						<th>Email</th>
						<td></td>
					</tr>
					@foreach($user as $users)
					<tr>
						<td>
							@if($users->status === 'unapproved')
							<a href="{{ url('/admin/activate/'. $users->id) }}" class="btn btn-success">Activate</a>
							@else
							<a href="{{ url('/admin/deactivate/'. $users->id) }}" class="btn btn-danger">De-Activate</a>
							@endif
						</td>
						<td>{{ $users->name }}</td>
						<td>{{ $users->contact_name }}</td>
						<td>{{ $users->contact_phone }}</td>
						<td>{{ $users->email }}</td>
						<td><a href="{{ url('/admin/delete/account/'. $users->id) }}" class="btn btn-danger"><i class="fa fa-trash btn btn-danger"></i></a></td>
					</tr>
					@endforeach
				</table>
				{{ $user->links() }}
			</div>
		</div>


	</div>
</div>
@endsection
