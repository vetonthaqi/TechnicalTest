<!doctype html>
<html lang="en">
<head>
	@section('head')
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	@show
</head>
<body>
	<div class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-togle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{URL::route('home')}}" class="navbar-brand">Buy IT Products</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{URL::route('home')}}">Home</a></li>
					@if(Auth::check())
					<li><a href="{{URL::route('product-home')}}">Products</a></li>
					@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
						<li><a href="{{ URL::route('getCreate') }}">Sign Up</a></li>
						<li><a href="{{ URL::route('getLogin') }}">Login</a></li>
					@else
						<li><a href="{{ URL::route('getLogout') }}">Logout</a></li>	
					@endif
				</ul>
			</div>
		</div>
	</div>

	@if(Session::has('success'))
		<div class="alert alert-success"> {{Session::get('success')}} </div>
	@elseif(Session::has('fail'))
		<div class="alert alert-danger"> {{Session::get('fail')}} </div>
	@endif
	
	<div class="container"> @yield('content')</div>

	@section('javascript')
	<script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	@show
</body>
</html>
