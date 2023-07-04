@extends('layouts.master')

@section('css')

@section('title')
المراحـل الدراسيـة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
المراحـل الدراسيـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">المراحل الدراسية</li>
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
<button type="button" class="btn btn-success btn-flat " data-toggle="modal" data-target="#exampleModal">
إضافة مرحلة
</button>
<br><br>

</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>
<th style="text-align: center;" class="alert-info">#</th>
<th style="text-align: center;" class="alert-info">أسـم المرحلـة</th>
<th style="text-align: center;" class="alert-info">الملاحظـات</th>
<th style="text-align: center;" class="alert-success">انشـئ بواسطـة</th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach ($grades as $grade)
<tr>
<?php $i++; ?>
<td>{{ $i }}</td>
<td>{{ $grade->name }}</td>
<td>{{ $grade->notes }}</td>
<td>{{ $grade->create_by }}</td>
<td>
    <div class="btn-group">
    <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $grade->id }}"
            title="تعديل"><i
            class="fa fa-edit"></i></button>
    <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#delete{{ $grade->id }}"
            title="حذف"><i class="fa fa-trash"></i></button>
    </div>
</td>
</tr>

<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                تعديل مرحلة
            </h5>

        </div>
        <div class="modal-body">
<!-- add_form -->
<form  class="form-horizontal" action="{{route('Grades.update','test')}}" method="post">
{{method_field('patch')}}
@csrf

<div class="box-body">
    <div class="row">

        <div class="col-md-6">
            <label >أسـم المرحلـة</label>
            <input  type="hidden" name="id"  value="{{$grade->id }}" class="form-control">
            <input  type="text" name="Name"  value="{{$grade->name }}" required class="form-control">
        </div>

        <div class="col-md-6">
            <label >ملاحظـات</label>
            <textarea class="form-control" name="Notes" rows="2">{{ $grade->notes }}</textarea>
        </div>
    </div><br>


</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger"
        data-dismiss="modal">إغلاق</button>
    <button type="submit"
        class="btn btn-success">تعديل البيانات</button>
</div>
</form>

</div>
</div>
</div>
</div>

<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                حذف مرحلة
            </h5>
            
        </div>
        <div class="modal-body">
            <form action="{{route('Grades.destroy','test')}}" method="post">
                {{method_field('Delete')}}
                @csrf
                هل انت متأكد من عملية الحذف ؟
                <input  type="text" class="form-control"
                        value="{{ $grade->name }}" disabled>
                        <input  type="hidden" name="name"  value="{{$grade->name }}" class="form-control">
                <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $grade->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline"
                            data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                            class="btn btn-outline">حذف البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endforeach
</tbody>
</table>
</div>
</div>


<!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
    id="exampleModalLabel">
    إضافة مرحلة
</h5>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal" action="{{ route('Grades.store') }}" method="POST">
    @csrf
    <div class="box-body">
        <div class="row">

            <div class="col-md-6">
                <label >أسـم المرحلـة</label>
                <input  type="text" name="Name" value="{{ old('Name') }}" class="form-control">
            </div>

            <div class="col-md-6">
                <label >ملاحظـات</label>
                <textarea class="form-control" name="Notes" rows="2">{{ old('Notes') }}</textarea>
            </div>
        </div><br>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger"
    data-dismiss="modal">إغلاق</button>
    <button type="submit"
    class="btn btn-success">حفظ البيانات</button>
    </div>

</form>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</section><!-- /.content -->
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
