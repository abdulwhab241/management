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
    نتيجـة          {{ $Results->My_Classes->name_class }} , الـشـعبـة: {{ $Results->name_section }} 
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
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
        <caption style="font-weight: bolder; text-align:center;">
            نتيجـة          {{ $Results->My_Classes->name_class }} , الـشـعبـة: {{ $Results->name_section }} 
        </caption>
<thead>
<tr>

    <th style="text-align: center;">#</th>
    <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة </th>
    <th style="text-align: center;  background-color: #D0DEF6;" > المـادة</th>
    <th style="text-align: center;  background-color: yellow; font-weight:bolder;" >نتيـجـة إختبـار شهـر </th>
    <th style="text-align: center;  background-color: #D0DEF6;" >الدرجـة التي حصـل عليـها </th>
    <th style="text-align: center;  background-color: #D0DEF6;" >التقـديـر </th>
</tr>
</thead>
<tbody>

    <?php $i = 0; ?>
    @foreach ($Results->Results as $Result)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{$Result->student->name}}</td>
            <td>{{$Result->exam->subject->name}}</td>
            <td style="background-color: yellow; font-weight:bolder;">{{$Result->result_name}}</td>
            <td>{{$Result->marks_obtained}}</td>
            <td style="font-weight: bolder; background-color: #D0DEF6;">{{$Result->appreciation}}</td>
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