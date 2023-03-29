@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    إضافة معلم
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> إضافة معلم</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">إضافة معلم</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    إضافة معلم
@stop
<!-- breadcrumb -->
@endsection
@section('content')
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
                    <form action="{{route('Teachers.store')}}" method="post">
                        @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="title">أسم المعلم</label>
                            <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
                            @error('Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title"> رقم الهاتف</label>
                            <input type="text" value="{{ old('Phone_Number') }}" name="Phone_Number" class="form-control">
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
                                <option selected disabled>اختيار من القائمة...</option>
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
                                <option selected disabled>اختيار من القائمة...</option>
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
                                <input class="form-control" type="text" value="{{ old('Joining_Date') }}"  id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
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
                                    id="exampleFormControlTextarea1" rows="4">{{ old('Address') }}</textarea>
                        @error('Address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="photos" style="font-weight:bold; color:blue;">إختر صورة للمعلم: </label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>

                    <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right" 
                    style="padding: 10px; margin: 5px;" type="submit">حفظ البيانات</button>
            </form>
                </div>
            </div>
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