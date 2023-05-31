@extends('layouts.master')
@section('css')

@section('title')
تعديل مادة دراسية
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعديل مادة دراسية
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمـة الـمواد الدراسيـة </a></li>
<li class="active">تعديل مادة دراسية</li>
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

<form  action="{{route('Subjects.update','test')}}"  method="POST" >
{{ method_field('patch') }}
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-3"> 
            <label>أسم المادة</label>
            <input type="text" value="{{$subject->name}}" name="Name" class="form-control">
            <input type="hidden" name="id" value="{{$subject->id}}">
            @error('Name')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>الدرجـة</label>
            <input type="number" value="{{ $subject->degree }}" name="Degree" class="form-control">
            @error('Degree')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>المرحلـة الدراسيـة</label>
            <select class="form-control select2" style="width: 100%;" name="Grade_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach($grades as $grade)
                <option
                    value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->name }}</option>
            @endforeach
            </select>                        
            @error('Grade_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-3">
            <label>الصـف الدراسـي</label>
            <select class="form-control select2" style="width: 100%;" name="Class_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach($classrooms as $classroom)
                <option
                value="{{$classroom->id}}" {{$classroom->id == $subject->classroom_id ?'selected':''}}>{{$classroom->name_class}}</option>
        @endforeach
            </select>                       
            @error('Class_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-6">
            <label >أسـم المعلـم</label>

                <select class="form-control select2" style="width: 100%;" name="teacher_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($teachers as $teacher)
                    <option
                        value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->name}}</option>
                    @endforeach
                </select>
            @error('teacher_id')
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
    class="btn btn-success btn-block">تعـديـل البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection