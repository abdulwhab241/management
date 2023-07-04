@extends('layouts.master')
@section('css')

@section('title')
قائمة النتـائـج
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قائمة النتـائـج الشـهـريـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة النتـائـج الشـهـريـة</li>
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

<div class="box-body">
    <a href="{{route('Results.create')}}" class="btn btn-success btn-flat" role="button"
    aria-pressed="true">اضافة نتيـجـة</a>
    <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_results') }}">
        <i class="fas fa-file-download"></i>  
    </a>
</div>
<br>
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
<th style="text-align: center;" class="alert-info">الفصـل الدراسي</th>
<th style="text-align: center;" class="alert-info"> نتيـجة شهـر</th>
<th style="text-align: center;" class="alert-info"> المـادة</th>
<th style="text-align: center;" class="alert-info">أسـم الطـالـب \ الطـالبـة </th>
<th style="text-align: center;" class="alert-info">الدرجـة التي حصـل عليـها </th>
<th style="text-align: center;" class="alert-info">التقـديـر</th>
<th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
<?php $i = 0; ?>
@foreach ($Results as $Result)
    <tr>
        <?php $i++; ?>
        <td>{{ $i }}</td>
        <td>{{ $Result->semester->name }}</td>
        <td>{{$Result->month->name}}</td>
        <td>{{ $Result->exam->subject->name }}</td>
        <td>{{ $Result->student->name }}</td>
        <td>{{$Result->marks_obtained}}</td>
        <td>{{$Result->appreciation}}</td>
        <td>{{ $Result->create_by }}</td>
        <td>
            <div class="btn-group">
            <a href="{{route('Results.edit',$Result->id)}}" style="margin: 3px;" title="تعديل" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
            <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#delete_Result{{ $Result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </div>
        </td>
    </tr>


<!-- Delete modal -->
<div class="modal fade" id="delete_Result{{$Result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
    <form action="{{route('Results.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                حـذف نتيـجة الطـالـب <label style="color: #5686E0; font-weight:bolder; font-size: 20px;">{{ $Result->student->name }}</label>
            </h5>
        
        </div>
        <div class="modal-body">
            <p> هل انت متاكد من عملية حذف نتيجـة الطـالـب  </p>
            <input type="hidden" name="id"  value="{{$Result->id}}">
            <input  type="text" style="font-weight: bolder; font-size:20px;"
            name="Name_Section"
            class="form-control"
            value="{{$Result->student->name}}"
            disabled>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline"
                    data-dismiss="modal">إغلاق</button>
            <button type="submit"
                    class="btn btn-outline">تـأكـيد</button>
        </div>
    </div>
    </form>
</div>
</div>
@endforeach
</tbody>
</table>
</div>
</div>




</div>
</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection