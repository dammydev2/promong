@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

<div class="col-lg-12" style="height: 50px;"></div>
		<div class="col-md-3"></div>
		<div class="col-md-6 col-sm-12 panel panel-primary">
			<div class="panel-heading">Edit Profile</div>
			<div class="panel-body">

				<form method="post" action="{{ url('/updateprofile') }}">
					@csrf 

					@foreach($data as $row)

					<div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Company Name</label>
						<input type="text" class="form-control" name="name" value="{{ $row->name }}" placeholder="Company Name">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>

						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback{{ $errors->has('contact_name') ? ' has-error' : '' }}">
						<label>Contact Person Name</label>
						<input type="text" class="form-control" name="contact_name" value="{{ $row->contact_name }}" placeholder="Contact Person Name">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>

						@if ($errors->has('contact_name'))
						<span class="help-block">
							<strong>{{ $errors->first('contact_name') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback{{ $errors->has('contact_phone') ? ' has-error' : '' }}">
						<label>Contact Person Phone</label>
						<input type="text" class="form-control" name="contact_phone" value="{{ $row->contact_phone }}" placeholder="Contact Person Phone">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>

						@if ($errors->has('contact_phone'))
						<span class="help-block">
							<strong>{{ $errors->first('contact_phone') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="{{ $row->email }}" readonly="" placeholder="Email">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>

					<div class="row">
						<!-- /.col -->
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update Profile</button>
						</div>
						<!-- /.col -->
					</div>

					@endforeach

				</form>

			</div>
		</div>

	</div>
</div>
@endsection
