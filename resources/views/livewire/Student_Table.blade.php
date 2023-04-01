<div>
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>

        <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $successMessage }}</h4>  </span>
    </div>
@endif
</div>
<div class="box-header">
<button class="btn btn-success btn-flat" wire:click="showformadd" style="margin: 5px; padding: 5px;" type="button">إضافة طالب</button>
<br><br>
<div class="box-tools">
    <div class="input-group" style="width: 150px;">
    <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
    <div class="input-group-btn">
    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
    </div>
    </div>
    </div>
</div>

<div class="box-body table-responsive no-padding">
    <table class="table table-bordered table-hover" style="text-align: center" data-page-length="50">

        <thead>
        <tr class="table-success">
            <th style="text-align: center;" class="alert-info">#</th>
            <th style="text-align: center;" class="alert-info">أسم الطالب</th>
            <th style="text-align: center;" class="alert-info"> النوع</th>
            <th style="text-align: center;" class="alert-info">المرحلة الدراسية</th>
            <th style="text-align: center;" class="alert-info">الصف الدراسي</th>
            <th style="text-align: center;" class="alert-info">الرسوم الدراسية</th>
            <th style="text-align: center;" class="alert-info"> هاتف الاب</th>
            <th style="text-align: center;" class="alert-success"> انشـئ بواسطـة</th>
            <th style="text-align: center;" class="alert-warning">العمليات</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($Students as $Student)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $Student->name }}</td>
                <td>{{ $Student->gender->name }}</td>
                <td>{{$Student->grade->name}}</td>
                <td>{{$Student->classroom->name_class}}</td>
                <td>{{ $Student->fee->amount }}</td>
                <td>{{ $Student->father_phone }}</td>
                <td>{{ $Student->create_by }}</td>
                <td>
                    <button wire:click="edit({{ $Student->id }})" title="تعديل"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $Student->id }})" title="حذف"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>