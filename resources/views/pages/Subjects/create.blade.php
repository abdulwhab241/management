@extends('layouts.master')
@section('css')

@section('title')
اضافة مادة دراسية
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة مادة دراسية
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمـة الـمواد الدراسيـة </a></li>
<li class="active">اضافة مادة دراسية</li>
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

<form  action="{{route('Subjects.store','test')}}"  method="POST" >
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-4"> 
        <label>أسم المادة</label>
        <input type="text" value="{{ old('Name') }}" name="Name" class="form-control">
        @error('Name')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>المرحلـة الدراسيـة</label>
        <select class="form-control select2" style="width: 100%;" name="Grade_id">
            <option selected disabled>أختـر من القائمة...</option>
            @foreach($grades as $grade)
                <option value="{{$grade->id}}">{{$grade->name}}</option>
            @endforeach
        </select>                        
        @error('Grade_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>
</div>
    <div class="col-md-4">
        <div class="form-group">
        <label>الصـف الدراسـي</label>
        <select class="form-control select2" style="width: 100%;" name="Classroom_id">

        </select>                       
        @error('Classroom_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>
</div>
</div><br>


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