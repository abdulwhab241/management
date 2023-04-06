@extends('layouts.master')
@section('css')
    
@section('title')
    اضافة فاتورة جديدة
@stop
@endsection

@section('content')



<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    اضافة فاتورة جديدة 
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li class="active">اضافة فاتورة جديدة </li>
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
    
    <form  action="{{route('Fees_Invoices.store')}}"  method="POST" >
    @csrf
    <div class="box-body">
        <div class="row">
            <div class="col-xs-3"> 
                <div class="form-group">
                <label>أسم الطـالـب</label>
                <select class="form-control select2" name="Student_id">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Students as $Student)
                        <option  value="{{ $Student->id }}" required>{{ $Student->name }}</option>
                    @endforeach
                </select>
                </div>
                @error('Student_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3"> 
                <div class="form-group">
                <label>المرحلة الدراسية</label>
                <select class="form-control select2" name="Grade_id">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Grades as $Grade)
                        <option  value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                    @endforeach
                </select>
                </div>
                @error('Grade_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3"> 
                <div class="form-group">
                <label>الصـف الدراسي</label>
                <select class="form-control select2" name="Classroom_id">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Classrooms as $Classroom)
                        <option  value="{{ $Classroom->id }}" required>{{ $Classroom->name_class }}</option>
                    @endforeach
                </select>
                </div>
                @error('Classroom_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-3"> 
                <div class="form-group">
                <label>نـوع الرسـوم </label>
                <select class="form-control select2" name="Fee_id">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Fees as $Fee)
                        <option  value="{{ $Fee->id }}" required>{{ $Fee->title }}</option>
                    @endforeach
                </select>
                </div>
                @error('Fee_id')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            {{-- <div class="col-xs-3">
                <label for="inputEmail4">المبـلغ</label>
                <input type="number" value="{{ old('Debit') }}" name="Debit" class="form-control">
                @error('Debit')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
            <div class="col-xs-6">
                <label for="exampleFormControlTextarea1">البيـان</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="1">{{ old('description') }}</textarea>
                @error('description')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div> --}}
        </div><br>
        <div class="row">
            <div class="col-xs-3"> 
                <div class="form-group">
                <label> المبلغ</label>
                <select class="form-control select2" name="amount">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Fees as $Fee)
                        <option  value="{{ $Fee->id }}" required>{{ $Fee->amount }}</option>
                    @endforeach
                </select>
                </div>
                @error('amount')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
        </div>
        <div class="col-xs-3">
                <label for="inputEmail4">البيان</label>
                <input type="text" value="{{ old('description') }}" name="description" class="form-control">
                @error('description')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
            </div>
    
    </div>
    <div class="modal-footer">
    <button type="submit"
        class="btn btn-success btn-block">حفظ البيانات</button>
    </div>
    
    </form>
    
    
    </div>
    </section><!-- /.content -->

{{-- <!-- row -->
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

    <form class=" row mb-30" action="{{ route('Fees_Invoices.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="repeater">
                <div data-repeater-list="List_Fees">
                    <div data-repeater-item>
                        <div class="row">

                            <div class="col">
                                <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                <select class="fancyselect" name="student_id" required>
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                <div class="box">
                                    <select class="fancyselect" name="fee_id" required>
                                        <option value="">-- اختار من القائمة --</option>
                                        @foreach($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">المبلغ</label>
                                <div class="box">
                                    <select class="fancyselect" name="amount" required>
                                        <option value="">-- اختار من القائمة --</option>
                                        @foreach($fees as $fee)
                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label for="description" class="mr-sm-2">البيان</label>
                                <div class="box">
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                            </div>

                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}:</label>
                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('My_Classes_trans.delete_row') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-12">
                        <input class="button" data-repeater-create type="button" value="{{ trans('My_Classes_trans.add_row') }}"/>
                    </div>
                </div><br>
                <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                <input type="hidden" name="Classroom_id" value="{{$student->Classroom_id}}">

                <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
            </div>
        </div>
    </form>

</div>
</div>
</div>
</div>
<!-- row closed --> --}}
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection