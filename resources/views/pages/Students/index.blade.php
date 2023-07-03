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
<div class="box-header">
    <div class="box-body">
        <a href="{{route('Students.create')}}" class="btn btn-success btn-flat" role="button" 
        aria-pressed="true">اضافة طـالـب</a>
        <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_students') }}">
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
    <th style="text-align: center;" class="alert-info">أسـم الطـالـب \ الطـالبـة</th>
    <th style="text-align: center;" class="alert-info"> الجنـس</th>
    <th style="text-align: center;" class="alert-info"> الـمؤهـل</th>
    <th style="text-align: center;" class="alert-info">المرحلة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
    <th style="text-align: center;" class="alert-info"> الشعـبة</th>
    <th style="text-align: center;" class="alert-info">أسـم الأب </th>
    <th style="text-align: center;"  class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning"> العمليات</th>

</tr>
</thead>
<tbody>

    <?php $i = 0; ?>
    @foreach ($Students as $Student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Student->name }}</td>
            <td>{{ $Student->gender->name }}</td>
            <td>{{ $Student->qualification }}</td>
            <td>{{$Student->grade->name}}</td>
            <td>{{$Student->classroom->name_class}}</td>
            <td style="font-weight: bolder;">{{$Student->section->name_section}}</td>
            <td>{{ $Student->father_name }}</td>
            <td > {{ $Student->create_by }}</td>
            <td>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-navy dropdown-toggle" data-toggle="dropdown">العمليـات <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="{{route('Students.show',$Student->id)}}" >عـرض بيـانـات الطـالب</a></li>
                    <li><a href="{{route('Students.edit',$Student->id)}}">تـعديـل</a></li>
                    <li><a data-toggle="modal" data-target="#delete_Student{{ $Student->id }}">حـذف</a></li>
                </ul>
                </div><!-- /btn-group -->
            </td>
        </tr>


<div class="modal fade" id="delete_Student{{$Student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Students.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف طـالـب</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف الطـالـب </p>
                <input type="hidden" name="id"  value="{{$Student->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$Student->name}}"
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
    <a href="{{ route('print') }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
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