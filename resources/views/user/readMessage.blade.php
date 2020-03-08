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
		<div class="col-md-8 panel panel-primary">
			<div class="panel-heading">Message(s)</div>
			<div class="panel-body">

				@foreach($message as $messages)
				<p>Date: {{ $messages->created_at }}</p>
				<p>Subject: {{ $messages->subject }}</p>
				<p style="text-align: justify;">Body: {{ $messages->message }}</p>
				@endforeach

				<hr style="color: #000; border: 2px solid;">

				@foreach($msg as $row)
				<p>Date: {{ $messages->created_at }}</p>
				<p>Subject: {{ $messages->subject }}</p>
				<p style="text-align: justify;">Body: {{ $messages->message }}</p>
				<hr style="border: 1px solid">
				@endforeach


			</div>
		</div>


	</div>
</div>
@endsection
