@extends('layouts.master')
@section('css')

@section('title')
قائمة النتـائـج
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
قائمة النتـائـج الشـهـريـة
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة النتـائـج الشـهـريـة</li>
</ol>
</section>


<!-- Main content -->
<section class="content" dir="rtl">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">

<a class="btn btn-primary btn-flat" href="{{route('TeacherResult.create')}}">
    اضافة نتيجـة</a>
<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div>


<div class="box-body">
<div class="row">
<div class="card-body">

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
@foreach ($results as $result)

<div class="panel panel-info">

<div class="panel-heading" role="tab" id="heading">
<h4 class="panel-title" style="font-weight: bolder;">
<a class="collapsed " role="button" data-toggle="collapse"  data-parent="#selector" href="#collapse" aria-expanded="false" aria-controls="collapse">
    {{ $result->My_Classes->name_class }} , الـشـعبـة: {{ $result->name_section }} 
</a>
</h4>
</div>
<div id="collapse" class="panel-collapse collapse in" role="tab" aria-labelledby="heading">
<div class="panel-body">

<div class="box-body">
    <div class="box-body table-responsive no-padding">
    <table  class="table" style="width:100%; text-align: center;">
        <caption style="font-weight: bolder; text-align:center; color:black; background-color: #E7EEFB;">
            {{ $result->My_Classes->name_class }} , الـشـعبـة: {{ $result->name_section }} 
        </caption>
    <thead>
    <tr>
        <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة </th>
        <th style="text-align: center;  background-color: #D0DEF6;" > المـادة</th>
        <th style="text-align: center;  background-color: yellow; font-weight:bolder;" >نتيـجـة إختبـار شهـر </th>
        <th style="text-align: center;  background-color: #D0DEF6;" >الدرجـة التي حصـل عليـها </th>
        <th style="text-align: center;  background-color: #D0DEF6;" >التقـديـر </th>
        <th style="text-align: center;" class="alert-warning">العمليـات</th>
    
    </tr>
    </thead>
    <tbody>
    @foreach($result->Results as $Result)
        <tr>

            <td>{{$Result->student->name}}</td>
            <td>{{$Result->exam->subject->name}}</td>
            <td style="background-color: yellow; font-weight:bolder;">{{$Result->month->name}}</td>
            <td>{{$Result->marks_obtained}}</td>
            <td style="font-weight: bolder; background-color: #D0DEF6;">{{$Result->appreciation}}</td>
            <td>
                <div class="btn-group">
                <button type="button" style="margin: 3px;" class="btn btn-info btn-sm" data-toggle="modal"
                data-target="#edit{{ $Result->id }}"
                title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" style="margin: 3px;" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_result{{ $Result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                </div>
            </td>
        </tr>

            
<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $Result->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
تعديل نتيجـة الطـالـب {{$Result->student->name}}
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('TeacherResult.update','test' ) }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">

    <div class="row">
        <div class="col-md-6">
            <label >الفصل الدراسي</label>
            <select class="form-control select2" style="width: 100%;" name="Semester_id">
                <option value="{{ $Result->semester_id }}"> {{ $Result->semester->name }} </option>
                @foreach ($Semesters as $Semester)
                <option value="{{ $Semester->id }}">
                    {{ $Semester->name }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label >إختبـار شهـر</label>
            <select class="form-control select2" style="width: 100%;" name="Result_name">
                <option value="{{ $Result->month_id }}"> {{ $Result->month->name }} </option>
                @foreach ($Months as $Month)
                <option value="{{ $Month->id }}">
                    {{ $Month->name }}
                </option>
            @endforeach
            </select>
        </div>
    </div><br>

<div class="row">
    <div class="col-md-6"> 
        <label>أسـم الطـالـب \ الطـالبـة </label>
        <input id="id" type="hidden" name="id" class="form-control"
        value="{{ $Result->id }}">
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option value="{{ $Result->student_id }}">
                {{ $Result->student->name }}
            </option>

        </select>
    </div>

    <div class="col-md-6"> 
        <label>المـادة</label>
        <select class="form-control select2" style="width: 100%;" name="Exam_id">
            <option value="{{ $Result->exam_id }}">
                {{ $Result->exam->subject->name }}
            </option>
            @foreach ($exams as $Exam)
            <option value="{{ $Exam->subject_id }}">
                {{ $Exam->subject->name }}
            </option>
        @endforeach
        </select>
    </div>
</div><br>


<div class="row">

<div class="col-md-6">
<label>الدرجـة التي حصـل عليـها</label>
<input type="number" value="{{ $Result->marks_obtained }}" name="Marks" class="form-control">
</div>

<div class="col-md-6">
    <label >التقـديـر</label>
    <select class="form-control select2" style="width: 100%;" name="Appreciation">
        <option >{{$Result->appreciation }}</option>
        <option value="ممـتـاز">ممـتـاز</option>
        <option value="جيـد جـداً">جيـد جـداً</option>
        <option value="جيـد">جيـد</option>
        <option value="مقبـول">مقبـول</option>
        <option value="ضعيـف">ضعيـف</option>
    </select>  
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
</div>
</div>

<!-- Delete modal -->
<div class="modal fade" id="delete_result{{$Result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<form action="{{route('TeacherResult.destroy',$Result->id)}}" method="post">
{{method_field('delete')}}
{{csrf_field()}}
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف نتيجـة</h5>

</div>
<div class="modal-body">
    <p> هل انت متاكد من عملية حذف نتيجـة الطـالـب  </p>
    <input type="hidden" name="id"  value="{{$Result->id}}">
    <input  type="text" style="font-weight: bolder; font-size:20px;"
    name="Name_Section"
    class="form-control"
    value="{{$Result->student->name}}"
    disabled>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline"
            data-dismiss="modal">إغلاق</button>
    <button type="submit"
            class="btn btn-outline">حذف البيانات</button>
</div>
</div>
</form>
</div>
</div>
    
    
    
@endforeach 
</tbody>
</table>

<div class="footer">
    <a href="{{ route('TeacherResult.print',$result->id) }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
        <i class="fa fa-print" aria-hidden="true"></i>  طبـاعـة  </a>
</div>

</div>
</div>

</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div><!--box -->


</div>
</div>
</div>
</section>


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection