@extends('layouts.master')
@section('css')
    
@section('title')
    قـائمـة المتخـرجيـن
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        قـائمـة المتخـرجيـن  <i class="fas fa-user-graduate"></i>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    
    <li class="active">قـائمـة المتخـرجيـن</li>
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
    <a href="{{route('Graduated.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
    aria-pressed="true">اضافة تخرج جديـد </a>
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
            <th style="text-align: center;" class="alert-info">#</th>
            <th style="text-align: center;" class="alert-info">أسـم الطـالـب</th>
            <th style="text-align: center;" class="alert-info">النـوع</th>
            <th style="text-align: center;" class="alert-info">المرحلـة الدراسيـة</th>
            <th style="text-align: center;" class="alert-info">الصـف الدراسـي</th>
            <th style="text-align: center;" class="alert-success"> تـاريـخ التـخرج</th>
            <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
            <th style="text-align: center;" class="alert-warning">العمليات</th>
        </tr>
    </thead>
    <tbody>

        @foreach($students as $student)
        <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{$student->name}}</td>

        <td>{{$student->gender->name}}</td>
        <td>{{$student->grade->name}}</td>
        <td>{{$student->classroom->name_class}}</td>
        <td>{{$student->deleted_at->diffForHumans()}}</td>
        <td>{{ $student->create_by }}</td>
            <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="ارجاع الطالب">ارجاع الطالب</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="حذف الطالب المتخرج">حذف الطالب</button>

            </td>
        </tr>
    @include('pages.Students.Graduated.return')
    @include('pages.Students.Graduated.Delete')
    @endforeach
</table>

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