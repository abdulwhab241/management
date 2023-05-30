@extends('layouts.master')
@section('css')

@section('title')
معلـومـات التخـرج
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
      <i class="fa fa-graduation-cap" aria-hidden="true"></i> معلـومـات التخـرج
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">معلـومـات التخـرج</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    @if($Graduations->count() > 0)
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table class="table" style="width:100%; text-align: center;">
<thead>
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب</th>
        <th style="text-align: center; background-color: #D0DEF6;">المرحلـة الدراسيـة</th>
        <th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسـي</th>
        <th style="text-align: center; background-color: #D0DEF6;">الشعـبة</th>
        <th style="text-align: center; background-color: #D0DEF6;"> تـاريـخ التـخرج</th>
    </tr>
</thead>
<tbody>
@foreach ($Graduations as $graduated)
    

    <tr>
        <td>{{$graduated->student->name}}</td>
        <td>{{$graduated->grade->name}}</td>
        <td>{{$graduated->classroom->name_class}}</td>
        <td style="font-weight: bolder;">{{$graduated->section->name_section}}</td>
        <td>{{$graduated->date }}</td>
    
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
                عـذراً لا يـوجـد معلـومـات عـن التخـرج
        </b>
    </marquee>
    </h1>
@endif

</div>
</div>
</div>
</section>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection