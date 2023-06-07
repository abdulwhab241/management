<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResultRequest;
use Maatwebsite\Excel\Facades\Excel;


class ResultController extends Controller
{
    public function index()
    {
        $Exams = Exam::all();
        $Results = Result::all();
        $Students = Student::all();
        
        return view('pages.Results.index', compact('Exams','Results','Students'));
    }

    public function show($id)
    {
        $Results = Result::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->result_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Results.notification', compact('Results'));
    }

    public function export() 
    {
        return Excel::download(new ResultsExport, 'النتائج.xlsx');
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



            toastr()->success('تم حفظ نتيجـة الطـالـب بنجاح');
            return redirect()->route('Results.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(ResultRequest $request)
    {
        try
        {
            // dd($request);
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
            return redirect()->route('Results.index');
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
        return redirect()->route('Results.index');
    }
}
