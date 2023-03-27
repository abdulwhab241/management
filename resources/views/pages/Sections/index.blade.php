@extends('layouts.master')
@section('css')
@section('title')
الأقسـام
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        الأقسـام
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>
    {{-- <li><a href="#">Tables</a></li> --}}
    <li class="active">الأقسـام</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

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
    <a class="btn btn-success btn-flat" style="padding:5px; margin: 5px;" href="#" data-toggle="modal" data-target="#exampleModal">
        اضافة قسـم</a>
    

    <br><br>
    
    <!-- this -->
    
        @foreach ($Grades as $Grade)
        
    
            <div class="box-body table-responsive no-padding">
            <table class="table table-bordered table-hover" style="text-align: center">
                <thead>
                <tr>            
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;"> المرحلـة</th>
                    <th style="text-align: center;"> الصـف</th>
                    <th style="text-align: center;"> القسـم</th>
                    <th style="text-align: center;"> أُنـشأ بواسطـة</th>
                    <th style="text-align: center;">العمليات</th>

        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($Grade->Sections as $list_Sections)
            <tr>
                <?php $i++; ?>
                <td >{{ $i }}</td>
                <td>{{ $list_Sections->list_Grades->name }}</td>
                <td>{{ $list_Sections->My_Classes->name_class }}</td>
                <td style="font-weight: bold; font-size: 20px;">{{ $list_Sections->name_section }}</td>
                <td>{{ $list_Sections->create_by }}</td>
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
    
        {{-- @endforeach --}}

        
  
        <!-- End of -->

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
    
</section><!-- /.content -->
{{-- </div> --}}
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