@extends('Back.Layouts.master')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                Profile Setting
            </h1>
            
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
               

                <div class="col-md-6" >
                     <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
              <center>
             <label>Change Profile Picture</label>
              <input type="file" class=" align-center" name="">
              </center>
            <table class="table">
                    <tr>
                        <td> 
                            Type Current Password 
                        </td>
                        <td>
                         <input type="password" name="current_password">
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            Type New Password 
                        </td>
                        <td>
                         <input type="password" name="current_password">
                        </td>
                    </tr>
                    <tr>
                        <td> 
                            Confirm New Password 
                        </td>
                        <td>
                         <input type="password" name="current_password">
                        </td>
                    </tr>
                    
                 </table> 
                </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Update Setting</b></a>
            </div>
            <!-- /.box-body -->
          </div>

                </div>

               
                 <div class="col-md-6" >
                    <div class="register-box-body well">
                        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="text" class="form-control form-group input-lg" value="{{ old('name') }}" placeholder="name" name="name"/>
                            @if ($errors->has('name'))
                                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                            @endif
                            <input type="email" class="form-control form-group input-lg" disabled value="{{ old('email') }}" placeholder="Your Email" name="email"/>
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

                            <input type="text" class="form-control form-group input-lg" value="{{ old('address') }}" placeholder="Address" name="address"/>
                            @if ($errors->has('address'))
                                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                            @endif
                            <input type="text" class="form-control form-group input-lg" value="{{ old('phone') }}" placeholder="Phone Number" name="phone" disabled/>
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
<input type="text" class="form-control form-group input-lg" value="Male" disabled placeholder="name" name="name"/>
                            
                            @if ($errors->has('gender'))
                                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                            @endif
                            <div class="form-group">
                  <label>Add Short Bio</label>
                  <textarea class="form-control" rows="3" placeholder="Add Short Bio" ></textarea>
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