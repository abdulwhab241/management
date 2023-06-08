@extends('layouts.master')
@section('css')

@section('title')
تعديـل سـند قبـض الطالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعديـل سـند قبـض الطالـب <label style="color: #5686E0">{{$receipt_student->student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">تعديـل سـند قبـض الطالـب  </li>
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

<form  action="{{route('Receipts.update','test')}}"  method="POST" >
    @method('PUT')
    @csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-3"> 
            <div class="form-group">
            <label>أسم الطـالـب</label>
            <input type="hidden" value="{{$receipt_student->id}}" name="id" class="form-control">
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option value="{{ $receipt_student->student->id }}">
                    {{ $receipt_student->student->name }}
                </option>
                @foreach ($Students as $Student)
                    <option value="{{ $Student->student_id }}" disabled>
                        {{ $Student->student->name }}
                    </option>
                @endforeach
            </select>
            @error('Student_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>المبـلغ</label>
            <input type="number" value="{{ $receipt_student->Debit}}" name="Debit" class="form-control">
            @error('Debit')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label>البيـان</label>
            <textarea class="form-control" name="description" rows="1">{{$receipt_student->description}}</textarea>
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
    class="btn btn-success btn-block">تعديـل البيانات</button>
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