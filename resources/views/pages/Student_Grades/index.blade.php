@extends('layouts.master')
@section('css')

@section('title')
كشـف درجـات الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
كشـف درجـات الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">كشـف درجـات الطـلاب</li>
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

<div class="box-body">
    <a href="{{route('Student_Grades.create')}}" class="btn btn-success btn-flat" role="button"
aria-pressed="true">اضافة كشـف الـدرجـات</a>
    <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_student_grades') }}">
        <i class="fas fa-file-download"></i>  
    </a>
</div>
<br>
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
<th style="text-align: center;" class="alert-info">الفـصل الدراسي</th>
<th style="text-align: center;" class="alert-info">الـصـف الـدراسي</th>
<th style="text-align: center;" class="alert-info">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center;" class="alert-info">الأستـاذ</th>
<th style="text-align: center;" class="alert-info">المادة</th>
<th style="text-align: center; background-color: yellow; font-weight:bolder;" >محصـلـة شهـر</th>
<th style="text-align: center; background-color: #D0DEF6;" colspan="6">الـدرجـات</th>
<th style="text-align: center; background-color: #E7EEFB; font-weight:bolder;">تحريري</th>
<th style="text-align: center; background-color: #FFC0D6; font-weight:bolder;"> المحصـلة</th>

<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach($Student_Grades as $Student_Grade)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$Student_Grade->semester->name}}</td>
<td>{{$Student_Grade->student->classroom->name_class}}</td>
<td>{{$Student_Grade->student->name}}</td>
<td>{{$Student_Grade->teacher->name}}</td>
<td>{{$Student_Grade->subject->name}}</td>
<td style="background-color: yellow; font-weight:bolder;">{{ $Student_Grade->month->name }}</td>
<th style="background-color: #D0DEF6;">واجبـات</th>
<td>{{$Student_Grade->homework }}</td>
<th style="background-color: #D0DEF6;">شفهـي</th>
<td>{{$Student_Grade->verbal}}</td>
<th style="background-color: #D0DEF6;">مـواظبـة</th>
<td>{{ $Student_Grade->attendance }}</td>
<td style="background-color: #E7EEFB; font-weight:bolder;">{{ $Student_Grade->result }}</td>
<td style="background-color: #FFC0D6; font-weight:bolder;">{{ $Student_Grade->total }}</td>


<td>
    <div class="input-group-btn">
        <button type="button" class="btn btn-navy dropdown-toggle" data-toggle="dropdown">العمليـات <span class="fa fa-caret-down"></span></button>
        <ul class="dropdown-menu">
        <li><a href="{{route('Student_Grades.edit',$Student_Grade->id)}}">تـعديـل</a></li>
        <li><a data-toggle="modal" data-target="#delete_Student_Grades{{ $Student_Grade->id }}">حـذف</a></li>
    </ul>
    </div><!-- /btn-group -->
</td>
</tr>


<div class="modal fade" id="delete_Student_Grades{{$Student_Grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
    <form action="{{route('Student_Grades.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف محصـلـة الطـالـب</h5>
        
        </div>
        <div class="modal-body">
            <p> هل انت متاكد من عملية حذف محصلـة الطـالـب </p>
            <input type="hidden" name="id"  value="{{$Student_Grade->id}}">
            <input  type="text" style="font-weight: bolder; font-size:20px;"
            name="Name_Section"
            class="form-control"
            value="{{$Student_Grade->student->name}}"
            disabled>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline"
                    data-dismiss="modal">إغلاق</button>
            <button type="submit"
                    class="btn btn-outline">حـذف</button>
        </div>
    </div>
    </form>
</div>
</div>
@endforeach
</tbody>
</table>

<div class="footer">
    <a href="{{ route('StudentGrades.print') }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
        <i class="fa fa-print" aria-hidden="true"></i>  طبـاعـة  </a>
</div>

</div>
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