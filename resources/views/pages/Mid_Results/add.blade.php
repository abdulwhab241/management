@extends('layouts.master')
@section('css')

@section('title')
اضافة نتيـجـة الـترم الاول
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
اضافة نتيـجـة الـترم الاول
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('MidResults.index')}}"><i class="fa fa-book"></i> قائمـة نتـائـج الـترم الاول </a></li>
<li class="active">اضافة نتيـجـة الـترم الاول</li>
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

<form  action="{{route('MidResults.store','test')}}"  method="POST" >
@csrf
<div class="box-body">
<div class="row">
<div class="col-md-3"> 
    <label>أسـم الطـالـب \ الطـالبـة</label>
    <select class="form-control select2" style="width: 100%;" name="Student_id">
        <option selected disabled>أختـر من القائمة...</option>
        @foreach($Students as $Student)
            <option value="{{$Student->student_id}}">{{$Student->student->name}}</option>
        @endforeach
    </select>  
    @error('Student_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

<div class="col-md-3">
    <label>المادة</label>
    <select class="form-control select2" style="width: 100%;" name="Subject_id">
        <option selected disabled>أختـر من القائمة...</option>
        @foreach($Subjects as $Subject)
            <option value="{{$Subject->id}}">{{$Subject->name}}</option>
        @endforeach
    </select>                        
    @error('Subject_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

<div class="col-md-3">
    <label>المحـصلـة</label>
    <select class="form-control select2" style="width: 100%;" name="Degree_id">
        <option selected disabled>أختـر من القائمة...</option>
        @foreach($Student_Grades as $Degree)
            <option value="{{$Degree->id}}">{{$Degree->student->name}} | {{$Degree->month}} | {{ $Degree->subject->name }} | {{$Degree->total}}</option>
        @endforeach
    </select>                        
    @error('Degree_id')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>

<div class="col-md-3">
    <label>درجـة الإختبـار</label>
    <input type="number" value="{{ old('Degree') }}" name="Degree" class="form-control">
    @error('Degree')
    <div class=" alert-danger">
    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
    </div>
    @enderror
</div>


</div><br>

<div class="row">



    <div class="col-md-3">
        <label >التقـديـر</label>
        <select class="form-control select2" style="width: 100%;" name="Appreciation">
            <option  selected disabled>أختـر من القائمة...</option>
            <option value="ممـتـاز">ممـتـاز</option>
            <option value="جيـد جـداً">جيـد جـداً</option>
            <option value="جيـد">جيـد</option>
            <option value="مقبـول">مقبـول</option>
            <option value="ضعيـف">ضعيـف</option>
        </select>  
        @error('Appreciation')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

</div>
<br>


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