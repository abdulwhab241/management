@extends('layouts.master')
@section('css')

@section('title')
قائمة الترقيات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قائمة الترقيات
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الترقيات</li>
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
<a class="btn btn-success btn-flat" style="padding:5px; margin: 5px;" href="{{route('Upgrades.create')}}">
    إضافة ترقيـة جـديـدة</a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
إرجـاع الكل
</button>
<br>
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
    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">أسـم الطالـب</th>
    <th style="text-align: center;" class="alert-danger">المرحلة الدراسية السابقة</th>
    <th style="text-align: center;" class="alert-danger">السنة الدراسية</th>
    <th style="text-align: center;" class="alert-danger">الصف الدراسي السابق</th>
    <th style="text-align: center;" class="alert-danger">القسم الدراسي السابق</th>
    <th style="text-align: center;" class="alert-success">المرحلة الدراسية الحالي</th>
    <th style="text-align: center;" class="alert-success">السنة الدراسية الحالية</th>
    <th style="text-align: center;" class="alert-success">الصف الدراسي الحالي</th>
    <th style="text-align: center;" class="alert-success">القسم الدراسي الحالي</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>

@foreach($promotions as $promotion)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{$promotion->student->name}}</td>
    <td>{{$promotion->f_grade->name}}</td>
    <td>{{$promotion->academic_year}}</td>
    <td>{{$promotion->f_classroom->name_class}}</td>
    <td>{{$promotion->f_section->name_section}}</td>
    <td>{{$promotion->t_grade->name}}</td>
    <td>{{$promotion->academic_year_new}}</td>
    <td>{{$promotion->t_classroom->name_class}}</td>
    <td>{{$promotion->t_section->name_section}}</td>
    <td>{{$promotion->create_by}}</td>
    <td>

        <button type="button" class="btn btn-outline-danger btn-sm"
                data-toggle="modal"
                data-target="#Delete_one{{ $promotion->id }}"
                >إرجاع الطالب</button>
                <button type="button" class="btn btn-outline-success btn-sm"
                data-toggle="modal"
                data-target="#"
                >تخرج الطالب</button>
    </td>
</tr>
@include('pages.Upgrades.Delete_all')
@include('pages.Upgrades.Delete_one')
@endforeach

</tbody>
</tbody>
</table>
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