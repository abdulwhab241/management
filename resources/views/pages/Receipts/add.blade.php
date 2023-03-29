@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   تسديـد رسـوم الطالـب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  تسديـد رسـوم الطالـب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسيـة</a></li>
                <li class="breadcrumb-item active"> تسديـد رسـوم الطالـب</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
تسديـد رسـوم الطالـب {{$student->name}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form method="post"  action="{{ route('receipt_students.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Student_id"
                                        class="mr-sm-2">أسـم الطالـب
                                        :</label>

                                    <div class="box">
                                        <select class="custom-select mr-sm-2" name="Student_id">
                                            @foreach ($student as $Student)
                                                <option value="{{ $Student->id }}" required>{{ $Student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" type="number" >
                                        <input  type="hidden" name="Fee"  value="{{$student->fee->amount}}" class="form-control">
                                        <input  type="hidden" name="fee_id"  value="{{$student->fee->id}}" class="form-control">
                                        {{-- <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control"> --}}
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>الملاحظـة : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right btn-block"
                            style="padding:5px; margin: 5px;" type="submit">حفـظ البيانـات</button>
                        </form>

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