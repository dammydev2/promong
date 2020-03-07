@extends('layouts.front-layout')

@section('content')

<!-- the testing opof the slider  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div id="carousel" class="carousel slide" data-ride="carousel"   style='background: url("images/193468.jpg");
background-repeat: no-repeat center center scroll;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;'>


<div class="carousel-inner" role="listbox" style='background:rgba(0,0,0,0.6); background-size:cover;width:100%;height100%;'>

	<div class="carousel-item active">
		<div class="caption">
			<h1>Be an Enabler</h1>
			<h2>A tour Promoter </h2>

			<a class="big-button" href="{{ url('/account') }}" title="">Click to Join</a>
		</div>
	</div>

	<div class="carousel-item">
		<div class="caption">
			<h1>Something and share your whatever</h1>
			<h2>Else it easy for you to do whatever this thing does.</h2>

			<a class="big-button" href="account.php" title="">Create Project</a>
		</div>
	</div>

	<div class="carousel-item" >
		<div class="caption">
			<h1>Create and share your whatever</h1>
			<h2>Make it easy for you to do whatever this thing does.</h2>
		</div>
	</div>
</div>

<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
</a>

</div>

<!-- the testing opof the slider ended -->

<!-- the call to action and all its family -->
<div class="sectiion-before" >
	<div class="col-md-12 section-two" >
		<div class="promoter-form" >
			<form>
				<div class="large-12 columns">
					<!--<select id="select">-->
						<select id="select">
							<!--<option selected="" disabled=""  >----------- Select Promoter -----------</option>-->
							<option selected="" disabled=""  >-- Select Promoter --</option>
							@foreach($user as $users)
							<option value="{{ $users->name }}">{{ $users->name }}</option>
							@endforeach
							
						</select>
					</div>
				</form>
			</div>
			<script>
// 			this is onselect to redirect to the page of the option selected
$("#select").change(function() {
	var option = $(this).find('option:selected');
	var selected = $('#select').find(":selected").text();
	console.log(selected)
	window.location.href = "{{ url('user/company/')}}"+'/'+selected;
	//window.location.href = option.data("url");
});
</script>
<!-- form ended -->
<!-- tour types to be displayed  -->
<div class="col-sm-12">
	<section class="section section-default mt-none mb-none section-services">
		<div class="container-fluid">
			<div class="fold-center" >
				<h2 class="fold-center-text">
					Packaged <strong>Tours</strong>
				</h2>
				<div class="row">
					<div class="col-sm-3">
						<div class="service-block-container">
							<div class="service-block">
								<div class="service-underlay">
									<span class="service-name">
										Community Adventure
									</span>
									<a class="cta" href="/services/web-applications">Learn More</a>
								</div>
								<span class="service-icon">
									<em class="fa fa-map"></em>
								</span>
											<!-- <span class="service-desc">
												Bespoke web applications for end to end solutions
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													Beach Picnic
												</span>
												<a class="cta" href="/services/enterprise-resource-planning">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-spinner" ></em>
											</span>
											<!-- <span class="service-desc">
												World leading enterprise resource planning software
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													Educational Excursion
												</span>
												<a class="cta" href="/services/accounting-solutions">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-graduation-cap"></em>
											</span>
											<!-- <span class="service-desc">
												Installation and support of Sage and Pegasus Opera
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													KidsTour
												</span>
												<a class="cta" href="/services/support-solutions">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-users"></em>
											</span>
											<!-- <span class="service-desc">
												Maintenance and support of infrastructure
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3" >
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													CelebTour
												</span>
												<a class="cta" href="/services/bespoke-solutions">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-cogs"></em>
											</span>
											<!-- <span class="service-desc">
												Creative solutions to make your job easier
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3" >
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													DevTour
												</span>
												<a class="cta" href="/services/infrastructure-planning">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-handshake-o"></em>
											</span>
											<!-- <span class="service-desc">
												Communications and networking made simple
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													Creme-de-la-Creme Tour
												</span>
												<a class="cta" href="/services/accounting-solutions">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-cutlery"></em>
											</span>
											<!-- <span class="service-desc">
												Installation and support of Sage and Pegasus Opera
											</span> -->
										</div>
									</div>
								</div>
								<div class="col-sm-3" >
									<div class="service-block-container">
										<div class="service-block">
											<div class="service-underlay">
												<span class="service-name">
													TheChronicleNG Tourism Reality Show
												</span>
												<a class="cta" href="/services/infrastructure-planning">Learn More</a>
											</div>
											<span class="service-icon">
												<em class="fa fa-pie-chart"></em>
											</span>
											<!-- <span class="service-desc">
												Communications and networking made simple
											</span> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- the call to action and all its family ended -->

	@endsection
