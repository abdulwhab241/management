@extends('layouts.master')
@section('css')

@section('title')
الإشـعـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
نتيجـة الأختبـار 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">نتيجـة الأختبـار</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

    <div class="box-body table-responsive no-padding">

        <table class="table table-hover" style="width:100%; text-align: center;">
            <thead>
                <tr>
                    <th style="text-align: center; background-color: #D0DEF6;">الفصـل الدراسي</th>
                    <th style="text-align: center; background-color: #D0DEF6;"> نتيـجة شهـر</th>
                    <th style="text-align: center; background-color: #D0DEF6;"> المـادة</th>
                    <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة </th>
                    <th style="text-align: center; background-color: #D0DEF6;">الدرجـة التي حصـل عليـها </th>
                    <th style="text-align: center; background-color: #D0DEF6;">التقـديـر</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >تاريخ الإنشاء</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $Results->semester->name }}</td>
                    <td>{{$Results->month->name}}</td>
                    <td>{{ $Results->exam->subject->name }}</td>
                    <td>{{ $Results->student->name }}</td>
                    <td>{{$Results->marks_obtained}}</td>
                    <td>{{$Results->appreciation}}</td>
                    <td>{{$Results->created_at->diffForHumans()}}</td>
                    
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
@toastr_js
@toastr_render
@endsection
