@extends('layouts.master')
@section('css')

@section('title')
الصنـدوق
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    الصنـدوق
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">الصنـدوق</li>
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

    <br>
<br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<form action="{{ route('Filter_Boxes') }}" method="post">
    {{ csrf_field() }}
<div class="box-body">
<input type="text" style="background-color: #D0DEF6; font-weight: bolder; padding:5px; margin:5px;" name="Search" class="form-control input-sm pull-right" placeholder="بحـث بـأسـم المعلـم">
</div>
</form>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-striped table-bordered" style="width:100%; text-align: center;">
<thead>
<tr>
    <th style="text-align: center; background-color: #86B9D4;" >#</th>
    <th style="text-align: center; background-color: #86B9D4;" >أسم الطالب</th>
    <th style="text-align: center; background-color: #86B9D4;" >الفواتير الدراسية</th>
    <th style="text-align: center; background-color: #86B9D4;" >المبلغ (مدين)</th>
    <th style="text-align: center; background-color: #86B9D4;" >سندات القبض</th>
    <th style="text-align: center; background-color: #86B9D4;" >المبلغ (دائن)</th>
    <th style="text-align: center; background-color: #86B9D4;" > معالجة الرسوم</th>
    <th style="text-align: center; background-color: #86B9D4;" >المبلغ (دائن)</th>
    <th style="text-align: center; background-color: #86B9D4;" > سندات الصرف</th>
    <th style="text-align: center; background-color: #86B9D4;" >المبلغ (مدين)</th>
    <th style="text-align: center; background-color: #86B9D4;" > تاريخ العمليات</th>
    <th style="text-align: center; background-color: #86B9D4;">تم بواسطة</th>
</tr>
</thead>
<tbody>
    @if (isset($details))

    <?php $List_Students = $details; ?>
    @else
    
    <?php $List_Students = $Boxes; ?>
    @endif

    <?php $i = 0; ?>
@foreach($List_Students as $box)
    <tr>
    <?php $i++; ?>
    <td>{{ $i }}</td>
    <td>{{$box->student->name}}</td>
    <td>{{$box->fee_invoice}}</td>
    <td>{{ number_format($box->Debit_feeInvoice) }} ريال </td>
    <td>{{$box->receipt}}</td>
    <td>{{ number_format($box->credit_receipt) }} ريال </td>
    <td>{{$box->processing}}</td>
    <td>{{ number_format($box->credit_processing) }} ريال </td>
    <td>{{$box->payment}}</td>
    <td>{{ number_format($box->Debit_payment) }} ريال </td>
    <td>{{$box->date}}</td>
    <td>{{ $box->create_by }}</td>

@endforeach
</table>
{{-- <div class="d-flex justify-content-center">
{{ $Boxes->links() }}
</div> --}}


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