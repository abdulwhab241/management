@extends('layouts.master')
@section('css')

@section('title')
جدول الحصـص الدراسية للطلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
جدول الحصـص الدراسية للطلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">جدول الحصـص الدراسية للطلاب</li>
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
        <a href="{{route('Classes.create')}}" class="btn btn-success btn-flat" role="button"
        aria-pressed="true">اضافة جدول الحصـص</a>
        <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_student_classes') }}">
            <i class="fas fa-file-download"></i>  
        </a>
    </div>
<br>

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

    <th style="text-align: center;" class="alert-info">اليوم</th>
    <th style="text-align: center;" class="alert-info"> المرحلة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
    <th style="text-align: center;" class="alert-info">الشعبـة</th>
    <th style="text-align: center;" class="alert-info"> الأولـى</th>
    <th style="text-align: center;" class="alert-info"> الثـانيـة</th>
    <th style="text-align: center;" class="alert-info"> الثـالثـة</th>
    <th style="text-align: center;" class="alert-info"> الرابعـة</th>
    <th style="text-align: center;" class="alert-info">  الخـامسـة</th>
    <th style="text-align: center;" class="alert-info">  السـادسـة</th>
    <th style="text-align: center;" class="alert-info">  السـابعـة</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    @foreach ($StudentClasses as $StudentClass)
        <tr>
        
            <td>{{ $StudentClass->day }}</td>
            <td>{{ $StudentClass->grade->name }}</td>
            <td>{{ $StudentClass->classroom->name_class }}</td>
            <td>{{ $StudentClass->section->name_section }}</td>
            <td>{{ $StudentClass->first }}</td>
            <td>{{ $StudentClass->second }}</td>
            <td>{{ $StudentClass->third }}</td>
            <td>{{ $StudentClass->fourth }}</td>
            <td>{{ $StudentClass->fifth }}</td>
            <td>{{ $StudentClass->sixth }}</td>
            <td>{{ $StudentClass->seventh }}</td>
            <td>{{ $StudentClass->create_by }}</td>
            <td>
                <div class="btn-group">
                <a href="{{route('Classes.edit',$StudentClass->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#delete{{ $StudentClass->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>


<div class="modal fade" id="delete{{$StudentClass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Classes.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف جدول الحصص ليوم</h5>
            
            </div>
            <div class="modal-body">
                <p>  هل انت متاكد من عملية حذف بيانـات جدول يـوم  </p>
                <input type="hidden" name="id"  value="{{$StudentClass->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$StudentClass->day}}"
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


</div>
</div>
</div>
</section>

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection