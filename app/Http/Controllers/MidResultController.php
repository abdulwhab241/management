<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\MidResult;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Exports\MidResultExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MidResultRequest;

class MidResultController extends Controller
{
    public function index()
    {
        $MidResults = MidResult::where('year', date('Y'))->get();
        $Students = MidResult::distinct()->where('year', date('Y'))->get(['student_id']);
        return view('pages.Mid_Results.index', compact('MidResults','Students'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        return view('pages.Mid_Results.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $MidResult = MidResult::findOrFail($id);
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        return view('pages.Mid_Results.edit', compact('Students','Subjects','MidResult'));
    }

    public function export() 
    {
        return Excel::download(new MidResultExport, 'نتائج الطلاب للترم الاول.xlsx');
    }
    
    public function add_student_mid(Request $request)
    {
        $request->validate([
            'Student_id'=>'required|integer',
        ]);

        $MidResults = MidResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->get();
        $Name = MidResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->first();
        return view('pages.Mid_Results.show', compact('MidResults','Name'));
    }

    public function store(MidResultRequest $request)
    {
        try
        {

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
                                    ->where('subject_id',strip_tags($request->Subject_id))
                                    ->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }

            // $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            // ->where('subject_id',strip_tags($request->Subject_id))
            // ->where('year', date('Y'))
            // ->where('month_id',1)
            // ->where('month_id',2)
            // ->where('month_id',3)->sum('degree');

            $Result = round($Degree / 15);
            
            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->pluck('classroom_id');

            $Total = $Result + strip_tags($request->Degree);

            $MidResults = new MidResult();
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->result = $Result;


            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->mid_exam = strip_tags($request->Degree);
            $MidResults->total = $Total;
            $MidResults->year = date('Y');
            $MidResults->date = date('Y-m-d');
            $MidResults->create_by = auth()->user()->name;
            $MidResults->save();


            toastr()->success('تم إضـافـة نتيـجة الطـالـب للتـرم الاول بنجاح');
            return redirect()->route('MidResults.create');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(MidResultRequest $request)
    {
        try
        {

            $Degree = StudentResult::where('student_id',$request->Student_id)->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }
            $Result = round($Degree / 15);
            
            $classrooms = Student::where('id',$request->Student_id)->pluck('classroom_id');

            $Total = $Result + strip_tags($request->Degree);

            $MidResults = MidResult::findOrFail(strip_tags($request->id));
            $MidResults->student_id = strip_tags($request->Student_id);
            $MidResults->subject_id = strip_tags($request->Subject_id);
            $MidResults->result = $Result;


            foreach ($classrooms as $classroom){
                $MidResults->classroom_id = $classroom;
            }

            $MidResults->mid_exam = strip_tags($request->Degree);
            $MidResults->total = $Total;
            $MidResults->year = date('Y');
            $MidResults->date = date('Y-m-d');
            $MidResults->create_by = auth()->user()->name;
            $MidResults->save();


            toastr()->success('تم تعـديـل نتيـجة الطـالـب للتـرم الاول بنجاح');
            return redirect()->route('MidResults.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        MidResult::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تـم حـذف نتيـجة الطـالـب للتـرم الاول بنجاح');
        return redirect()->route('MidResults.index');
    }

}
