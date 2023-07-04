<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Month;
use App\Models\Result;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Exports\ResultsExport;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResultRequest;
use Maatwebsite\Excel\Facades\Excel;


class ResultController extends Controller
{
    public function index()
    {
        $Results = Result::where('year', date('Y'))->get();
        return view('pages.Results.index', compact('Results'));
    }

    public function create()
    {
        $Exams = Exam::where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Students = Enrollment::where('year', date("Y"))->get();
        $Months = Month::all();
        return view('pages.Results.add',compact('Students','Exams','Semesters','Months'));
    }

    public function edit($id)
    {
        $Exams = Exam::where('year', date("Y"))->get();
        $Students = Enrollment::where('year', date("Y"))->get();
        $Semesters = Semester::all();
        $Result = Result::findOrFail($id);
        $Months = Month::all();
        return view('pages.Results.edit',compact('Students','Exams','Result','Semesters','Months'));
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
        return Excel::download(new ResultsExport, 'النتائج الشهرية.xlsx');
    }

    public function store(ResultRequest $request)
    {
        try
        {
            $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Exam = new Result();
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);
            $Exam->semester_id = strip_tags($request->Semester_id);

            foreach ($sections as $section){
                $Exam->section_id = $section;
            }

            $Exam->month_id = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->year = date('Y');
            $Exam->create_by = auth()->user()->name;
            $Exam->save();



            toastr()->success('تم إضـافـة نتيجـة الطـالـب بنجاح');
            return redirect()->route('Results.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try
        {
            // dd($request);
            $sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');
            
            $Exam = Result::findOrFail($request->id);
            $Exam->exam_id = strip_tags($request->Exam_id);
            $Exam->student_id = strip_tags($request->Student_id);
            $Exam->semester_id = strip_tags($request->Semester_id);

            foreach ($sections as $section){
                $Exam->section_id = $section;
            }

            $Exam->month_id = strip_tags($request->Result_name);
            $Exam->marks_obtained = strip_tags($request->Marks);
            $Exam->appreciation = strip_tags($request->Appreciation);
            $Exam->year = date('Y');
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
        Result::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تم حذف نتيجـة الطـالـب بنجاح');
        return redirect()->route('Results.index');
    }
}
