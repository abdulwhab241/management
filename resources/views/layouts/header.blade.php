<header class="main-header"  style="font-family: 'Cairo', sans-serif">
<!-- Logo -->
<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A.</b>P.S</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Abdulwhab.</b>S.M.P</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-info">{{ Auth::User()->unreadNotifications->count() }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">لـديـك {{ Auth::User()->unreadNotifications->count() }} إشـعـارات</li>
            <li>
            <!-- inner menu: contains the actual data -->

            <ul class="menu">
                @foreach (Auth::User()->unreadNotifications as $Notification)
                <li><!-- start message -->
                    @isset($Notification->data['title'])
                <a href="#">
                    {{-- <div class="pull-right">
                    <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="User Image">
                    </div> --}}
                    <h4>
                    {{$Notification->data['create_by']}}

                    </h4>
                    <h5 style="font-weight: bolder;"> تـم إضـافـة {{ $Notification->data['title'] }} </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                    @isset($Notification->data['update'])
                    <a href="#">
                        {{-- <div class="pull-right">
                            <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="User Image">
                            </div> --}}
                            <h4>
                            {{$Notification->data['create_by']}}
        
                            </h4>
                            <h5 style="font-weight: bolder;"> تـم تعـديـل {{ $Notification->data['update'] }} </h5>
                            <small><i class="fa fa-clock-o"></i>{{$Notification->updated_at->diffForHumans()}}</small>
                    </a>
                    @endisset

                    @isset($Notification->data['delete'])
                    <a href="#">
                        {{-- <div class="pull-right">
                            <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="User Image">
                            </div> --}}
                            <h4>
                            {{$Notification->data['create_by']}}
        
                            </h4>
                            <h5 style="font-weight: bolder;"> تـم حـذف {{ $Notification->data['delete'] }} </h5>
                            <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                    </a>
                    @endisset


                </li><!-- end message -->
                @endforeach

            </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        {{-- <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ Auth::user()->unreadNotifications->count() }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                </a>
                </li>
                <li>
                <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                </a>
                </li>
            </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        </ul>
        </li> --}}
        <!-- Tasks: style can be found in dropdown.less -->
        {{-- <li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">۹</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- Task item -->
                <a href="#">
                    <h3>
                    Design some buttons
                    <small class="pull-left">20%</small>
                    </h3>
                    <div class="progress xs">
                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                    </div>
                    </div>
                </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                <a href="#">
                    <h3>
                    Create a nice theme
                    <small class="pull-left">40%</small>
                    </h3>
                    <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">40% Complete</span>
                    </div>
                    </div>
                </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                <a href="#">
                    <h3>
                    Some task I need to do
                    <small class="pull-left">60%</small>
                    </h3>
                    <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">60% Complete</span>
                    </div>
                    </div>
                </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                <a href="#">
                    <h3>
                    Make beautiful transitions
                    <small class="pull-left">80%</small>
                    </h3>
                    <div class="progress xs">
                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">80% Complete</span>
                    </div>
                    </div>
                </a>
                </li><!-- end task item -->
            </ul>
            </li>
            <li class="footer">
            <a href="#">View all tasks</a>
            </li>
        </ul>
        </li> --}}
        @if (isset(Auth::user()->name))
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="user-image" alt="{{ Auth::user()->name }}" >
            <span class="hidden-xs">{{auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="{{ Auth::user()->name }}">
            <p>
                {{auth()->user()->name}}
            </p>
            </li>
            @endif
            <!-- Menu Body -->
            <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
            <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-left">
            @if(auth('student')->check())
            <form method="POST" action="{{ route('logout','student') }}">
            @elseif(auth('teacher')->check())
            <form method="POST" action="{{ route('logout','teacher') }}">
            @else
            <form method="POST" action="{{ route('logout','web') }}">
            @endif

            @csrf
            <a class="btn btn-info  btn-flat" href="#" onclick="event.preventDefault();this.closest('form').submit();">تسجيل الخروج</a>
            </form>
            </div>
            </li>
        </ul>
        </li>
    </ul>
    </div>
    
</nav>

</header>
