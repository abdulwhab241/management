@extends('layouts.master')
@section('css')

@section('title')
النـتائـج النـهائـية للطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
النـتائـج النـهائـية للطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">النـتائـج النـهائـية للطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">

<div class="box-body">
    <a href="{{route('Final_Results.create')}}" class="btn btn-success btn-flat" role="button"  
    aria-pressed="true">اضافة نتيـجة طـالـب</a>
    <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_finals') }}">
        <i class="fas fa-file-download"></i>  
    </a>
    <button type="button" class="btn btn-info btn-flat" title="عـرض نتـيجـة طـالـب"  data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-eye" aria-hidden="true"></i>
    </button>
    <button type="button" class="btn btn-default btn-flat" title="إرسـال الـنتـائـج النهـائـية إاـى الـطـلاب"  data-toggle="modal" data-target="#Send_Final_Result">
        <i class="fa fa-paper-plane"  aria-hidden="true"></i>
    </button>

</div>
<br>

</div><!-- /.box-header -->

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered " style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
<th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;" colspan="6">درجات الفصل الاول 50% </th>
<th style="text-align: center; background-color: #D0DEF6;" colspan="6">درجات الفصل الثـانـي 50% </th>
<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
@foreach($Final_Results as $Final_Result)
<tr>
<td>{{$Final_Result->classroom->name_class}}</td>
<td>{{$Final_Result->student->name}}</td>
<td>{{$Final_Result->subject->name}}</td>
<th>المحصلة</th>
<td>{{ $Final_Result->mid->result }}</td>
<th>الاختبار</th>
<td>{{ $Final_Result->mid->mid_exam }}</td>
<th>المجموع</th>
<td>{{ $Final_Result->mid->total }}</td>
<th>المحصلة</th>
<td>{{ $Final_Result->result }}</td>
<th>الاختبار</th>
<td>{{ $Final_Result->final_exam }}</td>
<th>المجموع</th>
<td>{{ $Final_Result->total }}</td>


<td>
    <div class="btn-group">
    <a href="{{route('Final_Results.edit',$Final_Result->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" title="تعديل" aria-pressed="true"><i class="fa fa-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#delete_Final_Results{{ $Final_Result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
    </div>
</td>
</tr>


<div class="modal fade" id="delete_Final_Results{{$Final_Result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-warning" role="document">
    <form action="{{route('Final_Results.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                حـذف نتيـجـة الطـالـب   <label style="color: black; font-size:20px;">{{$Final_Result->mid->student->name}}</label>
            </h5>
        
        </div>
        <div class="modal-body">
            <p> هل انت متاكد من عملية حذف نتيـجـة  الـمادة </p>
            <input type="hidden" name="id"  value="{{$Final_Result->id}}">
            <input  type="text" style="font-weight: bolder; font-size:20px;"
            name="Name_Section"
            class="form-control"
            value="{{$Final_Result->mid->subject->name}}"
            disabled>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline"
                    data-dismiss="modal">إغلاق</button>
            <button type="submit"
                    class="btn btn-outline">حـذف</button>
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
<div class="modal-dialog modal-primary"  role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    عـرض نتـيجـة طـالـب            
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('find_student_final') }}" method="POST">
@csrf

<div class="box-body">

        <div class="form-group">
        <label >أسـم الطـالـب</label>
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Students as $Student)
            <option value="{{$Student->student_id}}" >{{$Student->student->name}}</option>
            @endforeach
        </select>
        </div>

<br>

</div>

<div class="modal-footer">
<button type="submit"
class="btn btn-info btn-block">تـأكيـد </button>
</div>

</form>
</div>
</div>
</div>
</div>


<!-- add_modal_class -->
<div class="modal fade" id="Send_Final_Result" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-info"  role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    إرسـال الـنتـائـج النهـائـية إاـى الـطـلاب            
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('send_final_result') }}" method="POST">
@csrf

<div class="box-body">

        <div class="form-group">
        <label >الـصـف الـدراسـي</label>
        <select class="form-control select2" style="width: 100%;" name="Classroom_id">
            <option  selected disabled>أختـر من القائمة...</option>
            @foreach ($Classrooms as $Classroom)
            <option value="{{$Classroom->id}}" >{{$Classroom->name_class}}</option>
            @endforeach
        </select>
        </div>

<br>

</div>

<div class="modal-footer">
<button type="submit"
class="btn btn-primary btn-block">إرسـال </button>
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