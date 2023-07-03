<?php


namespace App\Repository;


use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;
use App\Notifications\SubjectNotification;
use Illuminate\Support\Facades\Notification;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::where('year',date('Y'))->get();
        return view('pages.Subjects.index',compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::where('year',date('Y'))->get();
        $teachers = Teacher::get();
        return view('pages.Subjects.create',compact('grades','teachers'));
    }




    public function store($request)
    {
        try {
            $subjects = new Subject();
            $subjects->name = strip_tags($request->Name);
            $subjects->grade_id = strip_tags($request->Grade_id);
            $subjects->classroom_id = strip_tags($request->Classroom_id);
            $subjects->year = date('Y');
            $subjects->create_by = auth()->user()->name;
            $subjects->save();

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new SubjectNotification($subjects->id,$create_by,$subjects->name));

            toastr()->success('تم إضـافة المادة بنجاح');
            return redirect()->route('Subjects.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $subject =Subject::findOrFail($id);
        $grades = Grade::where('year',date('Y'))->get();
        $teachers = Teacher::all();
        $classrooms = Classroom::where('year',date('Y'))->get();
        return view('pages.Subjects.edit',compact('subject','grades','teachers','classrooms'));

    }

    public function update($request)
    {
        try {
            $subjects =  Subject::findOrFail(strip_tags($request->id));
            $subjects->name = strip_tags($request->Name);
            $subjects->grade_id = strip_tags($request->Grade_id);
            $subjects->classroom_id = strip_tags($request->Classroom_id);
            $subjects->year = date('Y');
            $subjects->create_by = auth()->user()->name;
            $subjects->save();
            toastr()->success('تم تعديل المادة بنجاح');
            return redirect()->route('Subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subject::destroy(strip_tags($request->id));
            toastr()->error('تم حذف المادة بنجاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}