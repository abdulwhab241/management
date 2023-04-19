@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_Graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.add_Graduate') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.add_Graduate') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_Graduate')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <form action="{{route('Graduated.store')}}" method="post">
                        @csrf
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">تاكيد</button>
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

<form class="form-horizontal" action="{{ route('Classrooms.store') }}" method="POST">
    @csrf
    
    <div class="box-body">
        <div class="row">
    
            <div class="col-xs-6">
                <label >أسـم المرحلـة</label>
                <select class="form-control select2" name="Grade_id">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Grades as $Grade)
                        <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="col-xs-6">
                <label >أسـم الصـف</label>
                <input  type="text" name="Name" class="form-control" id="inputEmail2" required>
            </div>
        </div><br>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-danger"
        data-dismiss="modal">إغلاق</button>
        <button type="submit"
        class="btn btn-success">حفظ البيانات</button>
        </div>
    
    </form>


    @extends('layouts.master')
    @section('css')
    
    @section('title')
    اضافة مادة دراسية
    @stop
    @endsection
    
    @section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    اضافة مادة دراسية
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمـة الـمواد الدراسيـة </a></li>
    <li class="active">اضافة مادة دراسية</li>
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
    
    <form  action="{{route('Subjects.store')}}"  method="POST" >
    @csrf
    <div class="box-body">
        <div class="row">
            <div class="col-xs-3"> 
                <label for="inputEmail4">أسم المادة</label>
                <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
                @error('Name')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3">
                <label for="inputEmail4">الدرجـة</label>
                <input type="number" value="{{ old('Degree') }}" name="Degree" class="form-control">
                @error('Degree')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3">
                <label for="inputEmail4">المرحلـة الدراسيـة</label>
                <select class="form-control select2" name="Grade_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                    @endforeach
                </select>                        
                @error('Grade_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3">
                <label for="inputEmail4">الصـف الدراسـي</label>
                <select class="form-control select2" name="Class_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}">{{$classroom->name_class}}</option>
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
            <div class="col-xs-6">
                <label >أسـم المعلـم</label>
    
                    <select class="form-control select2" name="teacher_id">
                        <option selected disabled>أختـر من القائمة...</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
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