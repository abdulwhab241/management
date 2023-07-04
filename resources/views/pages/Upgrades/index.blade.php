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
<a class="btn btn-success btn-flat md-4" href="{{route('Upgrades.create')}}">
    إضافة ترقيـة </a>

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
    <th style="text-align: center; background-color: #A8DBFA;" >#</th>
    <th style="text-align: center; background-color: #A8DBFA;" >أسـم الطـالـب \ الطـالبـة</th>
    <th style="text-align: center; background-color: #A8DBFA;" >المرحلة الدراسية السابقة</th>
    <th style="text-align: center; background-color: #A8DBFA;" >السنة الدراسية</th>
    <th style="text-align: center; background-color: #A8DBFA;" >الصف الدراسي السابق</th>
    <th style="text-align: center; background-color: #E7EEFB;">المرحلة الدراسية الحالي</th>
    <th style="text-align: center; background-color: #E7EEFB;">السنة الدراسية الحالية</th>
    <th style="text-align: center; background-color: #E7EEFB;">الصف الدراسي الحالي</th>
    <th style="text-align: center; background-color: #E7EEFB;"> تـم الترقيـة بواسطـة</th>
    <th style="text-align: center; background-color: #FEC868;">العمليات</th>
</tr>
</thead>
<tbody>

@foreach($promotions as $promotion)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td scope="row">{{$promotion->student->name}}</td>
    <td scope="row">{{$promotion->f_grade->name}}</td>
    <td scope="row">{{$promotion->academic_year}}</td>
    <td scope="row">{{$promotion->f_classroom->name_class}}</td>

    <td>{{$promotion->t_grade->name}}</td>
    <td>{{$promotion->academic_year_new}}</td>
    <td>{{$promotion->t_classroom->name_class}}</td>

    <td>{{$promotion->create_by}}</td>
    <td>
        <div class="btn-group">
            <button type="button" class="btn btn-info btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#Delete_one{{ $promotion->id }}" title="إرجاع الطالب"><i class="fa fa-user"></i></button>
        </div>
    </td>
</tr>
@include('pages.Upgrades.Delete_all')
@include('pages.Upgrades.Delete_one')
@endforeach

</tbody>
</tbody>
</table>
@isset($promotion)
<div class="footer">
<button type="button" 
class="btn btn-warning md-4 btn-block"
style="margin: 10px; padding:5px;" data-toggle="modal" data-target="#Delete_all">
    إرجـاع الكل
</button>
</div>
@endisset

</div>

<div class="footer">
    <a href="{{ route('promotion.print') }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
        <i class="fa fa-print" aria-hidden="true"></i>  طبـاعـة  </a>
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