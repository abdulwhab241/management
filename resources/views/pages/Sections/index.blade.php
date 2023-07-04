@extends('layouts.master')

@section('css')

@section('title')
الأقسـام
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
الأقسـام
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">الأقسـام</li>
</ol>
</section>

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
    <a class="btn btn-success btn-flat" href="#" data-toggle="modal" data-target="#exampleModal">
    اضافة قسـم</a>
</div>

<div class="panel-group" id="accordion"  aria-multiselectable="true" >
@foreach ($Grades as $Grade)
<div class="panel panel-info">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
{{ $Grade->name }}
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
<div class="panel-body">

<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>
<th style="text-align: center;" class="alert-info">#</th>
<th style="text-align: center;" class="alert-info"> المرحلـة</th>
<th style="text-align: center;" class="alert-info"> الصـف</th>
<th style="text-align: center;" class="alert-info"> القسـم</th>
<th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach ($Grade->Sections as $list_Sections)
<tr>
<?php $i++; ?>
<td>{{ $i }}</td>
<td>{{ $list_Sections->Grades->name }}</td>
<td>{{ $list_Sections->My_Classes->name_class }}</td>
<td style="font-weight: bold; font-size: 20px;">{{ $list_Sections->name_section }}</td>
<td>{{ $list_Sections->create_by }}</td>
<td>
    <div class="btn-group">
    <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $list_Sections->id }}"
            title="تعديل"><i
            class="fa fa-edit"></i></button>
    <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#delete_section{{ $list_Sections->id }}"
            title="حذف"><i class="fa fa-trash"></i></button>
    </div>
</td>
</tr>

<!--تعديل قسم جديد -->
<div class="modal fade"
id="edit{{ $list_Sections->id }}"
tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title"
            style="font-family: 'Cairo', sans-serif; font-weidth:bold; font-size:20;" 
            id="exampleModalLabel">
            تعديل قسـم
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Sections.update', 'test') }}" method="POST">
{{ method_field('patch') }}
{{ csrf_field() }}

<div class="box-body">
    <div class="row">

        <div class="col-md-4">
            <label >المرحـلة الدراسيـة</label>
            <select name="Grade_id" class="form-control select2" style="width: 100%;">
        <option value="{{ $Grade->id }}"> {{ $Grade->name }} </option>
    @foreach ($list_Grades as $list_Grade)
        <option value="{{ $list_Grade->id }}">{{ $list_Grade->name }}</option>
    @endforeach    
    </select>
    </div>

        <div class="col-md-4">
            <label >الصــف الدراسـي</label>
            <select name="Classroom_id" class="form-control select2" style="width: 100%;">
            <option value="{{ $list_Sections->My_Classes->id }}">
                {{ $list_Sections->My_Classes->name_class }}
            </option>
    
            </select>
    </div>

        <div class="col-md-4">
            <label >القسـم</label>
            <select class="form-control select2" style="width: 100%;" name="Name_Section">
                <option >{{$list_Sections->name_section}}</option>
                <option value="أ">أ</option>
                <option value="ب">ب</option>
                <option value="ج">ج</option>
            </select>

            <input id="id"
            type="hidden"
            name="id"
            class="form-control"
            value="{{ $list_Sections->id }}">
    </div>
    </div><br>
    <div class="row">
        <div class="col-md-6">
            <label >المعلـم</label>
            <select name="teacher_id[]" class="form-control select2" multiple="multiple" style="width: 100%;">
            @foreach($list_Sections->teachers as $teacher)
            <option selected value="{{$teacher['id']}}">{{$teacher['name']}}</option>
        @endforeach

        @foreach($teachers as $teacher)
            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
        @endforeach
            </select>
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

<!-- this -->
<!-- delete_modal_Grade -->
<div class="modal fade" id="delete_section{{ $list_Sections->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
            id="exampleModalLabel">
            حـذف قسـم
        </h5>
        
    </div>
    <div class="modal-body">
        <form action="{{ route('Sections.destroy', 'test') }}" method="post">
            {{ method_field('Delete') }}
            @csrf
            هل انت متاكد من عملية حـذف القسـم ؟
            <input id="Name" type="text" name="Name"
            class="form-control"
            value="{{ $list_Sections->name_section }}"
            disabled style="text-align: center; font-weidth:bolder; font-size:20px;">
            <input id="id" type="hidden" name="id" class="form-control"
                value="{{ $list_Sections->id }}">
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
<!-- end -->

@endforeach
</tbody>
</table>

</div><!-- /.box-body -->


</div>
</div>
@endforeach
</div>
</div>

    <!--اضافة قسم جديد -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
id="exampleModalLabel">
اضافة قسـم</h5>

</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Sections.store') }}" method="POST">
{{ csrf_field() }}
<div class="box-body">

<div class="row">

    <div class="col-md-4">
        <label >المرحـلة الدراسيـة</label>
        <select name="Grade_id" class="form-control select2" style="width: 100%;">
        <option selected disabled>اختـر من القائمة...</option>
        @foreach ($Grades as $list_Grade)
            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
            </option>
        @endforeach
    </select>
</div>

    <div class="col-md-4">
        <label >الصــف الدراسـي</label>
        <select name="Classroom_id" class="form-control select2" style="width: 100%;">

    </select>
</div>

    <div class="col-md-4">
        <label >القسـم</label>
        <select class="form-control select2" style="width: 100%;" name="Name_Section">
            <option selected disabled>اختـر من القائمة...</option>
            <option value="أ">أ</option>
            <option value="ب">ب</option>
            <option value="ج">ج</option>
        </select>
</div>

</div><br>
<div class="row">
    <div class="col-md-6">
        <label >المعلـم</label>
        <select name="teacher_id[]" class="form-control select2" multiple="multiple" style="width: 100%;">
        @foreach ($teachers as $teacher)
        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
        </select>
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



</section>

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
