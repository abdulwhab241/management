<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-danger">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف بيانات الطالب</h5>
</div>
<div class="modal-body">
<form action="{{route('Graduated.destroy','test')}}" method="post">
    @csrf
    @method('DELETE')

    <input type="hidden" name="id" value="{{$student->id}}" >

    <h5 style="font-family: 'Cairo', sans-serif; font-size:20px;">  هل انت متأكد من حذف الطالب ؟</h5>
    <input type="text" readonly value="{{$student->name}}" style=" font-weight: bolder; font-size:20px; text-align: center;" class="form-control">

    <div class="modal-footer">
        <button type="button" class="btn btn-outline"
                data-dismiss="modal">إغلاق</button>
        <button type="submit"
                class="btn btn-outline">حذف البيانات</button>
    </div>
</form>
</div>
</div>
</div>
</div>