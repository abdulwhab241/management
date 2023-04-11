@extends('layouts.master')
@section('css')

@section('title')
  تعديل سند صرف
@stop
@endsection

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
                <input  class="form-control" name="Debit" value="{{ number_format($payment_student->amount) }}" type="number" >
                <input  type="hidden" name="student_id" value="{{$payment_student->student->id}}" class="form-control">
                <input  type="hidden" name="id"  value="{{$payment_student->id}}" class="form-control">

            </div>
                @error('Debit')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>

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

@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection