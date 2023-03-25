@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
@section('title')
المراحل الدراسية
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> المراحل الدراسية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">المراحل الدراسية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->

@section('PageTitle')
المراحل الدراسية
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

                <button type="button" class="btn btn-outline-success x-small" 
                style="padding:5px; margin: 5px;" data-toggle="modal" data-target="#exampleModal">
                    إضافة مرحلة
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                            data-page-length="50"
                            style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>أسم المرحلة</th>
                            <th>الملاحظات</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($grades as $grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ $grade->notes }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}"
                                            title="تعديل"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}"
                                            title="حذف"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل مرحلة
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{route('Grades.update','test')}}" method="post">
                                                {{method_field('patch')}}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                                class="mr-sm-2">أسم المرحلة
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                                class="form-control"
                                                                value="{{$grade->name }}"
                                                                required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $grade->id }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">ملاحظات
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                                id="exampleFormControlTextarea1"
                                                                rows="3">{{ $grade->notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                    <button type="submit"
                                                            class="btn btn-success">تعديل البيانات</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حذف مرحلة
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Grades.destroy','test')}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                هل انت متأكد من عملية الحذف ؟
                                                <input id="id" type="test" name="Name" class="form-control"
                                                        value="{{ $grade->name }}" disabled>
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">إغلاق</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">حذف البيانات</button>
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


    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        إضافة مرحلة
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"
                                        class="mr-sm-2">أسم المرحلة
                                    :</label>
                                <input id="Name" type="text" name="Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">ملاحظات
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                        </div>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                            class="btn btn-success">حفظ البيانات</button>
                </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')
    {{-- @toastr_js
    @toastr_render --}}
@endsection