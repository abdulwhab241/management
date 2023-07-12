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
<div class="box">

    @if(count($FeeInvoices) > 0)
<div class="box-body">
<div class="row">
    <div class="col-md-6">
        <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover" style="text-align: center" >
                    <caption style="font-weight: bolder; text-align:center;">$ الـرسـوم الـدراسيـة</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center; background-color: #E7EEFB;" >الـرسـوم الدراسيـة</th>
                        <th style="text-align: center; background-color: #E7EEFB;" >المبـلغ</th>
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
            <table class="table table-bordered table-hover" style="text-align: center" >
                <caption style="font-weight: bolder; text-align:center;">$ الـرسـوم الـمدفـوعـة</caption>
            <thead>
                <tr>
                    <th style="text-align: center; background-color: #E7EEFB;" > الرسـوم المـدفوعـة</th>
                    <th style="text-align: center; background-color: #E7EEFB;" >المبـلغ</th>
                    <th style="text-align: center; background-color: #E7EEFB;" >تاريـخ السـداد</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($ReceiptStudent as $Receipt )
                <td>{{ $Receipt->description }}</td>
                <td>{{  number_format($Receipt->Debit) }} ريال </td>
                <td>{{$Receipt->date}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
            </div>

    </div>

    </div>
    </div><br>


<div class="box-body">
    <div class="row">

<div class="col-md-4">
    <label style="text-align: center;">إجمالـي الـرسـوم الدراسيـة</label>
    <input  class="form-control" style="font-weight: bolder; font-size:15px; text-align: center; color:blue;" value="{{ number_format(auth()->user()->student_account->sum('Debit_feeInvoice') ) }} ريال " type="text" readonly>
</div>

<div class="col-md-4">
    <label style="text-align: center;">إجمالـي الـرسـوم المـدفوعـة</label>
    <input  class="form-control" style="font-weight: bolder; font-size:15px; text-align: center; color:green;" value="{{ number_format(auth()->user()->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
</div>

<div class="col-md-4">
    <label style="text-align: center;">إجمالـي الـرسـوم المتبـقيـة</label>
    <input  class="form-control" style="font-weight: bolder; font-size:15px; text-align: center; color:red;" value="{{ number_format( auth()->user()->student_account->sum('Debit_feeInvoice') - auth()->user()->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
</div>

</div>

@else
<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لـم يتـم تسجيـلك لـهذي السـنة الـدراسيـة راجـع الإدارة 
        </b>
    </marquee>
    </h1>
@endif

</div>


</div>
</div>
</div>

</section>

@endsection
@section('js')

@endsection
