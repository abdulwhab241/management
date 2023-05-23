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
                    @isset($Notification->data['grade_name'])
                <a href="{{ route('Grades.show',$Notification->data['Grade_id']) }}">
                    <div class="pull-right">
                    <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة  
\                        <span> {{ $Notification->data['grade_name'] }}</span>
                        الى المراحل الدراسية </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['student_result_name'])
                <a href="{{ route('StudentResult.show',$Notification->data['student_result_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">     اضـافـة
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['student_result_name'] }}</span>
                         نتيجـة الإختبـار </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

            

                </li><!-- end message -->
                @endforeach

            </ul>
            </li>
            <li class="footer"><a href="{{ route('Notification.Read') }}">قـرائـة جميـع الإشعـارات</a></li>
        </ul>
        </li>
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
                <small>الصـف الدراسـي:  {{ auth()->user()->classroom->name_class }}</small>
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
                <a href="{{route('StudentProfile.show')}}" class="btn btn-info btn-flat">Profile</a>
            </div>
            <div class="pull-left">

            <form method="POST" action="{{ route('logout','student') }}">
            @csrf
            <a class="btn btn-info  btn-flat" onclick="event.preventDefault();this.closest('form').submit();">تسجيل الخروج</a>
            </form>
            </div>
            </li>
        </ul>
        </li>
    </ul>
    </div>
    
</nav>

</header>
