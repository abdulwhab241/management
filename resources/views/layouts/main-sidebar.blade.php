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
        <img src="{{ '/uploads/' . $image }}" class="img-circle" alt="User Image">
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
    <li><a href="#"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <!-- Grades-->
    {{-- <li class="treeview">
        <a href="#">
        <i class="fa fa-files-o"></i>
        <span>Layout Options</span>
        <span class="label label-primary pull-left">۴</span>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
        <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
        <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
        <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
    </li>
    <li>
        <a href="pages/widgets.html">
        <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-left bg-green">new</small>
        </a>
    </li> --}}
    <li class="treeview">
        <a href="#">
        <i class="fas fa-school"></i>
        <span>المراحل الدراسية</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Grades.index')}}"><i class="fa fa-circle-o"></i> قائمة المراحل الدراسية</a></li>
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
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
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
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
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fas fa-user-tie"></i>
        <span>الطـلاب</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمة الطـلاب</a></li>
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
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
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fas fa-money-bill-wave-alt"></i>
        {{-- fa-money --}}
        <span>الحسابـات</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
            {{-- <a href="">الرسوم الدراسية</a><i class=""></i> --}}
        <li><a href="{{route('Fees.index')}}"><i class="fa fa-dollar"></i> الرسـوم الدراسيـة</a></li>
        <li><a href="{{ route('Receipts.index') }}"><i class="fa fa-dollar"></i> سندات القبض (تسـديـد رسـوم)</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fas fa-book-open"></i>
        <span>المواد الدراسية</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمة المواد الدراسية</a></li>

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
        {{-- <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
        </ul>
    </li>
    {{-- <li class="treeview">
        <a href="#">
        <i class="fa fa-laptop"></i>
        <span>UI Elements</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
        <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
        <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
        <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
        <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-edit"></i> <span>Forms</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i> <span>Tables</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
    </li>
    <li>
        <a href="pages/calendar.html">
        <i class="fa fa-calendar"></i> <span>Calendar</span>
        <small class="label pull-left bg-red">3</small>
        </a>
    </li>
    <li>
        <a href="pages/mailbox/mailbox.html">
        <i class="fa fa-envelope"></i> <span>Mailbox</span>
        <small class="label pull-left bg-yellow">12</small>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-folder"></i> <span>Examples</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
        <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
        <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
        <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
        <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
        <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-share"></i> <span>Multilevel</span>
        <i class="fa fa-angle-left pull-left"></i>
        </a>
        <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-left"></i></a>
            <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
            <li>
                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-left"></i></a>
                <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
            </li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
    </li>
    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
    </ul>
</section>
<!-- /.sidebar -->
</aside>