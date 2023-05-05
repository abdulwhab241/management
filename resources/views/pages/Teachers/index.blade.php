@extends('layouts.master')
@section('css')

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
    <a class="btn btn-success btn-flat" style="padding:5px; margin: 5px;" href="{{route('Teachers.create')}}">
        إضافة معلم</a>
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
        <th style="text-align: center;" class="alert-info">أسم المعلم</th>
        <th style="text-align: center;" class="alert-info">الهاتف</th>
        <th style="text-align: center;" class="alert-info">النوع</th>
        <th style="text-align: center;" class="alert-info">تاريخ التعيين</th>
        <th style="text-align: center;" class="alert-info">التخصص</th>
        <th style="text-align: center;" class="alert-info"> تـاريخ الإضـافـة</th>
        <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
        <th style="text-align: center;" class="alert-warning">العمليات</th>
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
        <td>{{$Teacher->created_at->diffForHumans()}}</td>
        <td>{{ $Teacher->create_by }}</td>
            <td>
                <a href="{{route('Teachers.edit',$Teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="تعديل"><i class="fa fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="حذف"><i class="fa fa-trash"></i></button>
            </td>
            
        </tr>

        <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
                <form action="{{route('Teachers.destroy','test')}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف معلم</h5>
                    
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
                        <button type="button" class="btn btn-outline"
                                data-dismiss="modal">إغلاق</button>
                        <button type="submit"
                                class="btn btn-outline">حذف البيانات</button>
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

</section>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection