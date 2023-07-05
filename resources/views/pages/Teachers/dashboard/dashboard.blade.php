<!DOCTYPE html>
<html lang="ar">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="مدارس " />
    <meta name="copyright" content="Abdulwhab Mohammed" />
    <meta name="keywords" content="HTML5 Template" />
    {{-- <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" /> --}}
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    {{-- @livewireStyles --}}
</head>

<body class="skin-blue sidebar-mini" dir="rtl">

    <div class="wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header" style="font-family: 'Cairo', sans-serif">
<h1  style="font-family: 'Cairo', sans-serif">
    صـفـحـة الأستـاذ :        <span>   {{ auth()->user()->name }}</span>
</h1>

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-3">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h4>عـدد الطـلاب</h4>
            <p>{{$count_students}}</p>
        </div>
        <div class="icon">
            <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
        </div>
        <a href="{{route('student.index')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner">
        <h4>عـدد الاقسـام</h4>
        <p>{{$count_sections}}</p>
    </div>
    <div class="icon">
        <i class="fas fa-chalkboard" aria-hidden="true"></i>
    </div>
    <a href="{{route('sections')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-#D0DEF6">
    <div class="inner">
        <h4>عـدد الـصـفـوف الـدراسـيـة</h4>
        <p>{{$count_classrooms}}</p>
    </div>
    <div class="icon">
        <i class="fa fa-building" aria-hidden="true"></i>
    </div>
    <a href="{{route('TeacherClassrooms')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-3">
    <!-- small box -->
    <div class="small-box bg-green">
    <div class="inner">
        <h4>عـدد المـواد الـدراسـيـة</h4>
        <p>{{$count_subjects}}</p>
    </div>
    <div class="icon">
        <i class="fa fa-book" aria-hidden="true"></i>
    </div>
    <a href="{{route('Subjects_Teacher')}}" class="small-box-footer">عـرض البيـانـات <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->


</div><!-- /.row -->
<!-- Main row -->

</section><!-- /.content -->
</div>
@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')


</body>

</html>
