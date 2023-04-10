@extends('layouts.master')
@section('css')

@section('title')
  تعديل سند صرف
@stop
@endsection
{{-- @section('page-header')
   <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">   تعديل سند صرف</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">  تعديل سند صرف</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
تعديل سند صرف : <label style="color: red">{{$payment_student->student->name}}</label>
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        تعديل سـند صـرف الطـالـب  <label style="color: #5686E0">{{$payment_student->student->name}}</label>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('ProcessingFee.index')}}"><i class="fas fa-donate"></i> قائمـة سنـدات الصـرف </a></li>
    <li class="active">تعديل سـند صـرف طـالـب </li>
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
    
    
    <form action="{{route('Payments.update','test')}}" method="post" >
        @method('PUT')
        @csrf
    <div class="box-body">
        <div class="row">
    
            <div class="col-xs-3"> 
                <div class="form-group">
                <label> المبلغ</label>
                {{-- <input  type="hidden" name="student_id"  value="{{$Student->id}}" class="form-control"> --}}
                {{-- <input  class="form-control" name="Debit" value="{{$ProcessingFee->amount}}" type="number" > --}}
                {{-- <input  type="hidden" name="student_id" value="{{$ProcessingFee->student->id}}" class="form-control"> --}}
                {{-- <input  type="hidden" name="id"  value="{{$ProcessingFee->id}}" class="form-control"> --}}
                <input  class="form-control" name="Debit" value="{{$payment_student->amount}}" type="number" >
                <input  type="hidden" name="student_id" value="{{$payment_student->student->id}}" class="form-control">
                <input  type="hidden" name="id"  value="{{$payment_student->id}}" class="form-control">

            </div>
                @error('Debit')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            {{-- <div class="col-xs-3">
                <label>رصيد الطالب </label>
                <input  class="form-control" name="final_balance" style="font-weight: bolder; font-size:15px;" value="{{ number_format($Student->student_account->sum('Debit') - $Student->student_account->sum('credit')) }}" type="text" readonly>
            </div> --}}
            <div class="col-xs-6">
                <label for="inputEmail4">البيان</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="2">{{$payment_student->description}}</textarea>
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
    </section><!-- /.content -->

{{-- <!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form action="{{route('Payment_students.update','test')}}" method="post" autocomplete="off">
                @method('PUT')
                @csrf
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>المبلغ : <span class="text-danger">*</span></label>
                        <input  class="form-control" name="Debit" value="{{$payment_student->amount}}" type="number" >
                        <input  type="hidden" name="student_id" value="{{$payment_student->student->id}}" class="form-control">
                        <input  type="hidden" name="id"  value="{{$payment_student->id}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>البيان : <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$payment_student->description}}</textarea>
                    </div>
                </div>

            </div>

            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
        </form>

</div>
</div>
</div>
</div>
<!-- row closed --> --}}
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection