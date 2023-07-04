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
تسـديـد رسـوم 
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">تسـديـد رسـوم</li>
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

                    <th style="text-align: center; background-color: #D0DEF6;" >أسم الطـالـب</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >المبلغ</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >البيان</th>
                    <th style="text-align: center; background-color: #D0DEF6;" > تاريخ السداد</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >الرصيد المتبقي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $Receipts->student->name }}</td>
                    <td>{{ number_format($Receipts->Debit) }} ريال </td>
                    <td>{{$Receipts->description}}</td>
                    <td>{{$Receipts->date}}</td>
                    <td>{{ number_format( auth()->user()->student_account->sum('Debit_feeInvoice') - auth()->user()->student_account->sum('credit_receipt') ) }} ريال </td>
                    
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
