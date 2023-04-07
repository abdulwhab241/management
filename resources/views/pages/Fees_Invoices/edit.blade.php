@extends('layouts.master')
@section('css')

@section('title')
    تعديل فاتورة رسوم دراسية
@stop
@endsection
{{-- @section('page-header')
   <!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">تعديل رسوم دراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('main_trans.sid') }}</a></li>
                <li class="breadcrumb-item active">تعديل رسوم دراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
    تعديل رسوم دراسية
@stop
<!-- breadcrumb -->
@endsection --}}
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    تعديل فاتورة رسوم الطالب  <label style="color: #5686E0">{{$student->name}}</label>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    <li><a href="{{route('Fees_Invoices.index')}}"><i class="fa fa-list"></i> قائمـة الـفواتيـر الدراسيـة </a></li>
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
        </div><br>
        <div class="row">
            <div class="col-xs-3"> 
                <div class="form-group">
                <label> المبلغ</label>
                <select class="form-control select2" name="amount">
                    <option  selected disabled>أختـر من القائمة...</option>
                    @foreach ($Fees as $Fee)
                        <option  value="{{ $Fee->amount }}" required>{{ number_format($Fee->amount) }}</option>
                    @endforeach
                </select>
                </div>
                @error('amount')
                <div class=" alert-danger">
                <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                </div>
                @enderror
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
        
    
    </div>
    <div class="modal-footer">
    <button type="submit"
        class="btn btn-primary btn-block">تـأكـيد البيانات</button>
    </div>
    
    </form>
    
    
    </div>
    </section><!-- /.content -->
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

                    <form action="{{route('Fees_Invoices.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">اسم الطالب</label>
                                <input type="text" value="{{$fee_invoices->student->name}}" readonly name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee_invoices->id}}" name="id" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">المبلغ</label>
                                <input type="number" value="{{$fee_invoices->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputZip">نوع الرسوم</label>
                                <select class="custom-select mr-sm-2" name="fee_id">
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}" {{$fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">ملاحظات</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee_invoices->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">تاكيد</button>

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