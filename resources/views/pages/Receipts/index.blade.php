@extends('layouts.master')
@section('css')
    
@section('title')
    سندات القبض
@stop
@endsection
{{-- @section('page-header')
  <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  سندات القبض</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسيـة</a></li>
                <li class="breadcrumb-item active"> سندات القبض</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
   سندات القبض
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        سندات القبض
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    
    <li class="active">سندات القبض</li>
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
    <a href="{{route('Receipts.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
    aria-pressed="true">اضافة سنـد تسديـد </a>
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
            <th style="text-align: center;" class="alert-info">الاسم</th>
            <th style="text-align: center;" class="alert-info">المبلغ</th>
            <th style="text-align: center;" class="alert-info">البيان</th>
            <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
            <th style="text-align: center;" class="alert-warning">العمليات</th>
        </tr>
    </thead>
    <tbody>
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