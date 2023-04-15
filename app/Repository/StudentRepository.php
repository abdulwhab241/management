<?php

namespace App\Repository;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\FeeInvoice;
// use Illuminate\Support\Facades\DB;
use App\Models\My_Parent;
use App\Models\PaymentStudent;
use App\Models\ProcessingFee;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentRepository implements StudentRepositoryInterface{

    public function Create_Student(){

        $data['Grades'] = Grade::all();
        $data['Fees'] = Fee::all();
        $data['Classrooms'] = Classroom::all();
        $data['Genders'] = Gender::all();
        return view('pages.Students.create',$data);

    }

    public function Show_Student($id)
    {
        $Student = Student::findOrFail($id);
        $Student_Account = StudentAccount::findOrFail($id);
        $Payment = PaymentStudent::all();
        // $FeeInvoices = FeeInvoice::all();
        $ReceiptStudent = ReceiptStudent::all();
        $ProcessingFee = ProcessingFee::all();
        $FeeInvoices = FeeInvoice::select('*')->where('student_id','=',$id)->get();
        return view('pages.Students.show',compact('Student','Student_Account','Payment','FeeInvoices','ReceiptStudent','ProcessingFee'));
    }

    public function Get_classrooms($id){

        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;

    }

    //Get Sections
    public function Get_Sections($id){

        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    public function Store_Student($request){

            // Save Images
            $file_extension = $request->Photo->getClientOriginalExtension();
            $file_name = $request->Name . '.' . $file_extension;
            $path = 'attachments/Students';
            $request->Photo->move($path, $file_name);

        try {
            $students = new Student();

            // insert student information
            $students->name = strip_tags($request->Name);
            $students->image = $file_name;
            $students->gender_id = strip_tags($request->Gender_id);
            $students->grade_id = strip_tags($request->Grade_id);
            $students->classroom_id = strip_tags($request->Classroom_id);
            $students->birth_date = strip_tags($request->Date_Birth);
            // $students->fee_id = strip_tags($request->Fee_id);
            $students->academic_year = strip_tags($request->academic_year);

              // insert father information
            $students->father_name = strip_tags($request->Father_Name);
            $students->employer = strip_tags($request->Employer);
            $students->father_job = strip_tags($request->Father_Job);
            $students->father_phone = strip_tags($request->Father_Phone);
            $students->job_phone = strip_tags($request->Job_Phone);
            $students->home_phone = strip_tags($request->Home_Phone);
            $students->address = strip_tags($request->Address);

              // insert mother information
            $students->mother_name = strip_tags($request->Mother_Name);
            $students->mother_phone = strip_tags($request->Mother_Phone);
            $students->mother_job = strip_tags($request->Mother_Job);
            $students->create_by = auth()->user()->name;

            $students->save();

    
            toastr()->success('تم إضـافـة معلومـات الطـالـب بنجاح');
            return redirect()->route('Students.create');
        }

        catch (\Exception $e){
            // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Get_Student()
    {
        $Students = Student::all();
        return view('pages.Students.index',compact('Students'));
    }

    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['Fees'] = Fee::all();
        $data['Classrooms'] = Classroom::all();
        $data['Genders'] = Gender::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {
        // Save Images
        $file_extension = $request->Photo->getClientOriginalExtension();
        $file_name = $request->Name . '.' . $file_extension;
        $path = 'attachments/Students';
        $request->Photo->move($path, $file_name);

        try {
            $Edit_Students = Student::findOrFail($request->id);

            // insert student information
            $Edit_Students->name = strip_tags($request->Name);
            $Edit_Students->image = $file_name;
            $Edit_Students->gender_id = strip_tags($request->Gender_id);
            $Edit_Students->grade_id = strip_tags($request->Grade_id);
            $Edit_Students->classroom_id = strip_tags($request->Classroom_id);
            $Edit_Students->birth_date = strip_tags($request->Date_Birth);
            // // $Edit_Students->fee_id = strip_tags($request->Fee_id);
            $Edit_Students->academic_year = strip_tags($request->academic_year);

                // insert father information
            $Edit_Students->father_name = strip_tags($request->Father_Name);
            $Edit_Students->employer = strip_tags($request->Employer);
            $Edit_Students->father_job = strip_tags($request->Father_Job);
            $Edit_Students->father_phone = strip_tags($request->Father_Phone);
            $Edit_Students->job_phone = strip_tags($request->Job_Phone);
            $Edit_Students->home_phone = strip_tags($request->Home_Phone);
            $Edit_Students->address = strip_tags($request->Address);

                // insert mother information
            $Edit_Students->mother_name = strip_tags($request->Mother_Name);
            $Edit_Students->mother_phone = strip_tags($request->Mother_Phone);
            $Edit_Students->mother_job = strip_tags($request->Mother_Job);
            $Edit_Students->create_by = auth()->user()->name;

    
            $Edit_Students->save();
            toastr()->success('تم تعـديـل معلومـات الطـالـب بنجاح');
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Delete_Student($request)
    {

        Student::destroy($request->id);
        toastr()->error(trans('main_trans.delete'));
        return redirect()->route('Students.index');
    }


    public function Upload_attachment($request)
    {
        // foreach($request->file('photos') as $file)
        // {
        //     $name = $file->getClientOriginalName();
        //     $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

        //     // insert in image_table
        //     $images= new image();
        //     $images->filename=$name;
        //     $images->imageable_id = $request->student_id;
        //     $images->imageable_type = 'App\Models\Student';
        //     $images->save();
        // }
        // toastr()->success(trans('Students_trans.Add_aa'));
        // return redirect()->route('Students.show',$request->student_id);
    }

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        // image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('Students_trans.Delete_aa'));
        return redirect()->route('Students.show',$request->student_id);
    }


}