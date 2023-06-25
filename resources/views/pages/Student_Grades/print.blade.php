@extends('layouts.master')
@section('css')

@section('title')
    طبـاعـة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    طبـاعـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Student_Grades.index')}}"><i class="fa fa-book"></i> قائمـة كشـف الـدرجـات </a></li>
<li class="active">طبـاعـة</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

{{-- <div class="box-header">
<a href="{{route('Students.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة طـالـب</a>
<br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
    <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div><!-- /.box-header --> --}}
<div class="box-body" >
<div class="box-body table-responsive no-padding" id="print">
    <table  class="table " style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center;">#</th>
    <th style="text-align: center;">الفـصل الدراسي</th>
    <th style="text-align: center;">الأستـاذ</th>
    <th style="text-align: center;">المادة</th>
    <th style="text-align: center; background-color: yellow; font-weight:bolder;" >محصـلـة شهـر</th>
    <th style="text-align: center;">أسـم الطـالـب \ الطـالبـة</th>
    <th style="text-align: center;">واجبـات</th>
    <th style="text-align: center;">شفهـي</th>
    <th style="text-align: center;">مـواظبـة</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">تحريري</th>
    <th style="text-align: center; background-color: #FFC0D6; font-weight:bolder;"> المحصـلة</th>
</tr>
</thead>
<tbody>

    <?php $i = 0; ?>
    @foreach ($StudentGrade as $StudentGrade)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{$StudentGrade->semester->name}}</td>
            <td>{{$StudentGrade->teacher->name}}</td>
            <td>{{$StudentGrade->subject->name}}</td>
            <td style="background-color: yellow; font-weight:bolder;">{{ $StudentGrade->month->name }}</td>
            <td>{{$StudentGrade->student->name}}</td>
            <td>{{$StudentGrade->homework }}</td>
            <td>{{$StudentGrade->verbal}}</td>
            <td>{{ $StudentGrade->attendance }}</td>
            <td style="background-color: #E7EEFB; font-weight:bolder;">{{ $StudentGrade->result }}</td>
            <td style="background-color: #FFC0D6; font-weight:bolder;">{{ $StudentGrade->total }}</td>
        </tr>


@endforeach
</tbody>
</table>

</div>
</div>

<div class="footer">
    <button class="btn .btn.bg-navy  pull-left" id="print_Button" onclick="printDiv()"> 
    <i class="fa fa-print" aria-hidden="true"></i> طباعة  </button>
</div>

</div>
</div>
</div>

<!-- row closed -->
</section>


@endsection
@section('js')

@endsection