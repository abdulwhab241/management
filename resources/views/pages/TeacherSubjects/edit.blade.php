@extends('layouts.master')
@section('css')

@section('title')
تعديل مادة المعلم
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعديل مادة المعلم
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('TeacherSubjects.index')}}"><i class="fa fa-book"></i> قائمـة مواد المعلمين </a></li>
<li class="active">تعديل مادة المعلم</li>
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


<form  action="{{route('TeacherSubjects.update','test')}}"  method="POST" >
{{ method_field('patch') }}
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-6"> 
            <label>أسم المعلم</label>
            <input type="hidden" name="id" value="{{$TeacherSubjects->id}}">
            <select class="form-control select2" style="width: 100%;" name="Teacher_id">
                <option value="{{ $TeacherSubjects->teacher_id }}">{{ $TeacherSubjects->teacher->name }}</option>
                @foreach($Teachers as $Teacher)
                <option value="{{$Teacher->id}}">{{$Teacher->name}}</option>
            @endforeach
            </select>  
            @error('Teacher_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-6">
            <label>المادة</label>
            <select class="form-control select2" style="width: 100%;" name="Subject_id">
                <option value="{{ $TeacherSubjects->subject_id }}">{{ $TeacherSubjects->subject->name }}</option>
                @foreach($Subjects as $Subject)
                <option value="{{$Subject->id}}">{{$Subject->name}}</option>
            @endforeach
            </select>                        
            @error('Subject_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>


    </div><br>


</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">تعـديـل البيانات</button>
</div>

</form>


</div>
</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection