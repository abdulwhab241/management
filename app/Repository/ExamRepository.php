<?php

namespace App\Repository;

use Exception;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exams = Exam::get();
        return view('pages.Exams.index', compact('exams'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Exams.create', $data);
    }

    public function store($request)
    {
        try {
            $exams = new Exam();
            $exams->name = $request->Name;
            $exams->subject_id = $request->subject_id;
            $exams->grade_id = $request->Grade_id;
            $exams->classroom_id = $request->Classroom_id;
            $exams->section_id = $request->section_id;
            $exams->teacher_id = $request->teacher_id;
            $exams->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Exams.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        // return view('pages.Exams.edit', $data, compact('quizz'));
        return view('pages.Exams.edit', compact('exam'));
    }

    public function update($request)
    {
        try {
            $exam = Exam::findOrFail($request->id);
            $exam->name = $request->Name;
            $exam->subject_id = $request->subject_id;
            $exam->grade_id = $request->Grade_id;
            $exam->classroom_id = $request->Classroom_id;
            $exam->section_id = $request->section_id;
            $exam->teacher_id = $request->teacher_id;
            $exam->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Exams.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Exam::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}