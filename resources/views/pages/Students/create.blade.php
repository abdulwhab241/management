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
<li><a href="{{route('Students.index')}}"><i class="fa fa-users"></i> قائمـة الطـلاب </a></li>
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

<form class="form-horizontal"  action="{{route('Students.store')}}"  method="POST" enctype="multipart/form-data">
@csrf
<div class="box-body">
    
    <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الطـالـب</h5>
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-xs-4"> 
                <label for="inputEmail4">أسم الطـالـب</label>
                <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
                @error('Name')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>

            <div class="col-xs-4">
                <label for="inputEmail4">تاريخ الميلاد</label>
                <input type="text" value="{{ old('Date_Birth') }}" placeholder="2023-03-05" data-date-format="yyyy-mm-dd" name="Date_Birth" class="form-control">
                @error('Date_Birth')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>

            <div class="col-xs-4">
                <label for="inputEmail4">النوع</label>
                <select class="form-control select2" name="Gender_id">
                    <option selected disabled>أختـر من القائمة...</option>
                    @foreach($Genders as $Gender)
                    <option value="{{$Gender->id}}">{{$Gender->name}}</option>
                @endforeach
                </select>                        
                @error('Gender_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
    
        </div><br>

        <div class="row">

            <div class="col-xs-4">
                <label for="inputState">المرحلة الدراسية</label>
                <select class="form-control select2" name="Grade_id">
                    <option selected>أختـر من القائمة...</option>
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

            <div class="col-xs-4">
                <label for="inputZip">الصـف الدراسي</label>
                <select class="form-control select2" name="Classroom_id">
                    <option selected>أختـر من القائمة...</option>
                    @foreach($Classrooms as $Classroom)
                        <option value="{{$Classroom->id}}">{{$Classroom->name_class}}</option>
                    @endforeach
                </select>
                @error('Classroom_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>

        <div class="col-xs-4">
            <label for="title">السنة الدراسية</label>
            <select class="form-control select2" name="academic_year">
                <option selected>أختـر من القائمة...</option>
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

    </div><br>

    <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الأب</h5>

    <div class="row">

        <div class="col-xs-4">
            <label for="Father_Name">أسم الاب</label>
            <input type="text" value="{{ old('Father_Name') }}" name="Father_Name"  class="form-control">
            @error('Father_Name')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-xs-4">
            <label for="title">جهة العمل</label>
            <input type="text" value="{{ old('Employer') }}" name="Employer" class="form-control" >
            @error('Employer')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-xs-4">
            <label for="title">الوظيفة</label>
            <input type="text" value="{{ old('Father_Job') }}" name="Father_Job" class="form-control" >
            @error('Father_Job')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

    </div><br>

    <div class="row">

        <div class="col-xs-4">
            <label for="title">الهاتف الشخصي</label>
            <input type="text" value="{{ old('Father_Phone') }}" name="Father_Phone" class="form-control" >
            @error('Father_Phone')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-4">
            <label for="title">هاتف العمل</label>
            <input type="text" value="{{ old('Job_Phone') }}" name="Job_Phone" class="form-control">
            @error('Job_Phone')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-4">
            <label for="title">هاتف المنزل</label>
            <input type="text" value="{{ old('Home_Phone') }}" name="Home_Phone" class="form-control">
            @error('Home_Phone')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

    </div><br>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">العنوان</label>
        <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4"></textarea>
        @error('Address')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div><br>
    <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الأم</h5>

    <div class="row">

        <div class="col-xs-4">
            <label for="title">أسم الام</label>
            <input type="text" value="{{ old('Mother_Name') }}" name="Mother_Name" class="form-control">
            @error('Mother_Name')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-4">
            <label for="title">الوظيفة</label>
            <input type="text" value="{{ old('Mother_Job') }}" name="Mother_Job" class="form-control">
            @error('Mother_Job')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-xs-4">
            <label for="title">الهاتف</label>
            <input type="text" value="{{ old('Mother_Phone') }}" name="Mother_Phone" class="form-control">
            @error('Mother_Phone')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

    </div>
    <br>
    <div class="col">
        <label for="photos" style="font-weight:bold; color:blue;">إختر صورة للطـالـب: </label>
        <input type="file" accept="image/*" name="Photo">
    </div>
<br>
</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">حفظ البيانات</button>
</div>

</form>

</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection