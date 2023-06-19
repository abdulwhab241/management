@extends('layouts.master')
@section('css')

@section('title')
إضافة جدول حصـص المعلمين
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
إضافة جدول حصـص المعلمين 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Classes_Teacher.index')}}"><i class="fas fa-books"></i> قائمـة جدول حصـص المعلمين </a></li>
<li class="active">إضافة جدول حصـص المعلمين </li>
</ol>
</section>

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

<form  action="{{route('Classes_Teacher.store')}}"  method="POST" >
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
        <label >الـيوم</label>
        <select class="form-control select2" style="width: 100%;" name="Day_id">
            <option selected disabled>أختـر من القائمة...</option>
            <option value="السبت">السبت</option>
            <option value="الاحد">الاحد</option>
            <option value="الاثنين">الاثنين</option>
            <option value="الثلاثاء">الثلاثاء</option>
            <option value="الاربعاء">الاربعاء</option>
        </select>
        </div>
        @error('Day_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>
    <div class="col-md-4"> 
        <div class="form-group">
        <label>أسم الأستاذ</label>
        <select class="form-control select2" style="width: 100%;" name="Teacher_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Teachers as $Teacher)
                <option  value="{{ $Teacher->id }}" required>{{ $Teacher->name }}</option>
            @endforeach
        </select>
        </div>
        @error('Teacher_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الأولى</label>
        <input type="text" value="{{ old('First') }}" name="First" class="form-control">
        </div>
    </div>

</div><br>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الثانية</label>
        <input type="text" value="{{ old('Second') }}" name="Second" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الثالثة</label>
        <input type="text" value="{{ old('Third') }}" name="Third" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الرابعة</label>
        <input type="text" value="{{ old('Fourth') }}" name="Fourth" class="form-control">
        </div>
    </div>
</div><br>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الخامسة</label>
        <input type="text" value="{{ old('Fifth') }}" name="Fifth" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة السادسة</label>
        <input type="text" value="{{ old('Sixth') }}" name="Sixth" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة السابعة</label>
        <input type="text" value="{{ old('Seventh') }}" name="Seventh" class="form-control">
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