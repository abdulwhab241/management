@extends('layouts.master')
@section('css')

@section('title')
جدول حصـص المعلمين
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
جدول حصـص الأسـتاذ:  <label style="color: #5686E0">{{ auth()->user()->name }}</label>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li class="active">جدول حصـص الأسـتاذ</li>
</ol>
</section>


<!-- Main content -->
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="box-header">
    <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
<br><br>

</div>
<div class="box-body table-responsive no-padding">
    <table class="table " style="width:100%; text-align: center;">
<thead>
<tr>
    <th style="text-align: center; background-color: #D0DEF6;">اليوم</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الحصـة الأولـى</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الحصـة الثـانيـة</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الحصـة الثـالثـة</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الحصـة الرابعـة</th>
    <th style="text-align: center; background-color: #D0DEF6;">  الحصـة الخـامسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;">  الحصـة السـادسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;">  الحصـة السـابعـة</th>

</tr>
</thead>
<tbody>
    @foreach ($Teacher_Classes as $TeacherClass)
        <tr>
        
            <td>{{ $TeacherClass->day }}</td>
            <td>{{ $TeacherClass->first }}</td>
            <td>{{ $TeacherClass->second }}</td>
            <td>{{ $TeacherClass->third }}</td>
            <td>{{ $TeacherClass->fourth }}</td>
            <td>{{ $TeacherClass->fifth }}</td>
            <td>{{ $TeacherClass->sixth }}</td>
            <td>{{ $TeacherClass->seventh }}</td>
        </tr>

@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection