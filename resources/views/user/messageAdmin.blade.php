@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<div class="row">

		@if (Session::has('message'))
		<div class="alert alert-danger">{{ Session::get('message') }}</div>
		@endif

		<div class="col-lg-4"></div>

		<div class="col-lg-4 panel panel-primary">

			<div class="panel-heading">Message Admin</div>
			<div class="panel-body">
				<p>Type your message</p>
				<form method="post" action="{{ url('user/sendMessage') }}">
					@csrf

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

					<div class="col-lg-4">
						<input type="submit" name="" class="btn btn-primary">
					</div>

				</form>
			</div>

		</div>


	</div>
</div>
@endsection
