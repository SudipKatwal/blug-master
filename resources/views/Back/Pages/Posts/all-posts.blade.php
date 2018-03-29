@extends('Back.Layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Posts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Posts</li>
            <li class="active">All-Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <center>
            @if(session('error'))
                <div class="alert alert-success">{{session('error')}} </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}} </div>
            @endif
        </center>

        <div class="container box">
            @if(count($posts)>0)
                @forelse($posts as $key=>$post )
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" alt="image" class="img img-responsive">
                            </div>
                            <div class="col-lg-8">
                                <h4>{{$post->title}}</h4>
                                {!! $post->body !!}
                                &nbsp &nbsp <span class="badge">By : {{$post->user->role->name}} </span>
                                &nbsp &nbsp <span class="badge">Category : {{$post->category->name}}</span><br>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3 pull-right">
                                            <a class="btn btn-primary btn-sm" id="permanentDelete" href="{{route('delete.post',$post->id)}}">
                                                <script>
                                                    $(document).on('click','#permanentDelete', function () {
                                                       confirm('Do you want to delete this posts ?')
                                                    });
                                                </script>
                                                Permanently Delete </a>
                                        </div>
                                        <div class="col-lg-3 pull-right">
                                            <a class="btn btn-primary btn-sm" href="{{route('posts.edit',$post->id)}}">
                                                Edit </a>
                                        </div>
                                        <div class="col-lg-3 pull-right">
                                            <a class="btn btn-primary btn-sm" href="{{route('posts.show',$post->id)}}">
                                                View Details </a>
                                        </div>

                                        <div class="col-lg-2 pull-right">
                                            <form method="post" action="">
                                                <input type="hidden" name="_pid" value="{{$post->id}}">
                                                {{csrf_field()}}
                                                @if($post->is_active==0)
                                                    <button name="enable" class="btn btn-primary btn-sm">Approve</button>
                                                @else
                                                    <button name="disable" class="btn btn-danger btn-sm">Approved</button>
                                                @endif
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                @empty
                @endforelse
            @else
                <div class="form-group">{{"Data Not Found"}}</div>
            @endif

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection