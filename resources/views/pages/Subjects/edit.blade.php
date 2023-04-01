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
        <div class="form-row">
            <div class="col-6"> 
                <label for="inputEmail4">أسم المادة</label>
                <input type="text" value="{{$subject->name}}" name="Name" class="form-control">
                <input type="hidden" name="id" value="{{$subject->id}}">
                @error('Name')
                <div class="alert alert-danger">
                <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
                </div>
                @enderror
            </div>
            <br>
    
    
            <div class="col-6">
                <label for="inputEmail4">الدرجـة</label>
                <input type="number" value="{{ $subject->degree }}" name="Degree" class="form-control">
                @error('Degree')
                <div class="alert alert-danger">
                <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
                </div>
                @enderror
            </div>
    
        </div>
        <br>
    
        <div class="form-row">
            <div class="col-6">
                <label for="inputEmail4">المرحلـة الدراسيـة</label>
                <select class="form-control select2" name="Grade_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($grades as $grade)
                    <option
                        value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->name }}</option>
                @endforeach
                </select>                        
                @error('Grade_id')
                <div class="alert alert-danger">
                <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
                </div>
                @enderror
            </div>
            <br>
    
    
            <div class="col-6">
                <label for="inputEmail4">الصـف الدراسـي</label>
                <select class="form-control select2" name="Class_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($classrooms as $classroom)
                    {{-- <option
                        value="{{$classroom->id}}" {{$classroom->id == $subject->classroom_id ?'selected':''}}>{{$classroom->name_class }}</option> --}}
                        <option
                        value="{{$classroom->id}}" {{$classroom->id == $subject->classroom_id ?'selected':''}}>{{$classroom->name_class}}</option>
                @endforeach
                    {{-- @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->name_class}}</option>
                    @endforeach --}}
                </select>                       
                @error('Class_id')
                <div class="alert alert-danger">
                <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
                </div>
                @enderror
            </div>
    
        </div>   
        <br>
            <div class="form-group">
                <label >أسـم المعلـم</label>
    
                    <select class="form-control select2" name="teacher_id">
                        <option selected disabled>أختـر من القائمة...</option>
                        @foreach($teachers as $teacher)
                        <option
                            value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->name}}</option>
                        @endforeach
                        {{-- @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach --}}
                    </select>
        
                @error('teacher_id')
                <div class="alert alert-danger">
                <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
                </div>
                @enderror
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
{{-- 
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
                <form action="{{route('Subjects.update','test')}}" method="post" autocomplete="off">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">اسم المادة</label>
                            <input type="text" name="Name"
                                    value="{{ $subject->name }}"
                                    class="form-control">
                            <input type="hidden" name="id" value="{{$subject->id}}">
                        </div>
                        <div class="col">
                            <label for="title">الدرجة</label>
                            <input type="number" name="Degree"
                                    value="{{ $subject->degree }}"
                                    class="form-control">
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">المرحلة الدراسية</label>
                            <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                <option selected disabled>اختيار من القائمة...</option>
                                @foreach($grades as $grade)
                                    <option
                                        value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputState">الصف الدراسي</label>
                            <select name="Class_id" class="custom-select">
                                <option
                                    value="{{ $subject->classroom->id }}">{{ $subject->classroom->name_class }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputState">اسم المعلم</label>
                            <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                <option selected disabled>اختيار من القائمة...</option>
                                @foreach($teachers as $teacher)
                                    <option
                                        value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right"
                    style="padding: 10px; margin: 5px;" type="submit">تعديل البيانات</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- row closed --> --}}
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection