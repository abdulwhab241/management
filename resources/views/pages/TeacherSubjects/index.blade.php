@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة مواد المعلمين
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة مواد المعلمين
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة مواد المعلمين</li>
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
<a href="{{route('TeacherSubjects.create')}}" class="btn btn-success btn-flat" role="button" 
aria-pressed="true">اضافة مادة لمعلم</a>
<br><br>
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
<th style="text-align: center;" class="alert-info">أسم المعلم</th>
<th style="text-align: center;" class="alert-info">المادة</th>
<th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach($TeacherSubjects as $subject)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$subject->teacher->name}}</td>
<td>{{$subject->subject->name}}</td>

<td>{{ $subject->create_by }}</td>
    <td>
        <div class="btn-group">
        <a href="{{route('TeacherSubjects.edit',$subject->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" title="تعديل" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="حذف"><i class="fa fa-trash"></i></button>
        </div>
    </td>
</tr>


<div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('TeacherSubjects.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مادة المعلم</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف مادة المعلم </p>
                <input type="hidden" name="id"  value="{{$subject->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$subject->teacher->name}}"
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

<!-- row closed -->
</section>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection