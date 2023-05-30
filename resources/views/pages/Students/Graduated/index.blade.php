@extends('layouts.master')
@section('css')

@section('title')
قـائمـة المتخـرجيـن
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قـائمـة المتخـرجيـن  <i class="fas fa-user-graduate"></i>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قـائمـة المتخـرجيـن</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="box-header">
<a href="{{route('Graduated.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة تخرج جديـد </a>
<br><br>
<div class="box-tools">
    <div class="input-group" style="width: 150px;">
        <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
    </div>
    </div>
</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
    <tr>
        <th style="text-align: center;" class="alert-info">#</th>
        <th style="text-align: center;" class="alert-info">أسـم الطـالـب</th>
        <th style="text-align: center;" class="alert-info">المرحلـة الدراسيـة</th>
        <th style="text-align: center;" class="alert-info">الصـف الدراسـي</th>
        <th style="text-align: center;" class="alert-info">الشعـبة</th>
        <th style="text-align: center;" class="alert-success"> تـاريـخ التـخرج</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
    </tr>
</thead>
<tbody>

    @foreach($students as $student)
    <tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{$student->student->name}}</td>

    <td>{{$student->grade->name}}</td>
    <td>{{$student->classroom->name_class}}</td>
    <td>{{$student->section->name_section}}</td>
    <td>{{$student->date }}</td>
    <td>{{ $student->create_by }}</td>
        <td>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="إلـغاء تخـرج الطالب">إلـغاء تخـرج الطالب</button>
            {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="حذف الطالب المتخرج">حذف الطالب</button> --}}

        </td>
    </tr>
@include('pages.Students.Graduated.return')
@endforeach
</tbody>
</table>
</div>
</div>


</div>
</div>
</div>
</section>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection