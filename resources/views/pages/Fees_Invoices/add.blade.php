@extends('layouts.master')
@section('css')

@section('title')
اضافة فاتورة جديدة
@stop
@endsection

@section('content')



<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة فاتورة جديدة 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Fees_Invoices.index')}}"><i class="fa fa-list"></i> قائمـة الـفواتيـر الدراسيـة </a></li>
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
            <select class="form-control select2" style="width: 100%;"  name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Students as $Student)
                    <option  value="{{ $Student->student_id }}" required>{{ $Student->student->name }}</option>
                @endforeach
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
            <label>المرحلة الدراسية</label>
            <select class="form-control select2" style="width: 100%;"  name="Grade_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Grades as $Grade)
                    <option  value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                @endforeach
            </select>
            </div>
            @error('Grade_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3"> 
            <div class="form-group">
            <label>الصـف الدراسي</label>
            <select class="form-control select2" style="width: 100%;" name="Classroom_id">

            </select>
            </div>
            @error('Classroom_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3"> 
            <div class="form-group">
            <label>نـوع الرسـوم </label>
            <select class="form-control select2" style="width: 100%;" name="Fee_id">

            </select>
            </div>
            @error('Fee_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-3"> 
            <div class="form-group">
            <label> المبلغ</label>
            <select class="form-control select2" style="width: 100%;" name="amount">

            </select>
            </div>
            @error('amount')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label >البيان</label>
            <input type="text" value="{{ old('description') }}" name="description" class="form-control">
            @error('description')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div>
    

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