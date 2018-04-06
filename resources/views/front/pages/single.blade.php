

@extends('front.layout.master')
@section('content')
	<link href="{{asset('front/single-post-css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('front/single-post-css/styles.css')}}" rel="stylesheet">
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
									<a class="name" href="#"><strong><i>By-</i> </strong><b>{{$post->user->name}}</b></a>
									<h6 class="date">{{$post->created_at->diffForHumans()}}</h6>
								</div>

							</div><!-- post-info -->

							<h3 class="title"><b>{!! $post->title !!}</b></h3>

							<div class="post-image"><img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="Blog Image"></div>

							<p class="para">{!! $post->body !!}</p>

							<p class="para"></p>
							<div class="row">
									@forelse($post->images as $image)
									<div class="col-md-6">
										<img src="{{URL::to('Images/post-images/'.$image->name)}}" class="img img-responsive">
									</div>
									@empty
									@endforelse

							</div>
							<ul class="tags">
								@forelse($post->tags as $tag)
								<li><a href="#">{!! $tag->name !!}</a></li>
								@empty
								@endforelse
							</ul>
						</div><!-- blog-post-inner -->

						<div class="post-icons-area">
							<ul class="post-icons">
								
									<li><a href="#">Post Vews <i class="fas fa-eye"></i>{{$post->view_count}}</a></li>
							</ul>

							
						</div>

						{{-- <div class="post-footer post-info">

							<div class="left-area">
								<a class="avatar" href="#"><img src="{{asset('front/images/avatar-1-120x120.jpg')}}" alt="Profile Image"></a>
							</div>

							<div class="middle-area">
								<a class="name" href="#"><b>Katy Liu</b></a>
								<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
							</div>

						</div><!-- post-info --> --}}
						<div id="fb-root"></div>

				<div class="fb-comments" data-href="{{Request::URL()}}" data-numposts="5"></div>


					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->

				<div class="col-lg-4 col-md-12 no-left-padding">

					<div class="single-post info-area">

						<div class="sidebar-area about-area">
							<h4 class="title"><b>About Author</b></h4>
							<p>{{$post->user->bio}}</p>
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

							<a class="avatar" href="#"><img src="{{URL::to('Images/profile-thumbnails/'.$post->user->thumbnail)}}" alt="Profile Image"></a>

							<div class="blog-info">
								
								<h4 class="title"><a href="{{route('single',$post->slug)}}"><b>{!! $post->title !!}</b></a></h4>
								<p>Category <strong style="color: green;">{{$post->category->name}}</strong>
									</p>
							    <h6><i>By &nbsp;<strong style="color: red;"></colgroup>{{$post->user->name}}</strong> <span> Published {{$post->created_at->diffForHumans()}}</span></i></h6>
							   <hr>
								<p class="param">{!! str_limit($post->body, 120 , ' ..... ' )!!}</p>
								

								<ul class="post-footer">
									<li><a href="#"><i class=" fa fa-eye"></i>138</a></li>
									<li><a href="{{route('single',$post->slug)}}">Read More</a></li>
									
								</ul>
									
									
								
								{{-- </ul> --}}

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
			</a>
					@empty
					@endforelse
				@endif
			</div><!-- row -->

		</div><!-- container -->
	</section>

	
	@endsection

