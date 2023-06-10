@extends('layouts.master')
@section('css')

@section('title')
تسـجـيل الطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تسـجـيل الطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Enrollments.index')}}"><i class="fa fa-sign-in"></i> قائمـة تسـجـيل الطـلاب </a></li>
<li class="active">تسـجـيل الطـلاب</li>
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

<form class="form-horizontal" action="{{ route('Enrollments.store') }}" method="POST">
@csrf

<div class="box-body">
<div class="row">

<div class="col-md-3">
    <label > المرحلـة الدراسيـة</label>
    <select class="form-control select2" style="width: 100%;" name="Grade_id">
        <option  selected disabled>أختـر من القائمة...</option>
        @foreach ($Grades as $Grade)
            <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
        @endforeach
    </select>
    @error('Grade_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

<div class="col-md-3">
    <label > الصـف الدراسـي</label>
    <select class="form-control select2" style="width: 100%;" name="Classroom_id">

    </select>
    @error('Classroom_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

<div class="col-md-3">
    <label > الشعبـة</label>
    <select class="form-control select2" style="width: 100%;" name="Section_id">

    </select>
    @error('Section_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>
<div class="col-md-3">
    <label > السنة الدراسية</label>
    <select class="form-control select2" style="width: 100%;" name="Year">
    <option selected>أختـر من القائمة...</option>
    @php
    $current_year = date("Y");
    @endphp
    {{-- @for($year=$current_year; $year<=$current_year +1 ;$year++) --}}
        <option value="{{ $current_year}}">{{ $current_year }}</option>
    {{-- @endfor --}}
    </select>
    @error('Year')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

</div><br>

</div>

<div class="modal-footer">
<button type="submit"
class="btn btn-primary btn-block">تـأكيـد</button>
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