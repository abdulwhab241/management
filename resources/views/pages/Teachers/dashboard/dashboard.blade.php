{{-- <!DOCTYPE html>
<html lang="en">
@section('title')
برنامج عبدالوهاب لادارة المدارس
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
    @livewireStyles
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

<!--=================================
preloader -->

<div id="pre-loader">
<img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
</div>

<!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
Main content -->
<!-- main-content -->
<div class="content-wrapper">
<div class="page-title" >
    <div class="row">
        <div class="col-sm-6" >
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">مرحبا بك : {{auth()->user()->Name}}</h4>
        </div><br><br>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
            </ol>
        </div>
    </div>
</div>
<!-- widgets -->
<div class="row" >
    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-success">
                            <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">عدد الطلاب</p>
                        <h4>{{$count_students}}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('student.index')}}" target="_blank"><span class="text-danger">عرض البيانات</span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-warning">
                            <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">عدد الاقسام</p>
                        <h4>{{$count_sections}}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('sections')}}" target="_blank"><span class="text-danger">عرض البيانات</span></a>                        </div>
        </div>
    </div>
</div>


        <livewire:calendar />

        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')

</body>

</html> --}}

<!DOCTYPE html>
<html lang="ar">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="مدارس عمر" />
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

<body class="skin-blue sidebar-mini">

    <div class="wrapper">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header" style="font-family: 'Cairo', sans-serif">
<h1  style="font-family: 'Cairo', sans-serif">
    مـرحبـاً بـكـ :        <span>   {{ auth()->user()->name }}</span>
</h1>

</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-xs-6">
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
<div class="col-lg-6 col-xs-6">
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


</div><!-- /.row -->
<!-- Main row -->

</section><!-- /.content -->
</div>
@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')
{{-- @livewireScripts
@stack('scripts') --}}

</body>

</html>
