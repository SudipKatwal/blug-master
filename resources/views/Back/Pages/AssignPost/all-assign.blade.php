@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Assign Posts
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Details of Assign Posts</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Keyword</th>
                                    <th>Date of Submission</th>
                                    <th>Write</th>
                                </tr>
                                @if(count($posts)>0)
                                    @forelse($posts as $key=>$post)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$post->keyword}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>
                                                <a class="btn btn-success" href="{{route('posts.create')}}"> write post</a>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection