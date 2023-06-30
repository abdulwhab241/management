@extends('layouts.master')
@section('css')

@section('title')
نـتائـج إختبـارات الـترم الثـانـي
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
نـتائـج إختبـارات الـترم الثـانـي
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">نـتائـج إختبـارات الـترم الثـانـي</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">

<div class="box-body">
    <a href="{{route('StudentFinalResults.create')}}" class="btn btn-success btn-flat" role="button"  
    aria-pressed="true">اضافة نتيـجة الـترم الثـانـي</a>

</div>
<br>

</div><!-- /.box-header -->

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered " style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
<th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;">المحصلة </th>
<th style="text-align: center; background-color: #D0DEF6;">الاختبار </th>
<th style="text-align: center; background-color: #D0DEF6;">المجموع </th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
@foreach($Final_Results as $Final_Result)
<tr>
<td>{{$Final_Result->classroom->name_class}}</td>
<td>{{$Final_Result->student->name}}</td>
<td>{{$Final_Result->subject->name}}</td>
<td>{{ $Final_Result->result }}</td>
<td>{{ $Final_Result->final_exam }}</td>
<td>{{ $Final_Result->total }}</td>


<td>
    <div class="btn-group">
    <a href="{{route('StudentFinalResults.edit',$Final_Result->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" title="تعديل" aria-pressed="true"><i class="fa fa-edit"></i></a>
    </div>
</td>
</tr>

@endforeach
</tbody>
</table>
</div>
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