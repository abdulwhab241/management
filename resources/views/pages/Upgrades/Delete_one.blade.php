<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_one{{ $promotion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-warning">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">إرجـاع طالـب</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('Upgrades.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من عملية إرجاع الطالب ؟ </h5>
                    <input  type="text" style="font-weight: bolder; font-size:20px;"
                    name="Name_Section"
                    class="form-control"
                    value="{{ $promotion->student->name }}"
                    disabled>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-dismiss="modal">إغـلاق</button>
                        <button  class="btn btn-outline">تاكيـد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>