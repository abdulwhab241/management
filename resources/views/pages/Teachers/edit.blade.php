@extends('layouts.master')
@section('css')

@section('title')
    تعديل معلم
@stop
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    تعديل معلم
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('Teachers.index')}}"><i class="fa fa-users"></i> قائمـة المعلمين </a></li>
    <li class="active">تعديل معلم</li>
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

<form  action="{{route('Teachers.update','test')}}" method="POST" enctype="multipart/form-data">
{{method_field('patch')}}
@csrf
<div class="box-body">
    <div class="form-row">
        <div class="col-6">
            <label for="inputEmail4">أسم المعلـم</label>
            <input type="text" value="{{ $Teachers->name }}" name="Name" class="form-control">
            <input type="hidden" name="id" value="{{$Teachers->id}}">
            @error('Name')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>
        <br>


        <div class="col-6">
            <label for="inputEmail4">رقـم الهاتـف</label>
            <input type="text" value="{{ $Teachers->phone_number}}" name="Phone_Number" class="form-control">
            @error('Phone_Number')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>

    </div>
    <br>

    <div class="form-row">
        <div class="col-6">
            <label for="inputEmail4">التخصـص</label>
            <select class="form-control select2" name="Specialization_id">
                {{-- <option selected disabled>حـدد التخصـص...</option> --}}
                <option value="{{$Teachers->specialization_id}}">{{$Teachers->specializations->name}}</option>
                @foreach($specializations as $specialization)
                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                @endforeach
            </select>                        
            @error('Specialization_id')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>
        <br>


        <div class="col-6">
            <label for="inputEmail4">النـوع</label>
            <select class="form-control select2" name="Gender_id">
                {{-- <option selected disabled>حـدد النـوع...</option> --}}
                <option value="{{$Teachers->gender_id}}">{{$Teachers->genders->name}}</option>
                @foreach($genders as $gender)
                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                @endforeach
            </select>                       
            @error('Gender_id')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>

    </div>   
    <br>
        <div class="form-group">
            <label >تاريخ التعيين</label>
            <div class='input-group'>
                <input  class="form-control timepicker" type="text" value="{{$Teachers->joining_date}}" id="reservation" name="Joining_Date" >
            </div>
            @error('Joining_Date')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">العنوان</label>
            <textarea class="form-control" name="Address"
                        id="exampleFormControlTextarea1" rows="4">{{$Teachers->address}}</textarea>
            @error('Address')
            <div class="alert alert-danger">
            <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $message }}</h4></span>
            </div>
            @enderror
            
        </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="photos" style="font-weight:bold; color:blue;">إختر صورة للمعلم: </label>
            <input type="file" accept="image/*" name="Photo">
        </div>
    </div>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">تعديـل البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection