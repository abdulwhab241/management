<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use App\Models\MidResult;
use App\Models\Enrollment;
use App\Models\FinalResult;
use Illuminate\Http\Request;
use App\Models\StudentResult;
use App\Exports\FinalResultExport;
use App\Http\Requests\FinalRequest;
use Maatwebsite\Excel\Facades\Excel;

class FinalResultController extends Controller
{
    public function index()
    {
        $Final_Results = FinalResult::where('year', date('Y'))->get();
        $Classrooms = Classroom::where('year', date('Y'))->get();
        $Students = FinalResult::distinct()->where('year', date('Y'))->get(['student_id']);
        return view('pages.Final_Result.index', compact('Final_Results','Students','Classrooms'));
    }

    public function create()
    {
        $Students = MidResult::distinct()->where('year', date('Y'))->get(['student_id']);
        $Subjects = Subject::where('year', date('Y'))->get();
        return view('pages.Final_Result.add', compact('Students','Subjects'));
    }

    public function edit($id)
    {
        $Final_Result = FinalResult::findOrFail($id);
        $Subjects = Subject::where('year', date('Y'))->get();
        return view('pages.Final_Result.edit',compact('Final_Result','Subjects'));
    }

    public function find_student_final(Request $request)
    {
        $request->validate([
            'Student_id'=>'required|integer',
        ]);

        $Mid_Results = $FinalResults = MidResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->get();
        $FinalResults = FinalResult::where('student_id', strip_tags($request->Student_id))->where('year', date('Y'))->get();
        $Name = FinalResult::where('mid_id', strip_tags($request->Student_id))->where('year', date('Y'))->first();
        return view('pages.Final_Result.show', compact('FinalResults','Name','Mid_Results'));
    }


    public function export() 
    {
        return Excel::download(new FinalResultExport, 'النتائج النهائية للطلاب.xlsx');
    }

    public function send_final_result(Request $request)
    {
        try
        {

            $request->validate([
                'Classroom_id'=>'required|integer',
            ]);

            $students = FinalResult::where('classroom_id',$request->Classroom_id)->where('year', date('Y'))->get();

            if($students->count() < 1){
                toastr()->error('لاتوجد بيانات لـهـذا الـصـف في جدول الـنتـائـج النهـائيـة لـلـطـلاب');
                return redirect()->back();
            }

            foreach ($students as $student){

                $ids = explode(',',$student->id);
                FinalResult::whereIn('id', $ids)
                    ->update([
                        'final_status'=> 1,
                        'create_by' =>auth()->user()->name,
                    ]);
                }
        
            toastr()->success('تم إرسـال نتـائـج الـطـلاب للتـرم الاول بنجاح');
            return  redirect()->back();

        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function store(FinalRequest $request)
    {
        try {
            $Mids = MidResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id', strip_tags($request->Subject_id))->where('year', date('Y'))->pluck('id');

            if($Mids->count() == 0)
            {
                toastr()->error('عـذاً هـذا الـطالـب لا تـوجد لـه محصـلة للـترم الأول الرجاء إضافة محصلة للترم الاول لـهذي المادة');
                return redirect()->back();
            }

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }

            $Result = round($Degree / 30);

            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');

            $Students = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('student_id');

            $Total = $Result + strip_tags($request->Degree);

            $Final_Results = new FinalResult();
            $Final_Results->subject_id = strip_tags($request->Subject_id);

            foreach ($Students as $student){
                $Final_Results->student_id = $student;
            }

            foreach ($Mids as $Mid){
                $Final_Results->mid_id = $Mid;
            }

            foreach ($Sections as $section){
                $Final_Results->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->result =  $Result;
            $Final_Results->final_exam = strip_tags($request->Degree);
            $Final_Results->total = $Total;
            $Final_Results->year = date('Y');
            $Final_Results->final_status = 0;
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
            $Mids = MidResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id', strip_tags($request->Subject_id))->where('year', date('Y'))->pluck('id');

            if($Mids->count() == 0)
            {
                toastr()->error('عـذاً هـذا الـطالـب لا تـوجد لـه محصـلة للـترم الأول الرجاء إضافة محصلة للترم الاول لـهذي المادة');
                return redirect()->back();
            }

            $Degree = StudentResult::where('student_id',strip_tags($request->Student_id))
            ->where('subject_id',strip_tags($request->Subject_id))
            ->where('year', date('Y'))->sum('degree');
            if($Degree == null)
            {
                $Degree = 0 ;
            }

            $Result = round($Degree / 30);

            $classrooms = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('classroom_id');
            $Sections = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('section_id');
            
            $Students = Enrollment::where('student_id',strip_tags($request->Student_id))->where('year', date('Y'))->pluck('student_id');

            $Total = $Result + strip_tags($request->Degree);

            $Final_Results = FinalResult::findOrFail($request->id);
            $Final_Results->subject_id = strip_tags($request->Subject_id);

            foreach ($Students as $student){
                $Final_Results->student_id = $student;
            }

            foreach ($Mids as $Mid){
                $Final_Results->mid_id = $Mid;
            }

            foreach ($Sections as $section){
                $Final_Results->section_id = $section;
            }
    
            foreach ($classrooms as $classroom){
                $Final_Results->classroom_id = $classroom;
            }

            $Final_Results->result =  $Result;
            $Final_Results->final_exam = strip_tags($request->Degree);
            $Final_Results->total = $Total;
            $Final_Results->year = date('Y');
            $Final_Results->final_status = 0;
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
