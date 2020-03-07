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

				<form method="post" action="{{ route('admin/reply') }}">
					@csrf

					<input type="hidden" name="message_id" value="{{ $messages->id }}">

					<div class="form-group has-feedback {{ $errors->has('subject') ? ' has-error' : '' }}">
						<label>Subject</label>
						<input type="text" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="Subject of Message">
						<span class="glyphicon glyphicon-key form-control-feedback"></span>
						@if ($errors->has('subject'))
						<span class="help-block">
							<strong>{{ $errors->first('subject') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('message') ? ' has-error' : '' }}">
						<label>Message</label>
						<textarea name="message" class="form-control">{{ old('message') }}</textarea>
						<span class="glyphicon glyphicon-key form-control-feedback"></span>
						@if ($errors->has('message'))
						<span class="help-block">
							<strong>{{ $errors->first('message') }}</strong>
						</span>
						@endif
					</div>

					<input type="submit" name="submit" value="Reply" class="btn btn-primary">

				</form>


			</div>
		</div>


	</div>
</div>
@endsection
