@extends('layouts.master')
@section('css')

@section('title')
معلـومـات الطـالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
معلـومـات الطـالـب  <label style="color: #5686E0">{{$Student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمـة الطـلاب </a></li>
<li class="active">معلـومـات الطـالـب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="row">
<div class="col-md-12">
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
    <li class="btn-info active"><a href="#tab_1" data-toggle="tab" style="font-weight:bolder; font-color:white;">معلـومـات الطـالـب</a></li>
    <li class="btn-info"><a href="#tab_2" data-toggle="tab" style="font-weight:bolder; font-color:white;">حسـاب الطـالـب</a></li>
</ul>
<div class="tab-content"><br>
    <div class="tab-pane active" id="tab_1">
    <div class="box-body table-responsive no-padding">
        <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
            <tbody>
            <tr>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">أسـم الطـالـب</th>
                <td>{{ $Student->name }}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الجنـس</th>
                <td>{{$Student->gender->name}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الـمؤهـل</th>
                <td>{{$Student->qualification}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">تـاريـخ الميـلاد</th>
                <td>{{$Student->birth_date}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">المـرحلـة الدراسيـة</th>
                <td>{{$Student->grade->name}}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الصـف الدراسـي</th>
                <td>{{ $Student->classroom->name_class }}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الشعبـة</th>
                <td style="font-weight: bolder;">{{ $Student->section->name_section }}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center;  background-color: #D0DEF6;" class="alert-default">أسـم الأب</th>
                <td>{{$Student->father_name}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">جهـة العمـل</th>
                <td>{{$Student->employer}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الوظيـفة</th>
                <td>{{$Student->father_job}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default"> هـاتف الأب </th>
                <td>{{ $Student->father_phone }}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">هـاتـف العمـل</th>
                <td>{{$Student->job_phone}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">هـاتـف المنـزل</th>
                <td>{{$Student->home_phone}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">العنـوان</th>
                <td>{{$Student->address}}</td>
            </tr>
            <tr>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default"> أسـم الأم </th>
                <td>{{ $Student->mother_name }}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">هـاتـف الأم</th>
                <td>{{$Student->mother_phone}}</td>
                <th scope="row" style="text-align: center; background-color: #D0DEF6;" class="alert-default">الوظيفـة</th>
                <td>{{$Student->mother_job}}</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>

    <div class="tab-pane" id="tab_2">
<div class="row">
    
    <div class="col-md-6">
        @if(count($FeeInvoices) > 0)
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
        @else
        <h4 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
            <marquee direction="right">
                <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
                    عـذراً لا يـوجـد رسوم دراسية لعـرضـها 
                </b>
            </marquee>
            </h4>
        @endif
    </div>


    <div class="col-md-6">
        @if(count($ReceiptStudent) > 0)
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
                <td>{{$Receipt->date}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
            </div>
            @else
            <h4 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
                <marquee direction="right">
                    <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
                        عـذراً لا يـوجـد رسوم مدفوعة لعـرضـها 
                    </b>
                </marquee>
                </h4>
            @endif

    </div>

    </div><hr>

    <div class="row">

        <div class="col-md-6">
            @if(count($ProcessingFee) > 0)
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
                        <td>{{$Processing->date}}</td>

                </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
                @else
                <h4 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
                    <marquee direction="right">
                        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
                            عـذراً لا يـوجـد رسوم مستبعدة لعـرضـها 
                        </b>
                    </marquee>
                    </h4>
                @endif
    

        </div>

        <div class="col-md-6">
            @if(count($Payment) > 0)
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
                        <td>{{$P->date}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
                @else
                <h4 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
                    <marquee direction="right">
                        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
                            عـذراً لا يـوجـد سندات صرف  لعـرضـها 
                        </b>
                    </marquee>
                    </h4>
                @endif

        </div>

    </div><hr>

    <div class="box-body">
            <div class="row">

        <div class="col-md-3">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم الدراسيـة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:blue;" value="{{ number_format($Student->student_account->sum('Debit_feeInvoice') ) }} ريال " type="text" readonly>
        </div>

        <div class="col-md-3">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم المـدفوعـة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:green;" value="{{ number_format($Student->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
        </div>
        
        <div class="col-md-3">
            <label style="text-align: center;" for="inputEmail3">إجمالـي الـرسـوم المستبـعدة</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:red;" value="{{ number_format($Student->student_account->sum('credit_processing') ) }} ريال " type="text" readonly>
        </div>

        <div class="col-md-3">
            <label style="text-align: center;" for="inputEmail3">إجمالـي سنـدات الصـرف</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:red;" value="{{ number_format($Student->student_account->sum('Debit_payment') ) }} ريال " type="text" readonly>
        </div>


            </div>
<br>
<div class="row">
        <div class="col-md-4">
            <label style="text-align: center;" for="inputEmail2">إجمالـي الرصـيد المتبـقي على الطـالـب</label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px; text-align: center; color:blue;" value="{{ number_format( $Student->student_account->sum('Debit_feeInvoice') - $Student->student_account->sum('credit_receipt') ) }} ريال " type="text" readonly>
        </div>
    </div>

        </div>

    </div><!-- /.tab-pane -->

</div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
</div><!-- /.col -->
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
