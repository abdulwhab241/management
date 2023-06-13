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
    <a href="{{route('Final_Results.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
aria-pressed="true">اضافة نتيـجة طـالـب</a>
    <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_student_grades') }}">
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

<th style="text-align: center; background-color: #D0DEF6;">الصـف الدراسي</th>
<th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الاول 50% (رقـماً)</th>
<th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
<th style="text-align: center; background-color: #D0DEF6;">درجات الفصل الثـانـي 50% (رقـماً)</th>
<th style="text-align: center; background-color: #D0DEF6;">(كتـابـة) 50%</th>
<th style="text-align: center; background-color: #D0DEF6;">المـجموع 100</th>

{{-- <th style="text-align: center;" class="alert-warning">العمليات</th> --}}
</tr>
</thead>
<tbody>
@foreach($Final_Results as $Final_Result)
<tr>
{{-- <td>{{$loop->iteration}}</td> --}}
<td>{{$Final_Result->classroom->name_class}}</td>
<td>{{$Final_Result->student->name}}</td>
<td>{{$Final_Result->subject->name}}</td>
<td>{{$Final_Result->f_total_number }}</td>
<td>{{ $Final_Result->f_total_write }}</td>
<td>{{ $Final_Result->s_total_number }}</td>
<td>{{$Final_Result->s_total_write}}</td>
<td>{{ $Final_Result->total }}</td>


{{-- <td>
    <a href="{{route('Student_Grades.edit',$Student_Grade->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Student_Grades{{ $Student_Grade->id }}" title="حذف"><i class="fa fa-trash"></i></button>
</td> --}}
</tr>


{{-- <div class="modal fade" id="delete_Student_Grades{{$Student_Grade->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger" role="document">
    <form action="{{route('Student_Grades.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف محصـلـة الطـالـب</h5>
        
        </div>
        <div class="modal-body">
            <p> هل انت متاكد من عملية حذف محصلـة الطـالـب </p>
            <input type="hidden" name="id"  value="{{$Student_Grade->id}}">
            <input  type="text" style="font-weight: bolder; font-size:20px;"
            name="Name_Section"
            class="form-control"
            value="{{$Student_Grade->student->name}}"
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
</div> --}}
@endforeach
</tbody>
</table>

@isset($Final_Results)
<div class="footer">
<button type="button" 
class="btn btn-warning md-4 btn-block"
style="margin: 10px; padding:5px;" data-toggle="modal" data-target="#Delete_all">
    عـرض نتيـجـة الطـالب
</button>
</div>
@endisset

<div class="footer">
    <a href="{{ route('StudentGrades.print') }}" style="margin: 10px; padding:5px;" class="btn .btn.bg-navy  pull-left">
        <i class="fa fa-print" aria-hidden="true"></i>  طبـاعـة  </a>
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