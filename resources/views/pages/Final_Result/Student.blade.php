@extends('layouts.master')
@section('css')

@section('title')
عـرض النتيـجـة النـهائـية للطالب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h3 class="col-md-6">
عـرض النتيـجـة النـهائـية للطالب 
</h3>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Final_Results.index')}}"><i class="fas fa-percent fa-fw"></i> قائمـة النـتائـج النـهائـية للطـلاب </a></li>
<li class="active">عـرض النتيـجـة النـهائـية للطالب </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{ session()->get('error') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<div class="box-header">
<form  action="{{route('Final.search')}}"  method="POST" >
@csrf
<div class="box-body">
    <h5 style="text-align: center; color:blue; font-weight: bold; padding:5px; margin:5px;"> إختـر أسـم الطـالـب \ الطـالبـة </h5>
    <div class="row">
        <div class="col-md-6"> 
            <label>الصـف الـدراسـي</label>
            <select class="form-control select2" style="width: 100%;" name="Classroom_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach($FinalResult as $student)
                    <option value="{{ $student->classroom_id }}">{{ $student->classroom->name_class }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6"> 
            <label>أسـم الطـالـب \ الطـالبـة</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach($FinalResult as $student)
                    <option value="{{ $student->student_id }}">{{ $student->student->name }}</option>
                @endforeach
            </select>
        </div>
    </div><br>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-primary btn-block">تـأكيـد</button>
</div>

</form>
</div>

@isset($Students)
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table  class="table" style="width:100%; text-align: center;">
<thead>
    <tr>
        {{-- <th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
        <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th> --}}
        <th style="text-align: center; background-color: #D0DEF6;">المادة</th>
        <th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الاول 50% (رقـماً)</th>
        <th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
        <th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الثـانـي 50% (رقـماً)</th>
        <th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
        <th style="text-align: center; background-color: #D0DEF6;">المـجموع 100</th>
    </tr>
</thead>
<tbody>
    @foreach($Students as $student)
    <tr>
        {{-- <td>{{$student->classroom->name_class}}</td>
        <td>{{$student->student->name}}</td> --}}
        <td>{{$student->subject->name}}</td>
        <td>{{$student->f_total_number }}</td>
        <td>{{ $student->f_total_write }}</td>
        <td>{{ $student->s_total_number }}</td>
        <td>{{$student->s_total_write}}</td>
        <td>{{ $student->total }}</td>
    </tr>
@endforeach
</tbody>

<tfoot>
    @php $type = ''; @endphp
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;">المجمـوع النـهائـي</th>
        <th>{{ $student->sum('total') }}</th>

        @if ($student->count('subject_id') == 7)
        <!-- start if 7 -->
        @if ($student->sum('total') < 360)
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

        @if ($student->count('subject_id') == 11)
            <!-- start if 11 -->
            @if ($student->sum('total') < 560)
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
        <th>{{ $type }}</th>
 
        <th></th>
        @php $total = 0; @endphp
        @php
            $sub_total = $student->sum('total') / $student->count('subject_id') ;
            $total += $sub_total;
        @endphp
        <th>{{ $sub_total }} %</th>
    </tr>
</tfoot>

</table>
</div>
</div>
@endisset


{{-- @if ($student->sum('total') < 350)
@php
    $type = 'راسب';
@endphp
@else
@php
    $type = 'ناجح';
@endphp
@endif --}}


</div>
</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection