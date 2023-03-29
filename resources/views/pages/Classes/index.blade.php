@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    جدول الحصـص
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> جدول الحصـص</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">جدول الحصـص</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@section('PageTitle')
جدول الحصـص
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
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

    <a href="{{route('Classes.create')}}" class="btn btn-outline-success btn-sm" role="button"
    style="padding:5px; margin: 5px;"
        aria-pressed="true">اضافة جدول الحصـص</a>
        <br><br>

    <div class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th>اليوم</th>
                    <th>المرحلة الدراسية</th>
                    <th>الصـف</th>
                    <th>الشعبـة</th>
                    <th>الحصـة</th>
                    <th>المـادة</th>
                    <th>الأستـاذ</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>

            @if (isset($details))

                <?php $List_Classes = $details; ?>
            @else

                <?php $List_Classes = $StudentClasses; ?>
            @endif

                <?php $i = 0; ?>
            
                @foreach ($List_Classes as $StudentClass)
                    <tr>
                        <td>{{ $StudentClass->day->name }}</td>
                        <td>{{ $StudentClass->grade->name }}</td>
                        <td>{{ $StudentClass->classroom->name_class }}</td>
                        <td>{{ $StudentClass->section->name_section }}</td>
                        <td>{{ $StudentClass->schoolClass->name }}</td>
                        <td>{{ $StudentClass->subject->name }}</td>
                        <td> أ. {{ $StudentClass->teacher->name }}</td>
                        <td>
                        <a href="{{route('Classes.edit',$StudentClass->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $StudentClass->id }}"
                            title="حذف"><i
                            class="fa fa-trash"></i></button>
                        </td>
                    </tr>

    
<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $StudentClass->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    حذف بيانـات جدول
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Classes.destroy','test')}}" method="post">
                    {{ method_field('Delete') }}
                    @csrf
                    هل انت متاكد من عملية حذف بيانـات جدول يـوم ؟
                    <input id="Name" type="text" name="Name"
                    class="form-control"
                    value="{{ $StudentClass->day->name }} , {{ $StudentClass->grade->name }} , {{ $StudentClass->classroom->name_class }} , {{ $StudentClass->section->name_section }} , {{ $StudentClass->schoolClass->name }} , {{ $StudentClass->subject->name }} , أ. {{ $StudentClass->teacher->name }}"
                    disabled>
                    <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $StudentClass->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">إغلاق</button>
                        <button type="submit"
                            class="btn btn-outline-danger">حذف البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endforeach
</table>
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