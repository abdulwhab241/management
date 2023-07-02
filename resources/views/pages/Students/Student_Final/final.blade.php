@extends('layouts.master')
@section('css')

@section('title')
النتيـجة النـهائيـة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
نتيجـة الـطـالـب النهـائـيـة          
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li class="active"> نتيجـة الـطـالـب النهـائـيـة </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box" >

    @if(count($Final_Results) > 0)
<div class="box-header">

<div class="row">
    <div class="col-md-4" style="text-align: center;">            
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
        <p style="font-weight: bolder;">أسـم الطـالـب: {{ $Student_Name->student->name }} </p>
        <p style="font-weight: bolder;">المرحلة الدراسية: {{ $Student_Name->student->grade->name }} </p>
        <p style="font-weight: bolder;">الصـف: {{ $Student_Name->student->classroom->name_class }} </p>
        <p style="font-weight: bolder;">الشعبـة: {{ $Student_Name->student->section->name_section }} </p>
        <p style="font-weight: bolder;">تـاريـخ المـيلاد: {{ $Student_Name->student->birth_date }} </p>
    </div>

</div><br>

<div class="row">
    <div class="col-md-4 text-center">
            <img src="/images/Emblem.png" style="width: 20%;" class="img-fluid border-0">
    </div>

    <div class="col-md-4 text-center">
        <h4>شهادة تقويم أعمال السنة وإمتـحان النـقل في  <label style="color: #5686E0; margin:5px;">{{ $Student_Name->student->grade->name }}</label>  للـعام الـدراسـي  <label style="color: #5686E0; margin:5px;">{{ date("Y") }}</label>  </h4>
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
    <th style="text-align: center; background-color: #D0DEF6;" colspan="6">درجات الفصل الاول 50% </th>
    <th style="text-align: center; background-color: #D0DEF6;" colspan="6">درجات الفصل الثـانـي 50% </th>
    <th style="text-align: center; background-color: #D0DEF6;">المجموع 100</th>

</tr>
</thead>
<tbody>


@foreach($Final_Results as $Final_Result)
<tr>

    <td>{{$Final_Result->subject->name}}</td>
    <th>المحـصلـة</th>
    <td>   {{ $Final_Result->mid->result }}</td>
    <th>الإختـبار</th>
    <td>   {{ $Final_Result->mid->mid_exam }}</td>
    <th>المجـموع</th>
    <td>   {{ $Final_Result->mid->total }}</td>
    <th>المحـصلـة</th>
    <td>   {{ $Final_Result->result }}</td>
    <th>الإختـبار</th>
    <td>   {{ $Final_Result->final_exam }}</td>
    <th>المجـموع</th>
    <td>   {{ $Final_Result->total }}</td>


    @php $AllResult = $Final_Result->total + $Final_Result->mid->total ; @endphp

    <td>   {{ $AllResult }}</td>


</tr>
@endforeach
</tbody>

<tfoot >
@php $type = ''; @endphp

@php $All = $Final_Results->sum('total') + $Mid_Results->sum('total') ; @endphp
<tr>

    <th style="text-align: center; background-color: #D0DEF6;" colspan="7">المجمـوع النـهائـي   <label style="color: black; margin:5px;">{{  $All }}</label>  </th>    


    @if ($Final_Results->count('subject_id') == 7)
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

    @if ($Final_Results->count('subject_id') == 11)
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
    <th style="text-align: center; background-color: #D0DEF6;" colspan="6">النتيجـة النـهائيـة  <label style="color: black; margin:5px;">{{ $type }}</label>  </th>

    @php $total = 0; @endphp
    @php

        $sub_total = round($All / $Final_Results->count('subject_id'),2 );
        $total += $sub_total;
    @endphp
    <th style="text-align: center; background-color: #D0DEF6;" colspan="1">{{ $sub_total }} %</th>

</tr>
</tfoot>

</table>    



</div>
</div>
@else

<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لـم يتـم تسليـم النتـائـج النـهائـيـة حـالياً 
        </b>
    </marquee>
    </h1>
@endif


</div>
</div>
</div>
</section>


@endsection
@section('js')

@endsection