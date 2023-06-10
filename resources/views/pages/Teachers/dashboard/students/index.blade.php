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
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">
<h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
<br>
</div>



<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
    <thead>
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;">#</th>
        <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
        <th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
        <th style="text-align: center; background-color: #D0DEF6;">الشعبـة</th>
    
    </tr>
    </thead>
    <tbody>
        <?php $i = 0; ?>
    @foreach($students as $Student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{$Student->student->name}}</td>
            <td>{{$Student->classroom->name_class}}</td>
            <td>{{$Student->section->name_section}}</td>
        </tr>
    
    
    @endforeach
    </tbody>
    </table>
</div>
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