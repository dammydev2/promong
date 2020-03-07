@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<div class="row">

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		<div class="col-lg-4"></div>

		<div class="col-lg-4 col-sm-6 panel panel-primary">

			<div class="panel-heading">Generate Code</div>
			<div class="panel-body">
				<form method="post" action="{{ url('user/generatecode') }}">
					@csrf

					<div class="form-group">
						<label>Tour Type</label>
						<select  name="tourType" id="select" required class="form-control" required>
							<option>Community-Adventure-Individual</option>
							<option>Community-Adventure-Romantic</option>
							<option>Community-Adventure-Family</option>
							<option>Individual-Beach-Picnic</option>
							<option>Romantic-Beach-Picnic</option>
							<option>Family-Beach-Picnic</option>
							<option>Individual-Student-Excursion</option>
							<option>Individual-Foreign-Tour</option>
							<option>Romantic-Foreign-Tour</option>
							<option>Family-Foreign-Tour</option>
						</select>
					</div>

					<div class="form-group">
						<label>Code Type</label>
						<select class="form-control" name="type" id="type">
							<option>Rounds</option>
							<option>Instant</option>
						</select>
					</div>

					<div class="form-group has-feedback {{ $errors->has('code_number') ? ' has-error' : '' }}">
						<label>Number of code to generate</label>
						<input type="number" class="form-control" name="code_number" value="{{ old('code_number') }}" placeholder="Number of code to generate">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						@if ($errors->has('code_number'))
						<span class="help-block">
							<strong>{{ $errors->first('code_number') }}</strong>
						</span>
						@endif
					</div>

					<div id="hiddendiv" style="display: none" class="form-group has-feedback {{ $errors->has('win_number') ? ' has-error' : '' }}">
						<label>Number of winning code out of generated code</label>
						<input type="number" class="form-control" name="win_number" value="0{{ old('win_number') }}" placeholder="Number of winning code out of generated code">
						<span class="glyphicon glyphicon-key form-control-feedback"></span>
						@if ($errors->has('win_number'))
						<span class="help-block">
							<strong>{{ $errors->first('win_number') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('promo_start') ? ' has-error' : '' }}">
						<label>Start Date of Promo</label>
						<input type="date" class="form-control" name="promo_start" value="{{ old('promo_start') }}" placeholder="Start Date of Promo">
						<span class="glyphicon glyphicon-key form-control-feedback"></span>
						@if ($errors->has('promo_start'))
						<span class="help-block">
							<strong>{{ $errors->first('promo_start') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group has-feedback {{ $errors->has('promo_end') ? ' has-error' : '' }}">
						<label>End Date of Promo</label>
						<input type="date" class="form-control" name="promo_end" value="{{ old('promo_end') }}" placeholder="End Date of Promo">
						<span class="glyphicon glyphicon-key form-control-feedback"></span>
						@if ($errors->has('promo_end'))
						<span class="help-block">
							<strong>{{ $errors->first('promo_end') }}</strong>
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
		<script>
// 			this is onselect to redirect to the page of the option selected
$("#type").change(function() {
	var option = $(this).find('option:selected');
	var selected = $('#type').find(":selected").text();
	console.log(selected)
	if (selected === 'Instant') {
$('#hiddendiv').show();
	}
	else{
		$('#hiddendiv').hide();
	}
	//window.location.href = option.data("url");
});
</script>
@endsection
