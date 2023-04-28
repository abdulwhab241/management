@extends('layouts.master')
@section('css')

@section('title')
بيـانـات الـرسـوم
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
بيـانـات الـرسـوم  
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">بيـانـات الـرسـوم</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box"><br>
@if(count($FeeInvoices) > 0)
{{-- <ul> --}}

<div class="row">
    <div class="col-md-6">
        <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                    <thead>
                    <tr>
                        <th style="text-align: center;" class="alert-info">الـرسـوم الدراسيـة</th>
                        <th style="text-align: center;" class="alert-info">المبـلغ</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($FeeInvoices as $FeeInvoices)
                            <td>{{ $FeeInvoices->description }}</td>
                            <td>{{  number_format($FeeInvoices->amount) }} ريال </td>

                        </tr>
                        @endforeach
            </tbody>
            </table>

        </div>

    </div>

    <div class="col-md-6">
        <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
            <thead>
                <tr>
                    <th style="text-align: center;" class="alert-success"> الرسـوم المـدفوعـة</th>
                    <th style="text-align: center;" class="alert-success">المبـلغ</th>
                    <th style="text-align: center;" class="alert-success">تاريـخ السـداد</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($ReceiptStudent as $Receipt )
                <td>{{ $Receipt->description }}</td>
                <td>{{  number_format($Receipt->Debit) }} ريال </td>
                <td>{{$Receipt->created_at->diffForHumans()}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
            </div>

    </div>

    </div><hr>

    <div class="row">

        <div class="col-md-6">
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                        <th style="text-align: center;" class="alert-warning"> الرسـوم المستبعـدة</th>
                        <th style="text-align: center;" class="alert-warning">المبـلغ</th>
                        <th style="text-align: center;" class="alert-warning">تاريـخ الإستبـعاد</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ( $ProcessingFee as $Processing )
                        <td>{{ $Processing->description }}</td>
                        <td>{{  number_format($Processing->amount) }} ريال </td>
                        <td>{{$Processing->created_at->diffForHumans()}}</td>

                </tr>
                    @endforeach
                </tbody>
            </table>
                </div>

        </div>

        <div class="col-md-6">
            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
                <thead>
                    <tr>
                        <th style="text-align: center;" class="alert-danger">سنـدات الصـرف</th>
                        <th style="text-align: center;" class="alert-danger">المبـلغ</th>
                        <th style="text-align: center;" class="alert-danger">تاريـخ الصـرف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ( $Payment as $P )
                        <td>{{ $P->description }}</td>
                        <td>{{  number_format($P->amount) }} ريال </td>
                        <td>{{$P->created_at->diffForHumans()}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
                </div>

        </div>

    </div><hr>

    <div class="box-body">
            <div class="row">

        <div class="col-md-3 ">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم الدراسيـة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:blue;" value="{{ number_format(auth()->user()->student_account->sum('Debit_feeInvoice') ) }} ريال " type="text" readonly>
        </div>

        <div class="col-md-3 ">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم المـدفوعـة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:green;" value="{{ number_format(auth()->user()->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
        </div>
        
        <div class="col-md-3 ">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم المستبـعدة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:red;" value="{{ number_format(auth()->user()->student_account->sum('credit_processing') ) }} ريال " type="text" readonly>
        </div>

        <div class="col-md-3">
            <label style="text-align: center;" for="inputEmail3">إجمالـي سنـدات الصـرف</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:red;" value="{{ number_format(auth()->user()->student_account->sum('Debit_payment') ) }} ريال " type="text" readonly>
        </div>


            </div>
<br>
<div class="row">
        <div class="col-md-4">
            <label style="text-align: center;" for="inputEmail2">إجمالـي الرصـيد المتبـقي على الطـالـب</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:blue;" value="{{ number_format( auth()->user()->student_account->sum('Debit_feeInvoice') - auth()->user()->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
        </div>
    </div>

        </div>
        @else
        <h2 style="margin: 10px; font-weight: bold; text-align: center; color:blue;">لا يوجد بيـانـات لعرضها</h2>
        @endif

</div>
</div>
</div>

</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
