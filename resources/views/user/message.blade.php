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
			<div class="panel-heading">Message(s)</div>
			<div class="panel-body">
				<table class="table table-bordered">
					{{ $message->links() }}
					<a href="{{ route('user/messageAdmin') }}" class="btn btn-primary">Message Admin <i class="fa fa-plus"></i></a>
					<tr>
						<th>Date/time</th>
						<th>Subject</th>
						<td>Read</td>
					</tr>
					@foreach($message as $messages)
					<tr>
						<td>{{ $messages->created_at }}</td>
						<td>{{ $messages->subject }}</td>
						<td><a href="{{ url('user/read/message/'. $messages->id) }}"><i class="fa fa-envelope btn btn-info"></i></a></td>
					</tr>
					@endforeach
				</table>
				{{ $message->links() }}
			</div>
		</div>


	</div>
</div>
@endsection
