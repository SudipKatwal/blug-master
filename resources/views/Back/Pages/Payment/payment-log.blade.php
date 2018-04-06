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
                                    <th>Balance</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                @if(count($posts)>0)
                                    @forelse($posts as $key=>$post)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$post->user->balance}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->transaction_type}}</td>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection