@extends('layouts.master')
@section('css')

@section('title')
اضافة فاتورة جديدة
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h3 class="col-md-6">
اضافة فاتورة رسوم للطالب  <label  style="color: #5686E0">{{$student->student->name}}</label>
</h3>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">اضافة فاتورة جديدة </li>
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

<form  action="{{route('Fees_Invoices.store')}}"  method="POST" >
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-3"> 
            <div class="form-group">
            <label>أسم الطـالـب</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option value="{{ $student->student_id }}">{{ $student->student->name }}</option>
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
            <select class="form-control select2" style="width: 100%;" name="Fee_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach($fees as $fee)
                <option value="{{ $fee->id }}">{{ $fee->title }}</option>
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
            <input type="hidden" name="Grade_id" value="{{$student->grade_id}}">
            <input type="hidden" name="Classroom_id" value="{{$student->classroom_id}}">
            <select class="form-control select2" style="width: 100%;" name="amount">
                <option  selected disabled>أختـر من القائمة...</option>
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
            <label for="inputEmail4">البيان</label>
            <input type="text" value="{{ old('description') }}" name="description" class="form-control">
            @error('description')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div>
    </div><br>

<div class="modal-footer">
<button type="submit"
    class="btn btn-primary btn-block">تاكيد البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection