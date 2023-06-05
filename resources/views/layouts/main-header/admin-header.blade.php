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
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة  
\                        <span> {{ $Notification->data['grade_name'] }}</span>
                        الى المراحل الدراسية </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['name_class'])
                <a href="{{ route('Classrooms.show',$Notification->data['classroom_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['name_class'] }}</span>
                        الى الصـفـوف الدراسية </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['name_section'])
                <a href="{{ route('Sections.show',$Notification->data['section_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة القسـم  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['name_section'] }}</span>
                        الى الأقسـام الدراسية </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['student_name'])
                <a href="{{ route('show_student',$Notification->data['student_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة الطـالـب  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['student_name'] }}</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['teacher_name'])
                <a href="{{ route('Teachers.show',$Notification->data['teacher_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة الأستـاذ  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['teacher_name'] }}</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['fee_name'])
                <a href="{{ route('Fees.show',$Notification->data['fee_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة رسـوم دراسيـة بقيمـة   
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['fee_name'] }}</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['fee_invoice_name'])
                <a href="{{ route('show_fee_invoice',$Notification->data['fee_invoice_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة فـاتـورة دراسيـة بقيمـة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['fee_invoice_name'] }} ريال</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['receipt_name'])
                <a href="{{ route('show_receipt',$Notification->data['receipt_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  تسـديـد رسـوم دراسيـة بقيمـة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['receipt_name'] }} ريال</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['processing_name'])
                <a href="{{ route('show_processing',$Notification->data['processing_id']) }}">
                    {{-- <div class="pull-right">
                        <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="User Image">
                    </div> --}}
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إستبـعاد رسـوم بقيمـة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['processing_name'] }} ريال</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['payment_name'])
                <a href="{{ route('show_payment',$Notification->data['payment_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  صـرف مبلـغ بقيمـة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['payment_name'] }} ريال</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['subject_name'])
                <a href="{{ route('Subjects.show',$Notification->data['subject_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  إضـافـة مـادة  
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['subject_name'] }}</span>
                        الى المـواد الدراسية </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                
                @isset($Notification->data['quiz_name'])
                <a href="{{ route('Quizzes.show',$Notification->data['quiz_id']) }}">
                    {{-- <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4> --}}
                    <h5 style="font-weight: bolder;">     
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['quiz_name'] }}</span>
                        اضـاف إختبـار </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                {{-- @isset($Notification->data['result_name'])
                <a href="{{ route('Results.show',$Notification->data['result_id']) }}">
                    <h4>
                        تـم بـواسطـة  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">     
                        <span style="font-weight: bolder; padding:5px;"> {{ $Notification->data['result_name'] }}</span>
                        اضـاف نتيجـة الإختبـار </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset --}}

                @isset($Notification->data['add_student_grade_name'])
                <a href="{{ route('Student_Grades.show',$Notification->data['add_student_grade_id']) }}">
                    <h4 style="padding: 5px;">
                        قـام الأستـاذ  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  بـإضـافـة محصـلة الطـالـب  
                        <span> {{ $Notification->data['add_student_grade_name'] }}</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['edit_student_grade_name'])
                <a href="{{ route('edit_notification',$Notification->data['edit_student_grade_id']) }}">
                    <h4 style="padding: 5px;">
                        قـام الأستـاذ  {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 style="font-weight: bolder;">  بـتعـديـل محصـلة الطـالـب  
                        <span> {{ $Notification->data['edit_student_grade_name'] }}</span>
                    </h5>
                    <small><i class="fa fa-clock-o"></i>{{$Notification->created_at->diffForHumans()}}</small>
                </a>
                @endisset

                @isset($Notification->data['result_name'])
                <a href="{{ route('Results.show',$Notification->data['result_id']) }}">
                    <h4>
                        قـام الأستـاذ   {{$Notification->data['create_by']}} 
                    </h4>
                    <h5 >     بـإضـأفـة نتيجـة الطـالـب   
                        <span style="font-weight: bolder; padding:5px;">  {{ $Notification->data['result_name'] }} , لشـهر {{ $Notification->data['result_month'] }} </span>
                    </h5>
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

            <form method="POST" action="{{ route('logout','web') }}">
            @csrf
            <button class="btn btn-info  btn-flat">تسجيل الخروج</button>
            </form>
            </div>
            </li>
        </ul>
        </li>
    </ul>
    </div>
    
</nav>

</header>
