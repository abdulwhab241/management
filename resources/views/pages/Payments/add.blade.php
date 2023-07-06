@extends('layouts.master')
@section('css')

@section('title')
إضـافـة سـند صـرف
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    إضـافـة سـند صـرف للطـالـب  
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Payments.index')}}"><i class="fas fa-donate"></i> قائمـة سنـدات الصـرف </a></li>
<li class="active">إضـافـة سـند صـرف للطـالـب </li>
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


<form  action="{{ route('Payments.store') }}"  method="POST" >
@csrf
<div class="box-body">
    <div class="row">

        <div class="col-md-4">
            <label >أسـم الطـالـب</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Enrollments as $Student)
                <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
                @endforeach
            </select>
            @error('Student_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-4"> 
            <label> المبلغ</label>
            <input  class="form-control" value="{{ old('Debit') }}" name="Debit" type="number" class="form-control">
            @error('Debit')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-4">
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

</div><!-- /.box-header -->
</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection