<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use App\Models\User;
use App\Models\Result;
use App\Models\Section;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResultRequest;
use App\Notifications\ResultNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Teacher\TeacherResultNotification;

class TeacherResultController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $results = Section::with(['Results'])->whereIn('id', $ids)->get();

        return view('pages.Teachers.dashboard.Result.index', compact('exams','results'));
    }

    public function create()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students= Enrollment::whereIn('section_id', $ids)->where('year', date("Y"))->get();

        return view('pages.Teachers.dashboard.Result.add', compact('exams','students'));
    }

    public function print($id)
    {
        $Results = Section::with(['Results'])->findOrFail( $id);
        return view('pages.Teachers.dashboard.Result.print', compact('Results'));
    }

    public function store(ResultRequest $request)
    {
        try
        {
            $sections = Student::where('id',$request->Student_id)->pluck('section_id');

            $Exam = new Result();
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);

            foreach ($sections as $section){
                $Exam->section_id = $section;
            }

            $Exam->result_name = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->create_by = auth()->user()->name;

            $Exam->save();

            $student_names = Student::where('id',$request->Student_id)->pluck('name');
            foreach ($student_names as $name)
            {
                $student = Student::where('id', '=', $Exam->student_id)->get();
                $create_by = auth()->user()->name;

                $users = User::all();
                $create_by = auth()->user()->name;

                Notification::send($users, new ResultNotification($Exam->id,$create_by,$name,$Exam->result_name));
                Notification::send($student, new TeacherResultNotification($Exam->id,$create_by,$name,$Exam->result_name));
            }
            
            toastr()->success('تم إضـافـة نتيجـة الطـالـب بنجاح');
            return redirect()->route('TeacherResult.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(ResultRequest $request)
    {
        // dd($request);
        try
        {
            $sections = Student::where('id',$request->Student_id)->pluck('section_id');

            $Exam = Result::findOrFail($request->id);
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);

            foreach ($sections as $section){
                $Exam->section_id = $section;
            }

            $Exam->result_name = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->create_by = auth()->user()->name;
            $Exam->save();
            
            toastr()->success('تم تعديل نتيجـة الطـالـب بنجاح');
            return redirect()->route('TeacherResult.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Result::findOrFail($request->id)->delete(); 
        toastr()->error('تم حذف نتيجـة الطـالـب بنجاح');
        return redirect()->back();
    }

}
