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
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الطـلاب</li>
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

@if (session('status'))
<div class="alert alert-danger">
    <ul>
        <li>{{ session('status') }}</li>
    </ul>
</div>
@endif
<div class="box-header">
    
    <h4 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h4>
</div>

<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>

    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">أسم الطالب</th>
    <th style="text-align: center;" class="alert-info"> النوع</th>
    <th style="text-align: center;" class="alert-info">المرحلة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
    <th style="text-align: center;" class="alert-info"> الشعـبة</th>
    <th style="text-align: center;" class="alert-success"> العمليـات</th>

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
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#attendance{{ $student->id }}" title="تحضـير"><i class="fa fa-pencil-square-o"></i></button>    
            </td>
        </tr>


<!-- add_modal_class -->
<div class="modal fade" id="attendance{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    تحضـير الطـالـب
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('attendance') }}" method="POST">
@csrf

<div class="box-body">
    <div class="row">
        <div class="col-md-4"> 
            <label for="inputEmail4">اليـوم</label>
            <select class="form-control select2" name="Day_id">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="السبت">السبت</option>
                <option value="الاحد">الاحد</option>
                <option value="الاثنين">الاثنين</option>
                <option value="الثلاثاء">الثلاثاء</option>
                <option value="الاربعاء">الاربعاء</option>
            </select>
        </div>
        <div class="col-md-4"> 
            <label for="inputEmail4">أسـم الطـالـب</label>
            <input  type="text" class="form-control"  value="{{$student->name}}" disabled>
        </div>
        <div class="col-md-4">
            <label >الـحالـة</label>
            <select class="form-control select2" name="Attendance">
                <option  selected disabled>أختـر من القائمة...</option>
                <option value="حـاضـر" required>حـاضـر</option>
                <option value="غـايـب">غـائـب</option>
            </select>
        </div>
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

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

<!-- row closed -->
</section>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection