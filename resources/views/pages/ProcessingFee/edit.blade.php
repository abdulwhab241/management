@extends('layouts.master')
@section('css')

@section('title')
  تعديل معالجة رسوم
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    تعديل استبعاد رسوم الطـالـب  <label style="color: #5686E0">{{$ProcessingFee->student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('ProcessingFee.index')}}"><i class="fa fa-user-times"></i> قائمـة معالجات الرسوم الدراسية </a></li>
<li class="active">تعديل استبعاد رسوم طـالـب </li>
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


<form action="{{route('ProcessingFee.update','test')}}" method="post" >
    @method('PUT')
    @csrf
<div class="box-body">
    <div class="row">

        <div class="col-md-3"> 
            <div class="form-group">
            <label> المبلغ</label>
            <input  class="form-control" name="Debit" value="{{ $ProcessingFee->amount}}" type="number" >
            <input  type="hidden" name="Student_id" value="{{$ProcessingFee->student_id}}" class="form-control">
            <input  type="hidden" name="id"  value="{{$ProcessingFee->id}}" class="form-control">
        </div>
            @error('Debit')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>رصيد الطالب </label>
            <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px;" value="{{ number_format($ProcessingFee->student->student_account->sum('Debit_feeInvoice') + $ProcessingFee->student->student_account->sum('Debit_payment') - $ProcessingFee->student->student_account->sum('credit_receipt') - $ProcessingFee->student->student_account->sum('credit_processing')  ) }}" type="text" readonly>
        </div>
        <div class="col-md-6">
            <label>البيان</label>
            <textarea class="form-control" name="description" rows="2">{{$ProcessingFee->description}}</textarea>
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
    class="btn btn-primary btn-block">تـعديـل البيانات</button>
</div>

</form>


</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection