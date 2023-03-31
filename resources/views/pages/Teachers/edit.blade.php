@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
@section('title')
    تعديل معلم
@stop
@endsection
{{-- @section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> تعديل معلم</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">تعديل معلم</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    تعديل معلم
@stop
<!-- breadcrumb -->
@endsection --}}
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

{{-- <!-- row -->
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
                    <form action="{{route('Teachers.update','test')}}" method="post">
                        {{method_field('patch')}}
                        @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">أسم المعلم</label>
                            <input type="text" name="Name" value="{{ $Teachers->name }}" class="form-control">
                            @error('Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">رقم الهاتف</label>
                            <input type="text" name="Phone_Number" value="{{ $Teachers->phone_number}}" class="form-control">
                            @error('Phone_Number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputCity">التخصص</label>
                            <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                <option value="{{$Teachers->Specialization_id}}">{{$Teachers->specializations->name}}</option>
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                @endforeach
                            </select>
                            @error('Specialization_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputState">النوع</label>
                            <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                <option value="{{$Teachers->Gender_id}}">{{$Teachers->genders->name}}</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                                @endforeach
                            </select>
                            @error('Gender_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">تاريخ التعيين</label>
                            <div class='input-group date'>
                                <input class="form-control" type="text"  id="datepicker-action"  value="{{$Teachers->joining_date}}" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                            </div>
                            @error('Joining_Date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">العنوان</label>
                        <textarea class="form-control" name="Address"
                                id="exampleFormControlTextarea1" rows="4">{{$Teachers->address}}</textarea>
                        @error('Address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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