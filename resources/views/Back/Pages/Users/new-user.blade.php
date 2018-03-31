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
                <li class="active">New user</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="register-box-body well">
                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="text" class="form-control form-group input-lg" value="{{ old('name') }}" placeholder="name" name="name"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                            @endif
                            <input type="email" class="form-control form-group input-lg" value="{{ old('email') }}" placeholder="Your Email" name="email"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                            @endif

                            <select class="form-control form-group input-lg" name="type">
                                <option value="2">Admin</option>
                                <option value="3">Editor</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
                            @endif

                            <input type="text" class="form-control form-group input-lg" value="{{ old('address') }}" placeholder="Address" name="address"/>
                            @if ($errors->has('address'))
                                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{ old('phone') }}" placeholder="Phone Number" name="phone"/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{ old('interest') }}" placeholder="Interest for eg. Travel, Sport, Gaming" name="interest"/>
                            @if ($errors->has('interest'))
                                <span class="help-block">
                    <strong>{{ $errors->first('interest') }}</strong>
                </span>
                            @endif

                            <select class="form-control form-group input-lg" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">other</option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                            @endif

                            <button class="btn btn-success btn-block input-lg">create</button>

                        </form>

                    </div>

                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection