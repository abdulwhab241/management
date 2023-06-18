@extends('layouts.master')
@section('css')

@section('title')
طبـاعـة نتيجـة الطـالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
نتيجـة الطـالـب          {{ $Student_Name->student->name }} 
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box" >

    @if(count($Student_Name) > 0)
<div class="box-header">

<div class="row">
    <div class="col-md-4" style="text-align: center;">            
    <p style="font-weight: bolder;">الجمهورية اليمنية</p>
    <p style="font-weight: bolder;">وزارة التربية والتعليم</p>
    <p style="font-weight: bolder;">مكتب التربية والتعليم بالأمانة قطاع التعليم الأهلي</p>
    <p style="font-weight: bolder;">مديرية معين التعليمية</p>
    <p style="font-weight: bolder;">مدارس.............. الأهلية</p>
    </div>

    <div class="col-md-4 text-center">
        <p style="font-weight: bolder;">بسم الله الرحمن الرحيم </p>
        <img src="/images/Emblem.png" style="width: 50%;" class="img-fluid  border-0">
    </div>

    <div class="col-md-4 text-center">
        <p style="font-weight: bolder;">أسـم الطـالـب: {{ $Student_Name->student->name }} </p>
        <p style="font-weight: bolder;">المرحلة الدراسية: {{ $Student_Name->student->grade->name }} </p>
        <p style="font-weight: bolder;">الصـف: {{ $Student_Name->student->classroom->name_class }} </p>
        <p style="font-weight: bolder;">الشعبـة: {{ $Student_Name->student->section->name_section }} </p>
        <p style="font-weight: bolder;">تـاريـخ المـيلاد: {{ $Student_Name->student->birth_date }} </p>
    </div>

</div><br><br>

<div class="row">
    <div class="col-md-4 text-center">
            <img src="/images/Print.png" style="width: 20%;" class="img-fluid border-0">
    </div>

    <div class="col-md-4 text-center">
            <h3>شهادة تقويم أعمال السنة الدراسية:   {{ date("Y") }}  </h3>
    </div>

    <div class="col-md-4 text-center">
            <img src="/images/Print.png" style="width: 20%;" class="img-fluid border-0">
    </div>

</div><br><br>
<br><br>

</div>
<div class="box-body">
<div class="box-body table-responsive no-padding text-center" >
<table  class="table " style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الاول  (رقـماً) 50% </th>
<th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
<th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الثـانـي  (رقـماً) 50% </th>
<th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
<th style="text-align: center; background-color: #D0DEF6;">المـجموع 100</th>
</tr>
</thead>
<tbody>


@foreach($Final_Results as $student)
<tr>

<td>{{$student->subject->name}}</td>
<td>{{$student->f_total_number }}</td>
<td>{{ $student->f_total_write }}</td>
<td>{{ $student->s_total_number }}</td>
<td>{{$student->s_total_write}}</td>
<td>{{ $student->total }}</td>

</tr>
@endforeach
</tbody>

<tfoot>
@php $type = ''; @endphp
<tr>
<th style="text-align: center; background-color: #D0DEF6;">المجمـوع النـهائـي</th>    
    <th style="text-align: center;">{{ $Results->sum('total') }}</th>

@if ($Results->count('subject_id') == 7)
<!-- start if 7 -->
@if ($Results->sum('total') < 360)
@php
    $type = 'راسب';
@endphp
@else
@php
    $type = 'ناجح';
@endphp
@endif
<!-- end if 7 -->

@else

@if ($Results->count('subject_id') == 11)
    <!-- start if 11 -->
    @if ($Results->sum('total') < 560)
    @php
        $type = 'راسب';
    @endphp
    @else
    @php
        $type = 'ناجح';
    @endphp
    @endif
    <!-- end if 11 -->
@endif

@endif
<th style="text-align: center; background-color: #D0DEF6;">النتيجـة النـهائيـة</th>
<th style="text-align:center;">{{ $type }}</th>

<th></th>
@php $total = 0; @endphp
@php

    $sub_total = round($Results->sum('total') / $Results->count('subject_id'),2 );
    $total += $sub_total;
@endphp
<th style="text-align: center;">{{ $sub_total }} %</th>
</tr>
</tfoot>

</table>

</div>
</div>
@else

<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لـم يتـم تسليـم النتـائـج حـالياً 
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

@endsection