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
إضـافـة محصـلـة الطـالـب  <label style="color: #5686E0">{{$StudentGrade->student->name}}</label>
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
                    <th style="text-align: center; background-color: yellow;" >محصـلـة شهـر</th>
                    <th style="text-align: center; background-color: #D0DEF6;">الفـصل</th>
                    <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
                    <th style="text-align: center; background-color: #D0DEF6;">واجبـات</th>
                    <th style="text-align: center; background-color: #D0DEF6;">شفهـي</th>
                    <th style="text-align: center; background-color: #D0DEF6;">مـواظبـة</th>
                    <th style="text-align: center; background-color: #E7EEFB;">تحريري</th>
                    <th style="text-align: center; background-color: #FFC0D6;"> المحصـلة</th>
                    <th style="text-align: center; background-color: #D0DEF6;">الأستـاذ</th>
                </tr>
            </thead>
            <tbody>
        
                <tr>
                    <td style="background-color: yellow; font-weight:bolder;">{{ $StudentGrade->month->name }}</td>
                    <td>{{$StudentGrade->semester->name}}</td>
                    <td>{{$StudentGrade->student->name}}</td>
                    <td>{{$StudentGrade->homework }}</td>
                    <td>{{$StudentGrade->verbal}}</td>
                    <td>{{ $StudentGrade->attendance }}</td>
                    <td style="background-color: #E7EEFB; font-weight:bolder;">{{ $StudentGrade->result }}</td>
                    <td style="background-color: #FFC0D6; font-weight:bolder;">{{ $StudentGrade->total }}</td>
                    <td>{{ $StudentGrade->teacher->name }}</td>
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
