@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Posts</li>
                <li class="active">Category</li>
            </ol>
        </section>
        <center>
            @if(session('error'))
                <div class="alert alert-success">{{session('error')}} </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}} </div>
            @endif
        </center>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-11 col-md-11">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Category Name" tabindex="1">
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="row">--}}
                                    {{--<div class="col-xs-12 col-sm-11 col-md-11">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<select name="sub_category" class="form-control input-lg">--}}
                                                {{--<option disabled selected>Select Parents</option>--}}
                                                {{--@if(count($parents)>0)--}}
                                                    {{--@forelse($parents as $key=>$parent)--}}
                                                        {{--<option value="{{$parent->id}}">{{$parent->name}}</option>--}}
                                                    {{--@empty--}}
                                                    {{--@endforelse--}}
                                                {{--@endif--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11">
                                        <input type="submit" class="btn btn-success btn-block" value="Published"></div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category Items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($categories)>0)
                                        @forelse($categories as $key=>$category)
                                            <tbody>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$category->name}}</td>

                                                <td>
                                                    <form action="{{route('category.status',$category->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$category->id}}">
                                                        @if($category->is_active==0)
                                                            <button class="btn btn-primary btn-sm" name="enable">Enable</button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" name="disable">Disable</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('category.destroy' , $category->id)}}" method="POST">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        {{ csrf_field() }}

                                                        <button id="delete" class="btn btn-danger btn-sm">Delete</button>
                                                          <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                        <script>
                                                            $(document).on('click','#delete',function () {
                                                               confirm('Do you want to delete this category ?');
                                                            });
                                                        </script>

                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @empty
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="6">Data not found.</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection