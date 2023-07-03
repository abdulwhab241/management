<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\FeeInvoice;
use App\Models\ProcessingFee;
use App\Models\PaymentStudent;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\StudentNotification;
use Illuminate\Support\Facades\Notification;


class StudentRepository implements StudentRepositoryInterface{

    public function Create_Student(){

        $data['Grades'] = Grade::where('year', date("Y"))->get();
        $data['Genders'] = Gender::all();
        return view('pages.Students.create',$data);

    }

    public function Show_Student($id)
    {
        $Student = Student::findOrFail($id);
        $Student_Account = StudentAccount::select('*')->where('student_id','=',$id)
                                            ->where('year', date('Y'))->get();

        $Payment = PaymentStudent::select('*')->where('student_id','=',$id)
                                            ->where('year', date('Y'))->get();

        $ReceiptStudent = ReceiptStudent::select('*')->where('student_id','=',$id)
                                            ->where('year', date('Y'))->get();

        $ProcessingFee = ProcessingFee::select('*')->where('student_id','=',$id)
                                            ->where('year', date('Y'))->get();

        $FeeInvoices = FeeInvoice::select('*')->where('student_id','=',$id)
                                            ->where('year', date('Y'))->get();

        return view('pages.Students.show',compact('Student','Student_Account','Payment','ReceiptStudent','FeeInvoices','ProcessingFee'));
    }

    public function Get_classrooms($id){

        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");
        return $list_classes;

    }



    //Get Sections
    public function Get_Sections($id){

        $list_sections = Section::where("class_id", $id)->pluck("name_section", "id");
        return $list_sections;
    }

    public function Store_Student($request){

        try {
            $students = new Student();

            // insert student information 
            $students->name = strip_tags($request->Name);
            $students->gender_id = strip_tags($request->Gender_id);
            $students->grade_id = strip_tags($request->Grade_id);
            $students->classroom_id = strip_tags($request->Classroom_id);
            $students->birth_date = strip_tags($request->Date_Birth);
            $students->section_id = strip_tags($request->Section_id);
            $students->academic_year = strip_tags($request->academic_year);
            $students->qualification = strip_tags($request->Qualification);

              // insert father information
            $students->father_name = strip_tags($request->Father_Name);
            $students->employer = strip_tags($request->Employer);
            $students->father_job = strip_tags($request->Father_Job);
            $students->father_phone = strip_tags($request->Father_Phone);
            $students->password = Hash::make(strip_tags($request->Father_Phone));
            $students->job_phone = strip_tags($request->Job_Phone);
            $students->home_phone = strip_tags($request->Home_Phone);
            $students->address = strip_tags($request->Address);

              // insert mother information
            $students->mother_name = strip_tags($request->Mother_Name);
            $students->mother_phone = strip_tags($request->Mother_Phone);
            $students->mother_job = strip_tags($request->Mother_Job);
            $students->year = date('Y');
            $students->create_by = auth()->user()->name;

                // insert img
                if($request->hasfile('photos'))
                {
                    foreach($request->file('photos') as $file)
                    {
                        $name = $file->getClientOriginalName();
                        $file->storeAs('attachments/Students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                        $students->image=$name;
                    }
                }

            $students->save();

            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new StudentNotification($students->id,$create_by,$students->name));

    
            toastr()->success('تم إضـافـة معلومـات الطـالـب بنجاح');
            return redirect()->route('Students.create');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Get_Student()
    {
        $Students = Student::where('year', date('Y'))->get();
        return view('pages.Students.index',compact('Students'));
    }

    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::where('year', date("Y"))->get();
        $data['Sections'] = Section::where('year', date("Y"))->get();
        $data['Classrooms'] = Classroom::where('year', date("Y"))->get();
        $data['Genders'] = Gender::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {


        try {
            $Edit_Students = Student::findOrFail($request->id);

            // insert student information
            $Edit_Students->name = strip_tags($request->Name);
            $Edit_Students->gender_id = strip_tags($request->Gender_id);
            $Edit_Students->grade_id = strip_tags($request->Grade_id);
            $Edit_Students->classroom_id = strip_tags($request->Classroom_id);
            $Edit_Students->birth_date = strip_tags($request->Date_Birth);
            $Edit_Students->section_id = strip_tags($request->Section_id);
            $Edit_Students->academic_year = strip_tags($request->academic_year);
            $Edit_Students->qualification = strip_tags($request->Qualification);

                // insert father information
            $Edit_Students->father_name = strip_tags($request->Father_Name);
            $Edit_Students->employer = strip_tags($request->Employer);
            $Edit_Students->father_job = strip_tags($request->Father_Job);
            $Edit_Students->father_phone = strip_tags($request->Father_Phone);
            $Edit_Students->password = Hash::make(strip_tags($request->Father_Phone));
            $Edit_Students->job_phone = strip_tags($request->Job_Phone);
            $Edit_Students->home_phone = strip_tags($request->Home_Phone);
            $Edit_Students->address = strip_tags($request->Address);

                // insert mother information
            $Edit_Students->mother_name = strip_tags($request->Mother_Name);
            $Edit_Students->mother_phone = strip_tags($request->Mother_Phone);
            $Edit_Students->mother_job = strip_tags($request->Mother_Job);
            $Edit_Students->year = date('Y');
            $Edit_Students->create_by = auth()->user()->name;

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/Students/'.$Edit_Students->name, $file->getClientOriginalName(),'upload_attachments');

                    $Edit_Students->image=$name;
                }
            }

    
            $Edit_Students->save();
            toastr()->success('تم تعـديـل معلومـات الطـالـب بنجاح');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Delete_Student($request)
    {

        Student::destroy(strip_tags($request->id));
        toastr()->error('تـم حـذف الطـالـب بنـجاح');
        return redirect()->route('Students.index');
    }


}


