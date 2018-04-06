@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Assign Post
            </h1>
        </section>
            <!-- Info boxes -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1">
                        <form action="" class="well form-group" method="post">
                            <br><br><br>
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" value="{{$id}}">
                            <textarea name="keyword" class="form-control form-group" rows="3" placeholder="Enter Keywords for the post"></textarea>
                            <input type="submit" class="btn btn-success form-group" value="Assign Post">
                        </form>
                    </div>

                </div>
            </section>

            <!-- Main content -->

    </div>
    <!-- /.content-wrapper -->

@endsection