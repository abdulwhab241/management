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
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

    <li class="active">البيـانـات الشخصيـة</li>
</ol>

</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    
@if(count($Enrollments) > 0)
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table  class="table table-bordered" style="width:100%; text-align: center;">
<thead>
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
        <th style="text-align: center; background-color: #D0DEF6;">المرحلة الدراسية</th>
        <th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
        <th style="text-align: center; background-color: #D0DEF6;">الشعبـة</th>
        <th style="text-align: center; background-color: #D0DEF6;">السنة الدراسية</th>
    </tr>
</thead>
<tbody>
    @foreach ($Enrollments as $Enrollment)
    <tr>
        <td>{{$Enrollment->student->name}}</td>
        <td>{{$Enrollment->grade->name}}</td>
        <td>{{$Enrollment->classroom->name_class}}</td>
        <td>{{$Enrollment->section->name_section}}</td>
        <td>{{$Enrollment->year }}</td>
    </tr>
    @endforeach


</tbody>
</table>
</div>
@else
<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لـم يتـم تسجيـلك لـهذي السـنة الـدراسيـة راجـع الإدارة 
        </b>
    </marquee>
    </h1>
@endif

</div>

</div>
</div>
</div>
</section>
@endsection
@section('js')

@endsection