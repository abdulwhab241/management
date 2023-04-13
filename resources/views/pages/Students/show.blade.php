@extends('layouts.master')
@section('css')

@section('title')
معلـومـات الطـالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
معلـومـات الطـالـب  <label style="color: #5686E0">{{$Student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمـة الطـلاب </a></li>
<li class="active">معلـومـات الطـالـب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
    <li class="btn-info active"><a href="#tab_1" data-toggle="tab" style="font-weight:bolder; font-color:white;">معلـومـات الطـالـب</a></li>
    <li class="btn-info"><a href="#tab_2" data-toggle="tab" style="font-weight:bolder; font-color:white;">حسـاب الطـالـب</a></li>
    <li class="btn-info"><a href="#tab_3" data-toggle="tab" style="font-weight:bolder; font-color:white;">صـور الطـالـب</a></li>
</ul>
<div class="tab-content"><br>
    <div class="tab-pane active" id="tab_1">
    <div class="box-body table-responsive no-padding">
        <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
            <tbody>
            <tr>
                <th scope="row" style="text-align: center;" class="alert-default">أسـم الطـالـب</th>
                <td>{{ $Student->name }}</td>
                <th scope="row" style="text-align: center;" class="alert-default">الجنـس</th>
                <td>{{$Student->gender->name}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">تـاريـخ الميـلاد</th>
                <td>{{$Student->birth_date}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">المـرحلـة الدراسيـة</th>
                <td>{{$Student->grade->name}}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center;" class="alert-default">الصـف الدراسـي</th>
                <td>{{ $Student->classroom->name_class }}</td>
                <th scope="row" style="text-align: center;" class="alert-default">أسـم الأب</th>
                <td>{{$Student->father_name}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">جهـة العمـل</th>
                <td>{{$Student->employer}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">الوظيـفة</th>
                <td>{{$Student->father_job}}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center;" class="alert-default"> هـاتف الأب </th>
                <td>{{ $Student->father_phone }}</td>
                <th scope="row" style="text-align: center;" class="alert-default">هـاتـف العمـل</th>
                <td>{{$Student->job_phone}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">هـاتـف المنـزل</th>
                <td>{{$Student->home_phone}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">العنـوان</th>
                <td>{{$Student->address}}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center;" class="alert-default"> أسـم الأم </th>
                <td>{{ $Student->mother_name }}</td>
                <th scope="row" style="text-align: center;" class="alert-default">هـاتـف الأم</th>
                <td>{{$Student->mother_phone}}</td>
                <th scope="row" style="text-align: center;" class="alert-default">الوظيفـة</th>
                <td>{{$Student->mother_job}}</td>
            </tr>
        </tbody>
        {{-- <tbody>

        </tbody> --}}
        </table>
    </div>
</div>

    <div class="tab-pane" id="tab_2">

        <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                    <thead>
                    <tr>
                    
                        <th style="text-align: center;" class="alert-info">الـرسـوم الدراسيـة</th>
                        <th style="text-align: center;" class="alert-success">الرسـوم المدفـوعـة</th>
                        <th style="text-align: center;" class="alert-danger"> الرسـوم المسـتبعـدة</th>
                        <th style="text-align: center;" class="alert-danger">سنـدات الصـرف</th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                    
                            <td>{{ $Student_Account->feeInvoice->amount }}</td>
                            {{-- <td>{{ $Student_Account->receipt->Debit }}</td> --}}
                            {{-- <td>{{$Student_Account->processing->amount}}</td> --}}
                            {{-- <td>{{$Student_Account->payment->amount}}</td> --}}
                        </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th style="text-align: center;" class="alert-info">إجـمالـي الـرسـوم</th>
                    <th style="text-align: center;" class="alert-success">إجـمالـي المـدفوعـات</th>
                    <th style="text-align: center;" class="alert-warning">الرسـوم المتبقيـة</th>

                </tr>
                <tr>
                    <td>fdsddf</td>
                    <td>sdfsd</td>
                    <td>sdfffsd</td>

                </tr>
                </tfoot>

            </table>
        </div>

    </div><!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
    <p>sdgdfgdfs</p>
    </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
</div><!-- /.col -->
</div>


</div>
</div>
</div>
</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
