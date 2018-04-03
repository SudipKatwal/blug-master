@extends('Back.Layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                Profile Setting
            </h1>

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


                <div class="col-md-6" >
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{URL::to('Images/profile-thumbnails/'.Auth::user()->thumbnails)}}" alt="profile picture">

                            <div class="row">
                                <div class="col-md-8 col-lg-offset-1">
                                    <form action="{{route('change.photo')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{Auth::id()}}">
                                        {{csrf_field()}}
                                        <input type="file" class="col-md-8" name="profile">
                                        <input type="submit" value="Change Profile" class="btn btn-success pull-right">
                                    </form>
                                </div>
                            </div>

                            <br><br><hr>
                            <form action="{{route('change.password')}}" method="post">

                                <input type="hidden" name="id" value="{{Auth::id()}}">
                                {{csrf_field()}}
                            <table class="table">
                                <tr>
                                    <td>
                                        Type Current Password
                                    </td>
                                    <td>
                                        <input type="password" value="{{old('o_password')}}" required name="o_password">
                                        @if ($errors->has('o_password'))
                                            <span class="help-block">
                    <strong>{{ $errors->first('o_password') }}</strong>
                </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Type New Password
                                    </td>
                                    <td>
                                        <input type="password" value="{{old('password')}}" required name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Confirm New Password
                                    </td>
                                    <td>
                                        <input type="password" required value="{{old('password_confirmation')}}" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                                        @endif
                                    </td>
                                </tr>

                            </table>
                                <button class="btn btn-primary btn-block"><b>Update Setting</b></button>

                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>


                <div class="col-md-6" >
                    <div class="register-box-body well">
                        <form action="{{route('users.setting')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{Auth::id()}}">
                            <input type="text" class="form-control form-group input-lg" value="{{Auth::user()->name}}" name="name"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                            @endif
                            <input type="email" class="form-control form-group input-lg" disabled value="{{Auth::user()->email }}" name="email"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                            @endif

                            <select class="form-control form-group input-lg" name="type" disabled>
                                <option value="2">Admin</option>
                                <option value="3">Editor</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
                            @endif

                            <input type="text" class="form-control form-group input-lg" value="{{Auth::user()->address }}" name="address"/>
                            @if ($errors->has('address'))
                                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{ Auth::user()->phone_no}}" name="phone" disabled/>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{ Auth::user()->interests }}" name="interests"/>
                            @if ($errors->has('interests'))
                                <span class="help-block">
                    <strong>{{ $errors->first('interests') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{Auth::user()->gender}}" disabled placeholder="name" name="name"/>

                            @if ($errors->has('gender'))
                                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                            @endif
                            <div class="form-group">
                                <label>Add Short Bio</label>
                                <textarea class="form-control" rows="3" name="bio" placeholder="Add Short Bio" >{{Auth::user()->bio}}</textarea>
                            </div>


                            <button class="btn btn-success btn-block input-lg">Update Settings</button>

                        </form>

                    </div>

                </div>

            </div>


        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection