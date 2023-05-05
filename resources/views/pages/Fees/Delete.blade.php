<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Fee{{$fee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                حـذف رسـوم دراسيـة</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('Fees.destroy','test')}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$fee->id}}">
                <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية حـذف ؟</h5>
                <input id="Name" type="text" name="Name"
                class="form-control"
                value="{{ $fee->title }}" style="font-weight: bolder; text-align: center; font-size:20px;"
                disabled>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">إغـلاق</button>
                    <button  class="btn btn-outline">حـذف البيانـات</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
