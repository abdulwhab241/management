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

<div class="box-header">

</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" >المـادة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الـدرجـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >التقـديـر</th>
    {{-- <th style="text-align: center; background-color: #D0DEF6;" >الأستـاذ</th> --}}
    {{-- <th style="text-align: center; background-color: #D0DEF6;" >الحصـة الثـالثـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >الحصـة الرابعـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الحصـة الخـامسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الحصـة السـادسـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" > الحصـة السـابعـة</th> --}}


</tr>
</thead>
<tbody>
        @foreach ($Result as $Student)
        <tr>

            
            {{-- <td>{{ $Student->day }}</td>
            <td>{{ $Student->first }}</td>
            <td>{{ $Student->second }}</td>
            <td>{{ $Student->third }}</td> --}}
            <td>{{ $Student->exam->subject->name }}</td>
            <td>{{$Student->marks_obtained}}</td>
            <td>{{$Student->appreciation}}</td>
            {{-- <td>{{ $Student->fourth }}</td>
            <td>{{ $Student->fifth }}</td>
            <td>{{ $Student->sixth }}</td>
            <td>{{ $Student->seventh }}</td> --}}
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
@toastr_js
@toastr_render

@endsection