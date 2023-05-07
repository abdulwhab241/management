<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Classroom;
use Illuminate\Http\Request;

class TeacherExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Exams.index', compact('exams'));
    }


    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Exams.create', $data);
    }


    public function store(Request $request)
    {
        try {
            $exams = new Exam();
            $exams->name = $request->Name;
            $exams->subject_id = $request->subject_id;
            $exams->grade_id = $request->Grade_id;
            $exams->classroom_id = $request->Classroom_id;
            $exams->section_id = $request->section_id;
            $exams->teacher_id = auth()->user()->id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $questions = Question::where('exam_id',$id)->get();
        $exam = Exam::findOrFail($id);
        return view('pages.Teachers.dashboard.Questions.index',compact('questions','exam'));
    }


    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Exams.edit', $data, compact('exam'));
    }


    public function update(Request $request)
    {
        try {
            $exam = Exam::findOrFail($request->id);
            $exam->name = $request->Name;
            $exam->subject_id = $request->subject_id;
            $exam->grade_id = $request->Grade_id;
            $exam->classroom_id = $request->Classroom_id;
            $exam->section_id = $request->section_id;
            $exam->teacher_id = auth()->user()->id;
            $exam->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Exams.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            Exam::destroy($id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function getClassrooms($id)
    // {
    //     $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
    //     return $list_classes;
    // }

    // //Get Sections
    // public function Get_Sections($id){

    //     $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
    //     return $list_sections;
    // }
}
