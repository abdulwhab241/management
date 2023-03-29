@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل جدول الحصـص
@stop
@endsection
@section('page-header')
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
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
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

    <form action="{{route('Classes.update','test')}}" method="post" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="form-row">

        
            <div class="form-group col-md-3">
                <label for="Name_en"
                    class="mr-sm-2"> اليوم:</label>
    
                <div class="box">
                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $StudentClasses->id }}">
                    <select class="custom-select mr-sm-2" name="Day_id">
                        <option value="{{ $StudentClasses->day->id }}">
                            {{ $StudentClasses->day->name }}
                        </option>
                        @foreach ($Days as $day)
                            <option value="{{ $day->id }}">
                                {{ $day->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
        
            </div>
            
            <div class="form-group col-md-3">
                <label for="Name_en"
                    class="mr-sm-2">المرحلة الدراسية
                    :</label>
    
                <div class="box">
                    <select class="custom-select mr-sm-2" name="Grade_id">
                        <option value="{{ $StudentClasses->grade->id }}">
                            {{ $StudentClasses->grade->name }}
                        </option>
                        @foreach ($Grades as $Grade)
                            <option value="{{ $Grade->id }}">
                                {{ $Grade->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            
            <div class="form-group col-md-3">
                <label for="Name_en"
                    class="mr-sm-2">الصـف :</label>
    
                <div class="box">
                    <select class="custom-select mr-sm-2" name="Classroom_id">
                        <option value="{{ $StudentClasses->classroom->id }}">
                            {{ $StudentClasses->classroom->name_class }}
                        </option>
                        @foreach ($Classrooms as $classroom)
                            <option value="{{ $classroom->id }}">
                                {{ $classroom->name_class }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="form-group col-md-3">
                <label for="Name_en"
                    class="mr-sm-2">الشعبـة:</label>
    
                <div class="box">
                    <select class="custom-select mr-sm-2" name="Section_id">
                        <option value="{{ $StudentClasses->section->id }}">
                            {{ $StudentClasses->section->name_section }}
                        </option>
                        @foreach ($Sections as $section)
                            <option value="{{ $section->id }}">
                                {{ $section->name_section }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
    
        <div class="form-row">
            <div class="form-group col-4">
                <label for="Name_en"
                    class="mr-sm-2">الحصـة:</label>
    
                <div class="box">
                    <select class="custom-select mr-sm-2" name="School_id">
                        <option value="{{ $StudentClasses->schoolClass->id }}">
                            {{ $StudentClasses->schoolClass->name }}
                        </option>
                        @foreach ($Schools as $School)
                            <option value="{{ $School->id }}">
                                {{ $School->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-4">
                <label for="Name_en"
                    class="mr-sm-2">المادة:</label>
                <div class="box">
                    <select class="custom-select mr-sm-2" name="Subject_id">
                        <option value="{{ $StudentClasses->subject->id }}">
                            {{ $StudentClasses->subject->name }}
                        </option>
                        @foreach ($Subjects as $Subject)
                            <option value="{{ $Subject->id }}">
                                {{ $Subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="form-group col-4">
                <label for="Name_en"
                    class="mr-sm-2">الأستـاذ:</label>
                <div class="box">
                    <select class="custom-select mr-sm-2" name="Teacher_id">
                        <option value="{{ $StudentClasses->teacher->id }}">
                            {{ $StudentClasses->teacher->name }}
                        </option>
                        @foreach ($Teachers as $teacher)
                            <option value="{{ $teacher->id }}">
                                {{ $teacher->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
    
        </div>
        <br>

        <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right"
        style="padding: 10px; margin: 5px;" type="submit">تعديل البيانات</button>

    </form>

</div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection