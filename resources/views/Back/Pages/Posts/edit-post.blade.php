@extends('Back.Layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Post
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Posts</li>
                <li class="active">New-Post</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <form action="{{route('posts.update',$detail->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-body pad">
                                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="packagetitle">Title</label>
                                                <input type="text" value="{{ $detail->title }}" class="input-lg form-control user-input" name="title">
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="box-body pad">
                                            <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                                <label for="packagetitle">Slug</label>
                                                <input type="text" value="{{ $detail->slug }}" class="form-control input-sm" name="slug">
                                                @if ($errors->has('slug'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('slug') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--CKEDITOR--}}
                                        <div class="box-body pad {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <textarea id="editor1"  name="description" rows="10" cols="80" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $detail->body }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                            @endif
                                        </div>

                                        <div class="box-body pad">
                                            <div class="form-group {{ $errors->has('main_keyword') ? ' has-error' : '' }}">
                                                <label for="packagetitle">Main Keyword</label>
                                                <input type="text" value="{{$detail->main_keywords }}" class="form-control input-sm" name="main_keyword">
                                                @if ($errors->has('main_keyword'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('main_keyword') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="box-body pad">
                                            <div class="form-group {{ $errors->has('lsi_keywords') ? ' has-error' : '' }}">
                                                <label for="packagetitle">LSI Keyword</label>
                                                <input type="text" value="{{ $detail->lsi_keywords }}" class="form-control user-input" name="lsi_keywords" placeholder="Enter Comma Separated value">
                                                @if ($errors->has('lsi_keywords'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lsi_keywords') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-8 -->
                        <div class="col-md-4">
                            <div class="col-lg-12">

                                @if($detail->state==1)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Update Package</div>
                                        <div class="panel-body">After updating package. The package will be change for public.</div>
                                        <div class="panel-footer"><input class="btn btn-primary" type="submit" value="Update"></div>
                                    </div>
                                @elseif($detail->state==2)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Resubmit Package</div>
                                        <div class="panel-body">After resubmitting package. The package will be change for public.</div>
                                        <div class="panel-footer"><input class="btn btn-primary" name="resubmit" type="submit" value="Resubmit"></div>
                                    </div>
                                @else
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Update Package</div>
                                        <div class="panel-body">After updating package. The package will be change for public.</div>
                                        <div class="panel-footer"><input class="btn btn-primary" type="submit" value="Update"></div>
                                    </div>
                                @endif

                                <div class="panel panel-default">
                                    <div class="panel-heading">Category</div>
                                    <div class="panel-body">
                                        <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                            <label for="packagecategory">Select Category</label>

                                            <select class="input-group-lg form-group form-control" id="parentCategory" name="category">
                                                <option selected disabled>Select Category</option>
                                                @if(count($categories)>0)
                                                    @forelse($categories as $key=>$category)
                                                    <option value="{{$category->id}}"
                                                        @if($detail->category->id==$category->id)
                                                            {{'selected'}}
                                                        @endif > {{$category->name}} </option>
                                                    @empty
                                                        @endforelse
                                                @endif

                                            </select>
                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('category') }}</strong>
                                                    </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Featured Image</div>
                                    <div class="panel-body {{ $errors->has('featured_image') ? ' has-error' : '' }}">
                                        <input type="file" value="{{ old('featured_image')}}" class="btn btn-default" name="featured_image">
                                        <input type="hidden" value="{{$detail->thumbnail}}" name="old_image">
                                        <img src="{{URL::to('Images/post-thumbnails/'.$detail->thumbnail)}}" class="img img-responsive">
                                        @if ($errors->has('featured_image'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('featured_image') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Add more images</div>
                                    <div class="panel-body">
                                        <div class="controls">
                                            <div class="entry input-group">
                                                <input class="btn btn-default" name="images[]" type="file">
                                                <span class="input-group-btn">
                                                        <button class="btn btn-success btn-image" type="button">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                            </button>
                                                        </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / .col-md-12 -->
                </form>
            </div>
            <!-- ./row -->

        </section>
        <!-- /.content -->
        {{--multiple Images--}}
        <script>
            $(function() {
                $(document).on('click', '.btn-image', function (e) {
                    e.preventDefault();

                    var controlForm = $('.controls:first'),
                        currentEntry = $(this).parents('.entry:first'),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);

                    newEntry.find('input').val('');
                    controlForm.find('.entry:not(:last) .btn-image')
                        .removeClass('btn-image').addClass('btn-remove')
                        .removeClass('btn-success').addClass('btn-danger')
                        .html('<span class="glyphicon glyphicon-minus"></span>');
                }).on('click', '.btn-remove', function (e) {
                    $(this).parents('.entry:first').remove();

                    e.preventDefault();
                    return false;
                });
            });
        </script>
        {{--multiple Images--}}

    </div>
    <!-- /.content-wrapper -->

@endsection