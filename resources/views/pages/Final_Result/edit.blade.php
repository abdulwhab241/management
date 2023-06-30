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
تعـديـل النتيـجـة النـهائـية للطـلاب <label style="color: #5686E0">{{$Final_Result->mid->student->name}}</label>
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


<form  action="{{route('Final_Results.update','test')}}"  method="POST" >
@method('PUT')
@csrf
<div class="box-body">
<div class="row">
    <div class="col-md-4">
        <label>أسـم الطـالـب \ الطـالبـة</label>
        <select class="form-control select2" style="width: 100%;" name="Student_id">
            <option value="{{$Final_Result->mid_id}}">{{$Final_Result->mid->student->name}}</option>

        </select>                        
        @error('Student_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>المادة</label>
        <select class="form-control select2" style="width: 100%;" name="Subject_id">
            <option value="{{$Final_Result->subject_id}}">{{$Final_Result->subject->name}}</option>
            @foreach ($Subjects as $Subject)
                <option value="{{$Subject->id}}">{{$Subject->name}}</option>
            @endforeach
        </select>                        
        @error('Subject_id')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-md-4">
        <label>درجـة الإختبـار</label>
        <input type="hidden" name="id" value="{{ $Final_Result->id }}">
        <input type="number" value="{{ $Final_Result->final_exam }}" name="Degree" class="form-control">
        @error('Degree')
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
</div>
</div>
</section><!-- /.content -->

@endsection
@section('js')
@toastr_js
@toastr_render

@endsection