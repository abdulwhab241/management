@extends('layouts.master')
@section('css')

@section('title')
جدول الحصـص
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
جدول الحصـص
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">جدول الحصـص</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    @if(count($StudentClass) > 0)

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center">

<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" >اليوم</th>
    <th style="text-align: center; background-color: #D0DEF6;" >  الأولـى</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الثـانيـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الثـالثـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الرابعـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >  الخـامسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >  السـادسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >  السـابعـة</th>


</tr>
</thead>
<tbody>
        @foreach ($StudentClass as $Student)
        <tr>

            
            <td>{{ $Student->day }}</td>
            <td>{{ $Student->first }}</td>
            <td>{{ $Student->second }}</td>
            <td>{{ $Student->third }}</td>
            <td>{{ $Student->fourth }}</td>
            <td>{{ $Student->fifth }}</td>
            <td>{{ $Student->sixth }}</td>
            <td>{{ $Student->seventh }}</td>
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
            عـذراً لـم يتـم تنـزيـل الجـدول بعـد 
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