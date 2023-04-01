<?php

namespace App\Http\Livewire;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Student;
use Livewire\Component;
use App\Models\Classroom;
use Livewire\WithFileUploads;

class AddStudent extends Component
{
    // public function render()
    // {
    //     return view('livewire.add-student');
    // }

    use WithFileUploads;
    public $successMessage = '';

    public $catchError;

    public $currentStep = 1, $photos,

    // Student_INPUTS
    $Name, $Date_Birth,
    $Gender, $Grade,
    $Classroom, $Fee,
    $academic_year,

    // Father_INPUTS
    $Father_Name,  $Employer,
    $Father_Job,  $Father_Phone,
    $Jop_Phone,  $Home_Phone,
    $Address,

    // Mother_INPUTS
    $Mother_Name, $Mother_Phone,
    $Mother_Job, $show_table = true, $updateMode = false, $Student_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Name' => 'required|string',
            'Jop_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:8',
            'Home_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:8',
            'Father_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'Mother_Phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'academic_year' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4'
        ]);
    }

public function render()
{
    return view('livewire.add-student', [
        'Students' => Student::all(),
        'Fees' => Fee::all(),
        'Genders' => Gender::all(),
        'Grades' => Grade::all(),
        'Classrooms' => Classroom::all(),
    ]);
}

public function showformadd(){
    $this->show_table = false;
}

//first
public function firstStepSubmit()
{

    $this->validate([
        'Name' => 'required',
        'Date_Birth' => 'required|date|date_format:Y-m-d',
        'Gender' => 'required',
        'Grade' => 'required',
        'Classroom' => 'required',
        'Fee' => 'required',
        'academic_year' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
    ]);

    $this->currentStep = 2;
}

//second
public function secondStepSubmit()
{

    
    $this->validate([
        'Father_Name' => 'required',
        'Father_Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
        'Father_Job' => 'required',
        'Address' => 'required',
        'Mother_Name' => 'required',
        'Mother_Job' => 'required',
    ]);

    $this->currentStep = 3;
}

public function submitForm(){

    try {
        $Student = new Student();
        // Student_INPUTS
        $Student->name = $this->Name;
        $Student->gender_id = $this->Gender;
        $Student->birth_date = $this->Date_Birth;
        $Student->grade_id = $this->Grade;
        $Student->classroom_id = $this->Classroom;
        $Student->fee_id = $this->Fee;
        $Student->academic_year = $this->academic_year;

        // Father_INPUTS
        $Student->father_name = $this->Father_Name;
        $Student->employer = $this->Employer;
        $Student->jop_phone = $this->Jop_Phone;
        $Student->father_phone = $this->Father_Phone;
        $Student->father_job = $this->Father_Job;
        $Student->home_phone = $this->Home_Phone;
        $Student->address = $this->Address;

        // Mother_INPUTS
        $Student->mother_name = $this->Mother_Name;
        $Student->mother_phone = $this->Mother_Phone;
        $Student->mother_job = $this->Mother_Job;
        $Student->create_by = auth()->user()->name; 

        $Student->save();

        //Insert Image
        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $photo->storeAs('attachments/students/'.$Student->name, $photo->getClientOriginalName(), $disk = 'upload_attachments');
            
                $images = new Student();
                $images->image =  $photo->getClientOriginalName();
                // $images->imageable_id = Student::latest()->first()->id;
                // $images->imageable_type = 'App\Models\Student';
                $images->save();
            }
        }
        $this->successMessage = 'تم إضافة بيانات الطالب بنجاح';
        $this->clearForm();
        $this->currentStep = 1;
    }

    catch (\Exception $e) {
        $this->catchError = $e->getMessage();
    };

}

public function edit($id)
{
    $this->show_table =false;
    $this->updateMode = true;
    $Student = Student::where('id',$id)->first();
    $this->Student_id = $id;
    $this->Name = $Student->name;
    $this->Gender = $Student->gender_id;
    $this->Date_Birth = $Student->birth_date;
    $this->Grade = $Student->grade_id;
    $this->Classroom = $Student->classroom_id;
    $this->Fee = $Student->fee_id;
    $this->academic_year = $Student->academic_year;

    $this->Father_Name = $Student->father_name;
    $this->Employer = $Student->employer;
    $this->Jop_Phone = $Student->jop_phone;
    $this->Father_Phone = $Student->father_phone;
    $this->Father_Job = $Student->father_job;
    $this->Home_Phone = $Student->home_phone;
    $this->Address = $Student->address;

    $this->Mother_Name = $Student->mother_name;
    $this->Mother_Phone = $Student->mother_phone;
    $this->Mother_Job = $Student->mother_job;
    // $image = Image::where('imageable_id',$id)->first();
    // $this->Student_id= $id;
    // $this->photos = $image->filename;
}

public function firstStepSubmit_edit()
{
    $this->updateMode = true;
    $this->currentStep = 2;
}

public function secondStepSubmit_edit()
{
    $this->updateMode = true;
    $this->currentStep = 3;
}


public function submitForm_edit()
{
    if($this->Student_id)
    {
        $student = Student::findOrFail($this->Student_id);
        $student->update([
            'name' => $this->Name,
            'gender_id' => $this->Gender, 
            'birth_date' => $this->Date_Birth,
            'grade_id' => $this->Grade,
            'classroom_id' => $this->Classroom,
            'fee_id' => $this->Fee,
            'academic_year' => $this->academic_year,

            'father_name' => $this->Father_Name,
            'employer' => $this->Employer,
            'jop_phone' => $this->Jop_Phone,
            'father_phone' => $this->Father_Phone,
            'father_job' => $this->Father_Job,
            'home_phone' => $this->Home_Phone,
            'address' => $this->Address,

            'mother_name' => $this->Mother_Name,
            'mother_phone' => $this->Mother_Phone,
            'mother_job' => $this->Mother_Job,
            'create_by' => auth()->user()->name,
        ]);

        //Insert Image
        if (!empty($this->photos)){
            foreach ($this->photos as $photo) {
                $photo->storeAs('attachments/students/'.$this->Name, $photo->getClientOriginalName(), $disk = 'upload_attachments');
            
                // $image = Image::findOrFail($this->Student_id);
                // $image->update([
                //     'filename'=> $photo->getClientOriginalName(),
                //     'imageable_id'=> Student::latest()->first()->id,
                //     'imageable_type'=>'App\Models\Student',
                // ]);

                $images = new Student();
                $images->image =  $photo->getClientOriginalName();
                // $images->imageable_id = Student::latest()->first()->id;
                // $images->imageable_type = 'App\Models\Student';
                $images->save();
            }
        }

        


        toastr()->success('تم تعديل بيانات الطالب بنجاح');
        return redirect()->to('/add_student');
    }
}

public function delete($id){
    Student::findOrFail($id)->delete();
    toastr()->error('تم حذف بيانات الطالب بنجاح');
    return redirect()->to('/add_student');
}

//clearForm
public function clearForm()
{
    $this->Name = '';
    $this->Date_Birth = '';
    $this->Classroom = '';
    $this->Gender = '';
    $this->Grade = '';
    $this->Fee = '';
    $this->academic_year = '';

    $this->Father_Name = '';
    $this->Employer = '';
    $this->Father_Job = '';
    $this->Father_Phone = '';
    $this->Jop_Phone = '';
    $this->Home_Phone = '';
    $this->Address = '';

    $this->Mother_Name = '';
    $this->Mother_Phone = '';
    $this->Mother_Job = '';

}

//back
public function back($step)
{
    $this->currentStep = $step;
}

}
