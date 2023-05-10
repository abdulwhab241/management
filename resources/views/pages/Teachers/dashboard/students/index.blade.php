@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    
    <h4 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h4>
</div>

<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;">#</th>
    <th style="text-align: center; background-color: #D0DEF6;">أسم الطالب</th>
    <th style="text-align: center; background-color: #D0DEF6;"> النوع</th>
    <th style="text-align: center; background-color: #D0DEF6;">المرحلة الدراسية</th>
    <th style="text-align: center; background-color: #D0DEF6;">الصف الدراسي</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الشعـبة</th>

</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($students as $student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->gender->name }}</td>
            <td>{{$student->grade->name}}</td>
            <td>{{$student->classroom->name_class}}</td>
            <td style="font-weight: bolder;">{{$student->section->name_section}}</td>
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