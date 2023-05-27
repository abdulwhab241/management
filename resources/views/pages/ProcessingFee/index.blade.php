@extends('layouts.master')
@section('css')

@section('title')
معالجات الرسوم الدراسية
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    معالجات الرسوم الدراسية
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">معالجات الرسوم الدراسية</li>
</ol>
</section>

<!-- Main content -->
<section class="content" dir="rtl">

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
        <th style="text-align: center;" class="alert-info">الاسم</th>
        <th style="text-align: center;" class="alert-info">المبلغ</th>
        <th style="text-align: center;" class="alert-info">البيان</th>
        <th style="text-align: center;" class="alert-info">تاريخ المعالجة</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
    </tr>
</thead>
<tbody>

@foreach($ProcessingFees as $ProcessingFee)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{$ProcessingFee->student->name}}</td>
<td>{{ number_format($ProcessingFee->amount) }} ريال </td>
<td>{{$ProcessingFee->description}}</td>
<td>{{$ProcessingFee->date}}</td>
<td>{{$ProcessingFee->create_by}}</td>
    <td>
        <a href="{{route('ProcessingFee.edit',$ProcessingFee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$ProcessingFee->id}}" ><i class="fa fa-trash"></i></button>
    </td>
</tr>
@include('pages.ProcessingFee.Delete')
@endforeach
</tbody>
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