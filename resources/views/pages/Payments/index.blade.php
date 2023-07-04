@extends('layouts.master')
@section('css')

@section('title')
سندات الصرف
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    سندات الصرف
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">سندات الصرف</li>
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
        <a href="{{route('Payments.create')}}" class="btn btn-success btn-flat" role="button"
        aria-pressed="true">اضافة سنـد صـرف</a>
        <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_payments') }}">
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
        <th style="text-align: center;" class="alert-info">المبلغ</th>
        <th style="text-align: center;" class="alert-info">البيان</th>
        <th style="text-align: center;" class="alert-info">رصـيد الطـالـب</th>
        <th style="text-align: center;" class="alert-info">تاريخ الصرف</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
    </tr>
</thead>
<tbody>

    @foreach($payment_students as $payment_student)
    <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$payment_student->student->name}}</td>
    <td>{{ number_format($payment_student->amount) }} ريال </td>
    <td>{{$payment_student->description}}</td>
    <td style="font-weight: bolder; background-color: #D0DEF6;">{{ number_format($payment_student->student->student_account->sum('Debit_feeInvoice') - $payment_student->student->student_account->sum('credit_receipt') - $payment_student->student->student_account->sum('credit_processing')  ) }} ريال </td>
    <td>{{$payment_student->date}}</td>
    <td>{{$payment_student->create_by}}</td>
        <td>
            <div class="btn-group">
            <a href="{{route('Payments.edit',$payment_student->id)}}" style="margin: 3px;" title="تعديل" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" title="حذف"  data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>

@include('pages.Payments.Delete')
@endforeach
</tbody>
</table>
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