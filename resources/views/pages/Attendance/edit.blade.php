@extends('layouts.master')
@section('css')
@section('title')
تعـديـل تحضيـر
@stop
@endsection
@section('page-header')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعـديـل تحضيـر الطـالـب  <label style="color: #5686E0">{{ $Attendance->students->name }}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Attendance.index')}}"><i class="fa fa-pencil-square-o"></i> قائمـة الحضـور والغيـاب </a></li>
<li class="active">تعـديـل تحضيـر طـالـب </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{ session()->get('error') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


<form class="form-horizontal"  action="{{ route('Attendance.update', 'test') }}" method="post">
{{ method_field('patch') }}
@csrf

<div class="box-body">
<div class="row">
<div class="col-md-4"> 
    <label >الـيوم</label>
    <select class="form-control select2" style="width: 100%;" name="Day_id">
        <option >{{$Attendance->day}}</option>
        <option value="السبت">السبت</option>
        <option value="الاحد">الاحد</option>
        <option value="الاثنين">الاثنين</option>
        <option value="الثلاثاء">الثلاثاء</option>
        <option value="الاربعاء">الاربعاء</option>
    </select>

</div>

<div class="col-md-4">
    <label >أسـم الطـالـب</label>
    <select class="form-control select2" style="width: 100%;" name="Student_id">
        <option value="{{ $Attendance->students->id }}">
            {{ $Attendance->students->name }}
        </option>
        @foreach ($Students as $Student)
        <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
        @endforeach
    </select>

</div>

<div class="col-md-4">
    <label >الـحالـة</label>
    <input type="hidden" name="id" value="{{$Attendance->id}}">
    <select class="form-control select2" style="width: 100%;" name="Attendance">
        <option >{{$Attendance->attendance_status}}</option>
        <option value="حـاضـر" required>حـاضـر</option>
        <option value="غـايـب">غـائـب</option>
    </select>
</div>


</div><br>

</div>

<div class="modal-footer">

<button type="submit"
class="btn btn-success btn-block">تـأكيـد</button>
</div>

</form>

</div><!-- /.box-header -->
</div>
</div>
</section><!-- /.content -->


@endsection
@section('js')
@toastr_js
@toastr_render

@endsection