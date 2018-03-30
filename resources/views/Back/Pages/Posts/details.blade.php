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

                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection