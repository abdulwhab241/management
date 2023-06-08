@extends('layouts.master')
@section('css')

@section('title')
قائمة الحضور والغياب للطلاب
@stop
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الحضور والغياب للطلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">قائمة الحضور والغياب للطلاب</li>
</ol>
</section>
<!-- Main content -->
<section class="content" dir="rtl">

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
<button type="button" class="btn btn-success btn-flat" style="margin: 5px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">
    تحضيـر 
</button>
<br><br>
<div class="box-tools">
    <div class="input-group" style="width: 150px;">
        <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
    </div>
</div>
</div>
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
    <thead>
    <tr>
        <th style="text-align: center;" class="alert-info">#</th>
        <th style="text-align: center;" class="alert-info">اليـوم</th>
        <th style="text-align: center;" class="alert-info">أسـم الطـالـب \ الطـالبـة</th>
        <th style="text-align: center;" class="alert-info">الصـف الـدراسـي</th>
        <th style="text-align: center;" class="alert-info">الشـعبـة</th>
        <th style="text-align: center;" class="alert-info">الحـالـة</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
    </tr>
</thead>
<tbody>
    @foreach($Attendances as $Attendance)
    <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$Attendance->day}}</td>
    <td>{{$Attendance->students->name }} </td>
    <td>{{$Attendance->classroom->name_class}}</td>
    <td >{{$Attendance->section->name_section}}</td>
    <td style=" background-color: #D0DEF6; font-weight:bolder;">{{$Attendance->attendance_status}}</td>
    <td>{{ $Attendance->create_by }}</td>
        <td>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $Attendance->id }}"
            title="تعديل"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Attendance{{ $Attendance->id }}" title="حـذف"><i class="fa fa-trash"></i></button>
        </td>
    </tr>

<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $Attendance->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
        id="exampleModalLabel">
        تعديل التحضيـر
    </h5>
</div>
<div class="modal-body">
    <!-- add_form -->
    <form class="form-horizontal"  action="{{ route('Attendance.update', 'test') }}" method="post">
        {{ method_field('patch') }}
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-4"> 
                    <div class="form-group">
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
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" name="Classroom_id" value="{{$Attendance->classroom_id}}">
                        <input type="hidden" name="Section_id" value="{{$Attendance->section_id}}">
                    <label >أسـم الطـالـب</label>
                    <select class="form-control select2" style="width: 100%;" name="Student_id">
                        <option value="{{ $Attendance->students->id }}">
                            {{ $Attendance->students->name }}
                        </option>
                    </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label >الـحالـة</label>
                    <input id="id" type="hidden" name="id" class="form-control"
                    value="{{ $Attendance->id }}">
                    <select class="form-control select2" style="width: 100%;" name="Attendance">
                        <option >{{$Attendance->attendance_status}}</option>
                        <option value="حـاضـر" required>حـاضـر</option>
                        <option value="غـائـب">غـائـب</option>
                    </select>
                    </div>
                </div>
            </div><br>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger"
                data-dismiss="modal">إغلاق</button>
            <button type="submit"
                class="btn btn-success">تعديل البيانات</button>
        </div>

    </form>

</div>
</div>
</div>
</div>

<!-- delete_modal_Grade -->
<div class="modal fade" id="Delete_Attendance{{ $Attendance->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
        id="exampleModalLabel">
        حذف التحضيـر
    </h5>
    
</div>
<div class="modal-body">
    <form action="{{ route('Attendance.destroy', 'test') }}" method="post">
        {{ method_field('Delete') }}
        @csrf
        <h5 style="font-family: 'Cairo', sans-serif;"> هل انت متاكد من عملية حـذف تحضيـر الطـالـب ؟ </h5>
        <input id="Name" type="text" name="Name"
        class="form-control"
        value="{{ $Attendance->students->name }}"
        disabled>
        <input id="id" type="hidden" name="id" class="form-control"
            value="{{ $Attendance->id }}">
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


<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-success"  role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
إضافة تحضيـر
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Attendance.store') }}" method="POST">
@csrf

<div class="box-body">
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
        <label >الـيوم</label>
        <select class="form-control select2" style="width: 100%;" name="Day_id">
            <option selected disabled>أختـر من القائمة...</option>
            <option value="السبت">السبت</option>
            <option value="الاحد">الاحد</option>
            <option value="الاثنين">الاثنين</option>
            <option value="الثلاثاء">الثلاثاء</option>
            <option value="الاربعاء">الاربعاء</option>
        </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label >أسـم الطـالـب</label>
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Students as $Student)
            <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label >الصـف الـدراسـي</label>
        <select class="form-control select2" style="width: 100%;" name="Classroom_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Classrooms as $Classroom)
                <option value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
            @endforeach
        </select>
        </div>
    </div>

</div><br>
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
        <label >الـشعبـة</label>
        <select class="form-control select2" style="width: 100%;" name="Section_id">
        
        </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <label >الـحالـة</label>
        <select class="form-control select2" style="width: 100%;" name="Attendance">
            <option  selected disabled>أختـر من القائمة...</option>
            <option value="حـاضـر" required>حـاضـر</option>
            <option value="غـايـب">غـائـب</option>
        </select>
        </div>
    </div>

</div><br>
</div>

<div class="modal-footer">
<button type="button" class="btn btn-danger"
data-dismiss="modal">إغلاق</button>
<button type="submit"
class="btn btn-success">حفظ البيانات</button>
</div>

</form>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</section><!-- /.content -->
<!-- end -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection