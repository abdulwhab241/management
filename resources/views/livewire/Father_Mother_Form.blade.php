@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <br>
                <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الأب</h5>
                <br>

                <div class="form-row">
                
                    <div class="col">
                        <label for="Father_Name">أسم الاب</label>
                        <input type="text" wire:model="Father_Name"  class="form-control">
                        @error('Father_Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">جهة العمل</label>
                        <input type="text" wire:model="Employer" class="form-control" >
                        @error('Employer')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    
                    <div class="col-md-3">
                        <label for="title">الوظيفة</label>
                        <input type="text" wire:model="Father_Job" class="form-control" >
                        @error('Father_Job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">الهاتف الشخصي</label>
                        <input type="text" wire:model="Father_Phone" class="form-control" >
                        @error('Father_Phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">هاتف العمل</label>
                        <input type="text" wire:model="Jop_Phone" class="form-control">
                        @error('Jop_Phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">هاتف المنزل</label>
                        <input type="text" wire:model="Home_Phone" class="form-control">
                        @error('Home_Phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <br>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">العنوان</label>
                    <textarea class="form-control" wire:model="Address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('Address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <br>
                <h5 style="text-align: center; color:blue; font-weight: bold;"> معلومات الأم</h5>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="title">أسم الام</label>
                        <input type="text" wire:model="Mother_Name" class="form-control">
                        @error('Mother_Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="title">الوظيفة</label>
                        <input type="text" wire:model="Mother_Job" class="form-control">
                        @error('Mother_Job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="title">الهاتف</label>
                        <input type="text" wire:model="Mother_Phone" class="form-control">
                        @error('Mother_Phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-danger btn-flat" style="padding: 10px; margin: 5px;" type="button" wire:click="back(1)">
                    السابق
                </button>

                {{-- for edit --}}
                @if($updateMode)
                <button class="btn btn-success btn-flat" style="padding: 10px; margin: 5px;" type="button"
                        wire:click="secondStepSubmit_edit">التالي</button>
                @else
                <button class="btn btn-success btn-flat" style="padding: 10px; margin: 5px;" type="button"
                        wire:click="secondStepSubmit">التالي</button>
                @endif

            </div>
        </div>
    </div>