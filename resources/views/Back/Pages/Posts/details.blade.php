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

                <div class="row">
                    <div class="col-lg-12 box">
                        <div class="panel-body">
                                    <div class="form-group">
                                        <h1>{!! $detail->title !!}</h1>
                                        &nbsp &nbsp <span class="badge">By : {{$detail->user->role->name}} </span>
                                        &nbsp &nbsp <span class="badge">Category : {{$detail->category->name}}</span><br>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{URL::to('Images/post-thumbnails/'.$detail->thumbnail)}}" height="400px" alt="Thumbnails">
                                    </div>
                                    {!! $detail->body !!}
                            @if(isset($detail->images))

                            <div class="form-group">
                                @forelse($detail->images as $key=>$image)
                                <img src="{{URL::to('Images/post-images/'.$image->name)}}" height="300px" class="col-md-6" alt="Thumbnails">
                                    @empty
                                @endforelse
                            </div>
                                @endif


                        </div>
                        <hr>
                        <div class="col-lg-12">
                            <div class="col-lg-3 pull-right form-group">
                                <form action="{{ route('posts.destroy' , $detail->id)}}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{ csrf_field() }}

                                    <button id="delete" class="btn btn-danger btn-sm">Delete</button>
                                    <script>
                                        $(document).on('click','#delete',function () {
                                            confirm('Do you want to delete this category ?');
                                        });
                                    </script>

                                </form>
                            </div>
                            <div class="col-lg-3 pull-right form-group">
                                <a class="btn btn-primary btn-sm" href="{{route('posts.edit',$detail->id)}}">
                                    Edit </a>
                            </div>
                            @if($detail->is_approved==0)
                            <div class="col-lg-3 pull-right form-group">
                                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm">
                                    Resubmit </button>
                            </div>
                            @endif

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"> Why are you re-submitting this post ?</h4>
                                        </div>
                                        <form action="{{route('post.resubmission')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <input type="hidden" name="post_id" value="{{$detail->id}}">
                                                <label for="reason"></label>
                                                <select class="form-control input-lg" name="reasons">
                                                    <option disabled selected>Reason for re-submitting</option>
                                                    <option value="Copied and pasted content." selected>Copied and pasted content</option>
                                                    <option value="content is not sufficient.">content is not sufficient</option>
                                                    <option value="Many mistakes in grammars">Many mistakes in grammars</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default" >Resubmit</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!-- Modal Content -->

                            <div class="col-lg-2 pull-right form-group">
                                <form method="post" action="{{route('approve.post',$detail->id)}}">
                                    <input type="hidden" name="id" value="{{$detail->id}}">
                                    {{csrf_field()}}
                                    @if($detail->is_approved==0)
                                        <button name="enable" class="btn btn-primary btn-sm">Approve</button>
                                    @else
                                        <button name="disable" class="btn btn-success btn-sm">Approved</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection