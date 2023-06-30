<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar"  style="font-family: 'Cairo', sans-serif">
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-right image">
    {{-- <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> --}}
    @if (isset(Auth::user()->name))
    <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="{{ Auth::user()->name }}" >
</div>
<div class="pull-left info">
    <p> أ. {{auth()->user()->name}}</p>


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
<!-- sidebar menu: : style can be found in sidebar.less     -->
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
    <li><a href="{{ route('Teacher_Classes.index') }}"><i class="fas fa-books" aria-hidden="true"></i> الحصـص الدراسية</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('TeacherAttendance.index') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> الحضـور والغيـاب</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('attendance.report') }}"><i class="fa fa-table" aria-hidden="true"></i> تقرير الحضور والغياب</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('TeacherExams.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> الإختبـارات</a></li>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-percent fa-fw" aria-hidden="true"></i>
    <span>النتـائـج </span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{ route('TeacherResult.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i> النتـائـج الشـهـريـة</a></li>
    <li><a href="{{route('StudentMidResults.index')}}"><i class="fa fa-circle-o"></i>  نتـائـج إختبـارات الـترم الاول</a></li>
    <li><a href="{{ route('StudentFinalResults.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i> نتـائـج إختبـارات الـترم الـثانـي</a></li>
    </ul>
</li>
<li class="treeview">
    <li><a href="{{ route('Teacher_Grades.index') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> كشـف درجـات الطـلاب</a></li>
</li>
<li class="treeview">
    <li><a href="{{route('TeacherProfile.show')}}"><i class="fas fa-id-card-alt" aria-hidden="true"></i> الملـف الشخصـي</a></li>
</li>


</ul>
</section>
</aside>