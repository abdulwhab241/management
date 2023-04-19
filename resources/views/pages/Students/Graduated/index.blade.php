{{-- @extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_Graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.list_Graduate') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.list_Graduate') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_Graduate')}} <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr class="alert-success">
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.email')}}</th>
                            <th>{{trans('Students_trans.gender')}}</th>
                            <th>{{trans('Students_trans.Grade')}}</th>
                            <th>{{trans('Students_trans.classrooms')}}</th>
                            <th>{{trans('Students_trans.section')}}</th>
                            <th>{{trans('Students_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->gender->Name}}</td>
                            <td>{{$student->grade->Name}}</td>
                            <td>{{$student->classroom->Name_Class}}</td>
                            <td>{{$student->section->Name_Section}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">ارجاع الطالب</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">حذف الطالب</button>

                                </td>
                            </tr>
                        @include('pages.Students.Graduated.return')
                        @include('pages.Students.Graduated.Delete')
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection --}}

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
            <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="ارجاع الطالب">ارجاع الطالب</button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="حذف الطالب المتخرج">حذف الطالب</button>

            </td>
        </tr>
    @include('pages.Students.Graduated.return')
    @include('pages.Students.Graduated.Delete')
    @endforeach
</table>
{{-- 
    @foreach($receipt_students as $receipt_student)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$receipt_student->student->name}}</td>
        <td>{{ number_format($receipt_student->Debit) }} ريال </td>
        <td>{{$receipt_student->description}}</td>
        <td>{{$receipt_student->create_by}}</td>
            <td>
                <a href="{{route('Receipts.edit',$receipt_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$receipt_student->id}}" ><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    @include('pages.Receipts.Delete')
    @endforeach --}}
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