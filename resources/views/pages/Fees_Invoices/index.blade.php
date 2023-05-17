@extends('layouts.master')
@section('css')

@section('title')
الفواتير الدراسية
@stop
@endsection
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    الفواتير الدراسية
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">الفواتير الدراسية</li>
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

<a href="{{route('Fees_Invoices.create')}}" class="btn btn-success btn-flat" role="button"
style="margin: 5px; padding: 5px;" aria-pressed="true">اضافة فـاتـورة جديدة</a><br><br>
<div class="box-tools">
    <div class="input-group" style="width: 150px;">
        <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
    </div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
    <thead>
    <tr>
        <th style="text-align: center;" class="alert-info">#</th>
        <th style="text-align: center;" class="alert-info">أسم الطـالـب</th>
        <th style="text-align: center;" class="alert-info">نوع الرسوم</th>
        <th style="text-align: center;" class="alert-info">المبلغ</th>
        <th style="text-align: center;" class="alert-info">المرحلة الدراسية</th>
        <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
        <th style="text-align: center;" class="alert-info">البيان</th>
        <th style="text-align: center;" class="alert-info">تاريخ الفاتورة</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
    </tr>
</thead>
<tbody>

    @foreach($Fee_invoices as $Fee_invoice)
    <tr>
        <td>{{ $loop->iteration }}</td>
    <td>{{$Fee_invoice->student->name}}</td>
    <td>{{$Fee_invoice->fees->title}}</td>
    <td>{{ number_format($Fee_invoice->amount) }} ريال </td>
    <td>{{$Fee_invoice->grade->name}}</td>
    <td>{{$Fee_invoice->classroom->name_class}}</td>
    <td>{{$Fee_invoice->description}}</td>
    <td>{{$Fee_invoice->invoice_date}}</td>
    <td>{{ $Fee_invoice->create_by }}</td>
        <td>
            <a href="{{route('Fees_Invoices.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" ><i class="fa fa-trash"></i></button>                        </td>
    </tr>
    @include('pages.Fees_Invoices.Delete')

@endforeach
</tbody>

</table>

</div><!-- /.box-body -->

</div><!-- /.box -->
</div>

</div>
</section><!-- /.content -->


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection