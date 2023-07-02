@extends('layouts.master')
@section('css')

@section('title')
الملـف الشـخـصـي
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
الملـف الشـخـصـي
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">الملـف الشـخـصـي</li>
</ol>
</section>

<!-- Main content -->
<section class="content" >

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="col-md-6">
<div class="box box-info">
<div class="box-header with-border">
<form class="form-horizontal" action="{{route('edit_user_Image', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="box-body">
<div class="card-body text-center">
    <img src="{{ asset('/attachments/Admins/' . Auth::user()->image ) }}"
    class="rounded-circle img-fluid" style="width: 150px;" alt="{{ Auth::user()->name }}" >
    <h4 style="font-family: 'Cairo', sans-serif" class="margin">{{Auth::user()->name}}</h4>
    <h5 style="font-family: 'Cairo', sans-serif" class="margin">  {{ Auth::user()->phone_number }} </h5>
    <p class="margin">   {{ Auth::user()->job }}  </p>
</div>
</div>
<div class="row">
<div class="form-group text-center">
    <label class="col-sm-4 control-label" style="font-weight:bold; color:blue;">إختر صورة: </label>
    <input type="hidden" name="Name" value="{{ Auth::user()->name  }}">
    <div class="col-sm-8">
        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
    <input type="file" accept="image/*" style="position: center;" name="photos" >
    </div>
</div>
</div><br>
    <div class="modal-footer ">
        {{-- <div class="col-sm-8 text-center"> --}}
        <button type="submit" class="btn btn-info btn-block">تعـديـل الصـورة</button>
        {{-- </div> --}}
    </div><!-- /.box-footer -->

</form>
</div>
</div>
</div>

<div class="col-md-6">

<div class="box box-info">
<div class="box-header with-border">
<form class="form-horizontal" action="{{route('StudentProfile.update',Auth::user()->id)}}"  method="post">
    @csrf
    <div class="box-body">

        
    <div class="form-group">
        <label class="col-sm-4 control-label">أسـم المستخدم</label>
        <div class="col-sm-8">
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <input type="text" style="text-align: center; font-weight: bolder; font-size: 20px; background-color: #D0DEF6;" disabled class="form-control" value="{{ Auth::user()->name }}">
        </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">كلمـة المـرور</label>
            <div class="col-sm-8">
                <input type="text" required class="form-control" id="password" name="password">
            </div>
            </div>


    <br>
</div>
<div class="modal-footer ">
    <button type="submit" class="btn btn-primary btn-block">تـعديـل البيانات</button>
</div><!-- /.box-footer -->


</form>
</div>
</div>

</div>

</div>
</div>
</div>



<!-- row closed -->
</section>

@endsection
@section('js')
@toastr_js
@toastr_render

<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
};
</script>
@endsection