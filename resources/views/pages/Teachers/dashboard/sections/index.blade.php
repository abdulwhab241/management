@extends('layouts.master')
@section('css')
    
@section('title')
    الاقسام الدراسية
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        الاقسام الدراسية
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    
    <li class="active">الاقسام الدراسية</li>
    </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-body table-responsive no-padding">
    <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
    <thead>
        <tr>
            <th style="text-align: center;" class="alert-info">#</th>
            <th style="text-align: center;" class="alert-info">المـرحلـة الـدراسيـة</th>
            <th style="text-align: center;" class="alert-info">الصـف الـدراسـي </th>
            <th style="text-align: center;" class="alert-info">الشٌـعبـة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sections as $section)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $section->Grades->name }}</td>
            <td>{{ $section->My_Classes->name_class }}</td>
            <td>{{ $section->name_section }}</td>
        </tr>
    @endforeach
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