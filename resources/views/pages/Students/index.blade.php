@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الطـلاب</li>
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
<a href="{{route('Students.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة طـالـب</a>
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
    <th style="text-align: center;" class="alert-info">أسم الطالب</th>
    <th style="text-align: center;" class="alert-info"> النوع</th>
    <th style="text-align: center;" class="alert-info">المرحلة الدراسية</th>
    <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
    <th style="text-align: center;" class="alert-info">أسـم الأب </th>
    <th style="text-align: center;" class="alert-info"> هاتف الاب</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($Students as $Student)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Student->name }}</td>
            <td>{{ $Student->gender->name }}</td>
            <td>{{$Student->grade->name}}</td>
            <td>{{$Student->classroom->name_class}}</td>
            <td>{{ $Student->father_name }}</td>
            <td>{{ $Student->father_phone }}</td>
            <td>{{ $Student->create_by }}</td>
            <td>
                {{-- <a class="btn btn-praymary btn-sm" href="#" title=""></a> --}}
                <a href="{{route('Students.show',$Student->id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="عرض بيانات الطالب"><i class="fa fa-eye"></i></a>
                <a href="{{route('Receipts.show',$Student->id)}}" class="btn btn-default btn-sm" role="button" aria-pressed="true" title="سند قبض أو تسديد رسوم"><i class="fa fa-dollar"></i></a>
                <a href="{{ route('Fees_Invoices.show',$Student->id) }}" class="btn btn-success btn-sm" role="button" aria-pressed="true" title="اضافة فاتورة رسوم"><i class="fa fa-money"></i></a>
                <a href="{{ route('ProcessingFee.show',$Student->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" title="استبعاد رسوم"><i class="fas fa-user-times"></i></a>
                <a href="{{ route('Payments.show',$Student->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="سند صرف"><i class="fas fa-donate"></i></a>
                <a href="{{route('Students.edit',$Student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Student{{ $Student->id }}" title="حذف"><i class="fa fa-trash"></i></button>

                {{-- <div class="dropdown show">
                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        العمليات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('Students.show',$Student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                        <a class="dropdown-item" href="{{route('Students.edit',$Student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                        <a class="dropdown-item" href="{{route('Fees_Invoices.show',$Student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
                        <a class="dropdown-item" href="{{route('Receipts.show',$Student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a>
                        <a class="dropdown-item" href="{{route('ProcessingFee.show',$Student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a>
                        <a class="dropdown-item" href="{{route('Payment_students.show',$Student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;سند صرف</a>
                        <a class="dropdown-item" data-target="#Delete_Student{{ $Student->id }}" data-toggle="modal" href="##Delete_Student{{ $Student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات الطالب</a>
                    </div>
                </div> --}}

            </td>
        </tr>


<div class="modal fade" id="delete_Student{{$Student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Students.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف الطـالـب </p>
                <input type="hidden" name="id"  value="{{$Student->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$Student->name}}"
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
</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection