@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
@section('title')
اضافة رسوم جديدة
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    اضافة رسوم جديدة
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Fees.index')}}"><i class="fa fa-dollar"></i> قائمـة الرسـوم الدراسيـة </a></li>
<li class="active">اضافة رسوم جديدة</li>
</ol>
</section>
<!-- Main content -->

<!-- Main content -->
<section class="content" dir="rtl">

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

<form  action="{{ route('Fees.store') }}"  method="POST" autocomplete="off">
@csrf
{{-- <div class="box-body"> --}}
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                <label>أسم الرسوم</label>
                <input type="text" value="{{ old('title') }}" name="title" class="form-control">
                @error('title')
                <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label>المبلـغ</label>
                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                @error('amount')
                <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label>المرحلـة الدراسيـة</label>
                <select class="form-control select2" style="width: 100%;" name="Grade_id">
                    <option selected disabled>حـدد المرحـلة...</option>
                    @foreach($Grades as $Grade)
                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                    @endforeach
                </select>                        
                @error('Grade_id')
                <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label>الصـف الدراسـي</label>
                <select class="form-control select2" style="width: 100%;" name="Classroom_id">
                    <option selected disabled>حـدد الـصـف...</option>
                
                </select>                       
                @error('Classroom_id')
                <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            </div>

        </div>
        <br>

        <div class="row">
    
            <div class="col-md-3">
                <div class="form-group">
                <label>السنـة الدراسيـة</label>
                <select class="form-control select2" style="width: 100%;" name="year">
                    <option selected disabled>حـدد السنـة...</option>
                    @php
                        $current_year = date("Y")
                    @endphp
                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                        <option value="{{ $year}}">{{ $year }}</option>
                    @endfor
                    </select>                       
                    @error('year')
                    <div class=" alert-danger">
                        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label>نـوع الرسـوم</label>
                <select class="form-control select2" style="width: 100%;" name="Fee_type">
                    <option value="رسوم دراسية">رسوم دراسية</option>
                    <option value="رسوم باص">رسوم باص</option>
                </select>                       
                @error('Fee_type')
                <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>ملاحظات</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
            </div>

        </div>   
        <br>
        <div class="modal-footer">
            <button type="submit"
                class="btn btn-success btn-block">تأكيـد</button>
            </div>

</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection