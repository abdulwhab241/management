<!DOCTYPE html>
<html lang="ar">
@section('title')
برنامج عبدالوهاب لإدارة المدارس
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="مدارس " />
    <meta name="copyright" content="Abdulwhab Mohammed" />
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" /> --}}
    {{-- <meta name="author" content="potenzaglobalsolutions.com" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body class="skin-blue sidebar-mini" dir="rtl" style="font-family: 'Cairo', sans-serif">

    <div class="wrapper">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('layouts.header')

    @include('layouts.main-sidebar')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1  style="font-family: 'Cairo', sans-serif">
    صـفـحـة الـطـالـب : <label style="color: #5686E0"> {{auth()->user()->name}} </label>   
</h1>

</section>

<!-- Main content -->
<section class="content"  style="font-family: 'Cairo', sans-serif">
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">

    <div class="tab-pane active" id="tab_1">

        <div class="box-body table-responsive no-padding">
            <table class="table" data-page-length="50">
                <caption style="background-color: #99E2FE; font-weight: bolder; color:black; text-align:center; margin: 5px; padding:5px;">
                    <i class="fas fa-user-tie"></i>
                    <span > البيـانـات الشخصيـة  </span>
                </caption>
                <tbody>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;"  >أسـم الطـالـب \ الطـالبـة</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >الجنـس</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->gender->name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >تـاريـخ الميـلاد</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->birth_date }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >المـرحلـة الدراسيـة</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->grade->name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >الصـف الدراسـي</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->classroom->name_class }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >الشعبـة</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->section->name_section }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >أسـم الأب</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->father_name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >جهـة العمـل</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->employer }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >الوظيـفة</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->father_job }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >هـاتـف العمـل</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->job_phone }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >هـاتـف المنـزل</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->home_phone }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >العنـوان</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->address }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >أسـم الأم</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->mother_name }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >هـاتـف الأم</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->mother_phone }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >وظيفـة الأم</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->mother_job }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >تاريخ التسجيل</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->created_at }}</td>
                    </tr>
                    <tr>
                        <th style="text-align: center; width: 30%; background-color: #D0DEF6; color:black;" >السنـة الدراسيـة</th>
                        <td style="text-align: center; width: 70%;" >{{ auth()->user()->academic_year }}</td>
                    </tr>
            </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>
</div>




</section><!-- /.content -->
</div>
@include('layouts.footer')
</div><!-- /.content-wrapper -->

@include('layouts.footer-scripts')
{{-- @livewireScripts
@stack('scripts') --}}

</body>

</html>
