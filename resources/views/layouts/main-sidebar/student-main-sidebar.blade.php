<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar"  style="font-family: 'Cairo', sans-serif">
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-right image">
    @if (isset(Auth::user()->name))
    <img src="{{ asset('/attachments/Profile/' . Auth::user()->image ) }}" class="img-circle" alt="{{ Auth::user()->name }}" >
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
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="treeview">
    <li><a href="{{ route('Students.information') }}"><i class="fa fa-user" aria-hidden="true"></i> البيـانـات الشخصيـة</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('StudentAccounts.index') }}"><i class="fa fa-dollar highlight-icon" aria-hidden="true"></i> بيـانـات الـرسـوم</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('StudentTable.index') }}"><i class="fa fa-table" aria-hidden="true"></i> جـدول الحصـص</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('StudentAttendance.index') }}"><i class="fa fa-check-square" aria-hidden="true"></i> بيـانـات المـواظبـة</a></li>
</li>
<li class="treeview">
    <li><a href="{{route('Student_List')}}"><i class="fa fa-list-alt"></i> كـشـف الـدراجات </a></li>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-percent fa-fw" aria-hidden="true"></i>
    <span>النـتائـج </span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('StudentResult.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i> نتـائـج الإختبـارات الشهـرية</a></li>
        <li><a href="{{ route('mid_student') }}"><i class="fa fa-circle-o" aria-hidden="true"></i> نتيجـة التـرم الأول</a></li>
        <li><a href="{{ route('StudentFinal.index') }}"><i class="fa fa-circle-o" aria-hidden="true"></i> النتيـجـة النـهائيـة</a></li>
    </ul>
</li>
<li class="treeview">
    <li><a href="{{route('StudentProfile.show')}}"><i class="fas fa-id-card-alt" aria-hidden="true"></i> الملـف الشخصـي</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('student_graduated') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> معلـومـات التخـرج</a></li>
</li>



</ul>
</section>
</aside>