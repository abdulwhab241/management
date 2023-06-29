@extends('layouts.master')
@section('css')

@section('title')
كـشـف الـدرجـات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header" >
<h1>
كـشـف الـدرجـات
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">كـشـف الـدرجـات</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    @if(count($Student_Grades) > 0)

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table border-2" style="width:100%; text-align: center">
<thead>
<tr>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">الفـصل الدراسي</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">الأستـاذ</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">المادة</th>
    <th style="text-align: center; background-color: yellow; font-weight:bolder;" >محصـلـة شهـر</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">واجبـات</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">شفهـي</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">مـواظبـة</th>
    <th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">تحريري</th>
    <th style="text-align: center; background-color: #FFC0D6; font-weight:bolder;"> المحصـلة</th>
</tr>
</thead>
<tbody>
    @foreach ($Student_Grades as $Student_Grade)
    <tr>
        <td>{{$Student_Grade->semester->name}}</td>
        <td>{{$Student_Grade->teacher->name}}</td>
        <td>{{$Student_Grade->subject->name}}</td>
        <td style="background-color: yellow; font-weight:bolder;">{{ $Student_Grade->month->name }}</td>
        <td>{{$Student_Grade->homework }}</td>
        <td>{{$Student_Grade->verbal}}</td>
        <td>{{ $Student_Grade->attendance }}</td>
        <td style="background-color: #E7EEFB; font-weight:bolder;">{{ $Student_Grade->result }}</td>
        <td style="background-color: #FFC0D6; font-weight:bolder;">{{ $Student_Grade->total }}</td>
    </tr>

@endforeach
</tbody>
</table>
</div>
</div>
@else

<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لا يـوجـد كـشـف درجـات لعـرضـها 
        </b>
    </marquee>
    </h1>
@endif
</div>
</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')

@endsection