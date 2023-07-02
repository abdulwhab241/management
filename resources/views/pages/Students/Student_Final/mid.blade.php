@extends('layouts.master')
@section('css')

@section('title')
 نتيجـة التـرم الأول
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    نتيجـة الـترم الأول          
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.Students') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li class="active"> نتيجـة الـترم الأول </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box" >

    @if(count($Mid_Results) > 0)
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
                <h4>شهادة تقويم أعمال نـصـف السنة الدراسية:   {{ date("Y") }}  </h4>
        </div>

        <div class="col-md-4 text-center">
                <img src="/images/Emblem.png" style="width: 20%;" class="img-fluid border-0">
        </div>

    </div><br>


</div>
<div class="box-body" >
<div class="box-body table-responsive no-padding text-center" >
<table  class="table " style="width:100%; text-align: center;" border="2">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;">المادة</th>
    <th style="text-align: center; background-color: #D0DEF6;"> المحـصلـة</th>
    <th style="text-align: center; background-color: #D0DEF6;">إمتحـان نهـايـة الفـصل الاول</th>
    <th style="text-align: center; background-color: #D0DEF6;">المـجموع </th>
</tr>
</thead>
<tbody>


@foreach($Mid_Results as $student)
<tr>

    <td>{{$student->subject->name}}</td>
    <td>{{$student->result }}</td>
    <td>{{ $student->mid_exam }}</td>
    <td>{{ $student->total }}</td>

</tr>
@endforeach
</tbody>

<tfoot>
@php $type = ''; @endphp
<tr>
    <th style="text-align: center; background-color: #D0DEF6;" colspan="2">المجمـوع النـهائـي     <label style="color: black; margin:5px;"> {{ $Mid_Results->sum('total') }}</label>  </th>    

    @if ($Mid_Results->count('subject_id') == 7)
    <!-- start if 7 -->
    @if ($Mid_Results->sum('total') < 175)
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

    @if ($Mid_Results->count('subject_id') == 11)
        <!-- start if 11 -->
        @if ($Mid_Results->sum('total') < 275)
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
    <th style="text-align: center; background-color: #D0DEF6;" colspan="2">النتيجـة النـهائيـة     <label style="color: black; margin:5px;"> {{ $type }} </label>   </th>

</tr>
</tfoot>

</table>
</div>
</div>

@else

<h1 style="margin: 10px; padding:10px; font-weight: bold; text-align: center; background-color:#85A8CF; ">
    <marquee direction="right">
        <b style="font-weight: bold; font-size:larger; color:white; margin: 10px;">
            عـذراً لـم يتـم تسليـم نـتائـج التـرم الأول حـالياً 
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