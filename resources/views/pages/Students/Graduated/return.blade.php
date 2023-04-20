<!-- Deleted inFormation Student -->
<div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-success">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">إرجـاع الطـالـب</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('Graduated.update','test')}}" method="post" autocomplete="off">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$student->id}}">

                <h5 style="font-family: 'Cairo', sans-serif; font-size:20px;">هل انت متاكد من عملية الغاء تخـرج الطـالـب ؟</h5>
                <input type="text" readonly value="{{$student->name}}" style=" font-weight: bolder; font-size:20px; text-align: center;" class="form-control">

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left"
                            data-dismiss="modal">إغلاق</button>
                    <button type="submit"
                            class="btn btn-outline">إرجـاع الطـالـب</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>