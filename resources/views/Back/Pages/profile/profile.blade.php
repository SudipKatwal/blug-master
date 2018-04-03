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
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
             <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Member Since</b> <a class="pull-right">32 Dec 2018</a>
                </li>
                <li class="list-group-item">
                  <b>Role</b> <a class="pull-right">Admin/Writer</a>
                </li>
                <li class="list-group-item">
                  <b>Posts</b> <a class="pull-right">136</a>
                </li>
                <li class="list-group-item">
                  <b>Your Earning</b> <a class="pull-right">Rs.136</a>
                </li>
              </ul>
                </ul>



              
           
              <h3 class="box-title">More About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted">Kathmandu</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Intersts</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Short bio</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
            </div>
            <!-- /.box-body -->
          


        </section>

        <!-- /.content -->
        
    </div>

    <!-- /.content-wrapper -->

@endsection