<div>
@if (!empty($successMessage))
<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{-- {{ $successMessage }} --}}
    <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $successMessage }}</h4>  </span>
</div>
@endif

@if ($catchError)
<div class="alert alert-danger" id="success-danger">
<button type="button" class="close" data-dismiss="alert">x</button>
{{ $catchError }}
</div>
@endif




@if($show_table)
@include('livewire.Student_Table')

@else
<div class="stepwizard">
<div class="stepwizard-row setup-panel">
    <div class="stepwizard-step">
        <a href="#step-1" type="button"
            class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-info' }}">1</a>
        <p>معلومات الطالب</p>
    </div>
    <div class="stepwizard-step">
        <a href="#step-2" type="button"
            class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-info' }}">2</a>
        <p>معلومات الأب والأم</p>
    </div>
    <div class="stepwizard-step">
        <a href="#step-3" type="button"
            class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
            disabled="disabled">3</a>
        <p>تاكيد المعلومات</p>
    </div>
</div>
</div>


@include('livewire.Student_Form')

@include('livewire.Father_Mother_Form')


<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
@if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
        @endif
        <div class="col-xs-12">
            <br>
        <div class="col">
            <label style="color: blue; font-weight:bold;">إختر صورة للطالب</label>
            <div class="form-group">
                <input type="file" wire:model="photos" accept="image/*" multiple>
            </div>
            <br>
            <div class="col-md-12">
                <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                
                <input type="hidden" wire:model="Student_id">

                <button class="btn btn-danger btn-flat"
                        style="padding: 10px; margin: 5px;" type="button"
                        wire:click="back(2)">السابق</button>
                
                <!-- for edit -->
                @if($updateMode)
                <button class="btn btn-success btn-flat" 
                        style="padding: 10px; margin: 5px;" wire:click="submitForm_edit"
                        type="button">تاكيد</button>
                @else
                <button class="btn btn-success btn-flat" 
                style="padding: 10px; margin: 5px;" wire:click="submitForm"
                type="button">تاكيد</button>
                @endif

            </div>
        </div>
    </div>
    @endif
</div>