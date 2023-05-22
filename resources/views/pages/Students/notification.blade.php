@extends('layouts.master')
@section('css')

@section('title')
الإشـعـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
الإشـعـارات 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">الإشـعـارات</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

    <div class="box-body table-responsive no-padding">

        <table class="table table-hover" style="width:100%; text-align: center;">
            <thead>
                <tr>
                    <th style="text-align: center; background-color: #D0DEF6;" >أسم الطالب</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >النوع</th>
                    <th style="text-align: center; background-color: #D0DEF6;" > المرحلة الدراسية</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >الصف الدراسي</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >الشعـبة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >أسم الاب</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >الوظيفة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >العنوان</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >رقم الهاتف</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >انشـئ بواسطـة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >تاريخ الإنشاء</th>
                </tr>
            </thead>
            <tbody>
        
                <tr>
                    <td>{{ $Students->name }}</td>
                    <td>{{ $Students->gender->name }}</td>
                    <td>{{$Students->grade->name}}</td>
                    <td>{{$Students->classroom->name_class}}</td>
                    <td>{{$Students->section->name_section}}</td>
                    <td>{{$Students->father_name}}</td>
                    <td>{{$Students->father_job}}</td>
                    <td>{{$Students->address}}</td>
                    <td>{{$Students->father_phone}}</td>
                    <td>{{$Students->create_by}}</td>
                    <td>{{$Students->created_at->diffForHumans()}}</td>
                    
                </tr>
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
