@extends('layouts.master')
@section('css')

@section('title')
اضافة تحـضيـر
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة تحـضيـر
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('TeacherAttendance.index')}}"><i class="fa fa-pencil-square-o"></i> قائمـة الحضـور والغـيـاب </a></li>
<li class="active">اضافة تحـضيـر</li>
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

<form class="form-horizontal"  action="{{ route('TeacherAttendance.store') }}" method="post">
    @csrf
    <div class="box-body">

        <div class="row">
            <div class="col-md-4"> 
                <label >أسـم الطـالـب</label>
                <select class="form-control select2" style="width: 100%;" name="Student_id">
                    <option selected disabled>أختـر من القائمة...</option>
                @foreach ($students as $student)
                <option value="{{$student->student_id}}">{{$student->student->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4"> 
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
            <div class="col-md-4">
                <label >الـحالـة</label>
                <select class="form-control select2" style="width: 100%;" name="Attendance">
                    <option selected disabled>أختـر من القائمة...</option>
                    <option value="حـاضـر" required>حـاضـر</option>
                    <option value="غـائـب">غـائـب</option>
                </select>
            </div>

        </div><br>

    </div>
    <div class="modal-footer">
        <button type="submit"
            class="btn btn-info btn-block">تـأكيـد</button>
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