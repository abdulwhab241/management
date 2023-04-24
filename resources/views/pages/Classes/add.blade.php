@extends('layouts.master')
@section('css')

@section('title')
إضافة جدول الحصـص
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
إضافة جدول الحصـص
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Classes.index')}}"><i class="fa fa-book"></i> قائمـة جدول الحصـص </a></li>
<li class="active">إضافة جدول الحصـص</li>
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

<form  action="{{ route('Classes.store') }}" method="POST">
    @csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-3"> 
            <label >الـيوم</label>
            <select class="form-control select2" name="Day_id">
                <option selected disabled>أختـر من القائمة...</option>
            @foreach ($Days as $Day)
            <option value="{{ $Day->id }}">{{ $Day->name }}</option>
            @endforeach
            </select>
            @error('Day_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label >المرحلـة الدراسيـة</label>
            <select class="form-control select2" name="Grade_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Grades as $Grade)
                    <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                @endforeach
            </select>                
            @error('Grade_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label >الصـف الدراسـي</label>
            <select class="form-control select2" name="Classroom_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Classrooms as $Classroom)
                    <option value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
                @endforeach
            </select>                        
            @error('Classroom_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label >الشعبـة</label>
            <select class="form-control select2" name="Section_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Sections as $Section)
                    <option value="{{ $Section->id }}" required>{{ $Section->name_section }}</option>
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
        <div class="col-md-4">
            <label >الحصـة</label>
            <select class="form-control select2" name="School_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Schools as $School)
                    <option value="{{ $School->id }}" required>{{ $School->name }}</option>
                @endforeach
            </select>
            @error('School_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label >المـادة</label>
            <select class="form-control select2" name="Subject_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Subjects as $Subject)
                    <option value="{{ $Subject->id }}">{{ $Subject->name }}</option>
                @endforeach
            </select>
            @error('Subject_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label >الأسـتاذ</label>
            <select class="form-control select2" name="Teacher_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Teachers as $Teacher)
                    <option value="{{ $Teacher->id }}" required>{{ $Teacher->name }}</option>
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