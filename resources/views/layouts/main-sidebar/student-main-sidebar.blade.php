{{-- <div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('student/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.sid')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.title')}} </li>


        <!-- الامتحانات-->
        <li>
            <a href="{{route('Settings.index')}}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">الامتحانات</span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{route('Settings.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">الملف الشخصي</span></a>
        </li>

        <!-- Accounts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                        class="right-nav-text">بيانات الطالب</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Fees.index')}}">البيانات الشخصية </a> </li>
                <li> <a href="{{route('Fees_Invoices.index')}}">تغيير كلمة المرور</a> </li>
                
            </ul>
        </li>

        <!-- students-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i  class="fa fa-dollar highlight-icon" aria-hidden="true"></i>بيانات الرسوم<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">الرسوم الفصلية<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">الفصل الاول</a></li>
                        <li> <a href="{{route('Students.index')}}">الفصل الثاني</a></li>
                    </ul>
                    
                </li>
                    <li> <a href="{{route('Promotion.index')}}">الرسوم الإجمالية</a></li>
            </ul>
        </li>

           <!-- students-->
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-"><i class="fa fa-percent"></i>النتائج<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
            <ul id="students-" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_">بيانات المواظبة<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Student_" class="collapse">
                        <li> <a href="{{route('Students.create')}}">الفصل الاول</a></li>
                        <li> <a href="{{route('Students.index')}}">الفصل الثاني</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students">نتائج الأعمال الدراسية<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Students" class="collapse">
                        <li> <a href="{{route('Students.create')}}">الفصل الاول</a></li>
                        <li> <a href="{{route('Students.index')}}">الفصل الثاني</a></li>
                    </ul>
                </li>
                <li> <a href="{{route('Promotion.index')}}">النتائج النهائية</a></li>

            </ul>
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
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
<li class="header">برنامـج عبدالوهـاب لإدارة المدارس</li>
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="treeview">
    <a href="#">
    <i class="fas fa-user-tie"></i>
    <span>بيـانـات الطـالـب</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Grades.index')}}"><i class="fa fa-circle-o"></i> البيـانـات الشخصيـة</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
    <span>بيـانـات الـرسـوم</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Classrooms.index')}}"><i class="fa fa-circle-o"></i> الـرسـوم الـدراسيـة</a></li>
    <li><a href="{{route('Classrooms.index')}}"><i class="fa fa-circle-o"></i> الـرسـوم المـدفـوعـة</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fas fa-light fa-percent" aria-hidden="true"></i>
    <i class="fa-light fa-percent"></i>
    <span>النتـائـج</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Sections.index')}}"><i class="fa fa-circle-o"></i> بيـانـات المـواظبـة</a></li>
    <li><a href="{{route('Sections.index')}}"><i class="fa fa-circle-o"></i> النتـائـج النهـائيـة </a></li>
    </ul>
</li>
{{-- <li class="treeview">
    <a href="#">
    <i class="fas fa-user-tie"></i>
    <span>الطـلاب</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمة الطـلاب</a></li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-refresh"></i>
        <span> تـرقيـة الطـلاب </span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Upgrades.index')}}"><i class="fa fa-refresh"></i> قائمة تـرقيـة الطـلاب</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fas fa-user-graduate"></i>
        <span> الطـلاب المتخـرجيـن </span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Graduated.index')}}"><i class="fas fa-user-graduate"></i> قائمة الطـلاب المتخـرجيـن</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-chalkboard-teacher"></i>
    <span>المعلمين</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Teachers.index')}}"><i class="fa fa-users"></i> قائمة المعلمين</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa  fa-money"></i> <!-- this -->
    <span>الحسابـات</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Fees.index')}}"><i class="fa fa-dollar"></i> الرسـوم الدراسيـة</a></li>
    <li><a href="{{ route('Receipts.index') }}"><i class="fa fa-dollar"></i> سندات القبض (تسـديـد رسـوم)</a></li>
    <li><a href="{{route('Fees_Invoices.index')}}"><i class="fa fa-list"></i> الفـواتيـر الدراسيـة</a></li>
    <li><a href="{{route('ProcessingFee.index')}}"><i class="fa fa-user-times"></i> أستبـعاد رسـوم طـالـب </a></li>
    <li><a href="{{route('Payments.index')}}"><i class="fas fa-donate"></i> سـندات الصـرف </a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-book"></i>
    <span>المواد الدراسية</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمة المواد الدراسية</a></li>

    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-book-open"></i>
    <span>الأختبأرات </span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Exams.index')}}"><i class="fas fa-book-open"></i> قائمة الأختبأرات</a></li>

    </ul>
</li> <!-- this -->
<li class="treeview">
    <a href="#">
    <i class="fa fa-check-square-o"></i>
    <span>النتـائـج </span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Results.index')}}"><i class="fa fa-check-circle-o"></i> قائمة النتـائـج</a></li>

    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-books"></i>
    <span>الحصـص الدراسية</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Classes.index')}}"><i class="fa fa-book"></i> قائمة الحصـص الدراسية</a></li>
    </ul>
</li> --}}

</ul>
</section>
</aside>