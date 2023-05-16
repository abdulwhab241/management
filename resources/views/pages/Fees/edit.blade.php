@extends('layouts.master')
@section('css')

@section('title')
تعديل رسوم دراسية
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    تعديل رسوم دراسية
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Fees.index')}}"><i class="fa fa-dollar"></i> قائمـة الرسـوم الدراسيـة </a></li>
<li class="active">تعديل رسوم دراسية</li>
</ol>
</section>

<!-- Main content -->
<section class="content" dir="rtl">
<!-- row -->
<div class="row">
<div class="col-xs-12 mb-30">
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

<form action="{{route('Fees.update','test')}}" method="post" autocomplete="off">
    @method('PUT')
    @csrf
    <div class="box-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
            <label>أسم الرسوم</label>
            <input type="text" value="{{$fee->title }}" name="title" class="form-control">
            <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label>المبلغ</label>
            <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
        </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label >المرحلة الدراسية</label>
            <select class="form-control select2" style="width: 100%;" name="Grade_id">
                @foreach($Grades as $Grade)
                    <option value="{{ $Grade->id }}" {{$Grade->id == $fee->grade_id ? 'selected' : ""}}>{{ $Grade->name }}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label>الصف الدراسي</label>
            <select class="form-control select2" style="width: 100%;" name="Classroom_id">
                <option value="{{$fee->classroom_id}}">{{$fee->classroom->name_class}}</option>
                @foreach($Classrooms as $Classroom)
                <option value="{{ $Classroom->id }}">{{ $Classroom->name_class }}</option>
                @endforeach

            </select>
            </div>
        </div>

    </div><br>


    <div class="row">


        <div class="col-md-3">
            <div class="form-group">
            <label>السنة الدراسية</label>
            <select class="form-control select2" style="width: 100%;" name="year">
                @php
                    $current_year = date("Y")
                @endphp
                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                    <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
                @endfor
            </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label>نـوع الرسـوم</label>
            <select class="form-control select2" style="width: 100%;" name="Fee_type">
                <option >{{$fee->fee_type}}</option>
                    <option value="رسوم دراسية">رسوم دراسية</option>
                        <option value="رسوم باص">رسوم باص</option>
            </select>
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="form-group">
            <label>ملاحظات</label>
            <textarea class="form-control" name="description" rows="3">{{$fee->description}}</textarea>
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
</div>
</div>
</div>
</section>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection