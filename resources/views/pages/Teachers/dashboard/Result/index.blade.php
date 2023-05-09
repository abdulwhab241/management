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
    قائمة النتـائـج
</h1>
<ol class="breadcrumb">
<li><a href="{{ url('/teacher/dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة النتـائـج</li>
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

<button type="button" class="btn btn-success btn-flat" style="margin: 5px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">
    اضافة نتيجـة
</button>
<br><br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
<div class="input-group-btn">
<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
</div>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>


    <th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب </th>
    <th style="text-align: center;  background-color: #D0DEF6;" > المـادة</th>
    <th style="text-align: center;  background-color: #D0DEF6;" >إختبـار شهـر </th>
    <th style="text-align: center;  background-color: #D0DEF6;" >الدرجـة التي حصـل عليـها </th>
    <th style="text-align: center;  background-color: #D0DEF6;" >التقـديـر </th>
    <th style="text-align: center;" class="alert-warning">العمليـات</th>

</tr>
</thead>
<tbody>

    @foreach($results as $result)
        <tr>
            <td>{{$result->student->name}}</td>
            <td>{{$result->exam->subject->name}}</td>
            <td>{{$result->result_name}}</td>
            <td>{{$result->marks_obtained}}</td>
            <td>{{$result->appreciation}}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                data-target="#edit{{ $result->id }}"
                title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_result{{ $result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

        
<!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $result->id }}" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
id="exampleModalLabel">
تعديل نتيجـة الطـالـب {{$result->student->name}}
</h5>
</div>
<div class="modal-body">
<!-- add_form -->
<form class="form-horizontal"  action="{{ route('Result.update', $result->id ) }}" method="post">
{{ method_field('patch') }}
@csrf
<div class="box-body">

    <div class="row">

        <div class="col-md-4"> 
            <label>أسـم الطـالـب </label>
            <input id="id" type="hidden" name="id" class="form-control"
            value="{{ $result->id }}">
            <select class="form-control select2" name="Student_id">
                <option value="{{ $result->student->id }}">
                    {{ $result->student->name }}
                </option>

            </select>
        </div>

        <div class="col-md-4"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Exam_id">
                <option value="{{ $result->exam->subject->id }}">
                    {{ $result->exam->subject->name }}
                </option>
            </select>
        </div>
        <div class="col-md-4">
            <label >إختبـار شهـر</label>
            <input type="text" value="{{ $result->result_name }}" name="Result_name" class="form-control">
        </div>
</div><br>

<div class="row">

    <div class="col-md-6">
    <label>الدرجـة التي حصـل عليـها</label>
    <input type="number" value="{{ $result->marks_obtained }}" name="Marks" class="form-control">
    </div>
    
    <div class="col-md-6">
        <label >التقـديـر</label>
        <select class="form-control select2" name="Appreciation">
            <option >{{$result->appreciation }}</option>
            <option value="ممـتـاز">ممـتـاز</option>
            <option value="جيـد جـداً">جيـد جـداً</option>
            <option value="جيـد">جيـد</option>
            <option value="مقبـول">مقبـول</option>
            <option value="ضعيـف">ضعيـف</option>
        </select>  
    </div>

</div><br>

    {{-- <div class="row">

        <div class="col-md-4"> 
            <label>الصـف الدراسي</label>
            <input id="id" type="hidden" name="id" class="form-control"
            value="{{ $exam->id }}">
            <input type="hidden" name="Teacher_id" value="{{ auth()->user()->id }}">
            <select class="form-control select2" name="Classroom_id">
                <option value="{{ $exam->classroom->id }}">
                    {{ $exam->classroom->name_class }}
                </option>
                @foreach ($Classrooms as $Classroom)
                    <option value="{{  $Classroom->My_Classes->id }}">
                        {{  $Classroom->My_Classes->name_class }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Subject_id">
                <option value="{{ $exam->subject->id }}">
                    {{ $exam->subject->name }}
                </option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputEmail4">الـدرجـة</label>
            <input type="number" value="{{ $exam->total_marks }}" name="Total" class="form-control">
        </div>
</div><br> --}}

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
<div class="modal fade" id="delete_result{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
<form action="{{route('Result.destroy',$result->id)}}" method="post">
    {{method_field('delete')}}
    {{csrf_field()}}
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف إختبـار</h5>
    
    </div>
    <div class="modal-body">
        <p> هل انت متاكد من عملية حذف نتيجـة الطـالـب  </p>
        <input type="hidden" name="id"  value="{{$result->id}}">
        <input  type="text" style="font-weight: bolder; font-size:20px;"
        name="Name_Section"
        class="form-control"
        value="{{$result->student->name}}"
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

</div>
</div>

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-primary" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    اضافة نتيجـة
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Result.store') }}" method="POST">
@csrf

<div class="box-body">
    <div class="row">

        <div class="col-md-4"> 
            <label>أسـم الطـالـب</label>
            <select class="form-control select2" name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($students as $Student)
                    <option value="{{ $Student->id }}">
                        {{ $Student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Exam_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($exams as $Exam)
                    <option value="{{ $Exam->id }}">
                        {{ $Exam->subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label >إختبـار شهـر</label>
            <input type="text" value="{{ old('Result_name') }}" name="Result_name" class="form-control">
        </div>
</div><br>

<div class="row">

    <div class="col-md-6"> 
        <label>الدرجـة التي حصـل عليـها</label>
        <input type="number" value="{{ old('Marks') }}" name="Marks" class="form-control">
    </div>

    <div class="col-md-6">
        <label >التقـديـر</label>
        <select class="form-control select2" name="Appreciation">
            <option  selected disabled>أختـر من القائمة...</option>
            <option value="ممـتـاز">ممـتـاز</option>
            <option value="جيـد جـداً">جيـد جـداً</option>
            <option value="جيـد">جيـد</option>
            <option value="مقبـول">مقبـول</option>
            <option value="ضعيـف">ضعيـف</option>
        </select>  
    </div>

</div><br>

        {{-- <div class="col-md-4"> 
            <label>الصـف الدراسي</label>
            <input type="hidden" name="Teacher_id" value="{{ auth()->user()->id }}">
            <select class="form-control select2" name="Classroom_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Classrooms as $Classroom)
                    <option  value="{{ $Classroom->My_Classes->id }}" required>{{ $Classroom->My_Classes->name_class }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Subject_id">
                <option  selected disabled>حدد المادة الدراسية...</option>
                @foreach ($subjects as $subject)
                    <option  value="{{ $subject->id }}" required>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputEmail4">الـدرجـة</label>
            <input type="number" value="{{ old('Total') }}" name="Total" class="form-control">
        </div> --}}
{{-- </div> --}}

</div>

    <div class="modal-footer">
        <button type="submit"
        class="btn btn-info btn-block">حفظ البيانات</button>
        </div>


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
@endsection