@extends('layouts.master')
@section('css')

@section('title')
 نتيجـة الطـالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    نتيجـة الطـالـب          <label style="color: #5686E0">{{ $Name->mid->student->name }} </label>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('Final_Results.index')}}"><i class="fas fa-percent fa-fw"></i> قائمـة النـتائـج النـهائـية للطـلاب </a></li>
    <li class="active">عـرض نتيجـة الطـالـب </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

  
<div class="row">
<div class="col-xs-12">
<div class="box"  id="print">

    <style>
        .col-md-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%; }
        p {
        margin-top: 0;
        margin-bottom: 1rem; }
        .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-left: -15px;
        margin-right: -15px; }

        .img-fluid {
        max-width: 100%;
        height: auto; }

    </style>

<div class="box-header">

    <div class="row">
        <div class="col-md-4 text-center">            
        <p style="font-weight: bolder;">الجمهورية اليمنية</p>
        <p style="font-weight: bolder;">وزارة التربية والتعليم</p>
        <p style="font-weight: bolder;">مكتب التربية والتعليم بالأمانة قطاع التعليم الأهلي</p>
        <p style="font-weight: bolder;">مديرية معين التعليمية</p>
        <p style="font-weight: bolder;">مدارس.............. الأهلية</p>
        </div>

        <div class="col-md-4 text-center">
            <p style="font-weight: bolder;">بسم الله الرحمن الرحيم </p>
            <img src="/images/Emblem.png" style="width: 50%;" class="img-fluid  border-0">
        </div>

        <div class="col-md-4 text-center">
            <p style="font-weight: bolder;">أسـم الطـالـب: {{ $Name->mid->student->name }} </p>
            <p style="font-weight: bolder;">الجـنـس: {{ $Name->mid->student->gender->name }} </p>
            <p style="font-weight: bolder;">المرحلة الدراسية: {{ $Name->mid->student->grade->name }} </p>
            <p style="font-weight: bolder;">الصـف: {{ $Name->mid->student->classroom->name_class }} </p>
            <p style="font-weight: bolder;">الشعبـة: {{ $Name->mid->student->section->name_section }} </p>

        </div>

    </div><br>

    <div class="row">
        <div class="col-md-4 text-center">
                <img src="/images/Emblem.png" style="width: 20%;" class="img-fluid border-0">
        </div>

        <div class="col-md-4 text-center">
            <h4>شهادة تقويم أعمال السنة وإمتـحان النـقل في  <label style="color: #5686E0">{{ $Name->mid->student->grade->name }}</label>  للـعام الـدراسـي  <label style="color: #5686E0">{{ date("Y") }}</label>  </h4>
        </div>

        <div class="col-md-4 text-center">
                <img src="/images/Emblem.png" style="width: 20%;" class="img-fluid border-0">
        </div>

    </div><br>


</div>
<div class="box-body">
<div class="box-body table-responsive no-padding text-center" >
<table  class="table " style="width:100%; text-align: center;" border="2">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;">المادة</th>
    <th style="text-align: center; background-color: #D0DEF6;" colspan="3">درجات الفصل الاول 50% </th>
    <th style="text-align: center; background-color: #D0DEF6;" colspan="3">درجات الفصل الثـانـي 50% </th>
    <th style="text-align: center; background-color: #D0DEF6;">المجموع</th>

</tr>
</thead>
<tbody>


@foreach($FinalResults as $Final_Result)
<tr>

    <td>{{$Final_Result->subject->name}}</td>
    <td>{{ $Final_Result->mid->result }}</td>
    <td>{{ $Final_Result->mid->mid_exam }}</td>
    <td>{{ $Final_Result->mid->total }}</td>
    <td>{{ $Final_Result->result }}</td>
    <td>{{ $Final_Result->final_exam }}</td>
    <td>{{ $Final_Result->total }}</td>

    @php $AllResult = $Final_Result->total + $Final_Result->mid->total ; @endphp

    <td>   {{ $AllResult }}</td>


</tr>
@endforeach
</tbody>

<tfoot >
@php $type = ''; @endphp

@php $All = $FinalResults->sum('total') + $Mid_Results->sum('total') ; @endphp
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" colspan="4">المجمـوع النـهائـي   <label style="color: black; margin:5px;">{{  $All }}</label>  </th>    


    @if ($FinalResults->count('subject_id') == 7)
    <!-- start if 7 -->
    @if ($All < 350)
    @php
        $type = 'راسب';
    @endphp
    @else
    @php
        $type = 'ناجح';
    @endphp
    @endif
    <!-- end if 7 -->
    
    @else

    @if ($FinalResults->count('subject_id') == 11)
        <!-- start if 11 -->
        @if ($All < 550)
        @php
            $type = 'راسب';
        @endphp
        @else
        @php
            $type = 'ناجح';
        @endphp
        @endif
        <!-- end if 11 -->
    @endif

    @endif
    <th style="text-align: center; background-color: #D0DEF6;" colspan="3 ">النتيجـة النـهائيـة  <label style="color: black; margin:5px;">{{ $type }}</label>  </th>

    @php $total = 0; @endphp
    @php

        $sub_total = round($All / $FinalResults->count('subject_id'),2 );
        $total += $sub_total;
    @endphp
    <th style="text-align: center; background-color: #D0DEF6;" colspan="1">{{ $sub_total }} %</th>

</tr>
</tfoot>

</table>

</div>
</div>


</div>

<div class="footer">
    <button class="btn .btn.bg-navy  pull-left" id="print_Button" onclick="printDiv()"> 
    <i class="fa fa-print" aria-hidden="true"></i> طباعة  </button>
</div>

</div>
</div>

<!-- row closed -->
</section>


@endsection
@section('js')

@endsection