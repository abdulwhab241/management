@extends('layouts.master')
@section('css')

@section('title')
الصفـوف الدراسيـة
@stop
@endsection

@section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        الصفـوف الدراسيـة
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    {{-- <li><a href="#">Tables</a></li> --}}
    <li class="active">الصفـوف الدراسيـة</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

<div class="row">
<div class="col-xs-12">
<div class="box">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="box-header">
{{-- <button type="button" class="btn btn-success btn-flat " 
style="padding:5px; margin: 5px;" data-toggle="modal" data-target="#exampleModal">
    إضافة مرحلة
</button>
<br><br> --}}
<button type="button" class="btn btn-success btn-flat" style="margin: 5px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">
    اضافة صف
</button>

<button type="button" class="btn btn-danger btn-flat" style="margin: 5px; padding: 5px;" id="btn_delete_all">
    حذف الصفوف المختارة
</button>
<br><br>

<form action="{{ route('Filter_Classes') }}" method="POST">
    {{ csrf_field() }}
    <select class="selectpicker" style="margin-bottom: 5px; padding:5px; background-color: #F1F6F7;" data-style="btn-info" name="Grade_id" required
            onchange="this.form.submit()">
        <option value="" selected disabled>بحث باسم المرحلة</option>
        @foreach ($Grades as $Grade)
            <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
        @endforeach
    </select>
</form>
<div class="box-tools">
    <div class="input-group" style="width: 150px;">
    <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
    <div class="input-group-btn">
        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
    </div>
    </div>
</div>
</div><!-- /.box-header -->
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover" style="text-align: center">
    <tr>
        <th style="text-align: center;"><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>

        <th style="text-align: center;">#</th>
        <th style="text-align: center;">اسم الصف</th>
        <th style="text-align: center;">اسم المرحلة</th>
        <th style="text-align: center;"> أُنـشأ بواسطـة</th>
        <th style="text-align: center;">العمليات</th>
    </tr>
</thead>
<tbody>
@if (isset($details))

    <?php $List_Classes = $details; ?>
@else

    <?php $List_Classes = $My_Classes; ?>
@endif

    <?php $i = 0; ?>

    @foreach ($List_Classes as $My_Class)
        <tr>
            <?php $i++; ?>
            <td><input type="checkbox"  value="{{ $My_Class->id }}" class="box1" ></td>
            <td>{{ $i }}</td>
            <td>{{ $My_Class->name_class }}</td>
            <td>{{ $My_Class->Grades->name }}</td>
            <td>{{ $My_Class->create_by }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $My_Class->id }}"
                    title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $My_Class->id }}"
                    title="حذف"><i
                        class="fa fa-trash"></i></button>
            </td>
        </tr>

     <!-- edit_modal_Grade -->
     <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        تعديل صف
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"
                                    class="mr-sm-2">اسم الصف
                                    :</label>
                                <input id="Name" type="text" name="Name"
                                    class="form-control"
                                    value="{{ $My_Class->name_class }}"
                                    required>
                                <input id="id" type="hidden" name="id" class="form-control"
                                    value="{{ $My_Class->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                for="exampleFormControlTextarea1">اسم المرحلة
                                :</label>
                            <select class="form-control form-control-lg" name="Grade_id" id="exampleFormControlSelect1">
                                <option value="{{ $My_Class->Grades->id }}">
                                    {{ $My_Class->Grades->name }}
                                </option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">
                                        {{ $Grade->name }}
                                    </option>
                                @endforeach
                            </select>
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
    <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        حذف صف
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Classrooms.destroy', 'test') }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        هل انت متاكد من عملية الحذف ؟
                        <input id="Name" type="text" name="Name"
                        class="form-control"
                        value="{{ $My_Class->name_class }}"
                        disabled>
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $My_Class->id }}">
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
    {{-- <tr>
    <td>183</td>
    <td>John Doe</td>
    <td>11-7-2014</td>
    <td><span class="label label-success">Approved</span></td>
    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
    </tr>
    <tr>
    <td>219</td>
    <td>Alexander Pierce</td>
    <td>11-7-2014</td>
    <td><span class="label label-warning">Pending</span></td>
    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
    </tr>
    <tr>
    <td>657</td>
    <td>Bob Doe</td>
    <td>11-7-2014</td>
    <td><span class="label label-primary">Approved</span></td>
    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
    </tr>
    <tr>
    <td>175</td>
    <td>Mike Doe</td>
    <td>11-7-2014</td>
    <td><span class="label label-danger">Denied</span></td>
    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
    </tr>
</table> --}}
</div><!-- /.box-body -->
{{-- <div class="d-flex justify-content-center">
{{ $grades->links() }}
</div> --}}
<div class="box-footer clearfix">
<ul class="pagination pagination-sm no-margin pull-right">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>
</div>
</div><!-- /.box -->
</div>

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    إضافة صف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form  action="{{ route('Classrooms.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="Name"
                                                class="mr-sm-2">أسم الصف
                                                :</label>
                                            <input class="form-control" type="text" name="Name" required />
                                        </div>

                                        <div class="col-md-4">
                                            <label for="Name_en"
                                                class="mr-sm-2">أسم المرحلة
                                                :</label>

                                            <div class="box">
                                                <select class="form-control select2" data-placeholder="Select a State" name="Grade_id">
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-4">
                                            <label for="Name_en"
                                                class="mr-sm-2">العمليات
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="حذف" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="ادراج سجل"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">إغلاق</button>
                                <button type="submit"
                                    class="btn btn-success">حفظ البيانات</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>

{{-- <!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
            إضافة صف
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

        <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
            @csrf

            <div class="box-body">
                <div class="repeater">
                    <div data-repeater-list="List_Classes">
                        <div data-repeater-item>

                            <div class="row">

                                <div class="col-md-4">
                                    <label for="Name"
                                        class="mr-sm-2">أسم الصف
                                        :</label>
                                    <input class="form-control" type="text" name="Name" required />
                                </div>

                                <div class="col-md-4">
                                    <label for="Name_en"
                                        class="mr-sm-2">أسم المرحلة
                                        :</label>

                                    <div class="box-body">
                                        <select class="form-control select2" name="Grade_id">
                                            @foreach ($Grades as $Grade)
                                                <option value="{{ $Grade->id }}" required>{{ $Grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label for="Name_en"
                                        class="mr-sm-2">العمليات
                                        :</label>
                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                        type="button" value="حذف" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="col-6">
                            <input class="btn btn-success btn-flat" data-repeater-create type="button" value="ادراج سجل"/>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">إغلاق</button>
                        <button type="submit"
                            class="btn btn-success">حفظ البيانات</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div> --}}

</div>

<!-- حذف مجموعة صفوف -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                حذف صف
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="{{ route('delete_all') }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                هل انت متأكد من عملية الحذف ؟
                <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-danger">حذف البيانات</button>
            </div>
        </form>
    </div>
</div>
</div>
</section><!-- /.content -->
{{-- </div> --}}
@endsection
@section('js')
@toastr_js
@toastr_render

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>

@endsection
