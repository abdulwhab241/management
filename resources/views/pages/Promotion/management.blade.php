@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الترقيات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> قائمة الترقيات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">قائمة الترقيات</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    قائمة الترقيات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
<div class="card-body">

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
    تراجع الكل
</button>
<br><br>


<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
            data-page-length="50"
            style="text-align: center">
        <thead>
        <tr>
            <th class="alert-info">#</th>
            <th class="alert-info">أسـم الطالـب</th>
            <th class="alert-danger">المرحلة الدراسية السابقة</th>
            <th class="alert-danger">السنة الدراسية</th>
            <th class="alert-danger">الصف الدراسي السابق</th>
            <th class="alert-danger">القسم الدراسي السابق</th>
            <th class="alert-success">المرحلة الدراسية الحالي</th>
            <th class="alert-success">السنة الدراسية الحالية</th>
            <th class="alert-success">الصف الدراسي الحالي</th>
            <th class="alert-success">القسم الدراسي الحالي</th>
            <th>العمليـات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$promotion->student->name}}</td>
                <td>{{$promotion->f_grade->name}}</td>
                <td>{{$promotion->academic_year}}</td>
                <td>{{$promotion->f_classroom->name_class}}</td>
                <td>{{$promotion->f_section->name_section}}</td>
                <td>{{$promotion->t_grade->name}}</td>
                <td>{{$promotion->academic_year_new}}</td>
                <td>{{$promotion->t_classroom->name_class}}</td>
                <td>{{$promotion->t_section->name_section}}</td>
                <td>
                    {{-- <a href="{{route('Students.edit',$promotion->id)}}"
                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                            class="fa fa-edit"></i></a> --}}
                    <button type="button" class="btn btn-outline-danger btn-sm"
                            data-toggle="modal"
                            data-target="#Delete_one{{ $promotion->id }}"
                            >إرجاع الطالب</button>
                            <button type="button" class="btn btn-outline-success btn-sm"
                            data-toggle="modal"
                            data-target="#"
                            >تخرج الطالب</button>
                    {{-- <a href="{{route('Students.show',$promotion->id)}}"
                        class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                            class="far fa-eye"></i></a> --}}
                </td>
            </tr>
        @include('pages.promotion.Delete_all')
        @include('pages.promotion.Delete_one')
        @endforeach
    </table>
</div>
</div>
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