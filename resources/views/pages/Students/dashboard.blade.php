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

    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1  style="font-family: 'Cairo', sans-serif">
    الأسـم: {{auth()->user()->name}}
</h1>

</section>

<!-- Main content -->
<section class="content"  style="font-family: 'Cairo', sans-serif">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">

    <div class="tab-pane active" id="tab_1">
        <div class="box-title" style="background-color: #99E2FE; font-weight: bolder; margin: 5px; padding:5px;" >
            <i class="fas fa-user-tie"></i>
            <span > البيـانـات الشخصيـة  </span>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table" data-page-length="50">
                <tbody>
                    <tr>
                        <th style="text-align: center; width: 50%;"  class="alert-info">أسـم الطـالـب</th>
                        <td style="text-align: center; width: 50%;" >{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 50%;"  class="alert-info">الجنـس</th>
                        <td style="text-align: center; width: 50%;" >{{ auth()->user()->gender->name }}</td>
                    </tr>

                <tr>
                    {{-- <th scope="row" style="text-align: center;" class="alert-default">أسـم الطـالـب</th>
                    <td>{{ auth()->user()->name }}</td> --}}
                    {{-- <th scope="row" style="text-align: center;" class="alert-default">الجنـس</th>
                    <td>{{auth()->user()->gender->name}}</td> --}}
                    <th scope="row" style="text-align: center;" class="alert-default">تـاريـخ الميـلاد</th>
                    <td>{{auth()->user()->birth_date}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">المـرحلـة الدراسيـة</th>
                    <td>{{auth()->user()->grade->name}}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;" class="alert-default">الصـف الدراسـي</th>
                    <td>{{ auth()->user()->classroom->name_class }}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">الشعبـة</th>
                    <td style="font-weight: bolder;">{{ auth()->user()->section->name_section }}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center; " class="alert-default">أسـم الأب</th>
                    <td>{{auth()->user()->father_name}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">جهـة العمـل</th>
                    <td>{{auth()->user()->employer}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">الوظيـفة</th>
                    <td>{{auth()->user()->father_job}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default"> هـاتف الأب </th>
                    <td>{{ auth()->user()->father_phone }}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;" class="alert-default">هـاتـف العمـل</th>
                    <td>{{auth()->user()->job_phone}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">هـاتـف المنـزل</th>
                    <td>{{auth()->user()->home_phone}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">العنـوان</th>
                    <td>{{auth()->user()->address}}</td>
                </tr>
                <tr>
                    <th scope="row" style="text-align: center;" class="alert-default"> أسـم الأم </th>
                    <td>{{ auth()->user()->mother_name }}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">هـاتـف الأم</th>
                    <td>{{auth()->user()->mother_phone}}</td>
                    <th scope="row" style="text-align: center;" class="alert-default">الوظيفـة</th>
                    <td>{{auth()->user()->mother_job}}</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
</div>



{{-- <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
    <div class="inner">
        <h3>۱۵۰</h3>
        <p>سفارش جدید</p>
    </div>
    <div class="icon">
        <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
    <div class="inner">
        <h3>۵۳<sup style="font-size: 20px">%</sup></h3>
        <p>افزایش آمار</p>
    </div>
    <div class="icon">
        <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
    <div class="inner">
        <h3>۴۴</h3>
        <p>کاربر ثبت نام کرده</p>
    </div>
    <div class="icon">
        <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
    <div class="inner">
        <h3>۶۵</h3>
        <p>بازدید کننده یکتا</p>
    </div>
    <div class="icon">
        <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
    </div>
</div><!-- ./col --> --}}
</div><!-- /.row -->
<!-- Main row -->
{{-- <div class="row"> --}}
<!-- Left col -->
{{-- <section class="col-lg-7 connectedSortable">
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



</section><!-- /.Left col --> --}}
<!-- right col (We are only adding the ID to make the widgets sortable)-->
{{-- <section class="col-lg-5 connectedSortable">

</section><!-- right col --> --}}
{{-- </div><!-- /.row (main row) --> --}}

</section><!-- /.content -->

@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')
{{-- @livewireScripts
@stack('scripts') --}}

</body>

</html>
