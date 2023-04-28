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
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="treeview">
    <li><a href="{{ route('Students.information') }}"><i class="fa fa-user" aria-hidden="true"></i> البيـانـات الشخصيـة</a></li>
</li>
<li class="treeview">
    <li><a href="{{ route('Information.index') }}"><i class="fa fa-dollar highlight-icon" aria-hidden="true"></i> بيـانـات الـرسـوم</a></li>
</li>

<li class="treeview">
    <a href="#">
        <i class="fas fa-light fa-percent" ></i>
    <span>النتـائـج</span>
    <i class="fa fa-angle-left pull-left"></i>
    </a>
    <ul class="treeview-menu">
    <li><a href="{{route('Sections.index')}}"><i class="fa fa-circle-o"></i> بيـانـات المـواظبـة</a></li>
    <li><a href="{{route('Sections.index')}}"><i class="fa fa-circle-o"></i> النتـائـج النهـائيـة </a></li>
    </ul>
</li>
<li class="treeview">
    <li><a href="#"><i class="fa fa-table" aria-hidden="true"></i> جـدول الحصـص</a></li>
</li>

</ul>
</section>
</aside>