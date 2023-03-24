@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
الأقسـام
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الأقسـام</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">الأقسـام</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->

@section('PageTitle')
الأقسـام
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
    <div class="card card-statistics h-100">
    <div class="card-body">
    <a class="btn btn-outline-success x-small" style="padding:5px; margin: 5px;" href="#" data-toggle="modal" data-target="#exampleModal">
        اضافة قسـم</a>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    <div class="card card-statistics h-100">
    <div class="card-body">
    <div class="accordion gray plus-icon round">
    
    @foreach ($Grades as $Grade)
    
    <div class="acd-group">
    <a href="#" class="acd-heading">{{ $Grade->name }}</a>
    <div class="acd-des">
    
    <div class="row">
    <div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
    <div class="card-body">
    <div class="d-block d-md-flex justify-content-between">
    <div class="d-block">
    </div>
    </div>
    <div class="table-responsive mt-15">
    <table class="table center-aligned-table mb-0">
    <thead>
    <tr class="text-dark">
        <th>#</th>
        <th>الصـف</th>
        <th>القسـم</th>
        <th>العمليات</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>
    @foreach ($Grade->Sections as $list_Sections)
        <tr>
            <?php $i++; ?>
            <td >{{ $i }}</td>
            <td>{{ $list_Sections->My_Classes->name_class }}</td>
            <td style="font-weight: bold; font-size: 20px;">{{ $list_Sections->name_section }}</td>
            {{-- <td>
                @foreach ($TeacherWithSection->SectionsWith as $t)
                    {{ $t->teachers->Name }}
                @endforeach
            </td> --}}
            <td>
    
                <a href="#"
                    class="btn btn-outline-info btn-sm"
                    data-toggle="modal"
                    data-target="#edit{{ $list_Sections->id }}">تعديل</a>
                <a href="#"
                    class="btn btn-outline-danger btn-sm"
                    data-toggle="modal"
                    data-target="#delete{{ $list_Sections->id }}">حذف</a>
            </td>
        </tr>
    
    
        <!--تعديل قسم جديد -->
        <div class="modal fade"
                id="edit{{ $list_Sections->id }}"
                tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            style="font-family: 'Cairo', sans-serif;"
                            id="exampleModalLabel">
                            تعديل قسـم
                        </h5>
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                        <span
                            aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
    
                        <form
                            action="{{ route('Sections.update', 'test') }}"
                            method="POST">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <label for="Name" style="font-weight: bold;"
                                    class="mr-sm-2">القسـم
                                    :</label>
                                    <input type="text"
                                            name="Name_Section"
                                            class="form-control"
                                            value="{{ $list_Sections->name_section }}">
                                </div>
    
                    
                                    <input id="id"
                                            type="hidden"
                                            name="id"
                                            class="form-control"
                                            value="{{ $list_Sections->id }}">
                                {{-- </div> --}}
    
                            </div>
                            <br>
    
    
                            <div class="col">
                                <label for="inputName" style="font-weight: bold;"
                                        class="control-label">المرحـلة</label>
                                <select name="Grade_id"
                                        class="custom-select"
                                        onclick="console.log($(this).val())">
                                    <!--placeholder-->
                                    <option
                                        value="{{ $Grade->id }}">
                                        {{ $Grade->name }}
                                    </option>
                                    @foreach ($list_Grades as $list_Grade)
                                        <option
                                            value="{{ $list_Grade->id }}">
                                            {{ $list_Grade->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
    
                            <div class="col">
                                <label for="inputName" style="font-weight: bold;"
                                        class="control-label">الصـف</label>
                                <select name="Class_id"
                                        class="custom-select">
                                    <option
                                        value="{{ $list_Sections->My_Classes->id }}">
                                        {{ $list_Sections->My_Classes->name_class }}
                                    </option>
                                </select>
                            </div>
                            <br>
    
                            <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">إغلاق</button>
                        <button type="submit"
                                class="btn btn-success">تعديل البيانات</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
    
        <!-- delete_modal_Grade -->
        <div class="modal fade"
                id="delete{{ $list_Sections->id }}"
                tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;"
                            class="modal-title"
                            id="exampleModalLabel">
                            حذف قسـم
                        </h5>
                        <button type="button" class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                        <span
                            aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ route('Sections.destroy', 'test') }}"
                            method="post">
                            {{ method_field('Delete') }}
                            @csrf
                            هل انت متاكد من عملية حذف القسم
                            <input  type="text" style="font-weight: bolder; font-size:20px;"
                            name="Name_Section"
                            class="form-control"
                            value="{{ $list_Sections->name_section }}"
                            disabled>
                            <input id="id" type="hidden"
                                    name="id"
                                    class="form-control"
                                    value="{{ $list_Sections->id }}">
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary"
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
    </tbody>
    </table>
    </div>
    </div>
        </div>
    </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    
    <!--اضافة قسم جديد -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                        id="exampleModalLabel">
                        اضافة قسـم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                    <form action="{{ route('Sections.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col">
                                <label for="Name" style="font-weight: bold;"
                                class="mr-sm-2">القسـم
                                :</label>
                                <input type="text" name="Name_Section" class="form-control">
                            </div>
    
    
                        </div>
                        <br>
    
    
                        <div class="col">
                            <label for="inputName" style="font-weight: bold;"
                                class="control-label">المرحـلة</label>
                            <select name="Grade_id" class="custom-select"
                                    onchange="console.log($(this).val())">
                                <!--placeholder-->
                                <option value="" selected
                                        disabled>-- حدد المرحـلة --
                                </option>
                                @foreach ($list_Grades as $list_Grade)
                                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br><br>
    
                        <div class="col">
                            <label for="inputName" style="font-weight: bold;"
                                class="control-label">الصـف</label>
                            <select name="Class_id" class="custom-select">
    
                            </select>
                        </div>
                        <br>
    
    
    
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
    </div>
    </div>
    
    <!-- row closed -->
@endsection
@section('js')

    @toastr_js
    @toastr_render

<script>
$(document).ready(function () {
$('select[name="Grade_id"]').on('change', function () {
    var Grade_id = $(this).val();
    if (Grade_id) {
        $.ajax({
            url: "{{ URL::to('classes') }}/" + Grade_id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $('select[name="Class_id"]').empty();
                $.each(data, function (key, value) {
                    $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });
    } else {
        console.log('AJAX load did not work');
    }
});
});
</script>
        
@endsection