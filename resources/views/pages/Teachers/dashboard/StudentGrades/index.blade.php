@extends('layouts.master')
@section('css')

@section('title')
كشـف درجـات الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
كشـف درجـات الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">كشـف درجـات الطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

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
<a class="btn btn-primary btn-flat" style="padding:5px; margin: 5px;" href="{{route('Teacher_Grades.create')}}">
    اضافة كشـف الـدرجـات</a>
<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div>


<div class="box-body">
<div class="row">
<div class="card-body">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
@foreach ($Classrooms as $Classroom)

<div class="panel panel-info">

<div class="panel-heading" role="tab" id="heading">
<h4 class="panel-title">
    <a class="collapsed " role="button" data-toggle="collapse"  data-parent="#selector" href="#collapse" aria-expanded="false" aria-controls="collapse">
        {{ $Classroom->My_Classes->name_class }} , الـشـعبـة: {{ $Classroom->name_section }} 
    </a>
</h4>
</div>
<div id="collapse" class="panel-collapse collapse in" role="tab" aria-labelledby="heading">
<div class="panel-body">

    <div class="box-body">
        <div class="box-body table-responsive no-padding">
        <table  class="table" style="width:100%; text-align: center;">
        <thead>
        <tr>
            <th style="text-align: center; background-color: #D0DEF6;">الفـصل</th>
            <th style="text-align: center; background-color: yellow;" >محصـلـة شهـر</th>
            <th style="text-align: center; background-color: #D0DEF6;">المادة</th>
            <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
            <th style="text-align: center; background-color: #D0DEF6;">واجبـات</th>
            <th style="text-align: center; background-color: #D0DEF6;">شفهـي</th>
            <th style="text-align: center; background-color: #D0DEF6;">مـواظبـة</th>
            <th style="text-align: center; background-color: #E7EEFB;">تحريري</th>
            <th style="text-align: center; background-color: #FFC0D6;"> المحصـلة</th>
            <th style="text-align: center;" class="alert-warning">العمليات</th>
        
        
        </tr>
        </thead>
        <tbody>
        
        @foreach($Classroom->StudentGrades as $Student_Grade)
            <tr>
                <td>{{$Student_Grade->semester->name}}</td>
                <td style="background-color: yellow; font-weight:bolder;">{{ $Student_Grade->month->name }}</td>
                <td>{{$Student_Grade->subject->name}}</td>
                <td>{{$Student_Grade->student->name}}</td>
                <td>{{$Student_Grade->homework }}</td>
                <td>{{$Student_Grade->verbal}}</td>
                <td>{{ $Student_Grade->attendance }}</td>
                <td style="background-color: #E7EEFB; font-weight:bolder;">{{ $Student_Grade->result }}</td>
                <td style="background-color: #FFC0D6; font-weight:bolder;">{{ $Student_Grade->total }}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{route('Teacher_Grades.edit',$Student_Grade->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                    </div>
                </td>
            </tr>
        
        
        
        @endforeach
        </tbody>
        </table>

        <div class="footer">
            <a href="{{ route('Teacher_Grades.print',$Classroom->id) }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
                <i class="fa fa-print" aria-hidden="true"></i>  طبـاعـة  </a>
        </div>

        </div>
        </div>

    </div>
    </div>
</div>
@endforeach
</div>
</div>
</div>
</div><!--box -->


</div>
</div>
</div>
</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection