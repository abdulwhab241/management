@extends('layouts.master')
@section('css')
    
@section('title')
    قائمة النتـائـج
@stop
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    قائمة النتـائـج
</h1>
<ol class="breadcrumb">
<li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> الرئيسيـة</a></li>

<li class="active">قائمة النتـائـج</li>
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

<button type="button" class="btn btn-success btn-flat" style="margin: 5px; padding: 5px;" data-toggle="modal" data-target="#exampleModal">
    اضافة نتيـجـة
</button>
<br><br>
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
<table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">
<thead>
<tr>

    <th style="text-align: center;" class="alert-info">#</th>
    <th style="text-align: center;" class="alert-info">أسـم الطـالـب </th>
    <th style="text-align: center;" class="alert-info"> المـادة</th>
    <th style="text-align: center;" class="alert-info">الدرجـة التي حصـل عليـها </th>
    <th style="text-align: center;" class="alert-info">التقـديـر</th>
    <th style="text-align: center;" class="alert-info"> تـاريخ النتيجـة</th>
    <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
    <th style="text-align: center;" class="alert-warning">العمليات</th>
</tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($Results as $Result)
        <tr>
            <?php $i++; ?>
            <td>{{ $i }}</td>
            <td>{{ $Result->student->name }}</td>
            <td>{{ $Result->exam->subject->name }}</td>
            <td>{{$Result->marks_obtained}}</td>
            <td>{{$Result->appreciation}}</td>
            <td>{{$Result->created_at->diffForHumans()}}</td>
            <td>{{ $Result->create_by }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                data-target="#edit{{ $Result->id }}"
                title="تعديل"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Result{{ $Result->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
        </tr>

        <!-- edit_modal_Grade -->
<div class="modal fade" id="edit{{ $Result->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                تعديل النتيجـة
            </h5>
        </div>
        <div class="modal-body">
            <!-- add_form -->
            <form class="form-horizontal"  action="{{ route('Results.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                @csrf
                <div class="box-body">
                    <div class="row">

                        <div class="col-xs-6"> 
                            <label>أسـم الطـالـب </label>
                            <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $Result->id }}">
                            <select class="form-control select2" name="Student_id">
                                <option value="{{ $Result->student->id }}">
                                    {{ $Result->student->name }}
                                </option>
            
                            </select>
                            @error('Student_id')
                            <div class=" alert-danger">
                            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                            </div>
                            @enderror
                        </div>
                
                        <div class="col-xs-6"> 
                            <label>المـادة</label>
                            <select class="form-control select2" name="Exam_id">
                                <option value="{{ $Result->exam->subject->id }}">
                                    {{ $Result->exam->subject->name }}
                                </option>
                            </select>
                            @error('Exam_id')
                            <div class=" alert-danger">
                            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                            </div>
                            @enderror
                        </div>
                </div><br>
                
                <div class="row">
                
                    <div class="col-xs-6">
                    <label>الدرجـة التي حصـل عليـها</label>
                    <input type="number" value="{{ $Result->marks_obtained }}" name="Marks" class="form-control">
                    @error('Marks')
                    <div class=" alert-danger">
                    <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
                    </div>
                    @enderror
                    </div>
                    
                    <div class="col-xs-6">
                        <label for="inputEmail4">التقـديـر</label>
                        <select class="form-control select2" name="Appreciation">
                            <option >{{$Result->appreciation }}</option>
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
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                    data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                    class="btn btn-success">تـعديـل البيانات</button>
                    </div>
                   
            </form>
    
        </div>
    </div>
    </div>
    </div>

<!-- Delete modal -->
<div class="modal fade" id="delete_Result{{$Result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <form action="{{route('Results.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حـذف مـادة</h5>
            
            </div>
            <div class="modal-body">
                <p> هل انت متاكد من عملية حذف نتيجـة الطـالـب  </p>
                <input type="hidden" name="id"  value="{{$Result->id}}">
                <input  type="text" style="font-weight: bolder; font-size:20px;"
                name="Name_Section"
                class="form-control"
                value="{{$Result->student->name}}"
                disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
                        data-dismiss="modal">إغلاق</button>
                <button type="submit"
                        class="btn btn-outline">حذف البيانات</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endforeach
</tbody>
</table>

</div>
</div>

<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
{{-- aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
<div class="modal-dialog modal-success" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
    اضافة نتيـجة
</h5>
</div>
<div class="modal-body">

<form class="form-horizontal" action="{{ route('Results.store') }}" method="POST">
@csrf

<div class="box-body">
    <div class="row">

        <div class="col-xs-6"> 
            <label>أسـم الطـالـب</label>
            <select class="form-control select2" name="Student_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Students as $Student)
                    <option value="{{ $Student->id }}">
                        {{ $Student->name }}
                    </option>
                @endforeach
            </select>
            @error('Student_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>

        <div class="col-xs-6"> 
            <label>المـادة</label>
            <select class="form-control select2" name="Exam_id">
                <option  selected disabled>أختـر من القائمة...</option>
                @foreach ($Exams as $Exam)
                    <option value="{{ $Exam->id }}">
                        {{ $Exam->subject->name }}
                    </option>
                @endforeach
            </select>
            @error('Exam_id')
            <div class=" alert-danger">
            <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
            </div>
            @enderror
        </div>
</div><br>

<div class="row">

    <div class="col-xs-6"> 
        <label>الدرجـة التي حصـل عليـها</label>
        <input type="number" value="{{ old('Marks') }}" name="Marks" class="form-control">
        @error('Marks')
        <div class=" alert-danger">
        <span style="text-align: center; font-weight: bold;"><h3 style="text-align: center font-weight: bold;"> {{ $message }}</h3></span>
        </div>
        @enderror
    </div>

    <div class="col-xs-6">
        <label for="inputEmail4">التقـديـر</label>
        <select class="form-control select2" name="Appreciation">
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

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger"
    data-dismiss="modal">إغلاق</button>
    <button type="submit"
    class="btn btn-success">حفـظ البيانات</button>
    </div>


</form>
</div>


</div>

</div>

</div>

</div>
</div>

<!-- row closed -->
</section>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection