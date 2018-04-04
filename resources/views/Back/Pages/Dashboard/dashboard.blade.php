@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin Dashboard
            </h1>
             <!-- Info boxes -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Posts</span>
              <h2>{{$allPost}}</h2>
              {{-- <span class="info-box-number">37</span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
          @if(Auth::user()->role->slug=='admin')
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Writers</span>
              <h2>{{$allWriter}}</h2>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
          @endif
          @if(Auth::user()->role->slug=='editor')
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Due Amount</span>
             <h2>Rs. {{Auth::user()->balance}}</h2>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
              @endif
      </div>
        </section>

        <!-- Main content -->
        
    </div>
    <!-- /.content-wrapper -->

@endsection