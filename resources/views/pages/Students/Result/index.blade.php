@extends('layouts.master')
@section('css')

@section('title')
النـتائـج
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
النـتائـج
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">النـتائـج</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    @if(count($Result) > 0)
<div class="box-header">

</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<caption style="background-color: #99E2FE; font-weight: bolder; color:red; margin: 5px; padding:5px;">
    <p>
        الصـف الدراسـي : {{auth()->user()->classroom->name_class}}     |     <span> الشـعبـة :  {{ auth()->user()->section->name_section }}</span>
    </p>
</caption>
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" >المـادة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الـدرجـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >التقـديـر</th>
</tr>
</thead>
<tbody>
        @foreach ($Result as $Student)
        <tr>
            <td>{{ $Student->exam->subject->name }}</td>
            <td>{{$Student->marks_obtained}}</td>
            <td>{{$Student->appreciation}}</td>
        </tr>

@endforeach
</tbody>
</table>
</div>
@else

<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            لا يـوجـد نتـائـج لعـرضـها 
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