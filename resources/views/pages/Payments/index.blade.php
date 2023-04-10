@extends('layouts.master')
@section('css')

@section('title')
    سندات الصرف
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        سندات الصرف
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    
    <li class="active">سندات الصرف</li>
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
    <br>
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
            <th style="text-align: center;" class="alert-info">الاسم</th>
            <th style="text-align: center;" class="alert-info">المبلغ</th>
            <th style="text-align: center;" class="alert-info">البيان</th>
            <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
            <th style="text-align: center;" class="alert-warning">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payment_students as $payment_student)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$payment_student->student->name}}</td>
        <td>{{ number_format($payment_student->amount) }} ريال </td>
        <td>{{$payment_student->description}}</td>
        <td>{{$payment_student->create_by}}</td>
            <td>
                <a href="{{route('Payments.edit',$payment_student->id)}}" title="تعديل" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" title="حذف"  data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
            </td>
        </tr>

    @include('pages.Payments.Delete')
@endforeach
    </tbody>
    </tbody>
</table>
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