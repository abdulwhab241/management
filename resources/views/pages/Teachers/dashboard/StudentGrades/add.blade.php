@extends('layouts.master')
@section('css')

@section('title')
اضافة كشـف الـدرجـات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة كشـف الـدرجـات
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Teacher_Grades.index')}}"><i class="fa fa-book"></i> قائمـة كشـف الـدرجـات </a></li>
<li class="active">اضافة كشـف الـدرجـات</li>
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

<form  action="{{route('Teacher_Grades.store','test')}}"  method="POST" >
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-3"> 
        <label>الفصـل الدراسي</label>
        <select class="form-control select2" style="width: 100%;" name="Semester_id">
            <option selected disabled>أختـر من القائمة...</option>
            @foreach($Semesters as $Semester)
                <option value="{{$Semester->id}}">{{$Semester->name}}</option>
            @endforeach
        </select>  
        @error('Semester_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-3">
        <label>المادة</label>
        <select class="form-control select2" style="width: 100%;" name="Subject_id">
            <option selected disabled>أختـر من القائمة...</option>
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

    <div class="col-md-3">
        <label>محصـلـة شـهـر</label>
        <select class="form-control select2" style="width: 100%;" name="Month">
            <option selected disabled>أختـر من القائمة...</option>
            @foreach($Months as $Month)
                <option value="{{$Month->id}}">{{$Month->name}}</option>
            @endforeach  
        </select>                        
        @error('Month')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-3">
        <label>أسـم الطـالـب</label>
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option selected disabled>أختـر من القائمة...</option>
            @foreach($students as $Student)
                <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
            @endforeach
        </select>                        
        @error('Student_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>



</div><br>

<div class="row">

    <div class="col-md-3">
        <label>الواجبـات</label>
        <input type="number" value="{{ old('Homework') }}" name="Homework" class="form-control">
        @error('Homework')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-3">
        <label>شفهـي</label>
        <input type="number" value="{{ old('Verbal') }}" name="Verbal" class="form-control">
        @error('Verbal')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-3">
        <label>مـواظبـة</label>
        <input type="number" value="{{ old('Attendance') }}" name="Attendance" class="form-control">
        @error('Attendance')
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
class="btn btn-success btn-block">تـأكيـد</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection