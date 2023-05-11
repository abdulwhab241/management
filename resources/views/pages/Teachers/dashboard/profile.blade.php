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

<div class="col-md-6">
<div class="box box-info">
<div class="box-header with-border">
<div class="box-body">
<div class="card-body text-center">
    <img src="{{URL::asset('assets/images/teacher.png')}}"
            alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">
    <h4 style="font-family: 'Cairo', sans-serif" class="margin">{{$information->name}}</h4>
    <h5 style="font-family: 'Cairo', sans-serif" class="margin"> مـدرس {{$information->specializations->name}} </h5>
    {{-- <p class="margin">معلم</p> --}}
</div>
</div>
</div>
</div>
</div>

<div class="col-md-6">

<div class="box box-info">
<div class="box-header with-border">
<form class="form-horizontal" action="{{route('TeacherProfile.update',$information->id)}}" method="post">
    @csrf
    <div class="box-body">

        
    <div class="form-group">
        <label class="col-sm-4 control-label">أسـم المستخدم</label>
        <div class="col-sm-8">
            <input type="text" style="text-align: center; font-weight: bolder; font-size: 20px; background-color: #D0DEF6;" disabled class="form-control" id="inputEmail3" name="Name" value="{{ $information->name }}">
        </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">كلمـة المـرور</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="password" name="password">
            </div>
            </div>


    <br>
</div>
<div class="box-footer">
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