<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>promo tours homepage</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="icon" href="images/Logo.png" />
	
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="css/animate.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('fontawesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
	
</head>
<body>

	<header class="col-sm-12">
		<nav id='cssmenu'>
			<div class="logo"><a href="index.php">PromoNG </a></div>
			<div id="head-mobile"></div>
			<div class="button"></div>
			<ul class="topnav-centered">
				<li class='active'><a href="{{ url('/') }}">HOME</a></li>
				<li><a href="{{ url('/about') }}">ABOUT</a></li>
				<li><a href="{{ url('/contact') }}">CONTACT</a></li>
				<li><a href="{{ url('/account') }}">ACCOUNTS</a></li>
				<!--<li><a href='about-company.php'>ABOUT COMPANY</a></l/i>-->
			</ul>
		</nav>
	</header>

@yield('content')

	<!-- the call to action and all its family ended -->
	<!-- footer started -->
	<!-- Site footer -->
	<footer class="site-footer">
		<div class="container">
			<!-- <div class="row">
				<div class="col-sm-12 col-md-6">
					<h6>About</h6>
					<p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Categories</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/category/c-language/">C</a></li>
						<li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
						<li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
						<li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
						<li><a href="http://scanfcode.com/category/android/">Android</a></li>
						<li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
					</ul>
				</div>

				<div class="col-xs-6 col-md-3">
					<h6>Quick Links</h6>
					<ul class="footer-links">
						<li><a href="http://scanfcode.com/about/">About Us</a></li>
						<li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
						<li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
						<li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
						<li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
					</ul>
				</div>
			</div> -->
			<hr>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
						<a href="#">Scanfcode</a>.
					</p>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<ul class="social-icons">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer ended -->

	<script type="text/javascript" src="{{ URL::asset('js/jquery-3.4.1.min.js') }}" ></script>
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ URL::asset('js/nav.min.js') }}" ></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>