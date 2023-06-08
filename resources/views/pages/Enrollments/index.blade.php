@extends('layouts.master')
@section('css')

@section('title')
قـائمـة تسجيـل الطـلاب
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قـائمـة تسجيـل الطـلاب 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قـائمـة تسجيـل الطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="box-header">
<a href="{{route('Enrollments.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">تسـجيـل الطـلاب </a>
<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
    <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>
    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">السنة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الفصل الدراسي</th>
    <th style="text-align: center;" class="alert-info">أسـم الطـالـب</th>
    <th style="text-align: center;" class="alert-info">المرحلـة الدراسيـة</th>
    <th style="text-align: center;" class="alert-info">الصـف الدراسـي</th>
    <th style="text-align: center;" class="alert-info">الشعـبة</th>
    <th style="text-align: center;" class="alert-success"> تـاريـخ التسجيل</th>
    <th style="text-align: center;" class="alert-success"> تم بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>

@foreach($Enrollments as $Enrollment)
<tr>
<td>{{ $loop->index+1 }}</td>
<td>{{$Enrollment->year }}</td>
<td>{{$Enrollment->semester->name}}</td>
<td>{{$Enrollment->student->name}}</td>

<td>{{$Enrollment->grade->name}}</td>
<td>{{$Enrollment->classroom->name_class}}</td>
<td>{{$Enrollment->section->name_section}}</td>
<td>{{$Enrollment->date }}</td>
<td>{{ $Enrollment->create_by }}</td>
    <td>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $Enrollment->id }}" title="إلـغاء تسجيـل الطالب">إلـغاء تسجيـل الطالب</button>
        {{-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="حذف الطالب المتخرج">حذف الطالب</button> --}}

    </td>
</tr>

<!-- Deleted inFormation Student -->
<div class="modal fade" id="delete{{$Enrollment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-warning">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">إلـغاء تسجيـل الطـالـب</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('Enrollments.destroy','test')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$Enrollment->id}}}">
                <h5 style="font-family: 'Cairo', sans-serif; font-size:20px;">هل انت متاكد من عملية الغاء تسجيـل الطـالـب ؟</h5>
                <input type="text" readonly value="{{$Enrollment->student->name}}" style=" font-weight: bolder; font-size:20px; text-align: center;" class="form-control">

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline"
                            data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                            class="btn btn-outline">تـأكيـد </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

{{-- @include('pages.Enrollments.return') --}}
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