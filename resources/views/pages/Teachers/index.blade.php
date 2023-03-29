@extends('layouts.master')
@section('css')
{{-- @toastr_css --}}
@section('title')
    المعلمين
@stop
@endsection

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        المعلمين
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    
    <li class="active">المعلمين</li>
    </ol>
    </section>
    <!-- Main content -->

<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
<div class="card card-statistics h-100">
<div class="card-body">
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <a href="{{route('Teachers.create')}}" class="btn btn-outline-success btn-sm" role="button"
            style="padding:5px; margin: 5px;"
                aria-pressed="true">إضافة معلم</a>
                <br><br>
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                        data-page-length="50"
                        style="text-align: center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>أسم المعلم</th>
                        <th>الهاتف</th>
                        <th>النوع</th>
                        <th>تاريخ التعيين</th>
                        <th>التخصص</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; ?>
                    @foreach($Teachers as $Teacher)
                        <tr>
                        <?php $i++; ?>
                        <td>{{ $i }}</td>
                        <td>{{$Teacher->name}}</td>
                        <td>{{$Teacher->phone_number}}</td>
                        <td>{{$Teacher->genders->name}}</td>
                        <td>{{$Teacher->joining_date}}</td>
                        <td>{{$Teacher->specializations->name}}</td>
                            <td>
                                <a href="{{route('Teachers.edit',$Teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{route('Teachers.destroy','test')}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف معلم</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p> هل انت متاكد من عملية حذف المعلم</p>
                                        <input type="hidden" name="id"  value="{{$Teacher->id}}">
                                        <input  type="text" style="font-weight: bolder; font-size:20px;"
                                        name="Name_Section"
                                        class="form-control"
                                        value="{{ $Teacher->name }}"
                                        disabled>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">إغلاق</button>
                                            <button type="submit"
                                                    class="btn btn-outline-danger"
                                                    style="padding: 10px; margin: 5px;">حذف البيانات</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
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
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection