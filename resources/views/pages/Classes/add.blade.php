@extends('layouts.master')
@section('css')

@section('title')
إضافة جدول الحصـص
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
إضافة جدول الحصـص
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
<li><a href="{{route('Classes.index')}}"><i class="fa fa-book"></i> قائمـة جدول الحصـص </a></li>
<li class="active">إضافة جدول الحصـص</li>
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

<form  action="{{ route('Classes.store') }}" method="POST">
    @csrf
<div class="box-body">
    <div class="row">
        <div class="col-md-2"> 
            <label >الـيوم</label>
            <select class="form-control select2" name="Day_id">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="السبت">السبت</option>
                <option value="الاحد">الاحد</option>
                <option value="الاثنين">الاثنين</option>
                <option value="الثلاثاء">الثلاثاء</option>
                <option value="الاربعاء">الاربعاء</option>
            </select>
            @error('Day_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-2">
            <label >المرحلـة الدراسيـة</label>
            <select class="form-control select2" name="Grade_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Grades as $Grade)
                    <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                @endforeach
            </select>                
            @error('Grade_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-2">
            <label >الصـف الدراسـي</label>
            <select class="form-control select2" name="Classroom_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Classrooms as $Classroom)
                    <option value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
                @endforeach
            </select>                        
            @error('Classroom_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-2">
            <label >الشعبـة</label>
            <select class="form-control select2" name="Section_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Sections as $Section)
                    <option value="{{ $Section->id }}" required>{{ $Section->name_section }}</option>
                @endforeach
            </select>
            @error('Section_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-2">
            <label >الحصـة الاولى</label>
            <select class="form-control select2" name="First">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('First')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label >الحصـة الـثانيـة</label>
            <select class="form-control select2" name="Second">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Second')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
    </div><br>

    <div class="row">
 

        <div class="col-md-2">
            <label >الحصـة الثـالثـة</label>
            <select class="form-control select2" name="Third">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Third')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label >الحصـة الرابعـة</label>
            <select class="form-control select2" name="Fourth">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Fourth')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label >الحصـة الخـامسـة</label>
            <select class="form-control select2" name="Fifth">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Fifth')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label >الحصـة السـادسـة</label>
            <select class="form-control select2" name="Sixth">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Sixth')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-md-2">
            <label >الحصـة السـابعـة</label>
            <select class="form-control select2" name="Seventh">
                <option selected disabled>أختـر من القائمة...</option>
                <option value="القرأن الكريم">القرأن الكريم</option>
                <option value="التربيــة الإسلاميــة">التربيــة الإسلاميــة</option>
                <option value="اللغه العربيه">اللغه العربيه</option>
                <option value="اللغه الانجليزيه">اللغه الانجليزيه</option>
                <option value="المجتمع المدني">المجتمع المدني</option>
                <option value="الكيمياء">الكيمياء</option>
                <option value="الفيزياء">الفيزياء</option>
                <option value="الاحياء">الاحياء</option>
                <option value="التاريخ">التاريخ</option>
                <option value="الجغرافيه">الجغرافيه</option>
                <option value="حاسوب">حاسوب</option>
                <option value="العلوم">العلوم</option>
                <option value="الرياضيات">الرياضيات</option>
                <option value="رياضة">رياضة</option>
                <option value="فنية">فنية</option>
                <option value="مكتبة">مكتبة</option>
            </select>
            @error('Seventh')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        {{-- <div class="col-md-4">
            <label >المـادة</label>
            <select class="form-control select2" name="Subject_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Subjects as $Subject)
                    <option value="{{ $Subject->id }}">{{ $Subject->name }}</option>
                @endforeach
            </select>
            @error('Subject_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label >الأسـتاذ</label>
            <select class="form-control select2" name="Teacher_id">
                <option selected disabled>أختـر من القائمة...</option>
                @foreach ($Teachers as $Teacher)
                    <option value="{{ $Teacher->id }}" required>{{ $Teacher->name }}</option>
                @endforeach
            </select>
            @error('Teacher_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div> --}}
    </div>
        <br>

</div>
<div class="modal-footer">
<button type="submit"
    class="btn btn-success btn-block">حفظ البيانات</button>
</div>

</form>


</div>
</section><!-- /.content -->


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection