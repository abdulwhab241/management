@extends('layouts.master')
@section('css')

@section('title')
جدول حصـص المعلمين
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
جدول حصـص المعلمين
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">جدول حصـص المعلمين</li>
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
<a href="{{route('Classes_Teacher.create')}}" class="btn btn-success btn-flat" role="button"
aria-pressed="true">اضافة جدول حصـص المعلمين</a>

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
    <th style="text-align: center;" class="alert-info">اليوم</th>
    <th style="text-align: center;" class="alert-info">الأستاذ</th>
    <th style="text-align: center;" class="alert-info"> الحصـة الأولـى</th>
    <th style="text-align: center;" class="alert-info"> الحصـة الثـانيـة</th>
    <th style="text-align: center;" class="alert-info"> الحصـة الثـالثـة</th>
    <th style="text-align: center;" class="alert-info"> الحصـة الرابعـة</th>
    <th style="text-align: center;" class="alert-info">  الحصـة الخـامسـة</th>
    <th style="text-align: center;" class="alert-info">  الحصـة السـادسـة</th>
    <th style="text-align: center;" class="alert-info">  الحصـة السـابعـة</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    @foreach ($teacher_classes as $TeacherClass)
        <tr>
        
            <td>{{ $TeacherClass->day }}</td>
            <td>{{ $TeacherClass->teacher->name }}</td>
            <td>{{ $TeacherClass->first }}</td>
            <td>{{ $TeacherClass->second }}</td>
            <td>{{ $TeacherClass->third }}</td>
            <td>{{ $TeacherClass->fourth }}</td>
            <td>{{ $TeacherClass->fifth }}</td>
            <td>{{ $TeacherClass->sixth }}</td>
            <td>{{ $TeacherClass->seventh }}</td>
            <td>{{ $TeacherClass->create_by }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('Classes_Teacher.edit',$TeacherClass->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" style="margin: 3px;" data-target="#delete{{ $TeacherClass->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>


<div class="modal fade" id="delete{{$TeacherClass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Classes_Teacher.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف جدول حصـص المعلـم</h5>
            
            </div>
            <div class="modal-body">
                <p>  هل انت متاكد من عملية حذف بيانـات جدول حصـص الأستاذ  </p>
                <input type="hidden" name="id"  value="{{$TeacherClass->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$TeacherClass->teacher->name}}"
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

<div class="footer">
    <a href="{{ route('TeacherClasses.print') }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
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