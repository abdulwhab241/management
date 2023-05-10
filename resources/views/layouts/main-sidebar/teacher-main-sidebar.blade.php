{{-- <div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.sid')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.title')}} </li>

        <!-- الاقسام-->
        <li>
            <a href="{{route('sections')}}"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">الاقسام</span></a>
        </li>

        <!-- الطلاب-->
        <li>
                <a href="{{route('student.index')}}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">الطلاب</span></a>
        </li>


        <!-- الاختبارات-->
        <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">الاختبارات</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('Exams.index')}}">قائمة الاختبارات</a></li>
            <li><a href="#">قائمة الاسئلة</a></li>
        </ul>
        </li>

        <!-- sections-->س
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">التقارير</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('attendance.report')}}">تقرير الحضور والغياب</a></li>
                <li><a href="#">تقرير الامتحانات</a></li>
            </ul>

        </li>

        <!-- الملف الشخصي-->
        <li>
            <a href="{{route('profile.show')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">الملف الشخصي</span></a>
        </li>

    </ul>
</div> --}}

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar"  style="font-family: 'Cairo', sans-serif">
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-right image">
    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    @if (isset(Auth::user()->name))
    @if(count(data_get(Auth::user()->image,'image')??[]))
    @foreach(data_get(Auth::user()->image,'image') as $image)
    <img src="{{ '/attachments/Students/' . $image }}" class="img-circle" alt="User Image">
    @endforeach
    @endif
</div>
<div class="pull-left info">
    <p>{{auth()->user()->name}}</p>


</div>
@endif
</div>
<!-- search form -->
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="بحـث ...">
    <span class="input-group-btn">
    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
    </span>
</div>
</form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less    -->
<ul class="sidebar-menu">
<li class="header">برنامـج عبدالوهـاب لإدارة المدارس</li>
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="treeview">
    <li><a href="{{ route('student.index') }}"><i class="fa fa-user" aria-hidden="true"></i> الطـلاب</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('sections') }}"><i class="fas fa-chalkboard" aria-hidden="true"></i> الأقسـام</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('Attendances.index') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> الحضـور والغيـاب</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('attendance.report') }}"><i class="fa fa-table" aria-hidden="true"></i> تقرير الحضور والغياب</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('Exams.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> الإختبـارات</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('Result.index') }}"><i class="fas fa-light fa-percent" aria-hidden="true"></i> النتـائـج</a></li>
</li>
<li class="treeview">
    <li><a href="{{route('profile.show')}}"><i class="fas fa-id-card-alt" aria-hidden="true"></i> الملـف الشخصـي</a></li>
</li>


</ul>
</section>
</aside>