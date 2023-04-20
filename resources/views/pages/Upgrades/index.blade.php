@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    ترقية الطلاب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ترقية الطلاب</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">ترقية الطلاب</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    ترقية الطلاب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
    <div class="card-body">

        @if (Session::has('error_promotions'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{Session::get('error_promotions')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <h6 style="color: blue;font-family: Cairo; font-weight: bold;">المرحلة الدراسية السابقة</h6><br>

        <form method="post" action="{{ route('Upgrades.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputState" style="font-weight: bold;">المرحلة الدراسية</label>
                    <select class="custom-select mr-sm-2" name="Grade_id" required>
                        <option selected disabled>اختيار من القائمة...</option>
                        @foreach($Grades as $Grade)
                            <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="Classroom_id" style="font-weight: bold;">الصف الدراسي  : <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" name="Classroom_id" required>

                    </select>
                </div>

                <div class="form-group col">
                    <label for="section_id" style="font-weight: bold;">الشعبـة : </label>
                    <select class="custom-select mr-sm-2" name="section_id" required>

                    </select>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="academic_year">السنـة الدراسيـة : <span class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" name="academic_year">
                            <option selected disabled>اختيار من القائمة...</option>
                            @php
                                $current_year = date("Y");
                            @endphp
                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                <option value="{{ $year}}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>


            </div>
            <br><h6 style="color: blue;font-family: Cairo; font-weight: bold;">المرحلة الدراسية الحالية</h6><br>

            <div class="form-row">
                <div class="form-group col">
                    <label for="inputState" style="font-weight: bold;">المرحلة الدراسية</label>
                    <select class="custom-select mr-sm-2" name="Grade_id_new" >
                        <option selected disabled>اختيار من القائمة...</option>
                        @foreach($Grades as $Grade)
                            <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="Classroom_id" style="font-weight: bold;">الصف الدراسي: <span
                            class="text-danger">*</span></label>
                    <select class="custom-select mr-sm-2" name="Classroom_id_new" >

                    </select>
                </div>
                <div class="form-group col">
                    <label for="section_id" style="font-weight: bold;">الشعبـة: </label>
                    <select class="custom-select mr-sm-2" name="section_id_new" >

                    </select>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="academic_year">السنـة الدراسيـة : <span class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" name="academic_year_new">
                            <option selected disabled>اختيار من القائمة...</option>
                            @php
                                $current_year = date("Y");
                            @endphp
                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                <option value="{{ $year}}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

            </div><br>
            <button type="submit"
            style="padding:5px; margin: 5px;" class="btn btn-outline-primary btn-block">تاكيـد</button>
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


