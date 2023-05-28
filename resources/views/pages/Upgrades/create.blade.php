@extends('layouts.master')
@section('css')

@section('title')
ترقية الطلاب
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
ترقية الطلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Upgrades.index')}}"><i class="fa fa-refresh"></i> قائمـة الترقيـات </a></li>
<li class="active">ترقية الطلاب</li>
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
<h4 style="color: blue;font-family: Cairo; font-weight: bold;">المرحلة الدراسية السابقة</h4>
<form  action="{{route('Upgrades.store')}}"  method="POST" enctype="multipart/form-data">
@csrf
<div class="box-body">
    <div class="row">

            <div class="col-md-4" >
                <label for="inputState" style="font-weight: bold;">المرحلة الدراسية</label>
                <select class="form-control select2" style="width:100%;" name="Grade_id" >
                    <option selected disabled>اختـر من القائمة...</option>
                    @foreach($Grades as $Grade)
                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                    @endforeach
                </select>
                @error('Grade_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>

            <div class="col-md-4">
                <label  style="font-weight: bold;">الصف الدراسي </label>
                <select class="form-control select2" style="width:100%;" name="Classroom_id" >
                    {{-- <option selected disabled>اختـر من القائمة...</option>
                    @foreach($Classrooms as $Classroom)
                        <option value="{{$Classroom->id}}">{{$Classroom->name_class}}</option>
                    @endforeach --}}
                </select>
                @error('Classroom_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
        </div>

        <div class="col-md-4">
            <label for="academic_year">السنـة الدراسيـة </label>
            <select class="form-control select2" style="width:100%;" name="academic_year">
                <option selected disabled>اختـر من القائمة...</option>
                @php
                    $current_year = date("Y");
                @endphp
                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                    <option value="{{ $year}}">{{ $year }}</option>
                @endfor
            </select>
            @error('academic_year')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        </div>
        <br><h4 style="color: blue;font-family: Cairo; font-weight: bold;">المرحلة الدراسية الحالية</h4><br>

    <div class="row">
        <div class=" col-md-4">
            <label for="inputState" style="font-weight: bold;">المرحلة الدراسية</label>
            <select class="form-control select2" style="width:100%;" name="Grade_id_new" >
                <option selected disabled>اختـر من القائمة...</option>
                @foreach($Grades as $Grade)
                    <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                @endforeach
            </select>
            @error('Grade_id_new')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label  style="font-weight: bold;">الصف الدراسي </label>
            <select class="form-control select2" style="width:100%;" name="Classroom_id_new" >
                {{-- <option selected disabled>اختـر من القائمة...</option>
                @foreach($Classrooms as $Classroom)
                    <option value="{{$Classroom->id}}">{{$Classroom->name_class}}</option>
                @endforeach --}}
            </select>
            @error('Classroom_id_new')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="academic_year">السنـة الدراسيـة </label>
            <select class="form-control select2" style="width:100%;" name="academic_year_new">
                <option selected disabled>اختـر من القائمة...</option>
                @php
                    $current_year = date("Y");
                @endphp
                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                    <option value="{{ $year}}">{{ $year }}</option>
                @endfor
            </select>
            @error('academic_year_new')
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

