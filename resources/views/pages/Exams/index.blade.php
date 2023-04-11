@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الأختبـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الأختبـارات
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الأختبـارات</li>
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
<a href="#" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة إختبـار</a>
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
    <th style="text-align: center;" class="alert-info">الصـف الدراسـي </th>
    <th style="text-align: center;" class="alert-info"> المـادة</th>
    <th style="text-align: center;" class="alert-info">الأستـاذ </th>
    <th style="text-align: center;" class="alert-info">مجمـوع الدرجـات</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($Exams as $Exam)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Exam->classroom->name_class }}</td>
            <td>{{ $Exam->subject->name }}</td>
            <td>{{$Exam->teacher->name}}</td>
            <td>{{$Exam->total_marks}}</td>
            <td>{{ $Exam->create_by }}</td>
            <td>
                {{-- <a href="#" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="عرض بيانات الطالب"><i class="fa fa-eye"></i></a>
                <a href="{{route('Receipts.show',$Student->id)}}" class="btn btn-default btn-sm" role="button" aria-pressed="true" title="سند قبض أو تسديد رسوم"><i class="fa fa-dollar"></i></a>
                <a href="{{ route('Fees_Invoices.show',$Student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true" title="اضافة فاتورة رسوم"><i class="fa fa-money"></i></a>
                <a href="{{ route('ProcessingFee.show',$Student->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" title="استبعاد رسوم"><i class="fas fa-user-times"></i></a>
                <a href="{{ route('Payments.show',$Student->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="سند صرف"><i class="fas fa-donate"></i></a> --}}
                <a href="{{route('Exams.edit',$Exam->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Exam{{ $Exam->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>


<div class="modal fade" id="delete_Exam{{$Exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Exams.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف إختبـار مـادة </p>
                <input type="hidden" name="id"  value="{{$Exam->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$Exam->subject->name}}"
                disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
                        data-dismiss="modal">إغلاق</button>
                <button type="submit"
                        class="btn btn-outline">حذف البيانات</button>
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

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
إضافة صف
</h5>
</div>
<div class="box-body">

<form class="form-horizontal" action="{{ route('Classrooms.store') }}" method="POST">
@csrf

<div class="box-body">
    
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">أسـم الصـف</label>
        <div class="col-sm-10">
            <input  type="text" name="Name" class="form-control" id="inputEmail2" required>
    </div>
    </div>

    <div class="form-group">
        <label for="inputEmail2" class="col-sm-2 control-label">أسـم المرحلـة</label>
        <div class="col-sm-10">
        <select class="form-control select2" data-placeholder="Select a State" name="Grade_id">
            @foreach ($Grades as $Grade)
                <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
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
</form>
</div>


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