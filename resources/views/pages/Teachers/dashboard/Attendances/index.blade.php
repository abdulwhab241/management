@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الحضـور والغيـاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الحضـور والغيـاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الحضـور والغيـاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">
<a href="{{route('TeacherAttendance.create')}}" class="btn btn-primary btn-flat" role="button"
aria-pressed="true">اضافة تحضـير</a>
<br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div>


<div class="box-body">
<div class="box-body table-responsive no-padding">
<table  id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>
    <th style="text-align: center; background-color: #D0DEF6;" >التـاريـخ</th>
    <th style="text-align: center; background-color: #D0DEF6;" >اليـوم</th>
    <th style="text-align: center; background-color: #D0DEF6;" >أسـم الطـالـب \ الطـالبـة</th>
    <th style="text-align: center; background-color: #D0DEF6;" >الـصـف الـدراسي</th>
    <th style="text-align: center; background-color: #D0DEF6;" >الـشـعبـة</th>
    <th style="text-align: center;" class="alert-info">الحـالـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>

</tr>
</thead>
<tbody>
@foreach($attendances as $attendance)
    <tr>
        <td>{{$attendance->attendance_date}}</td>
        <td>{{$attendance->day}}</td>
        <td>{{$attendance->students->name}}</td>
        <td>{{$attendance->classroom->name_class}}</td>
        <td>{{$attendance->section->name_section}}</td>
        <td>{{$attendance->attendance_status}}</td>
        <td>
            <div class="btn-group">
            <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $attendance->id }}"
            title="تعديل"><i class="fa fa-edit"></i></button>
            <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Attendance{{ $attendance->id }}" title="حـذف"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>

<!-- edit_modal_Attendance -->
<div class="modal fade" id="edit{{ $attendance->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
تعديل تحضـير الطـالـب <label style="color: rgb(15, 1, 1); font-size:15px; font-weight: bolder;"> {{$attendance->students->name}}</label>
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('TeacherAttendance.update', 'test') }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-4"> 
            <label >أسـم الطـالـب</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option value="{{ $attendance->student_id }}">
                    {{ $attendance->students->name }}
                </option>
                @foreach ($students as $student)
                <option value="{{$student->student_id}}">{{$student->student->name}}</option>
                @endforeach
                <option value="السبت">السبت</option>
                <option value="الاحد">الاحد</option>
                <option value="الاثنين">الاثنين</option>
                <option value="الثلاثاء">الثلاثاء</option>
                <option value="الاربعاء">الاربعاء</option>
            </select>
        </div>
        <div class="col-md-4"> 
            <label >الـيوم</label>
            <select class="form-control select2" style="width: 100%;" name="Day_id">
                <option >{{$attendance->day}}</option>
                <option value="السبت">السبت</option>
                <option value="الاحد">الاحد</option>
                <option value="الاثنين">الاثنين</option>
                <option value="الثلاثاء">الثلاثاء</option>
                <option value="الاربعاء">الاربعاء</option>
            </select>
        </div>
        <div class="col-md-4">
            <label >الـحالـة</label>
            <input id="id" type="hidden" name="id" class="form-control"
            value="{{ $attendance->id }}">
            <select class="form-control select2" style="width: 100%;" name="Attendance">
                <option >{{$attendance->attendance_status}}</option>
                <option value="حـاضـر" required>حـاضـر</option>
                <option value="غـائـب">غـائـب</option>
            </select>
        </div>

    </div><br>

</div>
<div class="modal-footer">
    <button type="submit"
        class="btn btn-info btn-block">تعديل البيانات</button>
</div>

</form>

</div>
</div>
</div>
</div>

<!-- delete_modal_Attendance -->
<div class="modal fade" id="Delete_Attendance{{ $attendance->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
    id="exampleModalLabel">
    حـذف التحضـير  
</h5>

</div>
<div class="modal-body">
<form action="{{ route('TeacherAttendance.destroy', 'test') }}" method="post">
    {{ method_field('Delete') }}
    @csrf
    <h5 style="font-family: 'Cairo', sans-serif;"> هل انت متاكد من عملية حـذف تحضيـر الطـالـب ؟ </h5>
    <input id="Name" type="text" name="Name"
    class="form-control"
    value="{{ $attendance->students->name }}"
    disabled>
    <input id="id" type="hidden" name="id" class="form-control"
        value="{{ $attendance->id }}">
        <div class="modal-footer">
            <button type="button" class="btn btn-outline "
                    data-dismiss="modal">إغلاق</button>
            <button type="submit"
                    class="btn btn-outline">حذف البيانات</button>
        </div>
</form>
</div>
</div>
</div>
</div>



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