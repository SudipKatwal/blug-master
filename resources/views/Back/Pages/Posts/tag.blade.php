@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tags
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Posts</li>
                <li class="active">Tags</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Tag
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            {{--@include('Admin.Includes.validation')--}}

                            <form action="{{route('tags.add')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-11 col-md-11">
                                        <div class="form-group">
                                            <input type="text" name="categoryName" id="categoryName" class="form-control" placeholder="Category Name" tabindex="1">
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
                            Tag Items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                {{--<th>S.No</th>--}}
                                {{--<th>Name</th>--}}
                                {{--<th>Status</th>--}}
                                {{--<th>Parent</th>--}}
                                {{--<th>Action</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(count($allCategories)>0)--}}
                                {{--@forelse($allCategories as $key=>$category)--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                {{--<td>{{++$key}}</td>--}}
                                {{--<td>{{$category->category_name}}</td>--}}

                                {{--<td>--}}
                                {{--<form action="{{route('category-status-update')}}" method="post">--}}
                                {{--{{csrf_field()}}--}}
                                {{--<input type="hidden" name="_cid" value="{{$category->category_id}}">--}}
                                {{--@if($category->status==0)--}}
                                {{--<button class="btn btn-primary btn-sm" name="enable">Enable</button>--}}
                                {{--@else--}}
                                {{--<button class="btn btn-danger btn-sm" name="disable">Disable</button>--}}
                                {{--@endif--}}
                                {{--</form>--}}
                                {{--</td>--}}
                                {{--<td> {{$category->name}}</td>--}}
                                {{--<td>--}}
                                {{--<a class="btn btn-danger btn-sm" href="{{URL('admin/editor/delete-category')}}/{{$category->category_id}}">Delete</a>--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                                {{--@empty--}}
                                {{--@endforelse--}}
                                {{--@else--}}
                                {{--<tr>--}}
                                {{--<td colspan="6">Data not found.</td>--}}
                                {{--</tr>--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                                {{--</table>--}}
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