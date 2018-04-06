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

                                    <a class="avatar" href="#"><img src="{{URL::to('Images/profile-thumbnails/'.$post->user->thumbnails)}}" alt="Profile Image"></a>

                                    <div class="blog-info">

                                        <h4 class="title"><a href="{{route('single',$post->slug)}}"><b>{!! $post->title !!}</b></a></h4>
                                        <p>Category <strong style="color: green;">{{$post->category->name}}</strong>
                                        </p>
                                        <h6><i>By &nbsp;<strong style="color: red;"></colgroup>{{$post->user->name}}</strong> <span> Published {{$post->created_at->diffForHumans()}}</span></i></h6>
                                        <hr>
                                        <p class="param">{!! str_limit($post->body, 120 , ' ..... ' )!!}</p>


                                        <ul class="post-footer">
                                            <li><a href="#"><i class=" fa fa-eye"></i>{{$post->view_count}}</a></li>
                                            <li><a href="{{route('single',$post->slug)}}">Read More</a></li>

                                        </ul>



                                        {{-- </ul> --}}

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->
                    @empty
                    @endforelse
                @endif
            </div>


            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

        </div><!-- container -->
    </section><!-- section -->

@endsection