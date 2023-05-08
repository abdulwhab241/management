<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use Illuminate\Support\Facades\DB;

class TeacherExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        $subjects = Subject::where('teacher_id',auth()->user()->id)->get();
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Classrooms = Section::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.Exams.index', compact('exams','subjects','Classrooms'));
    }

    public function store(QuizRequest $request)
    {
        // dd($request);
        try {
            $exams = new Exam();
            $exams->classroom_id = strip_tags($request->Classroom_id);
            $exams->teacher_id = auth()->user()->id;
            $exams->subject_id = strip_tags($request->Subject_id);
            $exams->exam_date = date('Y-m-d');
            $exams->total_marks = strip_tags($request->Total);
            $exams->create_by = auth()->user()->name;
            $exams->save();
            toastr()->success('تـم إضـافـة الإختبـار بنجـاح');
            return redirect()->route('Exams.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(QuizRequest $request)
    {
        try {
            $exam = Exam::findOrFail($request->id);
            $exam->classroom_id = strip_tags($request->Classroom_id);
            $exam->teacher_id = auth()->user()->id;
            $exam->subject_id = strip_tags($request->Subject_id);
            $exam->exam_date = date('Y-m-d');
            $exam->total_marks = strip_tags($request->Total);
            $exam->create_by = auth()->user()->name;
            $exam->save();
            toastr()->success('تـم تعـديـل الإختبـار بنجـاح');
            return redirect()->route('Exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Exam::destroy($id);
            toastr()->error('تـم حـذف الإختبـار بنجـاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // public function create()
    // {
    //     $data['grades'] = Grade::all();
    //     $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
    //     return view('pages.Teachers.dashboard.Exams.create', $data);
    // }




    // public function show($id)
    // {
    //     $questions = Question::where('exam_id',$id)->get();
    //     $exam = Exam::findOrFail($id);
    //     return view('pages.Teachers.dashboard.Questions.index',compact('exam'));
    // }


    // public function edit($id)
    // {
    //     $exam = Exam::findOrFail($id);
    //     $data['grades'] = Grade::all();
    //     $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
    //     return view('pages.Teachers.dashboard.Exams.edit', $data, compact('exam'));
    // }
}
