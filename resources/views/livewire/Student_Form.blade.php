@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">أسم الطالب</label>
                        <input type="text" wire:model="Name"  class="form-control">
                        @error('Name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">تاريخ الميلاد</label>
                        <input class="form-control" type="text" wire:model="Date_Birth" data-date-format="yyyy-mm-dd">
                        @error('Date_Birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="inputCity">النوع</label>
                        <select class="form-control select2" wire:model="Gender">
                            <option selected>اختيار من القائمة...</option>
                            @foreach($Genders as $Gender)
                                <option value="{{$Gender->id}}">{{$Gender->name}}</option>
                            @endforeach
                        </select>
                        @error('Gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputState">المرحلة الدراسية</label>
                        <select class="form-control select2" wire:model="Grade">
                            <option selected>اختيار من القائمة...</option>
                            @foreach($Grades as $Grade)
                                <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                            @endforeach
                        </select>
                        @error('Grade')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-row">
                    <div class="col-md-4">
                        <label for="inputZip">الفصل الدراسي</label>
                        <select class="form-control select2" wire:model="Classroom">
                            <option selected>اختيار من القائمة...</option>
                            @foreach($Classrooms as $Classroom)
                                <option value="{{$Classroom->id}}">{{$Classroom->name_class}}</option>
                            @endforeach
                        </select>
                        @error('Classroom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip"> الرسوم الدراسية</label>
                        <select class="form-control select2" wire:model="Fee">
                            <option selected>اختيار من القائمة...</option>
                            @foreach($Fees as $Fee)
                                <option value="{{$Fee->id}}">{{$Fee->amount}}</option>
                            @endforeach
                        </select>
                        @error('Fee')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="col-md-4">
                        <label for="title">السنة الدراسية</label>
                        <input type="text" wire:model="academic_year"  class="form-control">
                        @error('academic_year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <br>


                    <!-- for edit -->
                @if($updateMode)
                <button class="btn btn-success btn-flat" style="padding: 10px; margin: 5px;" type="button"
                        wire:click="firstStepSubmit_edit">التالي</button>
                @else
                <button class="btn btn-success btn-flat" style="padding: 10px; margin: 5px;" type="button"
                        wire:click="firstStepSubmit">التالي</button>
                @endif

            </div>
        </div>
    </div>