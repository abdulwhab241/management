@extends('layouts.master')
@section('css')

@section('title')
قائمة الأختبـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قائمة الأختبـارات
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الأختبـارات</li>
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
<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#exampleModal">
اضافة إختبـار
</button>
<br><br>
</div>

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>
<th style="text-align: center; background-color: yellow; font-weight:bolder;" >أختـبار شهـر</th>
<th style="text-align: center;  background-color: #D0DEF6;" > المـادة</th>
<th style="text-align: center;  background-color: #D0DEF6;" >الصـف الدراسـي </th>
<th style="text-align: center;  background-color: #D0DEF6;" >الأستـاذ </th>
<th style="text-align: center; background-color: #D0DEF6;">الـدرجـة</th>
<th style="text-align: center;" class="alert-warning">العمليـات</th>

</tr>
</thead>
<tbody>

@foreach($exams as $exam)
    <tr>
        <td style="background-color: yellow; font-weight:bolder;">{{ $exam->month->name }}</td>
        <td>{{$exam->subject->name}}</td>
        <td>{{$exam->classroom->name_class}}</td>
        <td>{{$exam->teacher->name}}</td>
        <td>{{$exam->total_marks}}</td>
        <td>
            <div class="btn-group">
            <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $exam->id }}"
            title="تعديل"><i class="fa fa-edit"></i></button>
            <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Exam{{ $exam->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>

    
    <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $exam->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
تعديل إختبـار {{$exam->subject->name}}
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('TeacherExams.update', 'test') }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">
<div class="row">

    <div class="col-md-6"> 
        <label>الصـف الدراسي</label>
        <input id="id" type="hidden" name="id" class="form-control"
        value="{{ $exam->id }}">
        <select class="form-control select2" style="width: 100%;" name="Classroom_id">
            <option value="{{ $exam->classroom->id }}">
                {{ $exam->classroom->name_class }}
            </option>
            @foreach ($Classrooms as $Classroom)
                <option value="{{  $Classroom->My_Classes->id }}">
                    {{  $Classroom->My_Classes->name_class }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6"> 
        <label>المـادة</label>
        <select class="form-control select2" style="width: 100%;" name="Subject_id">
            <option value="{{ $exam->subject->id }}">
                {{ $exam->subject->name }}
            </option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject->subject_id }}">
                    {{ $subject->subject->name }}
                </option>
            @endforeach
        </select>
    </div>

</div><br>

<div class="row">

    <div class="col-md-6"> 
        <label>أختـبار شـهر</label>
        <select class="form-control select2" style="width: 100%;" name="Exam_Date">
        <option value="{{ $exam->month_id }}"> {{ $exam->month->name }} </option>
        @foreach ($Months as $Month)
            <option value="{{ $Month->id }}">
            {{ $Month->name }}
            </option>
        @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>الـدرجـة</label>
        <input type="number" value="{{ $exam->total_marks }}" name="Total" class="form-control">
    </div>
</div><br>

</div>
<div class="modal-footer">
<button type="submit"
class="btn btn-info btn-block">تـعديـل البيانات</button>
</div>

</form>

</div>
</div>
</div>
</div>

<!-- Delete modal -->
<div class="modal fade" id="delete_Exam{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<form action="{{route('TeacherExams.destroy',$exam->id)}}" method="post">
{{method_field('delete')}}
{{csrf_field()}}
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف إختبـار</h5>

</div>
<div class="modal-body">
    <p> هل انت متاكد من عملية حذف إختبـار مـادة </p>
    <input type="hidden" name="id"  value="{{$exam->id}}">
    <input  type="text" style="font-weight: bolder; font-size:20px;"
    name="Name_Section"
    class="form-control"
    value="{{$exam->subject->name}}"
    disabled>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline"
            data-dismiss="modal">إغلاق</button>
    <button type="submit"
            class="btn btn-outline">حذف البيانات</button>
</div>
</div>
</form>
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
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
اضافة إختبـار
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('TeacherExams.store') }}" method="POST">
@csrf

<div class="box-body">
<div class="row">

    <div class="col-md-6"> 
        <label>الصـف الدراسي</label>
        <select class="form-control select2" style="width: 100%;" name="Classroom_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Classrooms as $Classroom)
                <option  value="{{ $Classroom->My_Classes->id }}" >{{ $Classroom->My_Classes->name_class }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6"> 
        <label>المـادة</label>
        <select class="form-control select2" style="width: 100%;" name="Subject_id">
            <option  selected disabled>حدد المادة الدراسية...</option>
            @foreach ($subjects as $subject)
                <option  value="{{ $subject->subject_id }}" >{{ $subject->subject->name }}</option>
            @endforeach
        </select>
    </div>

</div><br>

<div class="row">
    <div class="col-md-6"> 
        <label>أختـبار شـهر</label>
        <select class="form-control select2" style="width: 100%;" name="Exam_Date">
        <option  selected disabled>أختـر من القائمة...</option>
        @foreach ($Months as $Month)
            <option value="{{ $Month->id }}">
            {{ $Month->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>الـدرجـة</label>
        <input type="number" value="{{ old('Total') }}" name="Total" class="form-control">
    </div>
</div><br>

</div>

<div class="modal-footer">
<button type="submit" class="btn btn-info btn-block">حفظ البيانات</button>
</div>


</form>
</div>
</div>
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