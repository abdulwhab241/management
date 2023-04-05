@extends('layouts.master')
@section('css')

@section('title')
    تعديل جدول الحصـص
@stop
@endsection
{{-- @section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تعديل جدول الحصـص</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">تعديل جدول الحصـص</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    تعديل جدول الحصـص
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تـعديـل الجـدول
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Classes.index')}}"><i class="fa fa-book"></i> قائمـة جدول الحصـص </a></li>
<li class="active">تـعديـل الجـدول</li>
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

<form action="{{route('Classes.update','test')}}" method="post">
    @method('PUT')
    @csrf
<div class="box-body">
    <div class="row">
        <div class="col-xs-3"> 
            <label >الـيوم</label>
            <input id="id" type="hidden" name="id" class="form-control" value="{{ $StudentClasses->id }}">
            <select class="form-control select2" name="Day_id">
            <option value="{{ $StudentClasses->day->id }}">
                {{ $StudentClasses->day->name }}
            </option>
            @foreach ($Days as $day)
                <option value="{{ $day->id }}">
                    {{ $day->name }}
                </option>
            @endforeach
            </select>
            @error('Day_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-3">
            <label >المرحلـة الدراسيـة</label>
            <select class="form-control select2" name="Grade_id">

                <option value="{{ $StudentClasses->grade->id }}">
                    {{ $StudentClasses->grade->name }}
                </option>
                @foreach ($Grades as $Grade)
                <option value="{{ $Grade->id }}">
                    {{ $Grade->name }}
                </option>
                @endforeach
            </select>                
            @error('Grade_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-3">
            <label >الصـف الدراسـي</label>
            <select class="form-control select2" name="Classroom_id">

                <option value="{{ $StudentClasses->classroom->id }}">
                    {{ $StudentClasses->classroom->name_class }}
                </option>
                @foreach ($Classrooms as $classroom)
                <option value="{{ $classroom->id }}">
                    {{ $classroom->name_class }}
                </option>
                @endforeach
            </select>                        
            @error('Classroom_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-3">
            <label >الشعبـة</label>
            <select class="form-control select2" name="Section_id">

                <option value="{{ $StudentClasses->section->id }}">
                    {{ $StudentClasses->section->name_section }}
                </option>
                @foreach ($Sections as $section)
                    <option value="{{ $section->id }}">
                        {{ $section->name_section }}
                    </option>
                @endforeach
            </select>
            @error('Section_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div><br>

    <div class="row">
        <div class="col-xs-4">
            <label >الحصـة</label>
            <select class="form-control select2" name="School_id">

                <option value="{{ $StudentClasses->schoolClass->id }}">
                    {{ $StudentClasses->schoolClass->name }}
                </option>
                @foreach ($Schools as $School)
                <option value="{{ $School->id }}">
                    {{ $School->name }}
                </option>
                @endforeach
            </select>
            @error('School_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-xs-4">
            <label >المـادة</label>
            <select class="form-control select2" name="Subject_id">

                <option value="{{ $StudentClasses->subject->id }}">
                    {{ $StudentClasses->subject->name }}
                </option>
                @foreach ($Subjects as $Subject)
                <option value="{{ $Subject->id }}">
                    {{ $Subject->name }}
                </option>
                @endforeach
            </select>
            @error('Subject_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-4">
            <label >الأسـتاذ</label>
            <select class="form-control select2" name="Teacher_id">

                <option value="{{ $StudentClasses->teacher->id }}">
                    {{ $StudentClasses->teacher->name }}
                </option>
                @foreach ($Teachers as $teacher)
                <option value="{{ $teacher->id }}">
                    {{ $teacher->name }}
                </option>
                @endforeach
            </select>
            @error('Teacher_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div>
        <br>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">تـعديـل البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection