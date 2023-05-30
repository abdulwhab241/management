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
<li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمـة الطـلاب </a></li>
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
    <table  class="table" style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center;">#</th>
    <th style="text-align: center;">اليوم</th>
    <th style="text-align: center;"> الأستاذ</th>
    <th style="text-align: center;">الحصـة الأولـى</th>
    <th style="text-align: center;">الحصـة الثـانيـة</th>
    <th style="text-align: center;"> الحصـة الثـالثـة</th>
    <th style="text-align: center;">الحصـة الرابعـة </th>
    <th style="text-align: center;"> الحصـة الخـامسـة</th>
    <th style="text-align: center;"> الحصـة السـادسـة</th>
    <th style="text-align: center;"> الحصـة السـابعـة</th>

</tr>
</thead>
<tbody>

    <?php $i = 0; ?>
    @foreach ($TeacherClasses as $Student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Student->day }}</td>
            <td>{{ $Student->teacher->name }}</td>
            <td>{{$Student->first}}</td>
            <td>{{$Student->second}}</td>
            <td>{{$Student->third}}</td>
            <td>{{ $Student->fourth }}</td>
            <td>{{ $Student->fifth }}</td>
            <td > {{ $Student->sixth }}</td>
            <td > {{ $Student->seventh }}</td>
        </tr>


@endforeach
</tbody>
</table>

</div>
</div>

<div class="footer">
    <button class="btn btn-primary  pull-left" id="print_Button" onclick="printDiv()"> 
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