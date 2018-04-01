@extends('front.layout.master')
@section('content')
<body>
	<section class="blog-area section">
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
								<h5>By<strong> {{$post->user->name}}</strong></h5>
								<p>on <strong>{{$post->category->name}}</strong></p>

								<ul class="post-footer">
                                    <li id="likes"><a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>{{count($post->likes)}}</a></li>
                                    <script>
                                        $(document).on('click','#like',function () {
                                            $user_id = '{{Auth::id()}}';
                                            $post_id = '{{$post->id}}';
                                            $.ajax({
                                                type:'get',
                                                url:'{{route('like')}}',
                                                data:{'pid':$post_id,'uid':$user_id},
                                                success:function (data) {

                                                    $('#likes').replaceWith('<a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>'+data+'</a>');
                                                }
                                            });
                                        });
                                    </script>
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
            </div>
            <div class="row">
                @if(count($featureCategoryPorts))
                    @forelse($featureCategoryPorts as $key=>$post)
				<div class="col-lg-8 col-md-12">
					<div class="card h-100">
						<div class="single-post post-style-2">

							<div class="blog-image"><img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="Blog Image"></div>

							<div class="blog-info">

								<h6 class="pre-title"><a href="#"><b>{{$post->category->name}}</b></a></h6>

								<h4 class="title"><a href="{{route('single',$post->slug)}}"><b>{!! $post->title !!}</b></a></h4>

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
									ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>

								<div class="avatar-area">
									<a class="avatar" href="#"><img src="{{URL::to('Images/profile-thumbnails/'.$post->user->thumbnail)}}" alt="Profile Image"></a>
									<div class="right-area">
										<a class="name" href="#"><b>{{$post->user->name}}</b></a>
										<h6 class="date" href="#">{{$post->created_at->diffForHumans()}}</h6>
									</div>
								</div>

								<ul class="post-footer">
                                    <li id="likes"><a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>{{count($post->likes)}}</a></li>
                                    <script>
                                        $(document).on('click','#like',function () {
                                            $post_id = '{{$post->id}}';
                                            $user_id = {{Auth::id()}}
                                            $.ajax({
                                                type:'get',
                                                url:'{{route('like')}}',
                                                data:{'pid':$post_id,'uid':$user_id},
                                                success:function (data) {

                                                    $('#likes').replaceWith('<a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>'+data+'</a>');
                                                }
                                            });
                                        });
                                    </script>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
								</ul>

							</div><!-- blog-right -->

						</div><!-- single-post extra-blog -->

					</div><!-- card -->
				</div><!-- col-lg-8 col-md-12 -->
                    @empty
                    @endforelse
                @endif
                    @if(count($featureCategoryPorts))
                        @forelse($featureCategoryPorts as $key=>$post)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{URL::to('Images/profile-thumbnails/'.$post->user->thumbnail)}}" alt="Profile Image"></a>

							<h4 class="title"><a href="{{route('single',$post->slug)}}"><b>{!! $post->title !!}</b></a></h4>
								<h5>By<strong> {{$post->user->name}}></strong></h5>
								<p>on <strong>{{$post->category->name}}</strong></p>
	

							<ul class="post-footer">
								<li id="likes"><a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>{{count($post->likes)}}</a></li>
                                <script>
                                    $(document).on('click','#like',function () {
                                       $post_id = '{{$post->id}}';
                                        $user_id = {{Auth::id()}}
                                       $.ajax({
                                          type:'get',
                                          url:'{{route('like')}}',
                                           data:{'pid':$post_id,'uid':$user_id},
                                           success:function (data) {

                                              $('#likes').replaceWith('<a role="button" tabindex="0" id="like"><i class="fas fa-heart" id="like"></i>'+data+'</a>');
                                           }
                                       });
                                    });
                                </script>
									<li><a href="#"><i class="fas fa-comments"></i>6</a></li>
									<li><a href="#"><i class="fas fa-eye"></i>138</a></li>
							</ul>

						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->
                        @empty
                        @endforelse
                    @endif
				</div><!-- row -->

			<a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

		</div><!-- container -->
	</section><!-- section -->

@endsection