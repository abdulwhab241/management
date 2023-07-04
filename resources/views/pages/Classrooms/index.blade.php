@extends('layouts.master')
@section('css')

@section('title')
الصفـوف الدراسيـة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
الصفـوف الدراسيـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">الصفـوف الدراسيـة</li>
</ol>
</section>
<!-- Main content -->
<section class="content" dir="rtl">

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

<button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#exampleModal">
اضافة صف
</button>

<br><br>

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center;" class="alert-info">#</th>
<th style="text-align: center;" class="alert-info">اسم الصف</th>
<th style="text-align: center;" class="alert-info">اسم المرحلة</th>
<th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>

<?php $i = 0; ?>

@foreach ($My_Classes as $My_Class)
<tr>
<?php $i++; ?>
<td>{{ $i }}</td>
<td>{{ $My_Class->name_class }}</td>
<td>{{ $My_Class->Grades->name }}</td>
<td>{{ $My_Class->create_by }}</td>
<td>
<div class="btn-group">
    <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
        data-target="#edit{{ $My_Class->id }}"
        title="تعديل"><i class="fa fa-edit"></i></button>
    <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal"
        data-target="#delete{{ $My_Class->id }}"
        title="حذف"><i class="fa fa-trash"></i></button>
</div>
</td>
</tr>

<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
تعديل صف
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('Classrooms.update', 'test') }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-6"> 
            <label > المرحلـة الـدراسيـة</label>
            <select class="form-control select2" style="width: 100%;" name="Grade_id">
                <option value="{{ $My_Class->Grades->id }}">
                    {{ $My_Class->Grades->name }}
                </option>
                @foreach ($Grades as $Grade)
                    <option value="{{ $Grade->id }}">
                        {{ $Grade->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6"> 
        <label >أسـم الصـف</label>
        <input id="Name" type="text" name="Name"
        class="form-control"
        value="{{ $My_Class->name_class }}"
        required>
        <input id="id" type="hidden" name="id" class="form-control"
        value="{{ $My_Class->id }}">
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
<div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
حذف صف
</h5>

</div>
<div class="modal-body">
<form action="{{ route('Classrooms.destroy', 'test') }}" method="post">
{{ method_field('Delete') }}
@csrf
هل انت متاكد من عملية الحذف ؟
<input id="Name" type="text" name="Name"
class="form-control"
value="{{ $My_Class->name_class }}"
disabled>
<input id="id" type="hidden" name="id" class="form-control"
    value="{{ $My_Class->id }}">
    <div class="modal-footer">
        <button type="button" class="btn btn-outline "
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
</table>
</div>
</div>

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
إضافة صف
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Classrooms.store') }}" method="POST">
@csrf

<div class="box-body">
<div class="row">

<div class="col-md-6">
<label > المرحلـة الـدراسيـة</label>
<select class="form-control select2" style="width: 100%;" name="Grade_id">
    <option  selected disabled>أختـر من القائمة...</option>
    @foreach ($Grades as $Grade)
        <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
    @endforeach
</select>
</div>

<div class="col-md-6">
<label >أسـم الصـف</label>
<input  type="text" name="Name" class="form-control"  required>
</div>

</div><br>
</div>
<br>
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
</section>

@endsection
@section('js')
@toastr_js
@toastr_render

<script type="text/javascript">
$(function() {
$("#btn_delete_all").click(function() {
var selected = new Array();
$("#datatable input[type=checkbox]:checked").each(function() {
selected.push(this.value);
});
if (selected.length > 0) {
$('#delete_all').modal('show')
$('input[id="delete_all_id"]').val(selected);
}
});
});
</script>


@endsection
