@section('header')
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>


	<!-- Stylesheets -->

	<link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/ionicons.css')}}" rel="stylesheet">

	<link href="{{asset('front/css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">



</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo"><img src="{{asset('front/images/logo.png')}}" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="fas fa-align-right"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">Fashion</a></li>
				<li><a href="#">Login</a></li>
			</ul><!-- main-menu -->

			
		</div><!-- conatiner -->
	</header>
	@endsection
