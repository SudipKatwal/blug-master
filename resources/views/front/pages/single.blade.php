@extends('front.layout.master')
@section('content')
<link href="{{asset('front/single-post-css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('front/single-post-css/responsive.css')}}" rel="stylesheet">
<section class="post-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 no-right-padding">

					<div class="main-post">

						<div class="blog-post-inner">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('front/images/user	.jpg')}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>Katy Liu</b></a>
									<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex Concepts in Physics?</b></a></h3>

							<p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
							ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint
							occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

							<div class="post-image"><img src="{{asset('front/images/blog-1-1000x600.jpg')}}" alt="Blog Image"></div>

							<p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
							ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint
							occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

							<ul class="tags">
								<li><a href="#">Mnual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recommendation</a></li>
								<li><a href="#">Inspiration</a></li>
							</ul>
						</div><!-- blog-post-inner -->

						<div class="post-icons-area">
							<ul class="post-icons">
								<li><a href="#"><i class="fas fa-heart"></i>57</a></li>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
							</ul>

							<ul class="icons">
								<li>SHARE : </li>
								<li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
								<li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
							</ul>
						</div>

						<div class="post-footer post-info">

							<div class="left-area">
								<a class="avatar" href="#"><img src="{{asset('front/images/avatar-1-120x120.jpg')}}" alt="Profile Image"></a>
							</div>

							<div class="middle-area">
								<a class="name" href="#"><b>Katy Liu</b></a>
								<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
							</div>

						</div><!-- post-info -->


					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->

				<div class="col-lg-4 col-md-12 no-left-padding">

					<div class="single-post info-area">

						<div class="sidebar-area about-area">
							<h4 class="title"><b>About Author</b></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
								ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
								Ut enim ad minim veniam</p>
						</div>

						<div class="sidebar-area subscribe-area">

							<h4 class="title"><b>SUBSCRIBE</b></h4>
							<div class="input-area">
								<form>
									<input class="email-input" type="text" placeholder="Enter your email">
									<button class="submit-btn" type="submit"><i class="far fa-bell	"></i></button>
								</form>
							</div>

						</div><!-- subscribe-area -->

						<div class="tag-area">

							<h4 class="title"><b>TAG CLOUD</b></h4>
							<ul>
								<li><a href="#">Manual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recomendation</a></li>
								<li><a href="#">Interpritation</a></li>
								<li><a href="#">Manual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recomendation</a></li>
								<li><a href="#">Interpritation</a></li>
							</ul>

						</div><!-- subscribe-area -->

					</div><!-- info-area -->

				</div><!-- col-lg-4 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section><!-- post-area -->


	<section class="recomended-area section">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('front/images/alex-lambley-205711.jpg')}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{asset('front/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
								Concepts in Physics?</b></a></h4>

								<ul class="post-footer">
								<li><a href="#"><i class="fas fa-heart"></i>57</a></li>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
								</ul>

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-md-6 col-sm-12 -->

				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('front/images/caroline-veronez-165944.jpg')}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{asset('front/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

							<div class="blog-info">
								<h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
									Concepts in Physics?</b></a></h4>

								<ul class="post-footer">
									<li><a href="#"><i class="fas fa-heart"></i>57</a></li>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
								</ul>
							</div><!-- blog-info -->

						</div><!-- single-post -->

					</div><!-- card -->
				</div><!-- col-md-6 col-sm-12 -->

				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('front/images/marion-michele-330691.jpg')}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{asset('front/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

							<div class="blog-info">
								<h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
									Concepts in Physics?</b></a></h4>

								<ul class="post-footer">
									<li><a href="#"><i class="fas fa-heart"></i>57</a></li>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
								</ul>
							</div><!-- blog-info -->

						</div><!-- single-post -->

					</div><!-- card -->
				</div><!-- col-md-6 col-sm-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section>

	
	@endsection

