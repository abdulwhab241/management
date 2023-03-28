@extends('layouts.master')
@section('css')
    {{-- @toastr_css --}}
@section('title')
    الرسوم الدراسية
@stop
@endsection
{{-- @section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">    الرسوم الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">   الرسوم الدراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    الرسوم الدراسية
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        الرسوم الدراسية
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    {{-- <li><a href="#">Tables</a></li> --}}
    <li class="active">الرسوم الدراسية</li>
    </ol>
</section>
<!-- Main content -->
<!-- this -->
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
    {{-- <a class="btn btn-success btn-flat" style="padding:5px; margin: 5px;" href="#" data-toggle="modal" data-target="#exampleModal">
        اضافة قسـم</a>
    <br><br> --}}
<a href="{{route('Fees.create')}}" class="btn btn-success btn-flat" role="button"
style="margin: 5px; padding: 5px;" aria-pressed="true">اضافة رسوم جديدة</a><br><br>
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
            <th style="text-align: center;">#</th>
            <th style="text-align: center;">الاسم</th>
            <th style="text-align: center;">المبلغ</th>
            <th style="text-align: center;">المرحلة الدراسية</th>
            <th style="text-align: center;">الصف الدراسي</th>
            <th style="text-align: center;">السنة الدراسية</th>
            <th style="text-align: center;">ملاحظات</th>
            <th style="text-align: center;"> انشـئ بواسطـة</th>
            <th style="text-align: center;">العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fees as $fee)
        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{$fee->title}}</td>
        <td>{{ number_format($fee->amount) }}</td>
        <td>{{$fee->grade->name}}</td>
        <td>{{$fee->classroom->name_class}}</td>
        <td>{{$fee->year}}</td>
        <td>{{$fee->description}}</td>
        <td>{{ $fee->create_by }}</td>
            <td>
                <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

            </td>
        </tr>
    @include('pages.Fees.Delete')

    {{-- @foreach ($Sections as $list_Sections)
        <tr>
        
            <td>{{ $i }}</td>
            <td>{{ $list_Sections->Grades->name }}</td>
            <td>{{ $list_Sections->My_Classes->name_class }}</td>
            <td style="font-weight: bold; font-size: 20px;">{{ $list_Sections->name_section }}</td>
            <td>{{ $list_Sections->create_by }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#edit{{ $list_Sections->id }}"
                        title="تعديل"><i
                        class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#delete_section{{ $list_Sections->id }}"
                        title="حذف"><i
                            class="fa fa-trash"></i></button>
            </td>
        </tr> --}}
    
    
    {{-- <!-- delete_modal_Grade -->
    <div class="modal fade"
            id="delete{{ $list_Sections->id }}"
            tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title"
                        id="exampleModalLabel">
                        حذف قسـم
                    </h5>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                    <span
                        aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form
                        action="{{ route('Sections.destroy', 'test') }}"
                        method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        هل انت متاكد من عملية حذف القسم
                        <input  type="text" style="font-weight: bolder; font-size:20px;"
                        name="Name_Section"
                        class="form-control"
                        value="{{ $list_Sections->name_section }}"
                        disabled>
                        <input id="id" type="hidden"
                                name="id"
                                class="form-control"
                                value="{{ $list_Sections->id }}">
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">إغلاق</button>
                            <button type="submit"
                                    class="btn btn-danger">حذف البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    
    
    @endforeach
    </table>
    
    </div><!-- /.box-body -->
    
    <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
    </div>
    </div><!-- /.box -->
    </div>
    
    {{-- <!--اضافة قسم جديد -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
        id="exampleModalLabel">
        اضافة قسـم</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    
    <form class="form-horizontal" action="{{ route('Sections.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">القسـم</label>
        <div class="col-sm-10">
            <input type="text" name="Name_Section" class="form-control" id="inputEmail3">
        </div>
        </div>
    
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">المرحـلة</label>
            <div class="col-sm-10">
                <select name="Grade_id" class="form-control select2"
                onchange="console.log($(this).val())">
                <!--placeholder-->
                <option value="" selected 
                        disabled>-- حدد المرحـلة --
                </option>
                @foreach ($Grades as $list_Grade)
                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                    </option>
                @endforeach
            </select>
            </div>
        </div>
    
        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">الصـف</label>
        <div class="col-sm-10">
            <select name="Class_id" class="form-control select2"
                >
                <!--placeholder-->
                <option value="" selected 
                        disabled>-- حدد الصـف --
                </option>
                @foreach ($Classrooms as $Classroom)
                    <option value="{{ $Classroom->id }}"> {{ $Classroom->name_class }}
                    </option>
                @endforeach
            </select>
        </div>
        </div>
    
    
    
    
    
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary"
            data-dismiss="modal">إغلاق</button>
    <button type="submit"
            class="btn btn-success">حفظ البيانات</button>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
     --}}
    </div>
    </section><!-- /.content -->
    <!-- end -->
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <a href="{{route('Fees.create')}}" class="btn btn-outline-success btn-sm" role="button"
            style="margin: 5px; padding: 5px;" aria-pressed="true">اضافة رسوم جديدة</a><br><br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr class="alert-success">
                        <th>#</th>
                        <th>الاسم</th>
                        <th>المبلغ</th>
                        <th>المرحلة الدراسية</th>
                        <th>الصف الدراسي</th>
                        <th>السنة الدراسية</th>
                        <th>ملاحظات</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fees as $fee)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$fee->title}}</td>
                        <td>{{ number_format($fee->amount, 2) }}</td>
                        <td>{{$fee->grade->Name}}</td>
                        <td>{{$fee->classroom->Name_Class}}</td>
                        <td>{{$fee->year}}</td>
                        <td>{{$fee->description}}</td>
                            <td>
                                <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                            </td>
                        </tr>
                    @include('pages.Fees.Delete')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection