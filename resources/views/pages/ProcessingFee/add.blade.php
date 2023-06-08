@extends('layouts.master')
@section('css')
@section('title')
   استبعاد رسوم
@stop
@endsection
@section('page-header')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
استبعاد رسوم الطـالـب  <label style="color: #5686E0">{{$Student->student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('ProcessingFee.index')}}"><i class="fa fa-user-times"></i> قائمـة معالجات الرسوم الدراسية </a></li>
<li class="active">استبعاد رسوم طـالـب </li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
</div><!-- /.box-header -->

<form  action="{{route('ProcessingFee.store')}}"  method="POST" >
@csrf
<div class="box-body">
    <div class="row">

        <div class="col-md-3"> 
            <div class="form-group">
            <label> المبلغ</label>
            <input  type="hidden" name="student_id"  value="{{$Student->id}}" class="form-control">
            <input  class="form-control" value="{{ old('Debit') }}" name="Debit" type="number" class="form-control">
            </div>
            @error('Debit')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>رصيد الطالب </label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px;" value="{{ number_format($Student->student_account->sum('Debit_feeInvoice') - $Student->student_account->sum('credit_receipt')) }}" type="text" readonly>
        </div>
        <div class="col-md-6">
            <label>البيان</label>
            <textarea class="form-control" name="description" rows="2">{{ old('description') }}</textarea>
            @error('description')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

    </div><br>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-primary btn-block">تـأكـيد البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->


@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection