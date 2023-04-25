@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الاسئلة
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> قائمة الاسئلة</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">قائمة الاسئلة</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
قائمة الاسئلة : <span class="text-danger">{{$exam->name}}</span>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{route('Questions.show',$exam->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">اضافة سؤال جديد</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">السؤال</th>
                            <th scope="col">الاجابات</th>
                            <th scope="col">الاجابة الصحيحة</th>
                            <th scope="col">الدرجة</th>
                            <th scope="col">اسم الاختبار</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->answers}}</td>
                                <td>{{$question->right_answer}}</td>
                                <td>{{$question->score}}</td>
                                <td>{{$question->exame->name}}</td>
                                <td>
                                    <a href="{{route('Questions.edit',$question->id)}}"
                                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                        @include('pages.Teachers.dashboard.Questions.destroy')
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