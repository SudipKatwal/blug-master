@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Management
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">User Management</li>
                <li class="active">All user</li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="col-md-10 col-lg-offset-1">
                <div class="box box-primary back">
                    <div class="panel-body">
                        <center>
                            @if(session('error'))
                                <div class="alert alert-success">{{session('error')}} </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">{{session('success')}} </div>
                            @endif
                        </center>

                        <table class="table table-responsive table-bordered">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Phone</th>
                                {{--@if($user->role->slug!='admin')--}}
                                    <th>Task</th>
                                {{--@endif--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            @if(count($users)>0)
                                @forelse($users as $key=>$user )
                                    <tbody>
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <form method="post" action="{{route('users.update',$user->id)}}">
                                                @method('PUT')
                                                {{csrf_field()}}
                                                @if($user->is_active==0)
                                                    <button name="enable" class="btn btn-primary btn-sm">Activate</button>
                                                @else
                                                    <button name="disable" class="btn btn-danger btn-sm">Deactivate</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>{{$user->phone_no}}</td>
                                        @if($user->role->slug!='admin')
                                        <td>
                                            <a class="btn btn-default btn-sm" href="{{route('assign.post',$user->id)}}">
                                                Assign Post </a>
                                        </td>
                                        @endif
                                         <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('profile',$user->id)}}">
                                                View Profile </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @empty
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="7">Data Not Found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection