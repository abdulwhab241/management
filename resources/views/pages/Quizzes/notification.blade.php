@extends('layouts.master')
@section('css')

@section('title')
الإشـعـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
الإشـعـارات 
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li class="active">الإشـعـارات</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

    <div class="box-body table-responsive no-padding">

        <table class="table table-hover" style="width:100%; text-align: center;">
            <thead>
                <tr>

                    <th style="text-align: center; background-color: #D0DEF6;" >إختبار مادة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >الصف الدراسي</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >أستاذ المادة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" > الدرجة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >تم بواسطـة</th>
                    <th style="text-align: center; background-color: #D0DEF6;" >تاريخ الإنشاء</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $Quizzes->classroom->name_class }}</td>
                    <td>{{ $Quizzes->subject->name }}</td>
                    <td>{{$Quizzes->teacher->name}}</td>
                    <td>{{$Quizzes->total_marks}}</td>
                    <td>{{$Quizzes->create_by}}</td>
                    <td>{{$Quizzes->created_at->diffForHumans()}}</td>
                    
                </tr>
            </tbody>
        </table>

    </div>

</div>
</div>
</div>
</section>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
