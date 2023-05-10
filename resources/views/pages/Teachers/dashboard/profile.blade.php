{{-- @extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        الملف الشخصي
    @stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  الملف الشخصي</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active"> الملف الشخصي</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    الملف الشخصي
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->



<div class="card-body">

<section style="background-color: #eee;">
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{URL::asset('assets/images/teacher.png')}}"
                        alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                <h5 style="font-family: Cairo" class="my-3">{{$information->name}}</h5>
                <p class="text-muted mb-1">{{$information->email}}</p>
                <p class="text-muted mb-4">معلم</p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('profile.update',$information->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">اسم المستخدم</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="text" name="Name"
                                        value="{{ $information->Name }}"
                                        class="form-control">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">اسم المستخدم باللغة الانجليزية</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="text" name="Name_en"
                                        value="{{ $information->Name }}"
                                        class="form-control">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">كلمة المرور</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="password" id="password" class="form-control" name="password">
                            </p><br><br>
                            <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                    id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-outline-success">تعديل البيانات</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<!-- row closed -->
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
    }
</script>
@endsection

<div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
      </div>
    </div>
  </div> --}}

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
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">الملـف الشـخـصـي</li>
</ol>
</section>

<!-- Main content -->
<section class="content" >

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="col-md-4">
<div class="box box-info">
<div class="box-header with-border">
<div class="box-body">
    <div class="card-body text-center">
        <img src="{{URL::asset('assets/images/teacher.png')}}"
                alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
        <h5 style="font-family: Cairo" class="my-3">{{$information->name}}</h5>
        <p class="margin">معلم</p>
</div>
</div>
</div>
</div>
</div>

   <div class="col-md-8">

    <div class="box box-info">
        <div class="box-header with-border">
        {{-- <div class="box-body"> --}}
            <div class="card-body">
                <form class="form-horizontal" action="{{route('profile.update',$information->id)}}" method="post">
                    @csrf
                    <div class="box-body">
                    <div class="row">

                        <div class="col-md-4"> 
                            <label>أسـم المستخدم </label>
                            <input type="text" value="{{ $information->name }}" name="Name" class="form-control">
                        </div>

                        <div class="col-md-4"> 
                            <label>كلمة المرور </label>
                            <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control">
                        </div>
                        <div class="col-md-4"> 
                            <label>اظهار كلمة المرور </label>
                            <input class="checkbox" type="checkbox" id="exampleCheck1" onclick="myFunction()">
                        </div>

                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                    class="btn btn-info btn-block">تـعديـل البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    {{-- </div> --}}
   </div>

    </div>

{{-- <div class="row">
<div class="col-sm-12 col-md-12">
    <div class="thumbnail">
    <img src="/dist/img/user2-160x160.jpg" alt="...">
    <div class="caption">
        <h3>Thumbnail label</h3>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
    </div>
    </div>
</div>
</div>  --}}



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
    }
</script>

@endsection