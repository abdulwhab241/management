<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SectionRequest;
use App\Notifications\SectionNotification;
use Illuminate\Support\Facades\Notification;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->where('year',date('Y'))->get();
        $Classrooms = Classroom::where('year',date('Y'))->get();
        $list_Grades = Grade::where('year',date('Y'))->get();
        $teachers = Teacher::all();
    
        return view('pages.Sections.index',compact('Grades','list_Grades','Classrooms','teachers'));
    }

    public function show($id)
    {
        $Sections = Section::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->section_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Sections.notification', compact('Sections'));
    }

    public function store(SectionRequest $request)
    {
        try {

            $Sections = new Section();
    
            $Sections->name_section = strip_tags($request->Name_Section);
            $Sections->grade_id = strip_tags($request->Grade_id);
            $Sections->class_id = strip_tags($request->Classroom_id);
            $Sections->create_by = auth()->user()->name;
            $Sections->year = date('Y');
            $Sections->save();
            $Sections->teachers()->attach(($request->teacher_id));

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new SectionNotification($Sections->id,$create_by,$Sections->name_section));
            
            toastr()->success('تم إضـافة القسم بنجاح');
            return redirect()->route('Sections.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(SectionRequest $request)
    {
        
    try {
        $Sections = Section::findOrFail(strip_tags($request->id));

        $Sections->name_section = strip_tags($request->Name_Section);
        $Sections->grade_id = strip_tags($request->Grade_id);
        $Sections->class_id = strip_tags($request->Classroom_id);
        $Sections->year = date('Y');
        $Sections->create_by = auth()->user()->name;

        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }

        $Sections->save();
        toastr()->success('تم تعديل القسم بنجاح');

        return redirect()->route('Sections.index');
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    public function destroy(Request $request)
    {


        $MyStudent_id = Student::where('section_id',strip_tags($request->id))->pluck('section_id');

        if($MyStudent_id->count() == 0){

            $Sections = section::findOrFail(strip_tags($request->id))->delete();
            toastr()->error('تم حذف القسم بنجاح');
            return redirect()->route('Sections.index');
        }

        else{

            toastr()->warning(' لايمكن حذف القسم بسبب وجود طـلاب تابعة لـه احـذف الـطـلاب التابعة لـه ثم احذف القسم');
            return redirect()->route('Sections.index');
        }

    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }
    

}
