@extends('layouts.master')
@section('css')

@section('title')
اضافة مسـتخـدم جديد
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة مسـتخـدم جديد
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Users.index')}}"><i class="fa fa-users"></i> قائمة المستخدمين</a></li>
<li class="active">اضافة مسـتخـدم جديد</li>
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

<form  action="{{route('Users.store','test')}}"  method="POST" enctype="multipart/form-data">
@csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-4"> 
            <label>أسم المستخدم</label>
            <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
            @error('Name')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label>الوظيفة</label>
            <input type="text" value="{{ old('Job') }}" name="Job" class="form-control">
            @error('Job')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label>رقم الهاتف</label>
            <input type="text" value="{{ old('Phone_Number') }}" name="Phone_Number" class="form-control">                     
            @error('Phone_Number')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
    </div>

    </div><br>

    <div class="row">
        <div class="col-md-4">
            <label >العنوان</label>
            <textarea class="form-control" name="Address" rows="2">{{ old('Address') }}</textarea>
            @error('teacher_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label style="font-weight:bold; color:blue;">إختر صورة للمستخدم: </label>
            <input type="file" accept="image/*" name="photos[]" multiple>
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
</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection