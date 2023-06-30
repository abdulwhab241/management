@extends('layouts.master')
@section('css')

@section('title')
النـتائـج النصـفيـة للطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    نـتائـج إختبـارات الـترم الأول 
</h1>
<ol class="breadcrumb">
    <li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li class="active">نـتائـج إختبـارات الـترم الأول </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">

<div class="box-body">
    <a href="{{route('StudentMidResults.create')}}" class="btn btn-success btn-flat" role="button" 
    aria-pressed="true">اضافة نتيـجة طـالـب للـترم الأول</a>

</div>
<br>

</div><!-- /.box-header -->

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered " style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center; background-color: #D0DEF6;">الصـف الـدراسـي</th>
<th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;"> المحـصلـة</th>
<th style="text-align: center; background-color: #D0DEF6;">إمتحـان نهـايـة الفـصل الاول</th>
<th style="text-align: center; background-color: #D0DEF6;">المـجموع </th>

<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
@foreach($MidResults as $MidResult)
<tr>
<td>{{$MidResult->classroom->name_class}}</td>
<td>{{$MidResult->student->name}}</td>
<td>{{$MidResult->subject->name}}</td>
<td>{{$MidResult->result }}</td>
<td>{{ $MidResult->mid_exam }}</td>
<td>{{ $MidResult->total }}</td>



<td>
    <div class="btn-group">
        <a href="{{route('StudentMidResults.edit',$MidResult->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" title="تعديل" aria-pressed="true"><i class="fa fa-edit"></i></a>
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