@extends('layouts.master')
@section('css')

@section('title')
تعديل جدول حصـص المعلمين
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعديل جدول حصـص المعلمين 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Classes_Teacher.index')}}"><i class="fas fa-books"></i> قائمـة جدول حصـص المعلمين </a></li>
<li class="active">تعديل جدول حصـص المعلمين </li>
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

<form  action="{{route('Classes_Teacher.update','test')}}"  method="POST" >
{{ method_field('patch') }}
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
        <label >الـيوم</label>
        <input type="hidden" name="id" value="{{$TeacherClasses->id}}">
        <select class="form-control select2" style="width: 100%;" name="Day_id">
            <option > {{ $TeacherClasses->day }} </option>
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
            @foreach($Teachers as $Teacher)
            <option
                value="{{$Teacher->id}}" {{$Teacher->id == $TeacherClasses->teacher_id ?'selected':''}}>{{$Teacher->name }}</option>
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
        <input type="text"value="{{$TeacherClasses->first}}" name="First" class="form-control">
        </div>
    </div>

</div><br>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الثانية</label>
        <input type="text" value="{{$TeacherClasses->second}}" name="Second" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الثالثة</label>
        <input type="text" value="{{$TeacherClasses->third}}" name="Third" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الرابعة</label>
        <input type="text" value="{{$TeacherClasses->fourth}}" name="Fourth" class="form-control">
        </div>
    </div>
</div><br>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة الخامسة</label>
        <input type="text" value="{{$TeacherClasses->fifth}}" name="Fifth" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة السادسة</label>
        <input type="text" value="{{$TeacherClasses->sixth}}" name="Sixth" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label>الحصـة السابعة</label>
        <input type="text" value="{{$TeacherClasses->seventh}}" name="Seventh" class="form-control">
        </div>
    </div>
</div><br>

</div>
<div class="modal-footer">
<button type="submit"
class="btn btn-success btn-block">تعديل البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection