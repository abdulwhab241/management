@extends('layouts.master')
@section('css')

@section('title')
البيـانـات الشخصيـة
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    البيـانـات الشخصيـة
</h1>
<ol class="breadcrumb">
<li class="active">البيـانـات الشخصيـة</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-body table-responsive no-padding">
    <table class="table" data-page-length="50">
        <tbody>
            <tr>
                <th style="text-align: center; width: 30%; background-color: #D0DEF6;"  >أسـم الطـالـب</th>
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
                <td style="text-align: center; width: 70%;" >{{ auth()->user()->created_at->diffForHumans() }}</td>
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
</section>
@endsection
@section('js')

@endsection