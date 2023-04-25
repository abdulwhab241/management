@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
قائمة الحضور والغياب للطلاب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">قائمة الحضور والغياب للطلاب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">قائمة الحضور والغياب للطلاب</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
قائمة الحضور والغياب للطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-danger">
    <ul>
        <li>{{ session('status') }}</li>
    </ul>
</div>
@endif

<h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
<form method="post" action="{{ route('attendance') }}" autocomplete="off">

@csrf
<table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
    <thead>
    <tr>
        <th class="alert-success">#</th>
        <th class="alert-success">{{ trans('Students_trans.name') }}</th>
        <th class="alert-success">{{ trans('Students_trans.email') }}</th>
        <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
        <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
        <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
        <th class="alert-success">{{ trans('Students_trans.section') }}</th>
        <th class="alert-success">الحضور والغياب</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->gender->name }}</td>
            <td>{{ $student->grade->Name }}</td>
            <td>{{ $student->classroom->Name_Class }}</td>
            <td>{{ $student->section->Name_Section }}</td>
            <td>
            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
            <input name="attendances[{{ $student->id }}]"
                @foreach($student->attendance()->where('attendance_date',date('Y-m-d'))->get() as $attendance)
                {{ $attendance->attendance_status == 1 ? 'checked' : '' }}
                @endforeach
                class="leading-tight" type="radio"
                value="presence">
                <span class="text-success">حضور</span>
                </label>

                <label class="ml-4 block text-gray-500 font-semibold">
                <input name="attendances[{{ $student->id }}]"
                @foreach($student->attendance()->where('attendance_date',date('Y-m-d'))->get() as $attendance)
                {{ $attendance->attendance_status == 0 ? 'checked' : '' }}
                @endforeach
                class="leading-tight" type="radio"
                value="absent">
                <span class="text-danger">غياب</span>
                </label>

                <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
            </td>

            </tr>
            @endforeach
            </tbody>
</table>
<P>
    <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
</P>
</form><br>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

