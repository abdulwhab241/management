@extends('layouts.master')
@section('css')
@livewireStyles
@section('title')
قائمة الطلاب
@stop
@endsection
{{-- @section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الطلاب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">الطلاب</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
قائمة الطلاب
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     الطلاب
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('Subjects.index')}}"><i class="fa fa-book"></i> قائمة الطلاب </a></li>
    <li class="active"> الطلاب</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    <livewire:add-student />
</div>
</div>
</div>
</section>

{{-- <!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <livewire:add-student />
        </div>
    </div>
</div>
</div>
<!-- row closed --> --}}
@endsection
@section('js')
@livewireScripts
@endsection