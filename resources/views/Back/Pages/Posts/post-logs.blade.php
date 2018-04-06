@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Post Logs
            </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Details of Post History</h3>

              <div class="box-tools">
                {{--<div class="input-group input-group-sm" style="width: 300px;">--}}
                  {{--<input type="text" name="table_search" class="form-control pull-right" placeholder="Search content by users name">--}}

                  {{--<div class="input-group-btn">--}}
                    {{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                  {{--</div>--}}
                {{--</div>--}}
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Writers</th>
                  <th>Date of Submission</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                @if(count($posts)>0)
                  @forelse($posts as $key=>$post)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$post->user->name}}</td>
                      <td>{{$post->created_at}}</td>
                      <td>
                              @if($post->state==0)
                              <span class="label label-default">
                                  Not Approved
                              </span>
                              @elseif($post->state==1)
                              <span class="label label-success">
                                  Approved
                              </span>
                              @elseif($post->state==2)
                              <span class="label label-primary">
                                  Request for resubmission
                              </span>
                          @elseif($post->state==3)
                              <span class="label label-warning">
                                  Awaiting for approval
                              </span>
                              @endif
                      </td>
                      <td>
                          <ul>
                          @if(isset($post->resubmission))
                            @forelse($post->resubmission as $resubmission)
                                    <li>{{$resubmission->reasons}}</li>
                              @empty
                              @endforelse
                          @endif
                          </ul>
                      </td>
                    </tr>
                    @empty
                  @endforelse
                @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Approved posts</span>
              <h2>{{$approvedPost}}</h2>
              {{-- <span class="info-box-number">37</span> --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-hourglass-2"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Posts</span>
              <h2>{{$pendingPost}}</h2>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Resubmitted posts</span>
             <h2>{{$resubmittedPost}}</h2>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-calendar-check-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Assigned Posts</span>
             <h2>34</h2>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
        </section>
           
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection