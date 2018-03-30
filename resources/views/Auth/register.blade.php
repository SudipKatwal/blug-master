{{--@extends('front.layout.master')--}}
{{--@section('content')--}}

        <!DOCTYPE HTML>
<html lang="en">
<head>
    <title>BlugMaster :: Login and Register</title>
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
    <!--FOR LOGIN-->
    <link href="{{asset('front/css/login-style.css')}}" rel="stylesheet">



</head>
<body >

<header>
    <div class="container-fluid position-relative no-side-padding">

        <a href="#" class="logo"><img src="{{asset('front/images/logo.png')}}" alt="Logo Image"></a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="fas fa-align-right"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="{{URL::to('/')}}">Home</a></li>
            <li><a href="#">Categories1</a></li>
            <li><a href="#">Categories2</a></li>
            <li><a href="#">Categories3</a></li>
            <li><a href="#">Categories4</a></li>
            <li><a href="{{URL::to('login')}}">Login</a></li>
        </ul><!-- main-menu -->


    </div><!-- conatiner -->
</header>

<div class="login-page">
    <div class="form">
        <form class="login-form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" value="{{ old('name') }}" placeholder="name" name="name"/>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <input type="email" value="{{ old('email') }}" placeholder="Your Email" name="email"/>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input type="password" placeholder="Password" name="password"/>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <input type="text" value="{{ old('address') }}" placeholder="Address" name="address"/>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
            <input type="text" value="{{ old('phone') }}" placeholder="Phone Number" name="phone"/>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            <input type="text" value="{{ old('interest') }}" placeholder="Interest for eg. Travel, Sport, Gaming" name="interest"/>
            @if ($errors->has('interest'))
                <span class="help-block">
                    <strong>{{ $errors->first('interest') }}</strong>
                </span>
            @endif
            Gender
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">other</option>
            </select>
            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
            <input type="file" name="profile">
            @if ($errors->has('profile'))
                <span class="help-block">
                    <strong>{{ $errors->first('profile') }}</strong>
                </span>
            @endif
            <button>create</button>
            <p class="message">Already registered? <a href="{{url('login')}}">Sign In</a></p>
        </form>
    </div>
</div>

</body>
<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#"><img src="{{asset('front/images/footerlogo.png')}}" alt="Logo Image"></a>
                    <p class="copyright">BlugMaster @ 2018. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="" target="_blank">BIT 8th</a></p>
                    <ul class="icons">
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-vine"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        <li><a href="#">BEAUTY</a></li>
                        <li><a href="#">HEALTH</a></li>
                        <li><a href="#">MUSIC</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">SPORT</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="#">TRAVEL</a></li>
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form>
                            <input class="email-input" type="text" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>


<!-- SCIPTS -->

<script src="{{asset('front/js/jquery-3.1.1.min.js')}}"></script>

<script src="{{asset('front/js/tether.min.js')}}"></script>

<script src="{{asset('front/js/bootstrap.js')}}"></script>

<script src="{{asset('front/js/scripts.js')}}"></script>

</html>
{{--@endsection--}}