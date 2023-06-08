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
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

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

    <div class="box-body">
        <button type="button" class="btn btn-success btn-flat" style="margin: 5px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">
            اضافة نتيـجـة
        </button>
        <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_results') }}">
            <i class="fas fa-file-download"></i>  
        </a>
    </div>
<br>
<div class="box-tools">
<div class="input-group" style="width: 150px;">
    <h5 style="font-family: 'Cairo', sans-serif;color: blue"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
</div>
</div>
</div><!-- /.box-header -->
<div class="box-body">
<div class="box-body table-responsive no-padding">
    <table id="example1" class="table table-bordered table-striped" style="width:100%; text-align: center;">
<thead>
<tr>

    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">أسـم الطـالـب \ الطـالبـة </th>
    <th style="text-align: center;" class="alert-info"> المـادة</th>
    <th style="text-align: center;" class="alert-info">الدرجـة التي حصـل عليـها </th>
    <th style="text-align: center;" class="alert-info">التقـديـر</th>
    <th style="text-align: center;" class="alert-info"> إختبـار شهـر</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($Results as $Result)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Result->student->name }}</td>
            <td>{{ $Result->exam->subject->name }}</td>
            <td>{{$Result->marks_obtained}}</td>
            <td>{{$Result->appreciation}}</td>
            <td>{{$Result->result_name}}</td>
            <td>{{ $Result->create_by }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                data-target="#edit{{ $Result->id }}"
                title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Result{{ $Result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

        <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $Result->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                تعديل النتيجـة
            </h5>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form class="form-horizontal"  action="{{ route('Results.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                @csrf
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-4"> 
                            <label>أسـم الطـالـب </label>
                            <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $Result->id }}">
                            <select class="form-control select2" style="width: 100%;" name="Student_id">
                                <option value="{{ $Result->student->id }}">
                                    {{ $Result->student->name }}
                                </option>
                            </select>
                        </div>
                
                        <div class="col-md-4"> 
                            <label>المـادة</label>
                            <select class="form-control select2" style="width: 100%;" name="Exam_id">
                                <option value="{{ $Result->exam->subject->id }}">
                                    {{ $Result->exam->subject->name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label >إختبـار شهـر</label>
                            <select class="form-control select2" style="width: 100%;" name="Result_name">
                                <option> {{ $Result->result_name }} </option>
                                <option value="فبراير">فبراير</option>
                                <option value="مارس">مارس</option>
                                <option value="ابريل">ابريل</option>
                                <option value="اكتوبر">اكتوبر</option>
                                <option value="نوفمبر">نوفمبر</option>
                                <option value="ديسمبر">ديسمبر</option>
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
                
                </div>
                
                </div><br>
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
<div class="modal fade" id="delete_Result{{$Result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Results.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
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
    اضافة نتيـجة
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Results.store') }}" method="POST">
@csrf

<div class="box-body">
    <div class="row">

        <div class="col-md-4"> 
            <label>أسـم الطـالـب</label>
            <select class="form-control select2" style="width: 100%;" name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Students as $Student)
                    <option value="{{ $Student->student_id }}">
                        {{ $Student->student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4"> 
            <label>المـادة</label>
            <select class="form-control select2" style="width: 100%;" name="Exam_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Exams as $Exam)
                    <option value="{{ $Exam->id }}">
                        {{ $Exam->subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            
            <label >إختبـار شهـر</label>
            <select class="form-control select2" style="width: 100%;" name="Result_name">
                <option  selected disabled>أختـر من القائمة...</option>
                <option value="فبراير">فبراير</option>
                <option value="مارس">مارس</option>
                <option value="ابريل">ابريل</option>
                <option value="اكتوبر">اكتوبر</option>
                <option value="نوفمبر">نوفمبر</option>
                <option value="ديسمبر">ديسمبر</option>
            </select>        
        </div>
</div><br>

<div class="row">

    <div class="col-md-6"> 
        
        <label>الدرجـة التي حصـل عليـها</label>
        <input type="number" value="{{ old('Marks') }}" name="Marks" class="form-control">
    
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <label >التقـديـر</label>
        <select class="form-control select2" style="width: 100%;" name="Appreciation">
            <option  selected disabled>أختـر من القائمة...</option>
            <option value="ممـتـاز">ممـتـاز</option>
            <option value="جيـد جـداً">جيـد جـداً</option>
            <option value="جيـد">جيـد</option>
            <option value="مقبـول">مقبـول</option>
            <option value="ضعيـف">ضعيـف</option>
        </select>  
    </div>
    </div>

</div>

</div><br>
<div class="modal-footer">
    <button type="button" class="btn btn-danger"
    data-dismiss="modal">إغلاق</button>
    <button type="submit"
    class="btn btn-success">حفـظ البيانات</button>
    </div>
</form>
</div>
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