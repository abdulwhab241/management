@extends('layouts.master')
@section('css')

@section('title')
قائمة الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قائمة الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الطـلاب</li>
</ol>
</section>
<!-- Main content -->
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">
<h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
<br>
</div>


<div class="box-body">
<div class="row">
<div class="card-body">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
@foreach ($students as $student)

<div class="panel panel-info">

<div class="panel-heading" role="tab" id="heading">
<h4 class="panel-title" style="font-weight: bolder;">
<a class="collapsed " role="button" data-toggle="collapse"  data-parent="#selector" href="#collapse" aria-expanded="false" aria-controls="collapse">
{{ $student->My_Classes->name_class }} , الـشـعبـة: {{ $student->name_section }} 
</a>
</h4>
</div>
<div id="collapse" class="panel-collapse collapse in" role="tab" aria-labelledby="heading">
<div class="panel-body">

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table  class="table" style="width:100%; text-align: center;">
    <caption style="font-weight: bolder; text-align:center; color:blue;">
        {{ $student->My_Classes->name_class }} , الـشـعبـة: {{ $student->name_section }} 
    </caption>
<thead>
<tr>
    <th style="text-align: center; background-color: #D0DEF6;">#</th>
    <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>

</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
@foreach($student->Students as $Student)
    <tr>
        <?php $i++; ?>
        <td>{{ $i }}</td>
        <td>{{$Student->name}}</td>
    </tr>



@endforeach
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div><!--box -->


</div>
</div>
</div>
</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection