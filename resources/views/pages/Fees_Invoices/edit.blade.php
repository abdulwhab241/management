@extends('layouts.master')
@section('css')

@section('title')
تعديل فاتورة رسوم دراسية
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعديل فاتورة رسوم الطالب  <label style="color: #5686E0">{{$fee_invoices->student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Fees_Invoices.index')}}"><i class="fa fa-list"></i> قائمـة الـفواتيـر الدراسيـة </a></li>
<li class="active">تعديل فاتورة رسوم الطالب</li>
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

<form  action="{{route('Fees_Invoices.update','test')}}"  method="POST" >
@method('PUT')
@csrf
<div class="box-body">
    <div class="row">

        <div class="col-md-3"> 
            <div class="form-group">
            <label>أسم الطـالـب</label>
            <input type="hidden" value="{{$fee_invoices->id}}" name="id" class="form-control">
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option value="{{ $fee_invoices->student->id }}">{{ $fee_invoices->student->name }}</option>
            </select>
            </div>
            @error('Student_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    
        <div class="col-md-3"> 
            <div class="form-group">
            <label>نـوع الرسـوم </label>
            <select class="form-control select2" name="Fee_id">
                    @foreach($fees as $fee)
                        <option value="{{$fee->id}}" {{$fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                    @endforeach
            </select>
            </div>
            @error('Fee_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3"> 
            <div class="form-group">
            <label> المبلغ</label>
            <select class="form-control select2" style="width: 100%;" name="amount">
                <option value="{{ $fee_invoices->amount }}"> {{ number_format($fee_invoices->amount) }} </option>
                @foreach($fees as $fee)
                <option value="{{ $fee->amount }}">{{ number_format($fee->amount) }}</option>
                @endforeach
            </select>
            </div>
            @error('amount')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>البيان</label>
            <input type="hidden" name="Grade_id" value="{{$fee_invoices->grade_id}}">
            <input type="hidden" name="Classroom_id" value="{{$fee_invoices->classroom_id}}">
            <input type="text" value="{{ $fee_invoices->description }}" name="description" class="form-control">
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
    class="btn btn-primary btn-block">تعديـل البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection