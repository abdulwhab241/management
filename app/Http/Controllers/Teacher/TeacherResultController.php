<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exam;
use App\Models\Result;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResultRequest;

class TeacherResultController extends Controller
{
    public function index()
    {
        $exams = Exam::where('teacher_id',auth()->user()->id)->get();
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        $results = Result::whereIn('exam_id', $ids)->get();
        // $results = Result::all();

        return view('pages.Teachers.dashboard.Result.index', compact('exams','results','students'));
    }

    public function store(ResultRequest $request)
    {
        try
        {

            $Exam = new Result();
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);
            $Exam->result_name = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->create_by = auth()->user()->name;

            $Exam->save();
            toastr()->success('تم حفظ نتيجـة الطـالـب بنجاح');
            return redirect()->route('Result.index');
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
            $Exam = Result::findOrFail($request->id);
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);
            $Exam->result_name = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->create_by = auth()->user()->name;
            $Exam->save();
            
            toastr()->success('تم تعديل نتيجـة الطـالـب بنجاح');
            return redirect()->route('Result.index');
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
