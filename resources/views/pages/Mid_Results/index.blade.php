@extends('layouts.master')
@section('css')

@section('title')
النـتائـج النصـفيـة للطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
نـتائـج الـترم الأول للطـلاب
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">نـتائـج الـترم الأول للطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">

<div class="box-header">

<div class="box-body">
    <a href="{{route('MidResults.create')}}" class="btn btn-success btn-flat" role="button" style="padding:5px; margin: 5px;" 
    aria-pressed="true">اضافة نتيـجة طـالـب</a>
    <a class="btn btn-primary btn-flat" title="تصـديـر إكسـيل" href="{{ route('export_finals') }}">
        <i class="fas fa-file-download"></i>  
    </a>
    <a href="{{route('Search_Result')}}" title="عـرض نتـائـج الـطـلاب" class="btn btn-info btn-flat" role="button" style="padding:5px; margin: 5px;" 
    aria-pressed="true">
    <i class="fa fa-eye" aria-hidden="true"></i>
    </a>

</div>
<br>

</div><!-- /.box-header -->

<div class="box-body">
<div class="box-body table-responsive no-padding">
<table id="example1" class="table table-bordered " style="width:100%; text-align: center;">
<thead>
<tr>

<th style="text-align: center; background-color: #D0DEF6;">أسـم الطـالـب \ الطـالبـة</th>
<th style="text-align: center; background-color: #D0DEF6;">المادة</th>
<th style="text-align: center; background-color: #D0DEF6;"> المحـصلـة</th>
<th style="text-align: center; background-color: #D0DEF6;">إمتحـان نهـايـة الفـصل الاول</th>
<th style="text-align: center; background-color: #D0DEF6;">المـجموع </th>

<th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
@foreach($MidResults as $MidResult)
<tr>
{{-- <td>{{$MidResult->classroom->name_class}}</td> --}}
<td>{{$MidResult->student->name}}</td>
<td>{{$MidResult->subject->name}}</td>
<td>{{$MidResult->result }}</td>
<td>{{ $MidResult->mid_exam }}</td>
<td>{{ $MidResult->total }}</td>
{{-- <td>ds</td> --}}
{{-- <td>{{ $MidResult->total }}</td> --}}


<td>
    <div class="btn-group">
        <a href="{{route('MidResults.edit',$MidResult->id)}}" style="margin: 3px;" class="btn btn-info btn-sm" role="button" title="تعديل" aria-pressed="true"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-sm" style="margin: 3px;" data-toggle="modal" data-target="#delete_MidResults{{ $MidResult->id }}" title="حذف"><i class="fa fa-trash"></i></button>
  
    </div>
</td>
</tr>


<div class="modal fade" id="delete_MidResults{{$MidResult->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-warning" role="document">
    <form action="{{route('MidResults.destroy','test')}}" method="post">
        {{method_field('delete')}}
        {{csrf_field()}}
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                حـذف نتيـجـة الطـالـب   <label style="color: black; font-size:20px;">{{$MidResult->student->name}}</label>
            </h5>
        
        </div>
        <div class="modal-body">
            <p> هل انت متاكد من عملية حذف نتيـجـة  الـمادة </p>
            <input type="hidden" name="id"  value="{{$MidResult->id}}">
            <input  type="text" style="font-weight: bolder; font-size:20px;"
            name="Name_Section"
            class="form-control"
            value="{{$MidResult->subject->name}}"
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