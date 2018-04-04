@extends('Back.Layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                Your Profile
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-8 col-sm-offset-2">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{URL::to('Images/profile-thumbnails/'.$detail->thumbnails)}}" alt="User profile picture">
                            <h3 class="profile-username text-center">{{$detail->name}}</h3>
                            <p class="text-muted text-center">{{$detail->address}}</p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Member Since</b> <a class="pull-right">{{$detail->created_at->diffForHumans()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Role</b> <a class="pull-right">{{$detail->role->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Posts</b> <a class="pull-right">{{count($detail->post)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Your Earning</b> <a class="pull-right">Rs. {{$detail->balance}}</a>
                                </li>
                            </ul>
                            <h3 class="box-title">More About Me</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{--<strong><i class="fa fa-book margin-r-5"></i> Education</strong>--}}
                            {{--<p class="text-muted">--}}
                                {{--B.S. in Computer Science from the University of Tennessee at Knoxville--}}
                            {{--</p>--}}
                            <hr>
                            <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                            <p class="text-muted">{{$detail->address}}</p>
                            <hr>
                            <strong><i class="fa fa-pencil margin-r-5"></i> Interests</strong>
                            <p>
                                <span class="label label-danger">{{$detail->interests}}</span>
                                {{--<span class="label label-success">Coding</span>--}}
                            </p>
                            <hr>
                            <strong><i class="fa fa-file-text-o margin-r-5"></i> Short bio</strong>
                            <p>{!! $detail->bio !!}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection