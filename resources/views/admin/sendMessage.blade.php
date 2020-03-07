@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

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
			<div class="panel-heading">Send Message</div>
			<div class="panel-body">

				<form method="post" action="{{ route('admin/sendUserMessage') }}">
					@csrf

					<div class="form-group row">
						<label for="profile_image" class="col-md-4 col-form-label text-md-right">Code</label>
						<div class="col-md-12">
							<select class="form-control js-example-basic-single" name="promoter" id="selectVehicleaa">
								<option value="">Select user</option>
								@foreach($user as $users)
								<option>{{ $users->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

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

					<input type="submit" name="submit" value="Send Message" class="btn btn-primary">

				</form>


			</div>
		</div>


	</div>
</div>
<script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection
