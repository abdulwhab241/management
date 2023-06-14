@extends('layouts.master')
@section('css')

@section('title')
تعـديـل النـتائـج النـهائـية للطـلاب
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
تعـديـل النتيـجـة النـهائـية للطـلاب <label style="color: #5686E0">{{$Final_Result->student->name}}</label>
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Final_Results.index')}}"><i class="fas fa-percent fa-fw"></i> قائمـة النـتائـج النـهائـية للطـلاب </a></li>
<li class="active">تعـديـل النتيـجـة النـهائـية للطـلاب</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{ session()->get('error') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
</div><!-- /.box-header -->

<form  action="{{route('Final_Results.update','test')}}"  method="POST" >
@method('PUT')
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-6">
        <label>أسـم الطـالـب \ الطـالبـة</label>
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option value="{{$Final_Result->student_id}}">{{$Final_Result->student->name}}</option>
            {{-- @foreach($Students as $Student)
                <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
            @endforeach --}}
        </select>                        
        @error('Student_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-6">
        <label>المادة</label>
        <select class="form-control select2" style="width: 100%;" name="Subject_id">
            <option value="{{$Final_Result->subject_id}}">{{$Final_Result->subject->name}}</option>
            {{-- @foreach($Subjects as $Subject)
                <option value="{{$Subject->id}}">{{$Subject->name}}</option>
            @endforeach --}}
        </select>                        
        @error('Subject_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

</div><br>

<h5 style="text-align: center; color:blue; font-weight: bold; padding:5px; margin:5px;"> درجات الفصل الاول 50 %</h5>
<div class="row">

    <div class="col-md-6">
        <label>رقـماُ</label>
        <input type="hidden" name="id" value="{{$Final_Result->id}}">
        <input type="number" value="{{ $Final_Result->f_total_number }}" name="F_Number" class="form-control">
        @error('F_Number')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-6">
        <label>كتـابـة</label>
        <input type="text" value="{{ $Final_Result->f_total_write }}" name="F_Write" class="form-control">
        @error('F_Write')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

</div> <br>
    <h5 style="text-align: center; color:blue; font-weight: bold; padding:5px; margin:5px;"> درجات الفصل الثـانـي 50 %</h5>
    <div class="row">
    
        <div class="col-md-4">
            <label>رقـماُ</label>
            <input type="number" value="{{ $Final_Result->s_total_number }}" name="S_Number" class="form-control">
            @error('S_Number')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    
        <div class="col-md-4">
            <label>كتـابـة</label>
            <input type="text" value="{{ $Final_Result->s_total_write }}" name="S_Write" class="form-control">
            @error('S_Write')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label>المـجموع</label>
            <input type="number" value="{{ $Final_Result->total }}" name="Total" class="form-control">
            @error('Total')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    
    </div><br>

</div>
<div class="modal-footer">
<button type="submit"
class="btn btn-success btn-block">تـأكيـد</button>
</div>

</form>


</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection