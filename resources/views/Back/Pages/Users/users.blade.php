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
                                <th>Task</th>
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
                                        <td>
                                            <a class="btn btn-default btn-sm" href="">
                                                Assign Post </a>
                                        </td>
                                         <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('profile',$user->id)}}">
                                                View Profile </a>
                                        </td>
                                        {{--<td>--}}
                                            {{--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">Quick Info--}}
                                            {{--</button>--}}
                                        {{--</td>--}}
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


    <!-- last added modal body for user profile-->
     <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Writers Quick Info</h4>
              </div>
              <div class="modal-body">
               
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

                     <h3 class="profile-username text-center">Nina Mcintire</h3>

                <h5 class=" text-center"><strong> Member Since</strong> Dec 2018</h5>
 
                 <p><strong>No of Posts</strong> 98687</p>
                     <p><strong>Email</strong> sudip@gmail.com</p>
                        <p><strong>Phone No.</strong> 986345387</p>
                    </div>
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" align="center" data-dismiss="modal">Close</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        

@endsection