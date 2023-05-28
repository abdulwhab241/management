@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <h4 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h4>
</div>

<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;">#</th>
    <th style="text-align: center; background-color: #D0DEF6;">أسم الطالب</th>
    <th style="text-align: center; background-color: #D0DEF6;"> النوع</th>
    <th style="text-align: center; background-color: #D0DEF6;">المرحلة الدراسية</th>
    <th style="text-align: center; background-color: #D0DEF6;">الصف الدراسي</th>
    <th style="text-align: center; background-color: #D0DEF6;"> الشعـبة</th>
    <th style="text-align: center; background-color: #D0DEF6;"> العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($students as $student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->gender->name }}</td>
            <td>{{$student->grade->name}}</td>
            <td>{{$student->classroom->name_class}}</td>
            <td style="font-weight: bolder;">{{$student->section->name_section}}</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                data-target="#attendance{{ $student->id }}"
                title="تحضـير">تحضـير</button>
            </td>
        </tr>

<!-- add_modal_Attendance -->
<div class="modal fade" id="attendance{{ $student->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
    id="exampleModalLabel">
     تحضـير الطـالـب <label style="color: rgb(15, 1, 1); font-size:15px; font-weight: bolder;"> {{$student->name}}</label>
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('TeacherAttendance.store') }}" method="post">
    @csrf
    <div class="box-body">
        <div class="row">
            <div class="col-md-6"> 
                <input type="hidden" name="Student_id" value="{{ $student->id }}">
                <input type="hidden" name="Classroom_id" value="{{ $student->classroom_id }}">
                <input type="hidden" name="Section_id" value="{{ $student->section_id }}">
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
            <div class="col-md-6">
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