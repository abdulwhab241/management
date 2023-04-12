<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    public function index()
    {
        $Exams = Exam::all();
        $Teachers = Teacher::all();
        $Subjects = Subject::all();
        $Classrooms = Classroom::all();
        
        return view('pages.Exams.index', compact('Exams','Teachers','Subjects','Classrooms'));
    }

    public function store(ExamRequest $request)
    {
        try
        {
            // $validated = $request->validated();
            $Exam = new Exam();
            $Exam->classroom_id = strip_tags($request->Classroom_id);
            $Exam->teacher_id = strip_tags($request->Teacher_id);
            $Exam->subject_id = strip_tags($request->Subject_id);
            $Exam->exam_date = date('Y-m-d');
            $Exam->total_marks = strip_tags($request->Total);
            $Exam->create_by = auth()->user()->name;

            $Exam->save();
            toastr()->success('تم حفظ الأختبـار بنجاح');
            return redirect()->route('Exams.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(ExamRequest $request)
    {
        try
        {
            $Exam = Exam::findOrFail($request->id);
            $Exam->classroom_id = strip_tags($request->Classroom_id);
            $Exam->teacher_id = strip_tags($request->Teacher_id);
            $Exam->subject_id = strip_tags($request->Subject_id);
            $Exam->exam_date = date('Y-m-d');
            $Exam->total_marks = strip_tags($request->Total);
            $Exam->create_by = auth()->user()->name;
            $Exam->save();
            
            toastr()->success('تم تعديل الأختبـار بنجاح');
            return redirect()->route('Exams.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Exam::findOrFail($request->id)->delete(); 
        toastr()->error('تم حذف الأختبـار بنجاح');
        return redirect()->route('Exams.index');
    }

    
}
