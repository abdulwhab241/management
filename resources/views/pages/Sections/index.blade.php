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
<a class="btn btn-success btn-flat" style="padding:5px; margin: 5px;" href="#" data-toggle="modal" data-target="#exampleModal">
اضافة قسـم</a>
<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
<div class="input-group-btn">
<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
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
@foreach ($Sections as $list_Sections)
<tr>
<?php $i++; ?>
<td>{{ $i }}</td>
<td>{{ $list_Sections->Grades->name }}</td>
<td>{{ $list_Sections->My_Classes->name_class }}</td>
<td style="font-weight: bold; font-size: 20px;">{{ $list_Sections->name_section }}</td>
<td>{{ $list_Sections->create_by }}</td>
<td>
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
            data-target="#edit{{ $list_Sections->id }}"
            title="تعديل"><i
            class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
            data-target="#delete_section{{ $list_Sections->id }}"
            title="حذف"><i
                class="fa fa-trash"></i></button>
</td>
</tr>

<!--تعديل قسم جديد -->
<div class="modal fade"
id="edit{{ $list_Sections->id }}"
tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
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
                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">القسـم</label>
                <div class="col-sm-10">
                    <input type="text"
                    name="Name_Section"
                    class="form-control"
                    value="{{ $list_Sections->name_section }}">
                    <input id="id"
                    type="hidden"
                    name="id"
                    class="form-control"
                    value="{{ $list_Sections->id }}">
                </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">المرحـلة</label>
                    <div class="col-sm-10">
                        <select name="Grade_id"
                        class="form-control select2"
                        onclick="console.log($(this).val())">
                    <!--placeholder-->
                    <option
                        value="{{ $list_Sections->Grades->id }}">
                        {{ $list_Sections->Grades->name }}
                    </option>
                    @foreach ($Grades as $list_Grade)
                        <option
                            value="{{ $list_Grade->id }}">
                            {{ $list_Grade->name }}
                        </option>
                    @endforeach
                    </select>
                        
                    </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">الصـف</label>
                        <div class="col-sm-10">
                            <select name="Class_id"
                            class="form-control select2">
                        <option
                            value="{{ $list_Sections->My_Classes->id }}">
                            {{ $list_Sections->My_Classes->name_class }}
                        </option>
                        @foreach ($Classrooms as $list_Classroom)
                        <option
                            value="{{ $list_Classroom->id }}">
                            {{ $list_Classroom->name_class }}
                        </option>
                    @endforeach
                        </select>
                            
                        </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
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
        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
            id="exampleModalLabel">
            حـذف قسـم
        </h5>
        
    </div>
    <div class="modal-body">
        <form action="{{ route('Sections.destroy', 'test') }}" method="post">
            {{ method_field('Delete') }}
            @csrf
            هل انت متاكد من عملية الحذف ؟
            <input id="Name" type="text" name="Name"
            class="form-control"
            value="{{ $list_Sections->name_section }}"
            disabled>
            <input id="id" type="hidden" name="id" class="form-control"
                value="{{ $list_Sections->id }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
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
</table>

</div><!-- /.box-body -->

<div class="box-footer clearfix">
<ul class="pagination pagination-sm no-margin pull-right">
<li><a href="#">&laquo;</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">&raquo;</a></li>
</ul>
</div>
</div><!-- /.box -->
</div>

<!--اضافة قسم جديد -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
id="exampleModalLabel">
اضافة قسـم</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Sections.store') }}" method="POST">
{{ csrf_field() }}
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">القسـم</label>
<div class="col-sm-10">
<input type="text" name="Name_Section" class="form-control" id="inputEmail3">
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">المرحـلة</label>
<div class="col-sm-10">
    <select name="Grade_id" class="form-control select2"
    onchange="console.log($(this).val())">
    <!--placeholder-->
    <option value="" selected 
            disabled>-- حدد المرحـلة --
    </option>
    @foreach ($Grades as $list_Grade)
        <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
        </option>
    @endforeach
</select>
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">الصـف</label>
<div class="col-sm-10">
<select name="Class_id" class="form-control select2"
    >
    <!--placeholder-->
    <option value="" selected 
            disabled>-- حدد الصـف --
    </option>
    @foreach ($Classrooms as $Classroom)
        <option value="{{ $Classroom->id }}"> {{ $Classroom->name_class }}
        </option>
    @endforeach
</select>
</div>
</div>





<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">إغلاق</button>
<button type="submit"
class="btn btn-success">حفظ البيانات</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
</section><!-- /.content -->
{{-- </div> --}}
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
