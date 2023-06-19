<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use App\Models\Section;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->where('year', date('Y'))->get();
        $subjects = Subject::where('teacher_id',auth()->user()->id)->get();
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $Classrooms = Section::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.Exams.index', compact('exams','subjects','Classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Classroom_id' => 'required|integer',
            'Subject_id' => 'required|integer',
            'Total' => 'required',
            'Exam_Date' => 'required',
        ]);
        try {
            $exams = new Exam();
            $exams->classroom_id = strip_tags($request->Classroom_id);
            $exams->teacher_id = auth()->user()->id;
            $exams->subject_id = strip_tags($request->Subject_id);
            $exams->exam_date = strip_tags($request->Exam_Date);
            $exams->total_marks = strip_tags($request->Total);
            $exams->create_by = auth()->user()->name;
            $exams->save();
            toastr()->success('تـم إضـافـة الإختبـار بنجـاح');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'Classroom_id' => 'required|integer',
            'Subject_id' => 'required|integer',
            'Total' => 'required',
            'Exam_Date' => 'required',
        ]);
        try {
            $exam = Exam::findOrFail($request->id);
            $exam->classroom_id = strip_tags($request->Classroom_id);
            $exam->teacher_id = auth()->user()->id;
            $exam->subject_id = strip_tags($request->Subject_id);
            $exam->exam_date = strip_tags($request->Exam_Date);
            $exam->total_marks = strip_tags($request->Total);
            $exam->create_by = auth()->user()->name;
            $exam->save();
            toastr()->success('تـم تعـديـل الإختبـار بنجـاح');
            return redirect()->back();
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

}
