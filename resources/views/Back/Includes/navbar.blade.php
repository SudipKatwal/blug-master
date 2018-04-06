@section('navbar')

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>M</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>BLOG</b>MASTER</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @if(Auth::user()->role->slug!='admin')

                        <li class="dropdown messages-menu">
                            <a href="#" id="notificationAssign" class="dropdown-toggle" data-toggle="dropdown">
                                <p>New Post Assign</p><span id="counta" class="label label-success">{{count($postAssign)}}</span>
                            </a>

                            <ul class="dropdown-menu">
                                @if(count($postAssign)>0)
                                    <li class="header">You have {{count($postAssign)}} new Assigned Post</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            @forelse($postAssign as $key=>$post)
                                                <li><!-- start message -->
                                                    <a href="">
                                                        <h4>
                                                            {{$post->keyword}}
                                                            <small><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</small>
                                                        </h4>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </li>


                        <li class="dropdown messages-menu">
                            <a href="#" id="notification" class="dropdown-toggle" data-toggle="dropdown">
                                <p>New Notifications</p><span id="countw" class="label label-success">{{count($writerNotification)+count($writerRequestNotification)}}</span>
                            </a>

                            <ul class="dropdown-menu">
                                @if(count($writerNotification)>0)
                                    <li class="header">You have {{count($writerNotification)+count($writerRequestNotification)}} new Notification</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            @forelse($writerNotification as $key=>$post)
                                                <li><!-- start message -->
                                                    <a href="{{route('posts.show',$post->id)}}">
                                                        <div class="pull-left">
                                                            <img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" class="img-circle" alt="">
                                                        </div>
                                                        <h4>
                                                            {{$post->title}}
                                                            <small><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</small>
                                                        </h4>
                                                        <p>{{$post->category->name}} by {{$post->user->name}}</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                @endif
                                    @if(count($writerNotification)>0)
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                @forelse($writerRequestNotification as $key=>$post)
                                                    <li><!-- start message -->
                                                        <a href="{{route('posts.create',$post->id)}}">
                                                            <div class="pull-left">
                                                                <img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" class="img-circle" alt="">
                                                            </div>
                                                            <h4>
                                                                {{$post->title}}
                                                                <small><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</small>
                                                            </h4>
                                                            <p>{{$post->category->name}} by {{$post->user->name}}</p>
                                                        </a>
                                                    </li>
                                                    <!-- end message -->
                                                @empty
                                                @endforelse
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="{{route('posts.index')}}">See All Posts</a></li>
                                    @endif
                            </ul>
                        </li>

                    @endif


                    @if(Auth::user()->role->slug=='admin')
                        <li class="dropdown messages-menu">
                            <a href="#" id="userNotification" class="dropdown-toggle" data-toggle="dropdown">
                                <p>User Request</p>
                                <span id="countU" class="label label-success">{{count($userNotification)}}</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="header">You have {{count($userNotification)}} new users</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        @if(count($userNotification)>0)
                                            @forelse($userNotification as $key=>$user)
                                                <li><!-- start message -->
                                                    <a href="{{route('users.show',$user->id)}}">
                                                        <div class="pull-left">
                                                            <img src="{{URL::to('Images/profile-thumbnails/'.$user->thumbnails)}}" class="img-circle" alt="">
                                                        </div>
                                                        <h4>
                                                            {{$user->name}}
                                                            <small><i class="fa fa-clock-o"></i>{{$user->created_at->diffForHumans()}}</small>
                                                        </h4>
                                                        <p>{{$user->email}} from {{$user->address}}</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            @empty
                                            @endforelse
                                        @endif
                                    </ul>
                                </li>
                                <li class="footer"><a href="{{route('users.index','user=writer')}}">See All Users</a></li>
                            </ul>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="#" id="postNotification" class="dropdown-toggle" data-toggle="dropdown">
                                <p>New Post</p><span id="count" class="label label-success">{{count($postNotification)+count($postResubmitted)}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                @if(count($postResubmitted)>0)
                                    <li class="header">You have {{count($postResubmitted)}} new resubmitted posts</li>

                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            @forelse($postResubmitted as $key=>$post)
                                                <li><!-- start message -->
                                                    <a href="{{route('posts.show',$post->id)}}">
                                                        <div class="pull-left">
                                                            <img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" class="img-circle" alt="">
                                                        </div>
                                                        <h4>
                                                            {{$post->title}}
                                                            <small><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</small>
                                                        </h4>
                                                        <p>{{$post->category->name}} by {{$post->user->name}}</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="{{route('posts.index')}}">See All Posts</a></li>
                                @endif
                                @if(count($postNotification)>0)
                                    <li class="header">You have {{count($postNotification)}} new posts</li>

                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            @forelse($postNotification as $key=>$post)
                                                <li><!-- start message -->
                                                    <a href="{{route('posts.show',$post->id)}}">
                                                        <div class="pull-left">
                                                            <img src="{{URL::to('Images/post-thumbnails/'.$post->thumbnail)}}" class="img-circle" alt="">
                                                        </div>
                                                        <h4>
                                                            {{$post->title}}
                                                            <small><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</small>
                                                        </h4>
                                                        <p>{{$post->category->name}} by {{$post->user->name}}</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            @empty
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="{{route('posts.index')}}">See All Posts</a></li>
                                @endif
                            </ul>
                        </li>
                @endif
                <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{URL::to('Images/profile-thumbnails/'.Auth::user()->thumbnails)}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{URL::to('Images/profile-thumbnails/'.Auth::user()->thumbnails)}}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                    <small>Member since {{Auth::user()->created_at->diffForHumans()}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('profile',Auth::id())}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <input type="submit"  class="btn btn-default btn-flat" value="Sign out" >
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            {{-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>

                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
<<<<<<< HEAD

=======
>>>>>>> 34cc51242e713cf58ddb8015743ed68d6199805f
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div> --}}
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">BLOG MASTER ADMIN NAVIGATION</li>
                <li>
                    <a href="{{url('admin/')}}"><i class="fa fa-circle-o"></i><span> Dashboard</span></a>
                </li>
                <li class="treeview">
                    <a href="#">
                        {{--   <i class="fa fa-files-o"></i> --}}
                        <i class="fa fa-edit"></i>
                        <span> Posts</span>


                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{route('posts.create')}}"> <i class="fa fa-plus" class="fa fa-circle-o"></i> Add Post</a></li>
                        <li><a href="{{route('posts.index')}}"></i> <i class="fa fa-eye" class="fa fa-circle-o"></i>View Posts</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('admin/assign-posts')}}"><i class="fa fa-circle-o"></i><span> Assign Posts</span></a>
                </li>
                @if(Auth::user()->role->slug=='admin')
                    <li>
                        <a href="{{route('category.index')}}"><i class="fa fa-plus"></i><span> Add Category</span></a>
                    </li>

                    <li>
                        <a href="{{route('pages.index')}}"><i class="fa fa-plus"></i><span> Add Page</span></a>
                    </li>
                    <li>
                        <a href="{{route('users.index','user=admin')}}"><i class="fa fa-group"></i><span> Admins</span></a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            {{--   <i class="fa fa-files-o"></i> --}}
                            <i class="fa fa-user"></i>
                            <span> Users</span>


                        </a>
                        <ul class="treeview-menu">

                            <li><a href="{{route('users.create')}}"> <i class="fa fa-plus" class="fa fa-circle-o"></i> Add Users</a></li>
                            <li><a href="{{route('users.index','user=writer')}}"> <i class="fa fa-eye" class="fa fa-circle-o"></i>View Users</a></li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{route('post.logs')}}"><i class="fa fa-sliders"></i><span> Post Logs</span></a>
                </li>

                <li>
                    <a href="{{route('payment.history')}}"><i class="fa fa-history"></i><span> Payment History</span></a>
                </li>
                <li>
                    <a href="{{route('users.setting')}}"><i class="fa fa-wrench"></i><span> Settings</span></a>
                </li>

            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <script>
        $(document).ready(function () {

            $(document).on('click','#userNotification',function () {
                $.ajax({
                    type:'get',
                    url:'{{route('notification.user')}}',
                    success:function (data) {

                        $('#countU').replaceWith('<span class="label label-success">'+data+'</span>');
                    }
                });
            });

            $(document).on('click','#postNotification',function () {
                $.ajax({
                    type:'get',
                    url:'{{route('notification.post')}}',
                    success:function (data) {
                        $('#count').replaceWith('<span class="label label-success">'+data+'</span>');
                    }
                });
            });
            $(document).on('click','#notification',function () {
                $.ajax({
                    type:'get',
                    url:'{{route('notification.writer')}}',
                    success:function (data) {
                        $('#countw').replaceWith('<span class="label label-success">'+data+'</span>');
                    }
                });
            });
            $(document).on('click','#notificationAssign',function () {
                $.ajax({
                    type:'get',
                    url:'{{route('notification.assign')}}',
                    success:function (data) {
                        $('#counta').replaceWith('<span class="label label-success">'+data+'</span>');
                    }
                });
            });
        });
    </script>
@endsection
