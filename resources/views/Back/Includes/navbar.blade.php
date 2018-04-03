@section('navbar')

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
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
                    @if(Auth::user()->role->slug=='admin')
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>User Request</p>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>New Post</p><span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    @endif
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
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
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>

                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                   {{--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
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
                    <a href=""><i class="fa fa-history"></i><span> Payment History</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-wrench"></i><span> Settings</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-sign-out"></i><span> Log Out</span></a>
                </li>

            </ul>
            
        </section>
        <!-- /.sidebar -->
    </aside>

@endsection