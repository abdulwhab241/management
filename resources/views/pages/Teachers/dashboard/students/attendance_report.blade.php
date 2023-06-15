@extends('layouts.master')
@section('css')

@section('title')
تقرير الحضور والغياب
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    تقرير الحضور والغياب
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">تقرير الحضور والغياب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
    @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    <div class="box-header">
    <form  action="{{route('attendance.search')}}"  method="POST" >
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-4"> 
                    <label>أسـم الطـالـب \ الطـالبـة</label>
                    <select class="form-control select2" style="width: 100%;" name="student_id">
                        <option selected disabled>أختـر من القائمة...</option>
                        @foreach($students as $student)
                            <option value="{{ $student->student_id }}">{{ $student->student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>مـن تـاريـخ</label>
                    <input type="date" required data-date-format="yyyy-mm-dd" name="from" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>إلـى تـاريـخ</label>
                    <input type="date" required data-date-format="yyyy-mm-dd" name="to" class="form-control">
                </div>
            </div><br>
        
        </div>
        <div class="modal-footer">
        <button type="submit"
            class="btn btn-primary btn-block">تـأكيـد</button>
        </div>
        
        </form>
    </div>
@isset($Students)
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table  class="table" style="width:100%; text-align: center;">
<thead>
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;" >اليـوم</th>
        <th style="text-align: center; background-color: #D0DEF6;" >أسـم الطـالـب \ الطـالبـة</th>
        <th style="text-align: center; background-color: #D0DEF6;" >الصـف الـدراسـي </th>
        <th style="text-align: center; background-color: #D0DEF6;" >الشٌـعبـة</th>
        <th style="text-align: center; background-color: #D0DEF6;" >التـاريـخ</th>
        <th style="text-align: center; background-color: #D0DEF6;" >الحـالـة</th>
    </tr>
</thead>
<tbody>
    @foreach($Students as $student)
    <tr>
        <td>{{$student->day}}</td>
        <td>{{$student->students->name}}</td>
        <td>{{$student->classroom->name_class}}</td>
        <td>{{$student->section->name_section}}</td>
        <td>{{$student->attendance_date}}</td>
        <td>{{$student->attendance_status}}</td>
    </tr>
@endforeach
</tbody>
</table>
</div>
</div>
@endisset


</div>
</div>
</div>
</section>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
