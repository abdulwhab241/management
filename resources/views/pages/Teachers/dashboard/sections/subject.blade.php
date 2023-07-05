@extends('layouts.master')
@section('css')

@section('title')
المـواد الدراسـيـة
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
المـواد الدراسـيـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">المـواد الدراسـيـة</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table  class="table" style="width:100%; text-align: center;" border="2">
<thead>
<tr>
    <th style="text-align: center; background-color: #D0DEF6;">الـمـادة </th>
</tr>
</thead>
<tbody>
@foreach ($Subjects as $Subject)
<tr>
    <td>{{ $Subject->subject->name }}</td>
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