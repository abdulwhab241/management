@extends('layouts.master')
@section('css')
@section('title')
تـعديـل نتيـجة
@stop
@endsection
@section('page-header')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تـعديـل نتيـجة الطـالـب 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Results.index')}}"><i class="fas fa-percent"></i> قائمـة النـتائـج </a></li>
<li class="active">تـعديـل نتيـجة طـالـب </li>
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

<form class="form-horizontal"  action="{{ route('Results.update', 'test') }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-4"> 
        <label>الفـصل الـدراسـي</label>
        <select class="form-control select2" style="width: 100%;" name="Semester_id">
            <option value="{{ $Result->semester->id }}">
                {{ $Result->semester->name }}
            </option>
            @foreach ($Semesters as $Semester)
                <option value="{{ $Semester->id }}">
                    {{ $Semester->name }}
                </option>
            @endforeach
        </select>
        @error('Semester_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label >نتيـجة شهـر</label>
        <select class="form-control select2" style="width: 100%;" name="Result_name">
            <option value="{{ $Result->month->id }}">
                {{ $Result->month->name }}
            </option>
            @foreach ($Months as $Month)
            <option value="{{ $Month->id }}">
                {{ $Month->name }}
            </option>
        @endforeach
        </select>
    </div>

    <div class="col-md-4"> 
        <label>المـادة</label>
        <select class="form-control select2" style="width: 100%;" name="Exam_id">
            <option value="{{ $Result->exam->subject->id }}">
                {{ $Result->exam->subject->name }}
            </option>
            @foreach ($Exams as $Exam)
            <option value="{{ $Exam->id }}">
                {{ $Exam->subject->name }}
            </option>
        @endforeach
        </select>
    </div>

</div><br>

<div class="row">
<div class="col-md-4"> 
    <label>أسـم الطـالـب \ الطـالبـة </label>
    <select class="form-control select2" style="width: 100%;" name="Student_id">
        <option value="{{ $Result->student->id }}">
            {{ $Result->student->name }}
        </option>
        @foreach ($Students as $Student)
        <option value="{{ $Student->student_id }}">
            {{ $Student->student->name }}
        </option>
    @endforeach
    </select>
</div>

<div class="col-md-4">
<label>الدرجـة التي حصـل عليـها</label>
<input type="hidden" name="id" value="{{$Result->id}}">
<input type="number" value="{{ $Result->marks_obtained }}" name="Marks" class="form-control">
</div>

<div class="col-md-4">
    <label >التقـديـر</label>
    <select class="form-control select2" style="width: 100%;" name="Appreciation">
        <option >{{$Result->appreciation }}</option>
        <option value="ممـتـاز">ممـتـاز</option>
        <option value="جيـد جـداً">جيـد جـداً</option>
        <option value="جيـد">جيـد</option>
        <option value="مقبـول">مقبـول</option>
        <option value="ضعيـف">ضعيـف</option>
    </select> 
</div>

</div>

</div><br>
<div class="modal-footer">

<button type="submit"
class="btn btn-success btn-block">تـأكيـد</button>
</div>

</form>

</div><!-- /.box-header -->
</div>
</div>
</section><!-- /.content -->


@endsection
@section('js')
@toastr_js
@toastr_render

@endsection