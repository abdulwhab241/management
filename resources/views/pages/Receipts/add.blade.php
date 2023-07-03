@extends('layouts.master')
@section('css')

@section('title')
   تسديـد رسـوم الطالـب
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تسديـد رسـوم الطالـب 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Receipts.index')}}"><i class="fa fa-list"></i> قائمـة سندات القبض </a></li>
<li class="active">تسديـد رسـوم الطالـب </li>
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

<form  action="{{route('Receipts.store')}}"  method="POST" >
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-3"> 
            <div class="form-group">
            <label>أسم الطـالـب</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($student as $Student)
                    <option  value="{{ $Student->student_id }}">{{ $Student->student->name }}</option>
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
            <label>المبـلغ</label>
            <input type="number" value="{{ old('Debit') }}" name="Debit" class="form-control">
            @error('Debit')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label >البيـان</label>
            <textarea class="form-control" name="description" rows="1">{{ old('description') }}</textarea>
            @error('description')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
            </div>
        </div>
    </div><br>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">حفظ البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection