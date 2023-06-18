<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use App\Exports\FinalResultExport;
use App\Http\Requests\FinalRequest;
use Maatwebsite\Excel\Facades\Excel;

class FinalResultController extends Controller
{
    public function index()
    {
        $Final_Results = FinalResult::all();
        return view('pages.Final_Result.index', compact('Final_Results'));
    }

    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Subjects = Subject::all();
        return view('pages.Final_Result.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $Final_Result = FinalResult::findOrFail($id);
        return view('pages.Final_Result.edit',compact('Final_Result'));
    }

    public function search_student()
    {
        $FinalResult = FinalResult::where('year', date("Y"))->get();
        $GetStudent = Enrollment::where('year', date("Y"))->get();
        return view('pages.Final_Result.Student',compact('FinalResult','GetStudent'));
    }

    public function print($id)
    {
        $Final_Result = FinalResult::findOrFail($id)->where('student_id',$id)->first();
        $Results = FinalResult::findOrFail($id)->where('student_id',$id)->get();
        return view('pages.Final_Result.print',compact('Final_Result','Results'));
    }

    public function FinalSearch(Request $request)
    {
        $request->validate([
            'Student_id'=>'required|integer',
        ]);

        $GetStudent = Enrollment::where('year', date("Y"))->get();
        $Students = FinalResult::where('student_id', $request->Student_id)->get();
        $FinalResult = FinalResult::where('year', date("Y"))->get();

        if ($request->Student_id == 0) 
        {
            toastr()->error('لا توجد نتيجة لهذا الطالب');
            return redirect()->back();
        }
        else
        {
            return view('pages.Final_Result.Student',compact('Students','FinalResult','GetStudent'));
        }
    }

    public function export() 
    {
        return Excel::download(new FinalResultExport, 'النتائج النهائية للطلاب.xlsx');
    }

    public function store(FinalRequest $request)
    {
        try {
            // dd($request);
            $classrooms = Student::where('id',strip_tags($request->Student_id))->pluck('classroom_id');

            $Final_Results = new FinalResult();
            $Final_Results->student_id = strip_tags($request->Student_id);
            $Final_Results->subject_id = strip_tags($request->Subject_id);
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->f_total_write = strip_tags($request->F_Write);
            $Final_Results->f_total_number = strip_tags($request->F_Number);
            $Final_Results->s_total_write = strip_tags($request->S_Write);
            $Final_Results->s_total_number = strip_tags($request->S_Number);
            $Final_Results->total = strip_tags($request->Total);
            $Final_Results->year = date('Y');
            $Final_Results->date = date('Y-m-d');
            $Final_Results->create_by = auth()->user()->name;
            $Final_Results->save();

            toastr()->success('تـم إضـافـة نتيـجة الطـالـب النـهائـية بنجـاح');
            return redirect()->route('Final_Results.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(FinalRequest $request)
    {
        try
        {
            // dd($request);
            $classrooms = Student::where('id',strip_tags($request->Student_id))->pluck('classroom_id');
            
            $Final_Results = FinalResult::findOrFail($request->id);
            $Final_Results->student_id = strip_tags($request->Student_id);
            $Final_Results->subject_id = strip_tags($request->Subject_id);
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->f_total_write = strip_tags($request->F_Write);
            $Final_Results->f_total_number = strip_tags($request->F_Number);
            $Final_Results->s_total_write = strip_tags($request->S_Write);
            $Final_Results->s_total_number = strip_tags($request->S_Number);
            $Final_Results->total = strip_tags($request->Total);
            $Final_Results->year = date('Y');
            $Final_Results->date = date('Y-m-d');
            $Final_Results->create_by = auth()->user()->name;
            $Final_Results->save();
            
            toastr()->success('تـم تعديل نتيـجة الطـالـب النـهائـية بنجـاح');
            return redirect()->route('Final_Results.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        FinalResult::findOrFail(strip_tags($request->id))->delete(); 
        toastr()->error('تـم حـذف الـنتيـجة النـهائـية للـطالـب بنجـاح');
        return redirect()->route('Final_Results.index');
    }
}
