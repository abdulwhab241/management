<!DOCTYPE html>
<html lang="ar">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    {{-- @livewireStyles --}}
</head>

<body class="skin-blue sidebar-mini">

    <div class="wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1  style="font-family: 'Cairo', sans-serif">
    لوحة تحكم الادمن
</h1>

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h4>عـدد الطـلاب</h4>
            <p>{{App\Models\Student::count()}}</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
        </div>
        <a href="{{route('Students.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div><!-- ./col -->
<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner">
        <h4>عـدد المعلمـين</h4>
        <p>{{App\Models\Teacher::count()}}</p>
    </div>
    <div class="icon">
        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
    </div>
    <a href="{{route('Teachers.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

<div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-#D0DEF6">
    <div class="inner">
        <h4>عـدد الـصفـوف الـدراسيـة</h4>
        <p>{{App\Models\Classroom::count()}}</p>
    </div>
    <div class="icon">
        <i class="fa fa-building highlight-icon" aria-hidden="true"></i>
    </div>
    <a href="{{route('Classrooms.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-7 connectedSortable">

    <h2 class="page-header">AdminLTE Custom Tabs</h2>
    <div class="row">
      <div class="col-md-6">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
            <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
            <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Dropdown <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
            </li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <b>How to use:</b>
              <p>Exactly like the original bootstrap tabs except you should use
                the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
              A wonderful serenity has taken possession of my entire soul,
              like these sweet mornings of spring which I enjoy with my whole heart.
              I am alone, and feel the charm of existence in this spot,
              which was created for the bliss of souls like mine. I am so happy,
              my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
              that I neglect my talents. I should be incapable of drawing a single stroke
              at the present moment; and yet I feel that I never was a greater artist than now.
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              It has survived not only five centuries, but also the leap into electronic typesetting,
              remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
              sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
              like Aldus PageMaker including versions of Lorem Ipsum.
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </div><!-- /.col -->

      <div class="col-md-6">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Tab 1</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">Tab 2</a></li>
            <li><a href="#tab_3-2" data-toggle="tab">Tab 3</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Dropdown <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
            </li>
            <li class="pull-left header"><i class="fa fa-th"></i> Custom Tabs</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <b>How to use:</b>
              <p>Exactly like the original bootstrap tabs except you should use
                the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
              A wonderful serenity has taken possession of my entire soul,
              like these sweet mornings of spring which I enjoy with my whole heart.
              I am alone, and feel the charm of existence in this spot,
              which was created for the bliss of souls like mine. I am so happy,
              my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
              that I neglect my talents. I should be incapable of drawing a single stroke
              at the present moment; and yet I feel that I never was a greater artist than now.
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2-2">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3-2">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
              when an unknown printer took a galley of type and scrambled it to make a type specimen book.
              It has survived not only five centuries, but also the leap into electronic typesetting,
              remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
              sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
              like Aldus PageMaker including versions of Lorem Ipsum.
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
      </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
    {{-- <div class="d-block w-100"> --}}
        {{-- <h5 style="font-family: 'Cairo', sans-serif" class="card-title d-block w-100">اخر العمليات علي النظام</h5> --}}
    {{-- </div> --}}
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
    </div>
    </div><!-- /.nav-tabs-custom -->


</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
{{-- <section class="col-lg-5 connectedSortable">


    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient">
    <div class="box-header">
        <i class="fa fa-th"></i>
        <h3 class="box-title">Sales Graph</h3>
        <div class="box-tools pull-left">
        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body border-radius-none">
        <div class="chart" id="line-chart" style="height: 250px;"></div>
    </div><!-- /.box-body -->
    <div class="box-footer no-border">
        <div class="row">
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">Mail-Orders</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">Online</div>
        </div><!-- ./col -->
        <div class="col-xs-4 text-center">
            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
            <div class="knob-label">In-Store</div>
        </div><!-- ./col -->
        </div><!-- /.row -->
    </div><!-- /.box-footer -->
    </div><!-- /.box -->


</section><!-- right col --> --}}
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div>
@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')
{{-- @livewireScripts
@stack('scripts') --}}

</body>

</html>
