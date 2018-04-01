<link href="{{asset('front/single-post-css/styles.css')}}" rel="stylesheet">
	<link href="{{asset('front/single-post-css/responsive.css')}}" rel="stylesheet">
@extends('front.layout.master')
@section('content')
	
<section class="post-area section">
		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 no-right-padding">

					<div class="main-post">

						<div class="blog-post-inner">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{URL::to('Images/profile-thumbnails/'.$post->user->thumbnails)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{$post->user->name}}</b></a>
									<h6 class="date">{{$post->created_at->diffForHumans()}}</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><b>{!! $post->title !!}</b></h3>

							<div class="post-image"><img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="Blog Image"></div>

							<p class="para">{!! $post->body !!}</p>

							<p class="para"></p>

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

				@if(count($posts))
					@forelse($posts as $key=>$post)
						<div class="col-lg-4 col-md-6">
							<div class="card h-100">
								<div class="single-post post-style-1">

									<div class="blog-image"><img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="Blog Image"></div>

									<a class="avatar" href="#"><img src="{{URL::to('Images/post-thumbnails/'.$post->user->thumbnail)}}" alt="Profile Image"></a>

									<div class="blog-info">

										<h4 class="title"><a href="{{route('single',$post->slug)}}"><b>{!! $post->title !!}</b></a></h4>
										<h5>By<strong> {{$post->user->name}}</strong></h5>
										<p>on <strong>{{$post->category->name}}</strong></p>

										<ul class="post-footer">
											<li><a href="#"><i class="fas fa-heart"></i>57</a></li>
											<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
											<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
										</ul>

									</div><!-- blog-info -->
								</div><!-- single-post -->
							</div><!-- card -->
						</div><!-- col-lg-4 col-md-6 -->
					@empty
					@endforelse
				@endif
			</div><!-- row -->

		</div><!-- container -->
	</section>

	
	@endsection

