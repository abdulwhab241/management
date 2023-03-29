@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة مادة دراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">اضافة مادة دراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">اضافة مادة دراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    اضافة مادة دراسية
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
    <div class="card-body">

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <form action="{{route('Subjects.store')}}" method="post" autocomplete="off">
                    @csrf

                    <div class="form-row">
                        <div class="col">
                            <label for="title">اسم المادة</label>
                            <input type="text" name="Name" class="form-control">
                            @error('Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="title">الدرجة</label>
                            <input type="number" name="Degree" class="form-control">
                            @error('Degree')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">المرحلة الدراسية</label>
                            <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                <option selected disabled>اختيار من القائمة...</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                            @error('Grade_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label for="inputState">الصف الدراسي</label>
                            <select name="Class_id" class="custom-select"></select>
                            @error('Class_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col">
                            <label for="inputState">اسم المعلم</label>
                            <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                <option selected disabled>اختيار من القائمة...</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-outline-success btn-sm nextBtn btn-lg pull-right"
                    style="padding: 10px; margin: 5px;" type="submit">حفظ البيانات</button>
                </form>
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
<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection