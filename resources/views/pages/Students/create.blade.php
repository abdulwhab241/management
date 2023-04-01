@extends('layouts.master')
@section('css')

@section('title')
اضافة طـالـب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة طـالـب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Students.index')}}"><i class="fa fa-book"></i> قائمـة الطـلاب </a></li>
<li class="active">اضافة طـالـب</li>
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

<form  action="{{route('Students.store')}}"  method="POST" >
@csrf
<div class="box-body">
    <br>
    <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الطـالـب</h5>
    <div class="form-row">
        <div class="col-6"> 
            <label for="inputEmail4">أسم الطـالـب</label>
            <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
            @error('Name')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>
        <br>


        <div class="col-6">
            <label for="inputEmail4">تاريخ الميلاد</label>
            <input type="text" value="{{ old('Date_Birth') }}" data-date-format="yyyy-mm-dd" name="Date_Birth" class="form-control">
            @error('Date_Birth')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>

    </div>
    <br>

    <div class="form-row">
        <div class="col-6">
            <label for="inputEmail4">النوع</label>
            <select class="form-control select2" name="Gender_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach($Genders as $Gender)
                <option value="{{$Gender->id}}">{{$Gender->name}}</option>
            @endforeach
            </select>                        
            @error('Gender_id')
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
                <option value="{{$classroom->id}}">{{$classroom->name_class}}</option>
                @endforeach
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
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
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