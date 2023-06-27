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
    نتيجـة الطـالـب          {{ $Name->mid->student->name }} 
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
<div class="box" >

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
            <p style="font-weight: bolder;">المرحلة الدراسية: {{ $Name->mid->student->grade->name }} </p>
            <p style="font-weight: bolder;">الصـف: {{ $Name->mid->student->classroom->name_class }} </p>
            <p style="font-weight: bolder;">الشعبـة: {{ $Name->mid->student->section->name_section }} </p>
            <p style="font-weight: bolder;">تـاريـخ المـيلاد: {{ $Name->mid->student->birth_date }} </p>
        </div>

    </div><br><br>

    <div class="row">
        <div class="col-md-4 text-center">
                <img src="/images/Print.png" style="width: 20%;" class="img-fluid border-0">
        </div>

        <div class="col-md-4 text-center">
            <h3>شهادة تقويم أعمال السنة الدراسية:   {{ date("Y") }}  </h3>
        </div>

        <div class="col-md-4 text-center">
                <img src="/images/Print.png" style="width: 20%;" class="img-fluid border-0">
        </div>

    </div><br><br>
    <br><br>

</div>
<div class="box-body" id="print">
<div class="box-body table-responsive no-padding text-center" >
<table  class="table " style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center; background-color: #D0DEF6;">المادة</th>
    <th style="text-align: center; background-color: #D0DEF6;"> المحـصلـة</th>
    <th style="text-align: center; background-color: #D0DEF6;">إمتحـان نهـايـة الفـصل الاول</th>
    <th style="text-align: center; background-color: #D0DEF6;">المـجموع </th>
</tr>
</thead>
<tbody>


@foreach($FinalResults as $student)
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
    <th style="text-align: center; background-color: #D0DEF6;">المجمـوع النـهائـي</th>    
        <th style="text-align: center;">{{ $FinalResults->sum('total') }}</th>

    @if ($FinalResults->count('subject_id') == 7)
    <!-- start if 7 -->
    @if ($FinalResults->sum('total') < 175)
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
        @if ($FinalResults->sum('total') < 275)
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
    <th style="text-align: center; background-color: #D0DEF6;">النتيجـة النـهائيـة</th>
    <th style="text-align:center;">{{ $type }}</th>

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