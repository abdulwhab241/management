<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$receipt_student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">حذف سند قبض</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('Receipts.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$receipt_student->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية حـذف سـند بـأسـم ؟</h5>
                    <input id="Name" type="text" name="Name"
                    class="form-control"
                    value="{{ $receipt_student->student->name }}"
                    disabled>
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