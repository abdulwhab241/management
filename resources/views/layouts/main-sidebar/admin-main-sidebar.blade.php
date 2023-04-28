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
    <img src="{{ '/attachments/Admins/' . $image }}" class="img-circle" alt="User Image">
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
    <i class="fas fa-school"></i>
    <span>المراحل الدراسية</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Grades.index')}}"><i class="fa fa-circle-o"></i> قائمة المراحل الدراسية</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-building"></i>
    <span>الصفـوف الدراسيـة</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Classrooms.index')}}"><i class="fa fa-circle-o"></i> قائمـة الصفـوف الدراسيـة</a></li>

    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-chalkboard"></i>
    <span>الأقسـام</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Sections.index')}}"><i class="fa fa-circle-o"></i> قائمـة الأقسـام</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-user-tie"></i>
    <span>الطـلاب</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Students.index')}}"><i class="fa fa-circle-o"></i> قائمة الطـلاب</a></li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-retweet" aria-hidden="true"></i>
        <span> تـرقيـة الطـلاب </span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Upgrades.index')}}"><i class="fa fa-circle-o"></i> قائمة تـرقيـة الطـلاب</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
        <span> الطـلاب المتخـرجيـن </span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Graduated.index')}}"><i class="fa fa-circle-o"></i> قائمة الطـلاب المتخـرجيـن</a></li>
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
    <li><a href="{{route('Teachers.index')}}"><i class="fa fa-circle-o"></i> قائمة المعلمين</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i> <!-- this -->
    <span>الحسابـات</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Fees.index')}}"><i class="fa fa-circle-o"></i> الرسـوم الدراسيـة</a></li>
    <li><a href="{{ route('Receipts.index') }}"><i class="fa fa-circle-o"></i> سندات القبض (تسـديـد رسـوم)</a></li>
    <li><a href="{{route('Fees_Invoices.index')}}"><i class="fa fa-circle-o"></i> الفـواتيـر الدراسيـة</a></li>
    <li><a href="{{route('ProcessingFee.index')}}"><i class="fa fa-circle-o"></i> أستبـعاد رسـوم طـالـب </a></li>
    <li><a href="{{route('Payments.index')}}"><i class="fa fa-circle-o"></i> سـندات الصـرف </a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-book"></i>
    <span>المواد الدراسية</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Subjects.index')}}"><i class="fa fa-circle-o"></i> قائمة المواد الدراسية</a></li>

    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fas fa-book-open"></i>
    <span>الأختبأرات </span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Exams.index')}}"><i class="fa fa-circle-o"></i> قائمة الأختبأرات</a></li>

    </ul>
</li> <!-- this -->
{{-- fa-hand-paper-o atta --}}
<li class="treeview">
    <a href="#">
    <i class="fas fa-percent" aria-hidden="true"></i>
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
    <li><a href="{{route('Classes.index')}}"><i class="fa fa-circle-o"></i> قائمة الحصـص الدراسية</a></li>
    </ul>
</li>

</ul>
</section>
</aside>