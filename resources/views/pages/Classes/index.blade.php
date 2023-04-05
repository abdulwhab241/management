@extends('layouts.master')
@section('css')

@section('title')
جدول الحصـص
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
جدول الحصـص
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">جدول الحصـص</li>
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
<a href="{{route('Classes.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة جدول الحصـص</a>

<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
<div class="input-group-btn">
<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>

    <th style="text-align: center;" class="alert-info">اليوم</th>
    <th style="text-align: center;" class="alert-info"> المرحلة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الصـف</th>
    <th style="text-align: center;" class="alert-info">الشعبـة</th>
    <th style="text-align: center;" class="alert-info">الحصـة</th>
    <th style="text-align: center;" class="alert-info"> المـادة</th>
    <th style="text-align: center;" class="alert-info"> الأستـاذ</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    @if (isset($details))

        <?php $List_Classes = $details; ?>
    @else

        <?php $List_Classes = $StudentClasses; ?>
    @endif

        <?php $i = 0; ?>

    @foreach ($List_Classes as $StudentClass)
        <tr>
        
            <td>{{ $StudentClass->day->name }}</td>
            <td>{{ $StudentClass->grade->name }}</td>
            <td>{{ $StudentClass->classroom->name_class }}</td>
            <td>{{ $StudentClass->section->name_section }}</td>
            <td>{{ $StudentClass->schoolClass->name }}</td>
            <td>{{ $StudentClass->subject->name }}</td>
            <td> أ. {{ $StudentClass->teacher->name }}</td>
            <td>{{ $StudentClass->create_by }}</td>
            <td>
                <a href="{{route('Classes.edit',$StudentClass->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $StudentClass->id }}" title="حذف"><i class="fa fa-trash"></i></button>

            </td>
        </tr>


<div class="modal fade" id="delete{{$StudentClass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Classes.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
            </div>
            <div class="modal-body">
                <p>  هل انت متاكد من عملية حذف بيانـات جدول يـوم  </p>
                <input type="hidden" name="id"  value="{{$StudentClass->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$StudentClass->name}}"
                disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
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

<!-- row closed -->
</section>

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection