<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_all" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-warning">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">إرجـاع الكـل</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('Upgrades.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="page_id" value="1">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاك من عملية تراجع كافة الطلاب ؟</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-dismiss="modal">إغـلاق</button>
                        <button  class="btn btn-outline">تأكيـد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>