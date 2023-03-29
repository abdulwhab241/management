@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    إضافة جدول الحصـص
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> إضافة جدول الحصـص</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">إضافة جدول الحصـص</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    إضافة جدول الحصـص
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">

    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>

<form  action="{{ route('Classes.store') }}" method="POST">
@csrf


<div class="repeater">
<div data-repeater-list="List_Classes">
<div data-repeater-item>

    <div class="form-row">

        
        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2"> اليوم:</label>

            <div class="box">
                <select class="custom-select mr-sm-2" name="Day_id">
                    @foreach ($Days as $Day)
                        <option value="{{ $Day->id }}" required>{{ $Day->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('Day_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">المرحلة الدراسية
                :</label>

            <div class="box">
                <select class="custom-select mr-sm-2" name="Grade_id">
                    @foreach ($Grades as $Grade)
                        <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('Grade_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">الصـف :</label>

            <div class="box">
                <select class="custom-select mr-sm-2" name="Classroom_id">
                    @foreach ($Classrooms as $Classroom)
                        <option value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
                    @endforeach
                </select>
            </div>
            @error('Classroom_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">الشعبـة:</label>

            <div class="box">
                <select class="custom-select mr-sm-2" name="Section_id">
                    @foreach ($Sections as $Section)
                        <option value="{{ $Section->id }}" required>{{ $Section->name_section }}</option>
                    @endforeach
                </select>
            </div>
            @error('Section_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">الحصـة:</label>

            <div class="box">
                <select class="custom-select mr-sm-2" name="School_id">
                    @foreach ($Schools as $School)
                        <option value="{{ $School->id }}" required>{{ $School->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('School_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">المادة:</label>
            <div class="box">
                <select class="custom-select mr-sm-2" name="Subject_id">
                    @foreach ($Subjects as $Subject)
                        <option value="{{ $Subject->id }}" required>{{ $Subject->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('Subject_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">الأستـاذ:</label>
            <div class="box">
                <select class="custom-select mr-sm-2" name="Teacher_id">
                    @foreach ($Teachers as $Teacher)
                        <option value="{{ $Teacher->id }}" required>{{ $Teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('Teacher_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group col-md-3">
            <label for="Name_en"
                class="mr-sm-2">العمليات
                :</label>
            <input class="btn btn-outline-danger btn-block" data-repeater-delete
                type="button" value="حذف" />
        </div>
    </div>
<br><hr><br>
</div>
</div>
<div class="row mt-20">
<div class="col-12">
    <input class="button" data-repeater-create type="button" value="ادراج سجل"/>
</div>

</div>
<br>

<button type="submit"
class="btn btn-outline-primary btn-block" style="padding:5px; margin: 5px;">حفظ البيانات</button>



</div>
</form>

        </div>
    </div>
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