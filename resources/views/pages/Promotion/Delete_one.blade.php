<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_one{{ $promotion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">إرجـاع طالـب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Promotion.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من عملية إرجاع الطالب ؟ {{ $promotion->student->name }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
                        <button  class="btn btn-danger">تاكيـد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>