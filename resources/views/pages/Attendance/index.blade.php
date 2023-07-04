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
<a href="{{route('Attendance.create')}}" class="btn btn-success btn-flat" role="button" aria-pressed="true">تحضيـر  </a>
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
            <div class="btn-group">
            <a href="{{route('Attendance.edit',$Attendance->id)}}" style="margin: 3px;" title="تعديل" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#Delete_Attendance{{ $Attendance->id }}" title="حـذف"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>


<!-- delete_modal_Grade -->
<div class="modal fade" id="Delete_Attendance{{ $Attendance->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
        id="exampleModalLabel">
        حـذف تحضـير الطـالـب <label style="color: #5686E0; font-weight:bolder; font-size: 20px;">{{ $Attendance->students->name }}</label>
    </h5>
    
</div>
<div class="modal-body">
    <form action="{{ route('Attendance.destroy', 'test') }}" method="post">
        {{ method_field('Delete') }}
        @csrf
        <h5 style="font-family: 'Cairo', sans-serif;"> هل انت متاكد من عملية حـذف تحضيـر الطـالـب ؟ </h5>
        <input id="Name" type="text" name="Name"
        class="form-control" style="text-align: center; font-weight:bolder; font-size: 20px;"
        value="{{ $Attendance->students->name }}"
        disabled>
        <input id="id" type="hidden" name="id" class="form-control"
            value="{{ $Attendance->id }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-outline "
                        data-dismiss="modal">إغلاق</button>
                <button type="submit"
                        class="btn btn-outline">تـأكـيد</button>
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
</section><!-- /.content -->
<!-- end -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection