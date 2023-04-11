<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    public function index()
    {
        $Exams = Exam::all();
        return view('pages.Exams.index', compact('Exams'));
    }

    // public function store(ExamRequest $request)
    // {
    //     try
    //     {
    //         // $validated = $request->validated();
    //         $Exam = new Exam();
    //         $Exam->name = strip_tags($request->Name);
    //         $Exam->notes = strip_tags($request->Notes);
    //         $Exam->create_by = auth()->user()->name;

    //         $Exam->save();
    //         toastr()->success('تم حفظ المرحلة بنجاح');
    //         return redirect()->route('Exams.index');
    //     }
    //     catch(\Exception $e)
    //     {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }

    // public function update(ExamRequest $request)
    // {
    //     try
    //     {
    //         $validated = $request->validated();
    //         $Exam = Exam::findOrFail($request->id);
    //         $Exam->update([
    //             $Exam->name = strip_tags($request->Name),
    //             $Exam->notes = strip_tags($request->Notes),
    //             $Exam->create_by = auth()->user()->name,
    //         ]);
    //         toastr()->success('تم تعديل المرحلة بنجاح');
    //         return redirect()->route('Exams.index');
    //     }
    //     catch(\Exception $e)
    //     {
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }
}
