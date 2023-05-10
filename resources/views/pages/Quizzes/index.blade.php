@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة الأختبـارات
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة الأختبـارات
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة الأختبـارات</li>
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
    اضافة إختبـار
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

    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">الصـف الدراسـي </th>
    <th style="text-align: center;" class="alert-info"> المـادة</th>
    <th style="text-align: center;" class="alert-info">الأستـاذ </th>
    <th style="text-align: center;" class="alert-info">الـدرجـة</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($Exams as $Exam)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Exam->classroom->name_class }}</td>
            <td>{{ $Exam->subject->name }}</td>
            <td>{{$Exam->teacher->name}}</td>
            <td>{{$Exam->total_marks}}</td>
            <td>{{ $Exam->create_by }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                data-target="#edit{{ $Exam->id }}"
                title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Exam{{ $Exam->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

        <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $Exam->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                تعديل الأختبـار
            </h5>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form class="form-horizontal"  action="{{ route('Quizzes.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                @csrf
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6"> 
                            <label>الصـف الدراسي</label>
                            <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $Exam->id }}">
                            <select class="form-control select2" name="Classroom_id">
                                <option value="{{ $Exam->classroom->id }}">
                                    {{ $Exam->classroom->name_class }}
                                </option>
                                @foreach ($Classrooms as $Classroom)
                                    <option value="{{ $Classroom->id }}">
                                        {{ $Classroom->name_class }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                
                        <div class="col-md-6"> 
                            <label>المـادة</label>
                            <select class="form-control select2" name="Subject_id">
                                <option value="{{ $Exam->subject->id }}">
                                    {{ $Exam->subject->name }}
                                </option>
                                @foreach ($Subjects as $Subject)
                                    <option value="{{ $Subject->id }}">
                                        {{ $Subject->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                </div><br>
                
                <div class="row">
                
                    <div class="col-md-6">
                        <label>الأستـاذ</label>
                        <select class="form-control select2" name="Teacher_id">
                            <option value="{{ $Exam->teacher->id }}">
                                {{ $Exam->teacher->name }}
                            </option>
                            @foreach ($Teachers as $Teacher)
                                <option value="{{ $Teacher->id }}">
                                    {{ $Teacher->name }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <label >الـدرجـة</label>
                        <input type="number" value="{{ $Exam->total_marks }}" name="Total" class="form-control">
                    </div>
                
                </div><br>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                    data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                    class="btn btn-success">تـعديـل البيانات</button>
                    </div>

            </form>
    
        </div>
    </div>
    </div>
    </div>

<!-- Delete modal -->
<div class="modal fade" id="delete_Exam{{$Exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Quizzes.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف إختبـار مـادة </p>
                <input type="hidden" name="id"  value="{{$Exam->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$Exam->subject->name}}"
                disabled>
            </div><br>
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
{{-- aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    اضافة إختبـار
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Quizzes.store') }}" method="POST">
@csrf

<div class="box-body">
    <div class="row">

        <div class="col-md-6"> 
            <label>الصـف الدراسي</label>
            <select class="form-control select2" name="Classroom_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Classrooms as $Classroom)
                    <option  value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Subject_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Subjects as $Subject)
                    <option  value="{{ $Subject->id }}" required>{{ $Subject->name }}</option>
                @endforeach
            </select>
        </div>
</div><br>

<div class="row">

    <div class="col-md-6"> 
        <label>الأستـاذ</label>
        <select class="form-control select2" name="Teacher_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Teachers as $Teacher)
                <option  value="{{ $Teacher->id }}" required>{{ $Teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label >الـدرجـة</label>
        <input type="number" value="{{ old('Total') }}" name="Total" class="form-control">
    </div>

</div><br>

</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger"
        data-dismiss="modal">إغلاق</button>
        <button type="submit"
        class="btn btn-success">حفظ البيانات</button>
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