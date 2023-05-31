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
<li><a href="{{route('Upgrades.index')}}"><i class="fa fa-refresh"></i> قائمـة الترقيـات </a></li>
<li class="active">طبـاعـة</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

{{-- <div class="box-header">
<a href="{{route('Promotions.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
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
    <table  class="table" style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center;">#</th>
    <th style="text-align: center;">أسـم الطالـب</th>
    <th style="text-align: center;"> المرحلة الدراسية السابقة</th>
    <th style="text-align: center;">الصف الدراسي السابق</th>
    <th style="text-align: center;">السنة الدراسية السابقة</th>
    <th style="text-align: center;"> المرحلة الدراسية الحالية</th>
    <th style="text-align: center;">الصف الدراسي الحالي </th>
    <th style="text-align: center;"> السنة الدراسية الحالية</th>
</tr>
</thead>
<tbody>

    <?php $i = 0; ?>
    @foreach ($Promotions as $Promotion)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td scope="row">{{$Promotion->student->name}}</td>
            <td scope="row">{{$Promotion->f_grade->name}}</td>
            <td scope="row">{{$Promotion->academic_year}}</td>
            <td scope="row">{{$Promotion->f_classroom->name_class}}</td>
        
            <td>{{$Promotion->t_grade->name}}</td>
            <td>{{$Promotion->academic_year_new}}</td>
            <td>{{$Promotion->t_classroom->name_class}}</td>
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