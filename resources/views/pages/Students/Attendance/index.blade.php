@extends('layouts.master')
@section('css')

@section('title')
بيـانـات المـواظبـة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
بيـانـات المـواظبـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">بيـانـات المـواظبـة</li>
</ol>
</section>


<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    {{-- @if(count($Attendances) > 0) --}}
<div class="box-header">

</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center">

<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" >اليـوم</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الحـالـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > التـاريـخ</th>


</tr>
</thead>
<tbody>
        @foreach ($Attendances as $Student)
        <tr>

            
            <td>{{ $Student->day }}</td>
            <td>{{ $Student->attendance_status }}</td>
            <td>{{ $Student->attendance_date }}</td>
        </tr>

@endforeach
</tbody>
</table>
</div>

</div>
</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')


@endsection